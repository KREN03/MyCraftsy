@extends('admin.layout.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="h3 mb-0 font-weight-bold">Ubah Kompetisi</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12">
        <form action="{{ route('competition.edit', $competition->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Nama Kompetisi</label>
              <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title') : $competition->title }}">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Kompetisi</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') ? old('description') : $competition->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi Kompetisi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi') ? old('lokasi') : $competition->lokasi }}">
            </div>
            <div class="form-group">
              <label for="category_id">Kategori</label>
              <select class="form-control" name="category_id" id="category_id">
                  <option value="">Pilih Kategori</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $competition->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="date_start">Tanggal Mulai</label>
                <input type="date" name="date_start" id="date_start" class="form-control" value="{{ old('date_start') ?  old('date_start') : $competition->date_start->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="date_end">Tanggal Berakhir</label>
                <input type="date" name="date_end" id="date_end" class="form-control" value="{{ old('date_end') ?  old('date_end') : $competition->date_end->format('Y-m-d') }}">
            </div>
            <div class="form-group">
              <label for="link_website">Link Website Kompetisi</label>
              <input type="text" name="link_website" id="link_website" class="form-control" value="{{ old('link_website') ?  old('link_website') : $competition->link_website }}">
            </div>
            <div class="form-group">
              <label for="buku_panduan">Link Buku Panduan Kompetisi</label>
              <input type="text" name="buku_panduan" id="buku_panduan" class="form-control" value="{{ old('buku_panduan') ?  old('buku_panduan') : $competition->buku_panduan }}">
            </div>
            <div class="form-group">
              <label for="thumbnail">Thumbnail</label>
              <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            </div>
            <div class="d-flex mt-5">
                <button type="submit" class="btn btn-primary ml-auto rounded-pill px-5">Ubah</button>
            </div>
        </form>
    </div>
</div>
@endsection
