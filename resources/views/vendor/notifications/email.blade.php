<x-mail::message>
# {{ $greeting }} 




<x-mail::button :url="$actionUrl" color="primary">
{{ $actionText }}
</x-mail::button>


@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{ $salutation ?? "Atenciosamente,\n" . config("app.name") }}

@isset($actionText)
---

Se você tiver problemas para clicar no botão, copie e cole o link abaixo no navegador:

[{{ $displayableActionUrl }}]({{ $actionUrl }})
@endisset

---

© {{ date("Y") }} {{ config("app.name") }}. {{ __('passwords.mail.all_rights_reserved') }}.
</x-mail::message>





{{-- <!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <title>{{ $actionText ?? "Confirmação de E-mail" }}</title>
    </head>
    <body
        style="
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
        "
    >
        <table
            width="100%"
            border="0"
            cellspacing="0"
            cellpadding="0"
            bgcolor="#f9fafb"
        >
            <tr>
                <td align="center" style="padding: 40px 20px">
                    <table
                        width="600"
                        cellpadding="0"
                        cellspacing="0"
                        border="0"
                        style="
                            background: #ffffff;
                            border-radius: 12px;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                            padding: 40px;
                        "
                    >
                        <tr>
                            <td align="center" style="padding-bottom: 20px">
                                <h2
                                    style="
                                        color: #f97316;
                                        font-size: 26px;
                                        margin: 0;
                                        font-weight: bold;
                                    "
                                >
                                    {{ $greeting ?? "Verifique seu E-mail" }}
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px 0 20px 0">
                                @foreach ($introLines as $line)
                                    <p
                                        style="
                                            font-size: 16px;
                                            line-height: 1.6;
                                            margin: 0 0 12px 0;
                                            color: #444;
                                        "
                                    >
                                        {{ $line }}
                                    </p>
                                @endforeach
                            </td>
                        </tr>
                        @isset($actionText)
                            <tr>
                                <td align="center" style="padding: 20px 0">
                                    <a
                                        href="{{ $actionUrl }}"
                                        target="_blank"
                                        style="
                                            background-color: #f97316;
                                            color: #ffffff;
                                            padding: 14px 28px;
                                            text-decoration: none;
                                            font-weight: bold;
                                            font-size: 16px;
                                            border-radius: 8px;
                                            display: inline-block;
                                        "
                                    >
                                        {{ $actionText }}
                                    </a>
                                </td>
                            </tr>
                        @endisset
                        <tr>
                            <td align="center" style="padding-top: 20px">
                                @foreach ($outroLines as $line)
                                    <p
                                        style="
                                            font-size: 14px;
                                            line-height: 1.6;
                                            margin: 0 0 12px 0;
                                            color: #666;
                                        "
                                    >
                                        {{ $line }}
                                    </p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding-top: 20px">
                                <p
                                    style="
                                        font-size: 14px;
                                        color: #444;
                                        margin: 0;
                                    "
                                >
                                    {{ $salutation ?? "Atenciosamente," . config("app.name") }}
                                </p>
                            </td>
                        </tr>
                        @isset($actionText)
                            <tr>
                                <td
                                    align="center"
                                    style="
                                        padding-top: 30px;
                                        border-top: 1px solid #eee;
                                    "
                                >
                                    <p
                                        style="
                                            font-size: 12px;
                                            color: #999;
                                            margin: 0;
                                        "
                                    >
                                        Se você tiver problemas para clicar no
                                        botão, copie e cole o link abaixo no
                                        navegador:
                                        <br />
                                        <span
                                            style="
                                                word-break: break-all;
                                                color: #2563eb;
                                            "
                                        >
                                            <a
                                                href="{{ $actionUrl }}"
                                                style="
                                                    color: #2563eb;
                                                    text-decoration: none;
                                                "
                                            >
                                                {{ $displayableActionUrl }}
                                            </a>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        @endisset
                        <tr>
                            <td align="center" style="padding-top: 30px">
                                <p
                                    style="
                                        font-size: 12px;
                                        color: #aaa;
                                        margin: 0;
                                    "
                                >
                                    © {{ date("Y") }}
                                    {{ config("app.name") }}. Todos os direitos
                                    reservados.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html> --}}

