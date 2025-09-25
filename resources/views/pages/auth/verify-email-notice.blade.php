@extends("layouts.unauthenticated")

@section("content")
    <x-container>
        <div class="flex flex-col gap-4 justify-center items-center">
            <h1 class="text-2xl font-bold text-primary">
                Verify Your Email Address
            </h1>
            <p class="text-sm text-white">
                A new verification link has been sent to your email address.
            </p>
            <form action="{{ route("verification.send") }}" method="POST">
                @csrf
                <p class="text-sm text-white">
                    If you did not receive the confirmation email, click the
                    button below.
                    <x-form.button type="submit" class="mt-4">
                        click here
                    </x-form.button>
                </p>
            </form>
        </div>
    </x-container>
@endsection
