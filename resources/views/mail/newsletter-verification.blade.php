<x-mail::message>
# Welcome to my Newsletter!

Thank you for subscribing to our website

<x-mail::button :url="''">
Button Text
</x-mail::button>

<x-mail::button :url="$homepageUrl">
    Go to website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
