<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Educational Website for Children</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 450px;
            margin: 100px auto;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            background: #4e73df;
            color: white;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="card">
            <div class="card-header py-3">
                <h4 class="text-center mb-0">Welcome to our Educational Platform</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>