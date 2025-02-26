<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <p>Email atau password salah.</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Belum punya akun? Register</a>
</body>
</html>
