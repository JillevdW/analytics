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
        <h2 class="mb-0">Last 100 events</h2>
    </div>

    <hr>

    
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="table-row">
                        <td scope="row">
                            {{ $event->id }}
                        </td>
                        <td>
                            {{ $event->metric()->first()->name }}
                        </td>
                        <td>
                            {{ $event->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
    

@endsection