<li
    {{ $attributes->merge(["class" => "px-2 rounded-2xl border border-border text-primary hover:bg-background-hover hover:text-white"]) }}
>
        {{ $slot }}
</li>
