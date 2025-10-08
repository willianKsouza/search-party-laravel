@extends("layouts.unauthenticated")

@section("content")
    <x-container>
        <div class="flex flex-col gap-4 justify-center items-center">
               @if (session("status"))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => (show = false), 4000)"
                    class="text-green-500 bg-green-100 border border-green-300 rounded-md p-4 mt-4"
                >
                    {{ session("status") }}
                </div>
            @endif
            <h1 class="text-2xl font-bold text-primary">
                {{ __("pages.verify_email_notice.title") }}
            </h1>
            <p class="text-sm text-white">
                {{ __("pages.verify_email_notice.notice") }}
            </p>
            <form action="{{ route("verification.send") }}" method="POST">
                @csrf
                <p class="text-sm text-white">
                    {{ __("pages.verify_email_notice.warning") }}
                    <x-form.button type="submit" class="mt-4">
                        {{ __("pages.verify_email_notice.button") }}
                    </x-form.button>
                </p>
            </form>
        </div>
    </x-container>
@endsection
