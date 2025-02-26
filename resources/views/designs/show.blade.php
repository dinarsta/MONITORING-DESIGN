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

    <h3>Catatan</h3>
    <ul>
        @foreach($design->notes as $note)
            <li><strong>{{ $note->user->name }}:</strong> {{ $note->message }} ({{ $note->created_at->format('d-m-Y H:i') }})</li>
        @endforeach
    </ul>

    <h3>Tambahkan Catatan</h3>
    <form action="{{ route('designs.addNote', $design->id) }}" method="POST">
        @csrf
        <textarea name="message" rows="3" required></textarea><br>
        <button type="submit">Kirim</button>
    </form>

    <br>
    <a href="{{ route('designs.index') }}">Kembali ke daftar</a>
</body>
</html>
