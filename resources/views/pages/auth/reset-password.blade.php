@extends("layouts.unauthenticated")

@section("content")
    <div class="h-full flex items-center justify-center">
        <div class="max-w-md w-full bg-background p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">
                Redefinir Senha
            </h2>
            <x-form action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input
                        id="email"
                        name="email"
                        type="email"
                        required
                    />
                </div>
                <div class="mb-4">
                    <x-form.label for="password">Nova Senha</x-form.label>
                    <x-form.input
                        id="password"
                        name="password"
                        type="password"
                        required
                    />
                </div>
                <div class="mb-4">
                    <x-form.label for="password_confirmation">
                        Confirmar Senha
                    </x-form.label>
                    <x-form.input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                    />
                </div>
                <x-form.input type="hidden" name="token" value="{{ $token }}" />
                @if ($errors->has("email"))
                    <div class="text-xs text-red-500 mt-1">
                        {{ $errors->first("email") }}
                    </div>
                @endif

                <div>
                    <x-form.button
                        type="submit"
                        class="w-full bg-primary text-white"
                    >
                        Redefinir Senha
                    </x-form.button>
                </div>
            </x-form>
        </div>
    </div>
@endsection
