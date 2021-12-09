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
                        <form action="{{ route('competition.destroy', $competition->id) }}" class="d-inline" id="data-{{ $competition->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a type="button" class="icon icon-trash hapus" data-name="{{ $competition->title }}" data-id="{{ $competition->id }}" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                        </form>
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

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('sukses')) 
<script>
    Swal.fire({
        icon: 'success',
        title: 'Kompetisi telah dihapus',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
<script>
    $('.hapus').click(function(e) {
        var name = $(this).data('name');
        var id = $(this).data('id');
        
        Swal.fire({
            title: ``,
            text: `Apakah anda yakin ingin menghapus ${name} ?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
                $(`#data-${id}`).submit();
            }
        })
    })

</script>
@endsection