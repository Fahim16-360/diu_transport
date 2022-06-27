@extends('layouts.master')

@section('content')

    <div class="card shadow mb-8">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{__('Users')}}</h4>
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
                        <th>{{__('Email')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Type')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->type}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('user.show', $user->id) }}">{{__('Details')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
