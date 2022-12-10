@extends('layouts.index')
@section('isi')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="{{ route('tumbuhans.index') }}" class="btn btn-success">Kembali</a>
    </div>
    <div class="col-md-6">
        <form action="{{ route('tumbuhans.update', ['tumbuhan' => $tumbuhan->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control"
                    value="{{ old('nama') ?? $tumbuhan->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_ilmiah" class="form-label">Nama Ilmiah</label>
                <input type="text" name="nama_ilmiah" id="nama_ilmiah" class="form-control"
                    value="{{ old('nama_ilmiah') ?? $tumbuhan->nama_ilmiah }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $tumbuhan->category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" name="stok" id="stok" class="form-control"
                    value="{{ old('stok') ?? $tumbuhan->stok }}">
                @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control"
                    value="{{ old('harga') ?? $tumbuhan->harga }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') ?? $tumbuhan->deskripsi }}</textarea>
                @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <h6>Foto Lama</h6>
                <img src="{{ asset('storage/' . $tumbuhan->photo) }}" alt="" style="height: 200px; width:200px;">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="hidden" name="oldPhoto" value="{{ 'storage/' . $tumbuhan->photo }}">
                <input type="file" name="photo" id="photo" class="form-control">
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
