@extends('layouts.index')

@section('isi')

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
            </tr>
          </thead>
          <tbody>
            @forelse ($tumbuhans as $tumbuhan)
            <tr>
              <td>{{$loop->iteration}}</td>
                <td>{{$tumbuhan->nama}}</td>
                <td>{{$tumbuhan->nama_ilmiah}}</td>
                <td>{{$tumbuhan->harga}}</td>
                <td>{{$tumbuhan->stok}}</td>
                <td>{{$tumbuhan->deskripsi}}</td>
                <td>{{$tumbuhan->category->nama ?? "n/a"}}</td>
            </tr>
                
            @empty
                <td>Data tidak ada</td>
            @endforelse
          </tbody>
        </table>

</div>
    
@endsection