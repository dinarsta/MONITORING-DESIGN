<!DOCTYPE html>
<html lang="id">
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="designer">Designer</option>
        </select>
        <button type="submit">Register</button>
    </form>

    <a href="{{ route('login') }}">Sudah punya akun? Login</a>
</body>
</html>
