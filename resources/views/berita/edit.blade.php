@extends('layouts.admin')
@section('konten')
    <div class="container mt-5">
        <h2>edit berita</h2>
        <form action="{{ route ('berita.update', $berita->slug') }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="images" class="form-label">foto</label>
                <input type="file" class="from-control" id="images" name="foto">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">judul berita</label>
                <input type="text" class="from-control" id="title" name="judul_berita" value="{{$berita->judul_berita}}" placeholder="Judul Berita">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">isi berita</label>
            <textarea name="isi" id="description" rows="3" class="form-control" placeholder="'Tuliskan isi berita">{{$berita->isi}}</textarea>
            </div>
            <div class="m-3">
                <label for="author" class="form-label">author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$berita->author}}" placeholder="author">
            </div>
            <a href="{{route('berita.index')}}" class="btn btn-secondary">back</a>
            <button type="submit" class="btn btn-succes">update </button>
        </form>
    </div>
@endsection