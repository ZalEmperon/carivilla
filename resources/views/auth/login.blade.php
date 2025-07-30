@extends('guest.layouts.app')

@section('title', 'Admin Login')

@section('content')
<main class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-success text-white text-center">
            <h3>Login Admin</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection