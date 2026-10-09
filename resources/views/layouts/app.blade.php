<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan Dena') - Perpustakaan Dena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --tema: #16794c; --tema-soft: #e6f4ec; }

        body { font-family: 'Inter', sans-serif; background-color: #f5f7fa !important; }

        .navbar { background-color: #fff !important; box-shadow: 0 1px 8px rgba(0,0,0,.06); }
        .navbar .navbar-brand { color: var(--tema) !important; font-weight: 700; }
        .navbar .nav-link { color: #475467 !important; }
        .navbar .nav-link.active { color: var(--tema) !important; font-weight: 600; }

        .card { border: 0; border-radius: 14px; box-shadow: 0 2px 12px rgba(16,24,40,.06); overflow: hidden; }

        .table-dark { --bs-table-bg: var(--tema-soft); --bs-table-color: var(--tema); --bs-table-border-color: transparent; }
        .table > :not(caption) > * > * { padding: .8rem 1rem; }

        .btn { border-radius: 10px; font-weight: 500; }
        .btn-primary { background-color: var(--tema); border-color: var(--tema); }
        .btn-primary:hover { background-color: var(--tema); border-color: var(--tema); filter: brightness(.9); }

        .badge.text-bg-info { background-color: var(--tema-soft) !important; color: var(--tema) !important; }

        .form-control, .form-select { border-radius: 10px; }
        .form-control:focus, .form-select:focus {
            border-color: var(--tema); box-shadow: 0 0 0 .2rem rgba(22,121,76,.15);
        }
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('books.index') }}">Perpustakaan Dena</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Buku</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">Kategori</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
