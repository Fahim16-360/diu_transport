@extends('layouts.master')

@section('content')

    <div class="card shadow mb-8">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{__('Helpers')}}</h4>
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
                    @foreach ($helpers as $helper)
                        <tr>
                            <td>{{ $helper->name }}</td>
                            <td>{{ $helper->phone }}</td>
                            <td>{{ $helper->status}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('helper.show', $helper->id) }}">{{__('Details')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
