@extends('layouts.master')

@section('content')

    <div class="card shadow mb-8">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{__('Transports')}}</h4>
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
                        <th>{{__('Route No.')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($routes as $route)
                        <tr>
                            <td>{{ $route->route_number }}</td>
                            <td>{{ $route->name }}</td>
                            <td><a href="{{$route->map_url}}">{{__('Route Map')}}</a></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('route.show', $route->id) }}">{{__('Details')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
