@extends('layouts.default')

@section('content')
    <x-container>
        <form action="{{ route('password.email') }}" method="POST"
            class="max-w-md mx-auto mt-10 bg-gray-800 shadow-lg rounded-lg p-8 space-y-6">
            @csrf
            <h2 class="text-2xl font-bold text-center text-orange-500">
                Redefinir Senha
            </h2>

            <p class="text-sm text-gray-300 text-center">
                Informe seu e-mail e enviaremos um link para redefinir sua senha.
            </p>
            <div>
                <label for="email" class="block text-sm font-medium text-orange-500 mb-1">Email</label>
                <input type="email" id="email" name="email" required autofocus placeholder="you@example.com"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            @if (session('status'))
                <div class="text-xs text-green-500 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->has('email'))
                <div class="text-xs text-red-500 mt-1">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <div>
                <button type="submit"
                    class="w-full text-white bg-blue-600 font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    Enviar Link de Redefinição
                </button>
            </div>
        </form>
    </x-container>
@endsection
