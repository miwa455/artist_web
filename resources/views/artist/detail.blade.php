<x-layout title="詳細 | 絵描き情報サイト">
    <section>
        <div id="detail" class="big-bg">
            <div class="gallery-content wrapper">
            <h2 class="page-title">Illustration</h2>
            <h3 class="sab-title">about</h3>
            </div>
            
            
            <div class="wrapper bg-white rounded-md shadow-lg mt-5 mb-5">
            <ol class="wrapper border-b last:border-b-0 border-gray-200 p-4
        items-start justify-between">
        <div class="name-area">
            <span class="icon">
                <img alt="{{ $artist->icon_img_name }}" src="{{ asset('storage/images/' . $artist->icon_img_name) }}">
            </span>
            <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
        <h3>名義</h3>
        <div class="">
            <span class="artist-name">
                {{ $artist->artist_name }}
            </span>
        </div>
        </div>
        <div>
            <h3>ジャンル</h3>
        <p>
            <x-artist.genre :genres="$artist->genres" />
        </p>
        </div>
        <div class="illust-text">
            <p class="text-gray-600">{{ $artist->self_intro }}</p>
        </div>

            <div class="m-2" id="love">
                    <button id="favorite" name="favorite">          
                    <svg xmlns="http://www.w3.org/2000/svg" id="star-icon" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                    </svg>
                    <span>お気に入り</span>
                    </button>
            </div>
        
            <x-artist.images :images="$artist->images"/>
        </div>
        <div>
            <!-- TODO 編集と削除 --->
            <x-artist.options :artistId="$artist->artist_id" :userId="$artist->user_id">
            </x-artist.options>
        </div>
        </ol>
        </div>
    </section>
</x-layout>
