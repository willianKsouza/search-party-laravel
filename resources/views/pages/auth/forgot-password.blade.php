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
                Reset Password
            </h2>

            <p class="text-sm text-gray-300 text-center">
                Enter your e-mail and we will send you a link to reset your
                password.
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
                <x-form.success>{{ session("status") }}</x-form.success>
            @endif

            @if ($errors->has("email"))
                <x-form.error>{{ $errors->get("email") }}</x-form.error>
            @endif

            <div>
                <x-form.button
                    type="submit"
                    class="w-full bg-primary text-white"
                >
                    Send Reset Link
                </x-form.button>
            </div>
        </x-form>
    </x-container>
@endsection
