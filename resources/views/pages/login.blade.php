@extends('layouts.unauthenticated')
@section('content')
    <x-container>
        <form action="{{ route('auth.login.store') }}" method="POST"
            class="max-w-md mx-auto mt-10 bg-gray-800 shadow-lg rounded-lg p-8 space-y-6">
            @csrf
            <h2 class="text-2xl font-bold text-center text-orange-500">Login</h2>
            <div>
                <label for="email" class="block text-sm font-medium text-orange-500 mb-1">Email</label>
                <input value="{{ old('email') }}" type="email" id="email" name="email" placeholder="you@example.com"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />

            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-orange-500 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="********"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            @error('error')
                <div>
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                </div>
            @enderror
            <div class="flex items-center">
                <input type="checkbox" name="remember"
                    class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded h-4 w-4">
                <label for="remember" class="ml-2 text-sm text-gray-300">Lembrar-me</label>
            </div>
            <div class="">
                <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:underline">
                    Esqueceu a senha?
                </a>
            </div>
            <div>
                <button x-show="!form.loading" type="submit"
                    class="w-full text-white bg-blue-600  font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    Entrar
                </button>
                {{-- <button x-show="form.loading" type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    Processing…
                </button> --}}
            </div>
        </form>
    </x-container>
@endsection
