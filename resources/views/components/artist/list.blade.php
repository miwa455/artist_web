@props([
    'artists' => []
])

<div class="bg-white rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach ($artists as $artist)
        <li class="border-b last:border-b-0 border-gray-200 p-4 flex
        items-start justify-between">
        <div class="">
            <div class="name-area">
            <span class="icon">
                <img alt="{{ $artist->icon_img_name }}" src="{{ asset('storage/images/' . $artist->icon_img_name) }}">
            </span>
            <span class="inline-block rounded-full text-gray-600
            bg-gray-100 px-2 py-1 text-xs mb-2">
            <p class="artist-name">{{ $artist->artist_name }}</p>
            </span>
            </div>

            <x-artist.tags :tags="$artist->tags"/>
            
            <!---詳細--------->
            <x-artist.show :artistId="$artist->artist_id" :userId="$artist->user_id">
            </x-artist.show>

            <x-artist.images :images="$artist->images"/>
            </div>
        <div>
            <!-- TODO 編集と削除 --->
            <x-artist.options :artistId="$artist->artist_id" :userId="$artist->user_id">
            </x-artist.options>
        </div>
        </li>
        @endforeach
    </ul>
</div>