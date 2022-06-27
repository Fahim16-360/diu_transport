@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">{{__('Add New Route')}}</h2>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('route.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-route_number">{{__('Route No.')}}</label>
                            <input
                                id="form-route_number"
                                class="form-control{{ $errors->has('route_number') ? ' is-invalid' : '' }}"
                                type="text"
                                name="route_number"
                                placeholder="{{__('Enter Route No.')}}"
                                value="{{old('route_number')}}">
                            @if ($errors->has('route_number'))
                                <div class="invalid-feedback">{{ $errors->first('route_number') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-name">{{__('Route Name')}}</label>
                            <input
                                id="form-name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                type="text"
                                name="name"
                                placeholder="{{__('Enter Route Name')}}"
                                value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-description">{{__('Description')}}</label>
                            <textarea
                                id="form-description"
                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                type="text"
                                name="description"
                                rows="4"
                                placeholder="{{__('Enter Description')}}">{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-map_url">{{__('Map URL')}}</label>
                            <input
                                id="form-map_url"
                                class="form-control{{ $errors->has('map_url') ? ' is-invalid' : '' }}"
                                type="text"
                                name="map_url"
                                placeholder="{{__('Enter Map URL')}}"
                                value="{{old('map_url')}}">
                            @if ($errors->has('map_url'))
                                <div class="invalid-feedback">{{ $errors->first('map_url') }}</div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-3">{{__('Add Route')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
