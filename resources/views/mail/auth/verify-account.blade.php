<x-mail::message>
# {{ __('auth.mail.title') }}

{{ __('auth.mail.intro') }}

<x-mail::button :url="$url" color="primary">
{{ __('auth.mail.action_button') }}
</x-mail::button>


{{ __('auth.mail.line1') }}


{{ __('auth.mail.salutation', ['app_name' => config('app.name')]) }}


---

{{ __('auth.mail.copy_and_paste') }}

[{{ $url }}]({{ $url }})


---

© {{ date("Y") }} {{ config("app.name") }}. {{ __('auth.mail.all_rights_reserved') }}.
</x-mail::message>
