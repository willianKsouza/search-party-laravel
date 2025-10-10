<x-form action="{{ route('language.switch') }}" method="POST">
    @csrf
    <input type="hidden" name="locale" value="{{ $otherLocale }}">
    <x-form.button type="submit">
        {{ strtoupper($otherLocale) }}
    </x-form.button>
</x-form>
