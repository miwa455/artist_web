<div class="single-bg">
        @auth
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <div class="flex justify-end p-4 mr-10">
                    <button
                        class="mt-2 text-sm text-gray-500 hover:text-gray-800"
                        onclick="event.preventDefault(); this.closest('form').
                        submit();"
                        >ログアウト</button>
                </div>
            </form>
        @endauth

        {{ $slot }}
</div>