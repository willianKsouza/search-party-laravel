<textarea
     {{ $attributes->merge(["class" => "w-full text-white rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary border border-primary/40"]) }}
>
{{ $slot }}
</textarea>
