@auth
<section>
<div>
    <p class="mt-2 mb-3 text-gray-500 text-2xl">
        お問い合わせ内容
    </p>
    <form action="{{ route('artist.contact') }}" method="post">
        @csrf
        <div class="mt-2">
            <label for="name" class="mr-2">お名前</label>
            <input 
            type="text" id="name" name="created_name">
        </div>
        <div class="mt-2">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="mt-2">
            <label for="message">メッセージ</label>
            <textarea 
                name="message"
                id="message"
                rows="3"
                placeholder="ご意見、ご要望など"></textarea>
        </div>
        <p class="mt-2 text-gray-500">
            140文字まで
        </p>

        @error('created_name')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror
        @error('email')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror
        @error('message')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror


        <x-element.button>
            確認する
        </x-element.button>

    </form>
</div>
</section>
@endauth

@guest
<div class="bg-white flex flex-wrap justify-evenly border border-blue-500 rounded-md p-5 shadow-lg w-full mb-5">
    <div class="w-1/2 p-4 mb-10 flex flex-wrap justify-evenly">
        <p class="mt-2 mb-5 text-sm text-gray-500">
            お問い合わせには会員登録が必要です
        </p>
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
        <x-element.button-a :href="route('register')" theme="secondary">会員登録
        </x-element.button-a>
    </div>
</div>
@endguest