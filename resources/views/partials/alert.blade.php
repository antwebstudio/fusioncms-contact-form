@php
    $scollId = 'alert_'.uniqid();
@endphp

@foreach (session('flash_notification', collect())->toArray() as $message)
    <?php
        $level = 'success';
        if ($message['level'] == 'danger') {
            $level = 'alert';
        }
        ?>
    <div id="{{ $scollId }}" class="callout {{$level}} alert">
        <p>{{$message['message']}}</p>
    </div>
@endforeach

@if($errors->any())
    <div id="{{ $scollId }}" class="callout error danger alert border-red-800 text-red-700 px-6 py-2 border-2">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if($scrollIntoView ?? false)
    @if($errors->any() || session('flash_notification', collect())->isNotEmpty())
        <script>
            document.getElementById('{{ $scollId }}').scrollIntoView();
        </script>
    @endif
@endif

{{ session()->forget('flash_notification') }}