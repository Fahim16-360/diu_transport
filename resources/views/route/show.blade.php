@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Route Information')}}</h4>
                </div>

                <div class="card-body">
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Route No.')}}</label>
                                </div>
                                <div class="col">
                                    {{ $route->route_number }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Route Name')}}</label>
                                </div>
                                <div class="col">
                                    {{ $route->name }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Description')}}</label>
                                </div>
                                <div class="col">
                                    {{ $route->description }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Map URL')}}</label>
                                </div>
                                <div class="col">
                                    <a href="{{ $route->map_url }}">{{__('Route Map')}}</a>
                                </div>
                            </li>
                        </ul>

                        <br>

                        <div class="row p-3">
                            <a class="btn btn-primary px-5"
                               href="{{ route('route.edit', $route->id) }}">{{__('Edit')}}</a>
                            &nbsp;
                            <form
                                action="{{ route('route.delete', $route->id) }}"
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
