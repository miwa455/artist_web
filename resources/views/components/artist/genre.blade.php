@props([
    'genres' => []
])

@foreach ($genres as $genre)
    <div class="genre-area">
        {{ $genre->genre_name }}
    </div>
@endforeach
