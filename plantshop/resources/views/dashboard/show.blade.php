@extends('layouts.index')
@section('isi')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        
            <a href="{{ route('tumbuhans.index',) }}"
                class="btn btn-success mx-1">Kembali</a>
            <a href="{{ route('tumbuhans.edit', ['tumbuhan' => $tumbuhan->id]) }}"
                class="btn btn-warning mx-1">Edit</a>
            <form action="{{ route('tumbuhans.destroy', ['tumbuhan' => $tumbuhan->id]) }}"
                method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger mx-1">Hapus</button>
            </form>
        
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="project-info-box mt-0">
                    <h5>{{ $tumbuhan->nama }}</h5>
                    <p class="mb-0">{{ $tumbuhan->deskripsi }}</p>
                </div>

                <div class="project-info-box">
                    <p><b>Nama:</b> {{ $tumbuhan->nama }} </p>
                    <p><b>Nama Ilmiah:</b> {{ $tumbuhan->nama_ilmiah }}</p>
                    <p><b>Stok:</b> {{ $tumbuhan->stok }}</p>
                    <p class="mb-0"><b>Harga:</b> Rp. {{ $tumbuhan->harga }}</p>
                </div><!-- / project-info-box -->

                <div class="project-info-box mt-0 mb-0">
                    <p class="mb-0">
                        <span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
                        <a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i
                                class="fab fa-pinterest"></i></a>
                        <a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i
                                class="fab fa-linkedin-in"></i></a>
                    </p>
                </div><!-- / project-info-box -->
            </div><!-- / column -->

            <div class="col-md-7">
                @if ($tumbuhan->photo)
                    <img src="{{ asset('storage/' . $tumbuhan->photo) }}" alt="{{$tumbuhan->nama}}" class="rounded">
                @else
                    <img src="https://via.placeholder.com/400x300/FFB6C1/000000" alt="{{$tumbuhan->nama}}" class="rounded">
                @endif
                <div class="project-info-box">
                    <p><b>Kategori:</b> {{ $tumbuhan->category->nama }}</p>
                </div><!-- / project-info-box -->
            </div><!-- / column -->
        </div>
    </div>
@endsection
