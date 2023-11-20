@extends('layouts.acme.admin.app')

@section('title')
    @lang('payment.payment')
@endsection

@push('styles')
    <style>
        .select2-container{
            width: 100%!important;
        }
    </style>
@endpush

@section('content')
    <div class="app-content content">
      @include ('layouts.acme.admin._card_header', ['routeGroup' => '', 'viewName' => 'payment', 'type' => 'show'])

        <div class="content-body">
            @include('includes.flash_message')
            <!-- datatable -->
            <section id="column-filtering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-bold">@lang('general.show')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <th> {{ trans('payment.first_name') }} @lang('general.'.'ar') </th>
                                                    <td> {{ $employee->first_name }} </td>
                                                </tr>
                                                <tr>
                                                    <th> {{ trans('payment.last_name') }} @lang('general.'.'en') </th>
                                                    <td> {{ $employee->last_name }} </td>
                                                </tr>

                                                <tr>
                                                    <th> {{ trans('payment.salary') }} </th>
                                                    <td> {{ $employee->salary ?? "" }} </td>
                                                </tr>
                                                <tr>
                                                    <th> {{ trans('payment.manager') }} </th>
                                                    <td> {{ $employee->manager->full_name ?? ""}}  </td>
                                                </tr>
                                                <tr>
                                                    <th>@lang('payment.image')</th>
                                                    <td>
                                                        <img src="{{$employee->image_path}}" alt="{{$employee->full_name}}" width="120">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ datatable -->
        </div>
    </div>
@endsection

@push('scripts')

@endpush
