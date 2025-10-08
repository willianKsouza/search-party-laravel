<x-mail::message>
# {{ __('passwords.mail.title') }}

{{ __('passwords.mail.intro') }}

<x-mail::button :url="$url" color="primary">
{{ __('passwords.mail.action_button') }}
</x-mail::button>


{{ __('passwords.mail.line1') }}


{{ __('passwords.mail.line2') }}

{{ __('passwords.mail.salutation', ['app_name' => config('app.name')]) }}


---

{{ __('passwords.mail.copy_and_paste') }}

[{{ $url }}]({{ $url }})


---

© {{ date("Y") }} {{ config("app.name") }}. {{ __('passwords.mail.all_rights_reserved') }}.
</x-mail::message>
