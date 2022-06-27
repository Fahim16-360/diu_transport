@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">{{__('Add New Transport')}}</h2>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('transport.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-type">{{__('Transport Type')}}</label>
                            <select
                                id="form-type"
                                class="form-select custom-select custom-select-sm{{ $errors->has('type') ? ' is-invalid' : '' }}"
                                name="type">
                                <option {{old('type') === '' ? 'selected' : ''}}>{{__('Select type')}}</option>
                                <option
                                    {{old('type') === 'Bus' ? 'selected' : ''}} value="Bus">{{__('Bus')}}</option>
                                <option
                                    {{old('type') === 'Mini-Bus' ? 'selected' : ''}} value="Mini-Bus">{{__('Mini-Bus')}}</option>
                                <option
                                    {{old('type') === 'Car' ? 'selected' : ''}} value="Car">{{__('Car')}}</option>
                            </select>
                            @if ($errors->has('type'))
                                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-name">{{__('Name')}}</label>
                            <input
                                id="form-name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                type="text"
                                name="name"
                                placeholder="{{__('Enter Name')}}"
                                value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-license_number">{{__('License Number')}}</label>
                            <input
                                id="form-license_number"
                                class="form-control{{ $errors->has('license_number') ? ' is-invalid' : '' }}"
                                type="text"
                                name="license_number"
                                placeholder="{{__('Enter License Number')}}"
                                value="{{old('license_number')}}">
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
                                <option>{{__('Select Route')}}</option>
                                @foreach($routes as $route)
                                    <option
                                        {{(int) old('route_id') === (int) $route->id ? 'selected' : ''}}
                                        value="{{$route->id}}"
                                    >{{$route->route_number . ' - '. $route->id}}</option>
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
                                {{old('driver_id')}}
                                <option>{{__('Select Driver')}}</option>
                                @foreach($drivers as $driver)
                                    <option
                                        {{(int) old('driver_id') === (int) $driver->id ? 'selected' : ''}}
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
                                <option>{{__('Select Helper')}}</option>
                                @foreach($helpers as $helper)
                                    <option
                                        {{(int) old('helper_id') === (int) $helper->id ? 'selected' : ''}}
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
                            <button type="submit" class="btn btn-primary px-3">{{__('Add Transport')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
