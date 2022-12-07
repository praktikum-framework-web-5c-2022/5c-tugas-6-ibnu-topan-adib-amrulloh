@extends('layouts.index')

@section('isi')
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
                            <td>{{ $tumbuhan->photo}}</td>
                            <td>
                                <a href="{{ route('tumbuhans.edit', ['tumbuhan' => $tumbuhan->id]) }}"
                                    class="btn btn-warning"><span data-feather="file" class="align-text-bottom"></span>Update</a>
                                <form action="{{ route('tumbuhans.destroy', ['tumbuhan' => $tumbuhan->id]) }}" method="POST"
                                    class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>

                        </tr>

                    @empty
                        <td>Data tidak ada</td>
                    @endforelse
                </tbody>
            </table>

        </div>
    @endsection
