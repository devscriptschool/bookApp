<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ Str::limit($book->summary, 50) }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-secondary">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No books found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
