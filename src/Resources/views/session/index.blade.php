@extends('app-analytics::layouts.app')

@section('content')

<style>

.table th {
    border-top: none;
}

.table-row {
    cursor: pointer;
}

td a {
    color: #212529;
}

td a:hover {
    color: #212529;
    text-decoration: none;
}

</style>

    <div class="d-flex align-items-center">
        <h2 class="mb-0">Sessions</h2>
    </div>

    <hr>

    
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Duration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessions as $session)
                    <tr class="table-row" onclick="window.location = '{{ route('web.session.show', $session->id) }}'">
                        <td scope="row">
                            {{ $session->id }}
                        </td>
                        <td>
                            {{ $session->start_date }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($session->end_date)->diffForHumans(\Carbon\Carbon::parse($session->start_date), \Carbon\CarbonInterface::DIFF_ABSOLUTE, false, 4) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
    

@endsection