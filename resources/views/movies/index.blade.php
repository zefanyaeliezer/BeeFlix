<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.css') }}">
</head>
<body>
    <x-navbar></x-navbar>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container mt-4">
        <h1>BeeFlix</h1>
        <a href="/movies/create" class="btn btn-dark mb-4">Add New Movie</a>

        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $movie->photo) }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $movie->genre->name }}</h6>
                            <p class="card-text">{{ $movie->description }}</p>
                            <p class="card-text"><small class="text-muted">Publish Date: {{ $movie->publish_date }}</small></p>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
