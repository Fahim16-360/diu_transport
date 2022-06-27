@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Update User')}}</h4>
                </div>
                @if(session()->has('status'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-name">{{__('Full Name')}}</label>
                            <input
                                id="form-name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                type="text"
                                name="name"
                                placeholder="{{__('Enter Full Name')}}"
                                value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-email">{{__('Email address')}}</label>
                            <input
                                id="form-email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                type="email"
                                name="email"
                                placeholder="{{__('Enter your email')}}"
                                value="{{ $user->email}}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="form-label"
                                for="form-password">{{__('Password')}}</label>
                            <input
                                id="form-password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                type="password"
                                name="password"
                                placeholder="Password">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <button class="btn btn-primary px-5" type="submit">{{__('Update')}}</button>
                            <a class="btn btn-secondary px-5" href="{{route('user.show', ['id'=> $id])}}">{{__('Cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
