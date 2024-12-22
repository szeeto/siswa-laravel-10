@extends('layouts.admin')
@section('konten')
<div class="container mt-5">
    <h2>buat berita baru</h2>
    <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="m-3">
            <label for="image" class="form-label" >foto</label>
            <input type="file" class="form-control" id="iamges" name="foto">
        </div>
        <div class="mb-3">
            <label for="title" class="laber-form">judul berita</label>
            <input type="text" class="from-control" id="title" name="judul_berita" placeholder="judul barita">
        </div>
        <div class="mb-3">
            <label for="description" class="from-label">isi berita</label>
            <textarea name="isi" id="description" rows="3" class="from-control" placeholder="tulisakan berita"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">author</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="author">
        </div>
    </form>
</div>                     