@extends('layouts.home')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>

                    <div class="mt-3 text-center">
                        <p>Não tem uma conta? <a href="{{ route('register') }}" class="text-decoration-none">Cadastre-se</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection