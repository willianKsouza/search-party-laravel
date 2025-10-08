@extends('layouts.unauthenticated')

@section('content')
         <x-container>
            <div class="w-full max-w-md mx-auto bg-background p-8 rounded shadow mt-8">
                <h2 class="text-2xl font-bold mb-6 text-center text-primary">
                    Reset Password
                </h2>
                <x-form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-form.label for="email">Email</x-form.label>
                        <x-form.input id="email" name="email" type="email" :value="old('email')" required />
                    </div>
                    <div class="mb-4">
                        <x-form.label for="password">New Password</x-form.label>
                        <x-form.input id="password" name="password" type="password" required />
                    </div>
                    <div class="mb-4">
                        <x-form.label for="password_confirmation">
                            Confirm Password
                        </x-form.label>
                        <x-form.input id="password_confirmation" name="password_confirmation" type="password" required />
                    </div>
                    <x-form.input type="hidden" name="token" value="{{ $token }}" />
                    @if ($errors->has('email'))
                        <div class="text-xs text-red-500 mt-1">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    <div>
                        <x-form.button type="submit" class="w-full bg-primary text-white">
                            Reset Password
                        </x-form.button>
                    </div>
                </x-form>
            </div>
        </x-container>
    @endsection
