<x-mail::message>
    {{ $content->subject }}
    <br>
    {{ $content->message }}.
    <hr>



    Thanks,  {{ $content->name }}
    .<br>
    {{ config('app.name') }}
</x-mail::message>
