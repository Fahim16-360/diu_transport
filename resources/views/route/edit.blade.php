@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Edit Route Information')}}</h4>
                </div>
                @if(session()->has('status'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form
                        method="post"
                        action="{{ route('route.update', $route->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-route_number">{{__('Route No.')}}</label>
                            <input
                                id="form-route_number"
                                class="form-control{{ $errors->has('route_number') ? ' is-invalid' : '' }}"
                                type="text"
                                name="route_number"
                                placeholder="{{__('Enter Route Number')}}"
                                value="{{ $route->route_number }}">
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
                                value="{{$route->name}}">
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
                                placeholder="{{__('Enter Description')}}">{{$route->description}}</textarea>
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
                                value="{{$route->map_url}}">
                            @if ($errors->has('map_url'))
                                <div class="invalid-feedback">{{ $errors->first('map_url') }}</div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <button class="btn btn-primary px-5" type="submit">{{__('Update')}}</button>
                            <a class="btn btn-secondary px-5"
                               href="{{route('route.show', ['id'=> $id])}}">{{__('Cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
