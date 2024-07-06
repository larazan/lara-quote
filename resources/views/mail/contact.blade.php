<x-mail::message>
# Introduction

Name: {{ $details['name'] }}
Email: {{ $details['email'] }}
Subject: {{ $details['subject'] }}
Message: {{ $details['message'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
