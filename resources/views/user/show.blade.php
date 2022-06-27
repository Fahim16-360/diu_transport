@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('User Details')}}</h4>
                </div>

                <div class="card-body">
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Name')}}</label>
                                </div>
                                <div class="col">
                                    {{ $user->name }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Email')}}</label>
                                </div>
                                <div class="col">
                                    {{ $user->email }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Type')}}</label>
                                </div>
                                <div class="col">
                                    {{ $user->type }}
                                </div>
                            </li>
                        </ul>

                        <br>

                        <div class="row p-3">
                            <a class="btn btn-primary px-5"
                               href="{{ route('user.edit', $user->id) }}">{{__('Edit')}}</a>
                            &nbsp;
                            <form
                                action="{{ route('user.delete', $user->id) }}"
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
