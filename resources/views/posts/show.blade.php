<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Post</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="text-muted">Published on {{ $post->created_at->format('F d, Y') }}</p>
                <hr>
                <p class="card-text">{{ $post->body }}</p>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">← Back to Posts</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
