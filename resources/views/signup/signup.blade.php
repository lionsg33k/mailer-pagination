@extends('layouts.index')

@section('content')
    <form class="w-1/3 m-auto pt-20 " method="POST" action="{{ route('register') }}">

        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('city')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="type" :value="__('type')" />

            <select class="w-full bg-[#111827] text-white rounded-lg mt-3 border-none " name="type" id="">

                <option selected disabled value="">Select what you want to do ola to be</option>
                <option value="customer">customer</option>
                <option value="seller">seller</option>
            </select>

            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>

 

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
@endsection
