@extends('layouts.master')

@section('content')

    <div class="card shadow mb-8">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{__('Logs')}}</h4>
        </div>
        @if(session()->has('status'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{__('Transport ID')}}</th>
                        <th>{{__('Strat From')}}</th>
                        <th>{{__('Strat Time')}}</th>
                        <th>{{__('Departure From')}}</th>
                        <th>{{__('Departure Time')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->transport_id }}</td>
                            <td>{{ $log->start_from }}</td>
                            <td>{{ $log->start_time }}</td>
                            <td>{{ $log->departure_from }}</td>
                            <td>{{ $log->departure_time }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('log.show', $log->id) }}">{{__('Details')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
