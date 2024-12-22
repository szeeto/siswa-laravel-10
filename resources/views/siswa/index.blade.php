<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div id="contact" class="container mt-5 p-4 bg-white rounded shadow-sm">
        @if (Session::has('success'))
            <div class="pt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="pt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $data)
                            <li>{{ $data }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="card">

            <div class="card-body">
                <center>
                    <h2>Data Siswa</h2>
                </center>
                <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3 btn-sm">Tambah Data</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Sekolah Asal</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->sekolah_asal }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit
                                        Data</a>
                                    <form action="{{ route('siswa.destroy', $data->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus Data</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQe3yTZFfZk3edjZijRyYVuvRHF1p2QOglJ5KP9/Zv6pZTqlxZ/2c+fKs9XyltRA" crossorigin="anonymous">
    </script>
</body>

</html>
