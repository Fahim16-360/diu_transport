@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="align-middle">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">{{__('Helper Information')}}</h4>
                </div>

                <div class="card-body">
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('NID')}}</label>
                                </div>
                                <div class="col">
                                    {{ $helper->nid }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Name')}}</label>
                                </div>
                                <div class="col">
                                    {{ $helper->name }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Address')}}</label>
                                </div>
                                <div class="col">
                                    {{ $helper->address }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Phone')}}</label>
                                </div>
                                <div class="col">
                                    {{ $helper->phone }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="col">
                                    <label class="font-weight-bold">{{__('Status')}}</label>
                                </div>
                                <div class="col">
                                    {{ $helper->status }}
                                </div>
                            </li>
                        </ul>

                        <br>

                        <div class="row p-3">
                            <a class="btn btn-primary px-5"
                               href="{{ route('helper.edit', $helper->id) }}">{{__('Edit')}}</a>
                            &nbsp;
                            <form
                                action="{{ route('helper.delete', $helper->id) }}"
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
