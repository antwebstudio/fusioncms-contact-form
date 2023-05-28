@component('mail::message')

@foreach($response->fields as $field)
    @php
        $value = json_decode($response->{$field->handle}, true);
    @endphp
    @if(is_array($value))
        @foreach ($value as $v)
            @if(is_array($v) && $v['isFile'] ?? false && $v['url'] ?? '')
                <p>{{ $field->name }} : <a href="{{ url($v['url'] ?? '') }}">Download</a>
            @else
                <p>{{ $field->name }} : {{ $v }}</p>
            @endif
        @endforeach
    @else
        <p>{{ $field->name }} : {{ $response->{$field->handle} }}</p>
    @endif
@endforeach

{{-- # Introduction
The body of your message. --}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

{{-- Thanks,<br>
{{ config('app.name') }} --}}
@endcomponent