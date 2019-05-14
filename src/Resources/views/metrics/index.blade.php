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
        <h2 class="mb-0">Metrics</h2>
    </div>

    <hr>

    
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($metrics as $metric)
                    <tr class="table-row" onclick="window.location = '{{ route('web.metric.show', $metric->id) }}'">
                        <td scope="row">
                            {{ $metric->id }}
                        </td>
                        <td>
                            {{ $metric->name }}
                        </td>
                        <td>
                            {{ $metric->events()->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
    

@endsection