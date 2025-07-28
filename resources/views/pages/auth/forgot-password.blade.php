@extends("layouts.unauthenticated")

@section("content")
    <x-container>
        <x-form
            action="{{ route('password.email') }}"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-background shadow-lg rounded-lg p-8 space-y-6"
        >
            @csrf
            <h2 class="text-2xl font-bold text-center text-orange-500">
                Redefinir Senha
            </h2>

            <p class="text-sm text-gray-300 text-center">
                Informe seu e-mail e enviaremos um link para redefinir sua
                senha.
            </p>
            <div>
                <x-form.label for="email">Email</x-form.label>

                <x-form.input
                    type="email"
                    id="email"
                    name="email"
                    required
                    autofocus
                    placeholder="you@example.com"
                />
            </div>
            @if (session("status"))
                <x-form.error>{{ session("status") }}</x-form.error</x-form>
            @endif

            @if ($errors->has("email"))
                <x-form.error>{{ $errors->get("email") }}</x-form.error>
            @endif

            <div>
                <x-form.button
                    type="submit"
                    class="w-full bg-primary text-white"
                >
                    Enviar Link de Redefinição
                </x-form.button>
            </div>
        </x-form>
    </x-container>
@endsection
