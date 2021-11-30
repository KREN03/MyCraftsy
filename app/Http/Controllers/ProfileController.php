<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use App\Models\Work;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $data = $user->works()->get();
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID dls4O4tC-kszIo-vGn4X8E5TTjWtDpjQjhZDqoNwgUQ'
        ])->get('https://api.unsplash.com/photos');
        return view('profile.index', ['response' => json_decode($response), 'data' => $data]);
    }

    public function update()
    {
        return view('profile.update.index');
    }

    public function change(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);

        if ($request->image) {
            $file = $request->image;
            $file_name = time() . "." . $file->getClientOriginalExtension();
            $file->storeAs("public/profile", $file_name);
        } else {
            $file_name = Auth::user()->avatar;
        }

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->avatar = $file_name;

        $user->save();
        return redirect()->back()->with('status', 'Profile Updated!');
    }

    public function stats()
    {
        $like = DB::table('works')
            ->join('likes', 'works.id', '=', 'likes.work_id')
            ->where('works.user_id', '=', Auth::user()->id)
            ->count();

        $comment = DB::table('users')
            ->join('works', 'users.id', '=', 'works.user_id')
            ->join('comments', 'works.id', '=', 'comments.work_id')
            ->where('works.user_id', '=', Auth::user()->id)
            ->count();

        $works = Work::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('profile.statistik.index', compact('comment', 'like', 'works'));
    }

    public function getMonthName($number_of_month)
    {
        $dateObj   = DateTime::createFromFormat('!m', $number_of_month);
        $monthName = $dateObj->format('F');
        return $monthName;
    }

    public function getMonth()
    {
        $now = now();
        $current_month = date('m', strtotime("-4 months", strtotime(now())));
        $month_array = array();
        $effectiveDate = $now->month;
        for ($i = $current_month; $i <= $effectiveDate; $i++) {
            $month_no = $i;
            $month_name = $this->getMonthName($i);
            $month_array[$month_no] = $month_name;
        }
        return $month_array;
    }

    public function getMonthlyPemasukanCountPayment($month)
    {
        $current_year = now()->year;
        $pemasukans = DB::table('works')
        ->join('likes', 'works.id', '=', 'likes.work_id')
        ->whereMonth('likes.created_at', $month)
        ->whereYear('likes.created_at', $current_year)
        ->where('works.user_id', '=', Auth::user()->id)
            
        ->count();
        return $pemasukans;
    }

    public function getMonthlyPengeluaranCountPayment($month)
    {
        $current_year = now()->year;
        $pemasukans = DB::table('users')
        ->join('works', 'users.id', '=', 'works.user_id')
        ->join('comments', 'works.id', '=', 'comments.work_id')
        ->where('works.user_id', '=', Auth::user()->id)
        ->whereMonth('works.created_at', $month)
        ->whereYear('works.created_at', $current_year)
        ->orderBy('works.created_at')
        ->count();
        return $pemasukans;
    }

    public function getPemasukanData()
    {
        $monthly_keuangan_count_array = array();
        $month_array = $this->getMonth();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_keuangan_count = $this->getMonthlyPemasukanCountPayment($month_no);
                array_push($monthly_keuangan_count_array, $monthly_keuangan_count);
                array_push($month_name_array, $month_name);
            }
        }

        return $monthly_keuangan_count_array;
    }

    public function getPengeluaranData()
    {
        $monthly_keuangan_count_array = array();
        $month_array = $this->getMonth();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_keuangan_count = $this->getMonthlyPengeluaranCountPayment($month_no);
                array_push($monthly_keuangan_count_array, $monthly_keuangan_count);
                array_push($month_name_array, $month_name);
            }
        }

        return [
            'pengeluaran_count_data' => $monthly_keuangan_count_array,
            'months' => $month_name_array
        ];
    }

    public function getMonthlyKeuanganData()
    {
        $data = $this->getPengeluaranData();
        $monthly_keuangan_data_array = array(
            'months' => $data['months'],
            'like_data' => $this->getPemasukanData(),
            'comment_data' => $data['pengeluaran_count_data'],
        );

        return $monthly_keuangan_data_array;
    }
}
