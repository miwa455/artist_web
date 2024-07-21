@auth
<section>
<div class="p-4">
    <h3 class="mt-2 mb-3">
        イラストの登録
    </h3>
    <p class="mt-2 text-sm text-gray-500 text-2xl">
        profile
    </p>
    <form action="{{ route('artist.create') }}" method="post"
    enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <input type="file" name="icon_img_name[]">
        </div>
        <div class="mt-2">
            <label for="artist-name" class="mr-2">名義</label>
            <input 
            class="focus:ring-bule-400 focus:border-blue-400 mt-1
            border border-gray-300 rounded-md shadow-sm"
            type="text" id="artistName" name="artist-name">
        </div>
        <div class="mt-2">
            <label for="furigana" class="mr-2">フリガナ</label>
            <input 
            class="focus:ring-bule-400 focus:border-blue-400 mt-1
            border border-gray-300 rounded-md shadow-sm"
            type="text" id="NameFurigana" name="furigana">
        </div>
        <div class="mt-2">
            <label class="radio-title mr-2">性別</label>
                <input type="radio" name="sex" value="female" id="women">
                <label for="women">女性</label>
                <input type="radio" name="sex" value="male" id="men" checked>
                <label for="men">男性</label>
        </div>
        <div class="mt-2">
            <div class="genre">
            <label>ジャンル</label>
            <input type="checkbox" name="genre[]" id="suisai" value="水彩">
            <label for="suisai">水彩</label>
            <input type="checkbox" name="genre[]" id="yusai" value="油彩">
            <label for="yusai">油彩</label>
            <input type="checkbox" name="genre[]" id="hanga" value="版画">
            <label for="hanga">版画</label> 
            <input type="checkbox" name="genre[]" id="jinbutu" value="人物画">
            <label for="jinbutu">人物画</label>
            <input type="checkbox" name="genre[]" id="japanese" value="日本画">
            <label for="japanese">日本画</label>
            <input type="checkbox" name="genre[]" id="digital" value="デジタルイラスト">
            <label for="digital">デジタルイラスト</label>
            <input type="checkbox" name="genre[]" id="analog" value="アナログイラスト">
            <label for="analog">アナログイラスト</label>
            </div>
        </div>

        <div class="mt-2">
            <label for="tags">
                タグ
            </label>
            <input
                id="tags"
                name="tag_name[]"
                class="form-control"
                value="{{ old('tag_name[]') }}"
                type="text">
        </div>
        <div class="mt-2">
            <textarea 
                name="self-intro"
                rows="3"
                class="focus:ring-bule-400 focus:border-blue-400 mt-1 block
                w-full sm:text-sm border border-gray-300 rounded-md p-2 shadow-sm"
                placeholder="経歴、作風など"></textarea>
        </div>
        <p class="mt-2 text-sm text-gray-500">
            140文字まで
        </p>
        <x-artist.form.images></x-artist.form.images>

        @error('self-intro')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror
        @error('artist-name')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror
        @error('genre')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror
        @error('tag_name')3
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror

        <input type="reset" value="リセット">

        <div class="flex flex-wrap justify-end mt-8 mb-9">
        <x-element.button>
            確認する
        </x-element.button>
        </div>
    </form>
</div>
</section>
@endauth

@guest
<div class="bg-white flex flex-wrap justify-evenly border border-blue-500 rounded-md p-5 shadow-lg w-full ">
    <div class="w-1/2 p-4 mb-10 flex flex-wrap justify-evenly">
        <p class="mt-2 mb-5 text-sm text-gray-500">
            イラストの登録には会員登録が必要です
        </p>
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
        <x-element.button-a :href="route('register')" theme="secondary">会員登録
        </x-element.button-a>
    </div>
</div>
@endguest