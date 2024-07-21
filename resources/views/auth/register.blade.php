<x-layout>
    <section>
<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <p>
            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>  Login via Twitter</a>
            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>  Login via facebook</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-name">
                <i class="fa fa-user mr-1 mb-2"></i>
            <x-input-label for="user-name" :value="__('Name')" />
                </span>
            </div>
            <x-text-input id="user-name" class="ml-1" type="text" name="user_name" :value="old('user_name')" required autofocus autocomplete="user_name" />
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-name">
                <i class="fa fa-user"></i>
            <x-input-label for="email" :value="__('Email')" />
                </span>
            </div>
            <x-text-input id="email" class="ml-1 block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-name">
                    <i class="fa fa-phone mr-1"></i>
                        <x-input-label for="email" :value="__('電話番号')" />
                </span>
            </div>
            <select class="custom-select block ml-1 w-full" style="max-width: 120px;">
                <option selected="">+971</option>
                <option value="1">+972</option>
                <option value="2">+198</option>
                <option value="3">+701</option>
            </select>
            <input name="tel" class="block w-full mt-1" placeholder="Phone number" type="text">
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-name">
                <i class="fa fa-phone mr-1"></i>
                    <x-input-label for="email" :value="__('生年月日')" />
                </span>
            </div>
            <input name="birth_date" class="ml-1 " type="date">
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group input-group">
            <div class="input-name">
            <x-input-label for="password" :value="__('Password')" />
            </div>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <div class="input-name">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            </div>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __(' 既に登録済みですか？') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
    </article>
    </div>
    </section>
</x-layout>