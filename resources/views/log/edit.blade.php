@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Edit Transport Information')}}</h4>
                </div>
                @if(session()->has('status'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form
                        method="post"
                        action="{{ route('transport.update', $transport->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-type">{{__('Transport Type')}}</label>
                            <select
                                id="form-type"
                                class="form-select custom-select custom-select-sm{{ $errors->has('type') ? ' is-invalid' : '' }}"
                                name="type">
                                <option {{$transport->type === '' ? 'selected' : ''}}>{{__('Select type')}}</option>
                                <option
                                    {{$transport->type === 'Bus' ? 'selected' : ''}} value="Bus">{{__('Bus')}}</option>
                                <option
                                    {{$transport->type === 'Mini-Bus' ? 'selected' : ''}} value="Mini-Bus">{{__('Mini-Bus')}}</option>
                                <option
                                    {{$transport->type === 'Car' ? 'selected' : ''}} value="Car">{{__('Car')}}</option>
                            </select>
                            @if ($errors->has('type'))
                                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-name">{{__('Transport Name')}}</label>
                            <input
                                id="form-name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                type="text"
                                name="name"
                                placeholder="{{__('Enter Transport Name')}}"
                                value="{{ $transport->name }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-license-number">{{__('License Number')}}</label>
                            <input
                                id="form-license-number"
                                class="form-control{{ $errors->has('license_number') ? ' is-invalid' : '' }}"
                                type="text"
                                name="license_number"
                                placeholder="{{__('Enter License Number')}}"
                                value="{{ $transport->license_number }}">
                            @if ($errors->has('license_number'))
                                <div class="invalid-feedback">{{ $errors->first('license_number') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-route_id">{{__('Route')}}</label>
                            <select
                                id="form-route_id"
                                class="form-select custom-select custom-select-sm{{ $errors->has('route_id') ? ' is-invalid' : '' }}"
                                name="route_id">
                                <option {{$transport->route_id === '' ? 'selected' : ''}}>{{__('Select Route')}}</option>
                                @foreach($routes as $route)
                                    <option
                                        {{$transport->route_id === $route->id ? 'selected' : ''}}
                                        value="{{$route->id}}"
                                    >{{$route->route_number}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('route_id'))
                                <div class="invalid-feedback">{{ $errors->first('route_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-driver_id">{{__('Driver')}}</label>
                            <select
                                id="form-driver_id"
                                class="form-select custom-select custom-select-sm{{ $errors->has('driver_id') ? ' is-invalid' : '' }}"
                                name="driver_id">
                                <option {{$transport->driver_id === '' ? 'selected' : ''}}>{{__('Select Driver')}}</option>
                                @foreach($drivers as $driver)
                                    <option
                                        {{$transport->driver_id === $driver->id ? 'selected' : ''}}
                                        value="{{$driver->id}}"
                                    >{{"{$driver->name} (ID: {$driver->id})"}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('driver_id'))
                                <div class="invalid-feedback">{{ $errors->first('driver_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-helper_id">{{__('Helper')}}</label>
                            <select
                                id="form-helper_id"
                                class="form-select custom-select custom-select-sm{{ $errors->has('helper_id') ? ' is-invalid' : '' }}"
                                name="helper_id">
                                <option {{$transport->helper_id === '' ? 'selected' : ''}}>{{__('Select Helper')}}</option>
                                @foreach($helpers as $helper)
                                    <option
                                        {{$transport->helper_id === $helper->id ? 'selected' : ''}}
                                        value="{{$helper->id}}"
                                    >{{"{$helper->name} (ID: {$helper->id})"}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('helper_id'))
                                <div class="invalid-feedback">{{ $errors->first('helper_id') }}</div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <button class="btn btn-primary px-5" type="submit">{{__('Update')}}</button>
                            <a class="btn btn-secondary px-5"
                               href="{{route('transport.show', ['id'=> $id])}}">{{__('Cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
