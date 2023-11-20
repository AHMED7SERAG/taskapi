@extends('layouts.acme.admin.app')

@section('title')
    @lang('payment.payment')
@endsection
@section('content')
    <div class="app-content content">
            @include ('layouts.acme.admin._card_header', ['routeGroup' => '', 'viewName' => 'payment', 'type' => 'index'])
        <div class="content-body">
            @include('includes.flash_message')
            <!-- datatable -->
            <section id="column-filtering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-bold">@lang('general.all') @lang('payment.payment')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content show">
                                <div class="card-body card-dashboard">
                                    <div class="table">
                                    <table class="table table-striped table-bordered zero-configuration data-table w-100 text-center">
                                            <thead>
                                            <tr>
                                                <th dt-type="text" dt-name="amount">{{ trans('payment.amount') }}</th>
                                                <th dt-type="text" dt-name="payer">{{ trans('types.payer-by') }}</th>
                                                <th dt-type="text" dt-name="due_on">{{ trans('payment.due_on') }}</th>
                                                <th dt-type="text" dt-name="vat">{{ trans('payment.vat') }}</th>
                                                <th dt-type="text" dt-name="is_vat_inclusive">{{ trans('payment.is_vat_inclusive') }}</th>
                                                <th dt-type="text" dt-name="status">{{ trans('payment.status') }}</th>

                                                
                                                {{-- <th dt-type="text" dt-name="manager_id">@lang('payment.manager_id')</th> --}}
                                                <th style="width: 25%;">@lang('general.action')</th>
                                            </tr>
                                            <tr id="searchable-row"></tr>
                                            </thead>
                                            <tbody>

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
    <script>
        var lang = '{{app()->getLocale()}}';
        var dataTablesSearchLink = "{{url('payment')}}";
        var dataTablesLanguageLink = '{{(app()->getLocale() == 'ar')? '' : ''}}';
    </script>
@endpush
