@extends(layouts.app)

@section('content')
    <h1>Manajemen Data Mahasiswa</h1>
    <table class="table table-bordered">
    <thead class = "table-light">
        <tr>
            <tb>No.</tb>
            <tb>NIM</tb>
            <tb>Nama</tb>
            <tb>Email</tb>
            <tb>Jurusan</tb>
            <tb>Angkatan</tb>
            <tb>Action</tb>
        </tr>
    </table>
    </thead>
    <tbody>
        @forelse ( $mahasiswa as $mhs )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$mhs->nim}}</td>
            <td>{{$mhs->nama}}</td>
            <td>{{$mhs->email}}</td>
            <td>{{$mhs->jurusan}}</td>
            <td>{{$mhs->angkatan}}</td>
            <td> Ubah | Hapus </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada Data Mahasiswa</td>
        </tr>

        @endforelse
        
    </tbody>

@endsection