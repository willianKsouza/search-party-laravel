@extends("layouts.unauthenticated")

@section("content")
    <x-container>
        <x-form
            action="{{ route('password.email') }}"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-background shadow-lg rounded-lg p-8 space-y-6"
        >
            @csrf
            <h2 class="text-2xl font-bold text-center text-primary">
                {{ __("pages.forgot_password.title") }}
            </h2>
            <p class="text-sm text-gray-300 text-center">
                {{ __("pages.forgot_password.warning") }}
            </p>
            <div>
                <x-form.label for="email">
                    {{ __("pages.forgot_password.inputs.email") }}
                </x-form.label>

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
                <x-form.success>{{ session("status") }}</x-form.success>
            @endif
            <div>
                <a
                    href="{{ route("login") }}"
                    class="text-sm text-primary hover:underline"
                >
                    {{ __("pages.forgot_password.back_to_login") }}
                </a>
            </div>
            <div>
                <x-form.button
                    type="submit"
                    class="w-full bg-primary text-white"
                >
                    {{ __("pages.forgot_password.send") }}
                </x-form.button>
            </div>
        </x-form>
    </x-container>
@endsection
