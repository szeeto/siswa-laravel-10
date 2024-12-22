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
                    <h2>Input Data Siswa</h2>
                </center>
                <a href="{{ route('siswa.index') }}" class="btn btn-primary mb-3 btn-sm"> Kembali</a>

                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Nama Siswa" value="{{ $siswa->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="laki-laki" name="jenis_kelamin"
                                id="laki_laki" {{ $siswa->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="laki_laki">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" value="laki-laki" name="jenis_kelamin"
                                id="perempuan" {{ $siswa->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir"
                            value="{{ $siswa->tanggal_lahir }}" name="tanggal_lahir" placeholder="Tanggal Lahir"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas" name="kelas" aria-label="Default select example"
                            required>
                            <option value="">Pilih Kelas</option>
                            <option value="X RPL 1" {{ $siswa->kelas == 'X RPL 1' ? 'selected' : '' }}>X RPL 1
                            </option>
                            <option value="X RPL 2" {{ $siswa->kelas == 'X RPL 2' ? 'selected' : '' }}>X RPL 2</option>
                            <option value="XI RPL 1" {{ $siswa->kelas == 'XI RPL 1' ? 'selected' : '' }}>XI RPL 1
                            </option>
                            <option value="XI RPL 2"{{ $siswa->kelas == 'XI RPL 2' ? 'selected' : '' }}>XI RPL 2
                            </option>
                            <option value="XII RPL" {{ $siswa->kelas == 'XII RPL' ? 'selected' : '' }}>XII RPL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                        <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal"
                            placeholder="Sekolah Asal" value="{{ $siswa->sekolah_asal }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Siswa" rows="3">{{ $siswa->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQe3yTZFfZk3edjZijRyYVuvRHF1p2QOglJ5KP9/Zv6pZTqlxZ/2c+fKs9XyltRA" crossorigin="anonymous">
    </script>
</body>

</html>
