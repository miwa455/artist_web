@props([
    'genres' => []
])

@foreach ($genres as $genre)
        <div class="ripples_radio">
            <input type="radio" name="genre" id="search_genre_{{ $genre->genre_id }}" value="{{ $genre->genre_name }}" {{ $genre->genre_name == old('genre') ? 'checked' : '' }}>
            <label for="search_genre_{{ $genre->genre_id }}">{{ $genre->genre_name }}</label>
        </div>
@endforeach

