<!DOCTYPE html>
<html>
<head>
    <title>{{ isset($book) ? 'Edit' : 'Add' }} Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h1>{{ isset($book) ? 'Edit' : 'Add' }} Book</h1>

    <form method="POST" action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}">
        @csrf
        @if(isset($book)) @method('PUT') @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title"
                   id="title" class="form-control"
                   value="{{ old('title', $book->title ?? '') }}"
            >
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" id="summary"
                      class="form-control" rows="5"
            >{{ old('summary', $book->summary ?? '') }}</textarea>
            @error('summary')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
