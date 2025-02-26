<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Design</title>
</head>
<body>
    <h2>Edit Design</h2>

    <form action="{{ route('designs.update', $design->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $design->name }}" required>
        <input type="number" name="quantity" value="{{ $design->quantity }}" required>
        <select name="designer_id">
            @foreach($designers as $designer)
                <option value="{{ $designer->id }}" {{ $design->designer_id == $designer->id ? 'selected' : '' }}>
                    {{ $designer->name }}
                </option>
            @endforeach
        </select>
        <select name="status">
            <option value="pending" {{ $design->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="on_progress" {{ $design->status == 'on_progress' ? 'selected' : '' }}>On Progress</option>
            <option value="completed" {{ $design->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('designs.index') }}">Kembali</a>
</body>
</html>
