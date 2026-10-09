@extends('layouts.app')
@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Buku</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr><th>#</th><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Tahun</th><th>Stok</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td><span class="badge text-bg-info">{{ $book->category->name }}</span></td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td class="text-end">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus buku ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada buku.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $books->links() }}</div>
@endsection
