<x-mail::message>
# Contact Message Incoming

Name: {{ $details['name'] }}<br />
Email: {{ $details['email'] }}<br />
Subject: {{ $details['subject'] }}<br />
Message: {{ $details['message'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
