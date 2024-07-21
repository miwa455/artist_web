<x-layout title="ギャラリー | 絵描き情報サイト">
        <div id="gallery" class="big-bg">
        <x-layout.single>
                <section>
                <div class="gallery-content wrapper">
                <h2 class="page-title">Illustration</h2> 
                </div><!--------/.wrapper------->
                <div class="wrapper">
                <a class="gradient4" href="{{ route('artist.create.home') }}">イラストの登録</a>

<section>
        <div id="search"> 
        <form role="search" method="get" id="searchform" action="{{ route('gallery.search') }}" > 
                @csrf
                <input type="text" value="{{ isset($keyword) ? $keyword : '' }}" name="keyword" id="search-text" 
                placeholder="検索キーワードを入力">
                <input type="submit" class="button" value="検索">
                        <i class="fa fa-search fa-xs"></i>
                <input type="reset" value="リセット"> 
        </div>

        <div class="search_genre search_side_item_border">
                <h4>ジャンル</h4>
                <div class="ripples_radio">
                <input type="radio" name="genre" id="search_genre_none" value="{{ !request()->genre_name ? 'checked' : '' }}">
                <label for="search_genre_none">指定なし</label>
        </div>


        <x-artist.genre_radio :genres="$genres"></x-artist.genre_radio>
</form>

        <!----表示されなかった場合---------->
                @if (!empty($keyword))
                        <p>検索キーワード: {{ $keyword }}</p>
                @endif
                
                @if (empty($artists))
                <p>該当するアーティストは見つかりませんでした。</p>
                @endif
        </section>

        <x-artist.list :artists="$artists"></x-artist.list>
        </div>
        </section>
        </x-layout.single>
        </div>
</x-layout>
