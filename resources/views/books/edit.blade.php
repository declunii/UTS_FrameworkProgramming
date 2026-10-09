@extends('layouts.app')
@section('title', 'Edit Buku')

@section('content')
<h3 class="mb-3">Edit Buku</h3>
<div class="card shadow-sm"><div class="card-body">
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf @method('PUT')
        @include('books._form')
    </form>
</div></div>
@endsection
