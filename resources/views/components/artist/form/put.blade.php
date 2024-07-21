    @props([
        'artist'
    ])
        <div class="p-4">
                <form action="{{  route('artist.update.put', ['artistId' => $artist->artist_id]) }}"
                method="post">
                @method('PUT')
                @csrf
                @if (session('feedback.success'))
                <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
                @endif
                <div class="mt-1">
                    <div class="mt-2">
                        <label for="artist-name" class="mr-2">名義</label>
                        <input 
                        class="focus:ring-bule-400 focus:border-blue-400 mt-1
                        border border-gray-300 rounded-md shadow-sm "
                        type="text" 
                        id="artistName" 
                        name="artist-name"
                        value="{{ $artist->artist_name }}"
                        >
                    </div>
                    <div class="mt-2">
                        <label class="radio-title mr-2">性別</label>
                            <input type="radio" name="sex" value="{{ $artist->sex }}" id="women">
                            <label for="women">女性</label>
                            <input type="radio" name="sex" value="{{ $artist->sex }}" id="men" checked>
                            <label for="men">男性</label>
                    </div>
                    <label for="ms">自己PR</label>
                <textarea 
                    id="ms"
                    name="self-intro"
                    rows="3"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                    w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="経歴、作風など">{{ $artist->self_intro }}</textarea>
                </div>

                <p class="mt-2 text-sm text-gray-500">
                    140文字まで
                </p>

                @error('self-intro')
                <x-alert.error>{{  $message  }}</x-alert.error>
                @enderror
                    
                <div class="flex flex-wrap justify-end">
                <x-element.button>
                    編集
                </x-element.button>
                </div>
            </form>
        </div>
    
        @guest
            <div class="flex flex-wrap justify-center">
                <div class="w-1/2 p-4 flex flex-wrap justify-evenly">
                <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
                <x-element.button-a :href="route('register')" theme="secondary">会員登録</x-element.button-a>
                </div>
            </div>
        @endguest