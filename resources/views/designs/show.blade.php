<!DOCTYPE html>
<html lang="id">
<head>
    <title>Detail Design</title>
</head>
<body>
    <h2>Detail Design</h2>

    <p><strong>Nama Design:</strong> {{ $design->name }}</p>
    <p><strong>Quantity:</strong> {{ $design->quantity }}</p>
    <p><strong>Designer:</strong> {{ $design->designer ? $design->designer->name : 'Tidak ada designer' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($design->status) }}</p>
    <p><strong>Catatan:</strong> {{ $design->notes ?? 'Tidak ada catatan' }}</p>

    <a href="{{ route('designs.index') }}">Kembali ke daftar</a>
    <a href="{{ route('designs.edit', $design->id) }}">Edit</a>

    <form action="{{ route('designs.destroy', $design->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
</body>
</html>
