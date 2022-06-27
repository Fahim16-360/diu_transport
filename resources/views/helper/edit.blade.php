@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Edit Helper Information')}}</h4>
                </div>
                @if(session()->has('status'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form
                        method="post"
                        action="{{ route('helper.update', $helper->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-nid">{{__('Helper\'s NID')}}</label>
                            <input
                                id="form-nid"
                                class="form-control{{ $errors->has('nid') ? ' is-invalid' : '' }}"
                                type="text"
                                name="nid"
                                placeholder="{{__('Enter NID')}}"
                                value="{{ $helper->nid }}">
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
                                placeholder="{{__('Enter Helper Name')}}"
                                value="{{ $helper->name }}">
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
                                placeholder="{{__('Enter Address')}}"
                            >{{ $helper->address }}</textarea>
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
                                value="{{ $helper->phone }}">
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
                                <option {{$helper->status === '' ? 'selected' : ''}}>{{__('Select type')}}</option>
                                <option
                                    {{$helper->status === 'Active' ? 'selected' : ''}} value="Active">{{__('Active')}}</option>
                                <option
                                    {{$helper->status === 'Inactive' ? 'selected' : ''}} value="Inactive">{{__('Inactive')}}</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <button class="btn btn-primary px-5" type="submit">{{__('Update')}}</button>
                            <a class="btn btn-secondary px-5"
                               href="{{route('helper.show', ['id'=> $id])}}">{{__('Cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
