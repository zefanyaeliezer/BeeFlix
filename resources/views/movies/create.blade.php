<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Movie</title>
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.css') }}">
</head>
<body>
<x-navbar></x-navbar>

<div class="container mt-5">
    <h1 class="mb-4">BeeFlix</h1>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
        @csrf

        <!-- Genre -->
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select id="genre_id" name="genre_id" class="form-select @error('genre_id') is-invalid @enderror" required>
                <option value="" disabled selected>Pilih Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Photo -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input id="photo" type="file" name="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror" required>
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" type="text" name="title" maxlength="30" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" maxlength="50" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Publish Date -->
        <div class="mb-3">
            <label for="publish_date" class="form-label">Publish Date</label>
            <input id="publish_date" type="date" name="publish_date" max="{{ date('Y-m-d') }}" class="form-control @error('publish_date') is-invalid @enderror" value="{{ old('publish_date') }}" required>
            @error('publish_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>

<script src="{{ asset('/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
