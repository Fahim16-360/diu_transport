@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">{{__('Add New Log')}}</h2>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('log.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-transport_id">{{__('Transport')}}</label>
                            <select
                                id="form-transport_id"
                                class="form-control custom-select custom-select-sm{{ $errors->has('transport_id') ? ' is-invalid' : '' }}"
                                name="transport_id">
                                <option>{{__('Select Transport')}}</option>
                                @foreach($transports as $transport)
                                    <option
                                        {{(int) old('transport_id') === (int) $transport->id ? 'selected' : ''}}
                                        value="{{$transport->id}}"
                                    >{{$transport->type . ': '. $transport->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('transport_id'))
                                <div class="invalid-feedback">{{ $errors->first('transport_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-start_to">{{__('Start From')}}</label>
                            <input
                                id="form-start_to"
                                class="form-control {{ $errors->has('start_from') ? ' is-invalid' : '' }}"
                                name="start_from"
                                value="{{old('start_from')}}"
                            >
                            @if ($errors->has('start_from'))
                                <div class="invalid-feedback">{{ $errors->first('start_from') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-start_time">{{__('Start Time')}}</label>

                            <div class="input-group">
                                <input
                                    id="form-start_time"
                                    class="form-control {{ $errors->has('start_time') ? ' is-invalid' : '' }}"
                                    type="text"
                                    name="start_time"
                                    value="{{old('start_time')}}"
                                >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            @if ($errors->has('start_time'))
                                <div class="invalid-feedback">{{ $errors->first('start_time') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-departure_from">{{__('Departure From')}}</label>
                            <input
                                id="form-departure_from"
                                class="form-control {{ $errors->has('departure_from') ? ' is-invalid' : '' }}"
                                name="departure_from"
                                value="{{old('departure_from')}}"
                            >
                            @if ($errors->has('departure_from'))
                                <div class="invalid-feedback">{{ $errors->first('departure_from') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-departure_time">{{__('Departure Time')}}</label>
                            <input
                                id="form-departure_time"
                                class="form-control {{ $errors->has('departure_time') ? ' is-invalid' : '' }}"
                                name="departure_time"
                                value="{{old('departure_time')}}"
                            >
                            @if ($errors->has('departure_time'))
                                <div class="invalid-feedback">{{ $errors->first('departure_time') }}</div>
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

