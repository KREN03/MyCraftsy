@extends('admin.layout.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="h3 mb-0 font-weight-bold">Tambah Kompetisi</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12">
        <form action="{{ route('competition.admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Nama Kompetisi</label>
              <input type="text" name="title" id="title" class="form-control @error('title')
                is-invalid
              @enderror" value="{{ old('title')}}">
              @error('title')
              <div class="invalid-feedback">
                Nama Kompetisi Harus diisi
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Kompetisi</label>
                <textarea class="form-control @error('description') is-invalid
                @enderror" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    Deskripsi Kompetisi Harus diisi
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi Kompetisi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid
                @enderror" value="{{ old('lokasi') }}">
                @error('lokasi')
                <div class="invalid-feedback">
                    Lokasi Harus diisi
                </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="category_id">Kategori</label>
              <select class="form-control @error('category_id') is-invalid
              @enderror" name="category_id" id="category_id">
                  <option value="">Pilih Kategori</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              @error('category_id')
                <div class="invalid-feedback">
                    Pilih salah satu kategori
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_start">Tanggal Mulai</label>
                <input type="date" name="date_start" id="date_start" class="form-control @error('date_start') is-invalid
                @enderror" value="{{ old('date_start') }}">
                @error('date_start')
                <div class="invalid-feedback">
                    Tanggal Mulai Kompetisi Harus diisi
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_end">Tanggal Berakhir</label>
                <input type="date" name="date_end" id="date_end" class="form-control @error('date_end') is-invalid
                @enderror" value="{{ old('date_end') }}">
                @error('date_end')
                <div class="invalid-feedback">
                    Tanggal Mulai Kompetisi Harus diisi
                </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="link_website">Link Website Kompetisi</label>
              <input type="text" name="link_website" id="link_website" class="form-control" value="{{ old('link_website') }}">
            </div>
            <div class="form-group">
              <label for="buku_panduan">Link Buku Panduan Kompetisi</label>
              <input type="text" name="buku_panduan" id="buku_panduan" class="form-control" value="{{ old('buku_panduan') }}">
            </div>
            <div class="form-group">
              <label for="thumbnail">Thumbnail</label>
              <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid
              @enderror">
              @error('thumbnail')
                <div class="invalid-feedback">
                    Tanggal Mulai Kompetisi Harus diisi
                </div>
                @enderror
            </div>
            <div class="d-flex mt-5">
                <button type="submit" class="btn btn-primary ml-auto rounded-pill px-5">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection
