@extends('layouts.default')

@section('content')
    <x-container>
        <form
            x-data="users"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-gray-800 shadow-lg rounded-lg p-8 space-y-6"
            x-on:submit.prevent="changePassword()"
        >
            @csrf

            <h2 class="text-2xl font-bold text-center text-orange-500">
                Redefinir Senha
            </h2>

            <p class="text-sm text-gray-300 text-center">
                Informe seu e-mail e enviaremos um link para redefinir sua senha.
            </p>

            @if (session('status'))
                <div class="text-green-500 text-sm text-center">
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm font-medium text-orange-500 mb-1">Email</label>
                <input
                    x-model="form.data.email"
                    type="email"
                    id="email"
                    name="email"
                    required
                    autofocus
                    placeholder="you@example.com"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full text-white bg-blue-600 font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Enviar Link de Redefinição
                </button>
            </div>
        </form>
    </x-container>
@endsection
