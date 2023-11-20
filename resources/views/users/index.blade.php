@extends('layouts.acme.admin.app')

@section('title')
    @lang('users.users')
@endsection
@push('styles')
@endpush

@section('content')
    <div class="app-content content">
        <ol class="breadcrumb" style="background-color: transparent">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('general.dashboard')</a>
            </li>
            <li class="breadcrumb-item"><a
                    href="{{ route('users' . '.index') }}">@lang('users' . '.' . 'users')</a>
            </li>
        </ol>

        <div class="content-body">
            @include('includes.flash_message')

            <!-- datatable -->
            <section class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-bold">@lang('general.all') @lang('users.users')</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table  ">
                                    <table
                                        class="table table-striped table-bordered zero-configuration data-table w-100 text-center">
                                        <thead>
                                            <tr>
                                                <th dt-type="text" dt-name="full_name">{{ trans('users.full_name') }}</th>
                                                <th dt-type="text" dt-name="username">{{ trans('users.username') }}</th>
                                                <th dt-type="text" dt-name="email">{{ trans('users.email') }}</th>
                                                <th dt-type="text" dt-name="max_missions">{{ trans('users.max_missions') }}
                                                {{--  <th dt-type="select" dt-options="roles"dt-name="roles">
                                                </th>  --}}
                                                <th dt-type="select" dt-enc="yes" dt-options="{{ base64_encode(json_encode($roles)) }}"
                                                dt-name="roles">{{ trans('users.roles') }}</th>

                                                {{-- <th dt-type="select" dt-enc="yes" dt-options="{{base64_encode(json_encode([
                                                'yes' => trans('users.yes'),
                                                'no' => trans('users.no'),
                                                ]))}}" dt-name="selection">{{ trans('users.selection') }}</th> --}}
                                                <th style="width: 25%;">@lang('general.action')</th>
                                            </tr>
                                            <tr id="searchable-row" @if (app()->getLocale() == 'ar') dir="rtl" @endif></tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
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
        var lang = '{{ app()->getLocale() }}';
        var dataTablesSearchLink = '{{ url('admin/users') }}';
        const dataTablesLanguageLink = '{{ app()->getLocale() == '' ? asset('datatables/lang/ar.json') : '' }}';
    </script>
@endpush
