@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Tambah Artikel Baru</h1>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- @if (isset($article)) --}}
                         {{-- Form Edit --}}
                        {{-- <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Fill the title.." value="{{ $article->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture">Picture Thumbnail</label>
                            <div class="row">
                                <div class="col-md-7">
                                    <img src="{{ asset('/storage/article/picture/'. $article->picture) }}" alt="" class="img-thumbnail" style="max-width: 500px;">
                                </div>
                                <div class="col-md-5">
                                    <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror" placeholder="Fill the picture..">
                                </div>
                            </div>
                            @error('picture')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="15" placeholder="Fill the content..">{!! $article->content !!}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Edit Article!</button>
                        </div> --}}
                    {{-- @else --}}
                    {{-- Form Create --}}
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Silahkan isi judul..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" placeholder="Fill the picture..">
                            @error('picture')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea type="text" name="konten" id="konten" class="form-control @error('konten') is-invalid @enderror" rows="15" placeholder="Silahkan isi konten.."></textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Tambah!</button>
                        </div>
                    {{-- @endif --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection