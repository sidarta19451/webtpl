@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Project</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($project->foto)
                                <img src="{{ asset('storage/' . $project->foto) }}" alt="Foto Project" class="img-fluid rounded">
                            @else
                                <img src="{{ asset('template/img/undraw_profile.svg') }}" alt="Default Foto" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $project->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $project->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Profesi</th>
                                    {{-- <td>{{ $project->profesi }}</td> --}}
                                </tr>
                                <tr>
                                    <th>NIM</th>
                                    <td>{{ $project->nim ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $project->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Link</th>
                                    <td>
                                        @if($project->link)
                                            <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
