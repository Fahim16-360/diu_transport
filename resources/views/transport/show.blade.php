@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Transport Information')}}</h4>
                </div>

                <div class="card-body">
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Type')}}</label>
                                </div>
                                <div class="col">
                                    {{ $transport->type }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Name')}}</label>
                                </div>
                                <div class="col">
                                    {{ $transport->name }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('License Number')}}</label>
                                </div>
                                <div class="col">
                                    {{ $transport->license_number }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Route No.')}}</label>
                                </div>
                                <div class="col">
                                    {{ $transport->route_number }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Driver')}}</label>
                                </div>
                                <div class="col">
                                    {{"{$transport->driver_name} (ID: {$transport->driver_id}, {$transport->driver_status})"}}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Helper')}}</label>
                                </div>
                                <div class="col">
                                    {{"{$transport->helper_name} (ID: {$transport->helper_id}, {$transport->helper_status})"}}
                                </div>
                            </li>
                        </ul>

                        <br>

                        <div class="row p-3">
                            <a class="btn btn-primary px-5"
                               href="{{ route('transport.edit', $transport->id) }}">{{__('Edit')}}</a>
                            &nbsp;
                            <form
                                action="{{ route('transport.delete', $transport->id) }}"
                                method="POST"
                                onsubmit="return confirm({{__('Data will be lost. Are You Sure?')}})"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger px-5" type="submit">{{__('Delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
