@extends('admin.layout.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="h3 mb-0 font-weight-bold">Kompetisi</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="d-flex mb-3">
            <a href="{{ route('competition.admin.add') }}" class="btn btn-primary ml-auto rounded-pill px-5"><i class="fa fa-plus mr-2" aria-hidden="true"></i> Tambah Kompetisi</a>
        </div>
        <table class="table table-striped">
            <thead class="thead-blue">
                <tr>
                    <th>Nama Kompetisi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($competitions as $competition)
                <tr>
                    <td>{{ $competition->title }}</td>
                    <td>{{ $competition->date_start->format('d-m-Y') }}</td>
                    <td>{{ $competition->date_end->format('d-m-Y') }}</td>
                    <td>
                        <a target="_blank" href="{{ route('competition.detail', $competition->slug) }}" class="icon icon-eye" data-toggle="tooltip" data-placement="bottom" title="Lihat"><i class="far fa-eye"></i></a>
                        <a href="{{ route('competition.admin.edit', $competition->id) }}" class="icon icon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <a href="" class="icon icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
