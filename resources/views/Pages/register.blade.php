@extends('layouts.default')
@section('content')
    <x-container>
        <form x-data="users" x-on:submit.prevent="create()"
            class="max-w-md mx-auto mt-10 bg-gray-800 shadow-lg rounded-lg p-8 space-y-6">
            @csrf
            <h2 class="text-2xl font-bold text-center text-orange-500">Register</h2>
            <div>
                <label for="user_name" class="block text-sm font-medium text-orange-500 mb-1">Username</label>
                <input x-model="form.data.user_name" type="text" id="user_name" name="user_name" placeholder="Your username"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    <div>
                        <p x-show="form.errors.user_name" class="text-xs text-red-500 mt-1" x-text="form.errors.user_name"></p>
                    </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-orange-500 mb-1">Email</label>
                <input x-model="form.data.email" type="email" id="email" name="email" placeholder="you@example.com"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    <div>
                        <p x-show="form.errors.email" class="text-xs text-red-500 mt-1" x-text="form.errors.email"></p>
                    </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-orange-500 mb-1">Password</label>
                <input x-model="form.data.password" type="password" id="password" name="password" placeholder="********"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    <div>
                        <p x-show="form.errors.password" class="text-xs text-red-500 mt-1" x-text="form.errors.password"></p>
                    </div>
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-orange-500 mb-1">Confirm
                    Password</label>
                <input x-model="form.data.password_confirmation" type="password" id="password_confirmation" name="password_confirmation" placeholder="********"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    <div>
                        <p x-show="form.errors.password_confirmation" class="text-xs text-red-500 mt-1"
                            x-text="form.errors.password_confirmation"></p>
                    </div>
            </div>
            <div>
                <button x-show="!form.loading" type="submit"
                    class="w-full text-white bg-blue-600  font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    Login
                </button>
                <button x-show="form.loading" type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    Processing…
                </button>
            </div>
        </form>

    </x-container>
@endsection
