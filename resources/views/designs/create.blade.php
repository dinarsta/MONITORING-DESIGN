<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Design</title>
</head>
<body>
    <h2>Tambah Design</h2>

    <form action="{{ route('designs.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Design" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <select name="designer_id">
            @foreach($designers as $designer)
                <option value="{{ $designer->id }}">{{ $designer->name }}</option>
            @endforeach
        </select>
        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('designs.index') }}">Kembali</a>
</body>
</html>
