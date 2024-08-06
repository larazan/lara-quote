<x-mail::message>
# Hi {{ $name }},

## Your Message.
# {{ $content }}

---------------------------------------------

## Our Reply
- # {{ $reply }} -

<x-mail::button :url="'$url'">
Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
