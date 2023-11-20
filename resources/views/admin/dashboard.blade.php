@extends('layouts.acme.admin.app')

@section('content')
    <div class="container mt-5">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">@lang('general.dashboard')</h3>
                            </div>
                            <div class="card-body row">


                                        <div class="col-4">
                                            <a href="{{route('transaction.index')}}" >
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-info elevation-1"><i
                                                            class="fas fa-users fa-fw"></i></span>
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text">@lang('transaction.transaction')</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{-- <div class="col-4">
                                            <a href="{{route('users.index')}}" style="color: #000;">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-info elevation-1"><i
                                                            class="fas fa-users fa-fw"></i></span>
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text">@lang('users.users')</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div> --}}

                            </div>
                        </div>
                    </div>
                </div>


    </div>
@endsection
