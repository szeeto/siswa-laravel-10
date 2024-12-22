@extends('layouts.admin')
@section('konten')
    <div class="container mt-5">
        <div class="card">
            <img src="{{url('images/berita/' . $berita->foto)}}" alt="item-images" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$erita->judul_berita}}</h5>
                <p>dibuat oleh: {{$berita->author}}</p>
                <p class="card-text">{{$berita->isi}}</p>
                <a href="{{route('berita.edit', $berita->slug)}}" class="btn btn-primary">edit</a>
                <form action="{{route('berita.destroy', $berita->slug)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
                <a href="{{route('berita.index')}}" class="btn btn-secondary">back</a>
            </div>
        </div>
    </div>
@endsection