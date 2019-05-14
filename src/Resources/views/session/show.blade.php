@extends('app-analytics::layouts.app')

@section('content')

<style>

.table th {
    border-top: none;
}

</style>

    <div class="d-flex align-items-center">
        <h2 class="mb-0 mr-4">Session #{{ $session->id }}</h2>
        <h4 class="mb-0 text-secondary">{{ \Carbon\Carbon::parse($session->start_date)->format('Y-m-d') }}</h4>
    </div>

    <hr>

    <div>
        @foreach ($session->events()->get() as $key => $event)
            <div class="d-flex align-items-baseline justify-content-start p-2">
                <h3 class="mr-4">{{ $key + 1 }}</h3>
                <h4 class="mr-4">{{ $event->event }}</h4>
                @if ($key == 0 || $key + 1 == $session->events()->count())
                    <h6 class="text-secondary">{{ \Carbon\Carbon::parse($event->date)->format('H:i:s') }}</h6>
                @endif
            </div>
            @if ($key < $session->events()->count() - 1)
                <div class="d-flex align-items-center justify-content-start ml-3 p-1 border-left">
                <i class="ml-4 mr-2 icon ion-md-hourglass"></i>
                    <p class="mb-0">
                        {{ \Carbon\Carbon::parse($event->date)->diffForHumans(\Carbon\Carbon::parse($session->events()->get()[++$key]->date), \Carbon\CarbonInterface::DIFF_ABSOLUTE, false, 4) }}
                    </p>
                </div>
            @endif
        @endforeach
    </div>    

@endsection