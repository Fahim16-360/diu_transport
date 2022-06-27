@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">{{__('Add New Helper')}}</h2>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('helper.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-nid">{{__('NID')}}</label>
                            <input
                                id="form-nid"
                                class="form-control{{ $errors->has('nid') ? ' is-invalid' : '' }}"
                                type="text"
                                name="nid"
                                placeholder="{{__('Enter NID')}}"
                                value="{{old('nid')}}">
                            @if ($errors->has('nid'))
                                <div class="invalid-feedback">{{ $errors->first('nid') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-name">{{__('Helper Name')}}</label>
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
                                for="form-address">{{__('Address')}}</label>
                            <textarea
                                id="form-address"
                                class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                type="text"
                                name="address"
                                rows="4"
                                placeholder="{{__('Enter Address')}}">{{old('address')}}</textarea>
                            @if ($errors->has('address'))
                                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-phone">{{__('Phone')}}</label>
                            <input
                                id="form-phone"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                type="text"
                                name="phone"
                                placeholder="{{__('Enter Phone Number')}}"
                                value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-status">{{__('Helper Status')}}</label>
                            <select
                                id="form-status"
                                class="form-select custom-select custom-select-sm{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                name="status">
                                <option {{old('status') === '' ? 'selected' : ''}}>{{__('Select type')}}</option>
                                <option
                                    {{old('status') === 'Active' ? 'selected' : ''}} value="Active">{{__('Active')}}</option>
                                <option
                                    {{old('status') === 'Inactive' ? 'selected' : ''}} value="Inactive">{{__('Inactive')}}</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-3">{{__('Add Helper')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
