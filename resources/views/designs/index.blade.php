<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Design</title>
</head>
<body>
    <h2>Daftar Design</h2>

    <a href="{{ route('designs.create') }}">Tambah Design</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>Nama Design</th>
            <th>Quantity</th>
            <th>Designer</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($designs as $design)
        <tr>
            <td>{{ $design->name }}</td>
            <td>{{ $design->quantity }}</td>
            <td>{{ $design->designer->name }}</td>
            <td>{{ $design->status }}</td>
            <td>
                <a href="{{ route('designs.show', $design->id) }}">Lihat</a>
                <a href="{{ route('designs.edit', $design->id) }}">Edit</a>
                <form action="{{ route('designs.destroy', $design->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
