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

{{-- content --}}
@section('content')
<div class="row px-4">
    <div class="col-lg-8">
        <img src="{{ asset('/artikel/picture/' . $content->image) }}" alt="" style="max-width: 100%;">
        <div class="row text-center my-5" style="max-width: 80%;">
            <div class="col-lg-12">
                <h1>{{ $content->judul }}</h1>
                <hr class="garis">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $content->deskripsi !!}
            </div>
        </div>
    </div>
</div>
<hr>

{{-- komen --}}
<div class="row mx-4 my-5">
    <div class="col-lg-6">
        <h2>Komentar Lainnya</h2>
        @forelse ($komen as $k)
        <div class="card shadow-sm my-3">
            <div class="card-header">{{ $k->user->name . ', ' . $k->created_at->diffForHumans() }}</div>
            <div class="card-body">
                {!! $k->komen !!}
            </div>
        </div>
        @empty
        <div class="alert alert-warning">
            <p>Tidak Ada Komentar</p>
        </div>
        @endforelse
    </div>
</div>

{{-- Tulis komen --}}
<div class="row mx-4">
    <div class="col-lg-6">
        <h2>Tuliskan Komentar</h2>
        <form action="{{ route('komen.store', $content->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="komen" id="komen" class="form-control" rows="10" placeholder="Tuliskan komentar.."></textarea>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-secondary">Kirim komentar!</button>
            </div>
        </form>
    </div>
</div>
@endsection