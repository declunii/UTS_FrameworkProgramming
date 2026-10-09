@extends('layouts.app')
@section('title', 'Tambah Buku')

@section('content')
<h3 class="mb-3">Tambah Buku</h3>
<div class="card shadow-sm"><div class="card-body">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @include('books._form')
    </form>
</div></div>
@endsection
