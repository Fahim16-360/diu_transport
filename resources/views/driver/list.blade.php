@extends('layouts.master')

@section('content')

    <div class="card shadow mb-8">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{__('Drivers')}}</h4>
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
                        <th>{{__('Name')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($drivers as $driver)
                        <tr>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->phone }}</td>
                            <td>{{ $driver->status}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('driver.show', $driver->id) }}">{{__('Details')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
