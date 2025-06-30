@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Redefinir Senha</h2>
        <form method="POST" action="#">
            @csrf

            <!-- Campo de Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    required 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring focus:border-blue-300"
                >
            </div>

            <!-- Campo de Nova Senha -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Nova Senha</label>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    required 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring focus:border-blue-300"
                >
            </div>

            <!-- Campo de Confirmação de Senha -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                <input 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    required 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring focus:border-blue-300"
                >
            </div>

            <!-- Campo Oculto com Token -->
            <input 
                type="hidden" 
                name="token" 
                value="{{ $token }}"
            >

            <!-- Botão de Envio -->
            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300"
                >
                    Redefinir Senha
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
