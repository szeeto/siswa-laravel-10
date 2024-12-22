@extends('layouts.admin')
@section('konten')
    <div class="container mt-5">
        <a href="{{route('berita.create')}}" class="btn btn-succes">Tambah Berita</a>
    </div>    
    <div class="container mt-5">
        <div class="row">
            @foreach($berita as $data)
             <div class="col-md-4">
                <div class="card">
                    <img src="{{url('images/berita/'.$data->foto)}}" class="card-img-top" alt="image 1">
                    <div class="card-body">
                        <h5 class="card-title">{{str::sustr($data->judul_berita, 0, 20)}}...</h5>
                        <p>dibuat oleh : {{$data->author}}</p>
                        <p class="card-text">{{str::substr($data->isi, 0, 100)}}...</p>
                        <a href="{{route('berita.show', $data->slug)}}" class="btn btn-primary">selengkapnya</a>
                    </div>
                </div>
             </div> 
            @endforeach
        </div>     
    </div>
@endsection