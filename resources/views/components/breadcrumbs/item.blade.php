<li
    {{ $attributes->merge(["class" => "px-2 rounded-2xl border border-primary/40 text-primary hover:bg-background-hover hover:text-white"]) }}
>
        {{ $slot }}
</li>
