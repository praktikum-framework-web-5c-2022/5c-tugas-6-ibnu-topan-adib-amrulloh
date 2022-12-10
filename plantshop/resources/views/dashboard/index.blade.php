@extends('layouts.index')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Tumbuhan</h1>
    </div>
    <a href="/tumbuhans/create" class="btn btn-primary mb-3">Tambah</a>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Tumbuhan</th>
                        <th scope="col">Nama Ilmiah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori Tumbuhan</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($tumbuhans as $tumbuhan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tumbuhan->nama }}</td>
                            <td>{{ $tumbuhan->nama_ilmiah }}</td>
                            <td>{{ $tumbuhan->harga }}</td>
                            <td>{{ $tumbuhan->stok }}</td>
                            <td>{{ $tumbuhan->deskripsi }}</td>
                            <td>{{ $tumbuhan->category->nama ?? 'n/a' }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $tumbuhan->photo) }}" alt="project-image"
                                    style="height: 50px; width: 50px;">
                            </td>
                            <td>
                                <div class="d-flex inline-block">
                                    <a href="{{ route('tumbuhans.show', ['tumbuhan' => $tumbuhan->id]) }}"
                                        class="btn btn-info mx-1">Tampil</a>
                                    <a href="{{ route('tumbuhans.edit', ['tumbuhan' => $tumbuhan->id]) }}"
                                        class="btn btn-warning mx-1">Edit</a>
                                    <form action="{{ route('tumbuhans.destroy', ['tumbuhan' => $tumbuhan->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mx-1">Hapus</button>
                                    </form>
                                </div>
                            </td>

                        </tr>

                    @empty
                        <td>Data tidak ada</td>
                    @endforelse
                </tbody>
            </table>

        </div>
    @endsection
