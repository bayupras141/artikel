@extends('layouts.app')

@section('style')
<style>
    html {
        scroll-behavior: smooth;
    }
    .garis {
        max-width: 60%;
        border: 1px solid #535351;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form action="" method="get">
                <div class="input-group my-3">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by title.." style="max-width: 40%;">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                  </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="input-group my-3">
                <div class="input-group-append">
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        @forelse ($content as $a)
        <div class="col-lg-4">
            <div class="card kard shadow-sm my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/artikel/picture/' . $a->image) }}" alt="" class="img-thumbnail" style="max-width: 100%">
                        </div>
                        <div class="col-md-8">
                            <h4>
                                <a href="{{ route('artikel.show', $a) }}">{{ Str::limit($a->judul, 20) }}</a>
                            </h4>
                            <p>
                                {!! Str::limit($a->deskripsi, 150) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h3>Artikel tidak ditemukan</h3>
        @endforelse
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            {{-- {{ $konten->links() }} --}}
        </div>
    </div>
</div>
@endsection