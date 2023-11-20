@extends('layouts.acme.admin.app')

@section('title')
    @lang('transaction.transaction')
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
      @include ('layouts.acme.admin._card_header', ['routeGroup' => '', 'viewName' => 'transaction', 'type' => 'show'])

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
                                                    <th> {{ trans('transaction.amount') }}  </th>
                                                    <td> {{ $transaction->amount }} </td>
                                                </tr>
                                                <tr>
                                                    <th> {{ trans('transaction.payer-by') }}  </th>
                                                    <td> {{ $transaction->payerUser->name ?? ''}} </td>
                                                </tr>

                                                <tr>
                                                    <th> {{ trans('transaction.due_on') }} </th>
                                                    <td> {{ $transaction->due_on ?? "" }} </td>
                                                </tr>
                                                <tr>
                                                    <th> {{ trans('transaction.is_vat_inclusive') }} </th>
                                                    <td> {{ ($transaction->is_vat_inclusive) ?   __('general.yes'): __('general.no')}}  </td>
                                                </tr>
                                                <tr>
                                                    <th> {{ trans('transaction.vat') }} </th>
                                                    <td> {{ $transaction->vat ?? ""}}  </td>
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
            <div class="text-center"> 

                <h2  >{{  trans('payment.payment') }}</h2>
            </div>
           


          
    @if ($transaction->payments->count() > 0)
    <div class="card-content show">
        <div class="card-body card-dashboard">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{  trans('payment.payment') }}</th>
                            <th scope="col">{{  trans('payment.amount') }}</th>
                            <th scope="col">{{  trans('payment.paid_on') }}</th>
                            <th scope="col"> {{ trans('payment.details') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction->payments as $payment)
                            <tr>
                                <td scope="row">{{ $payment->id }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->paid_on }}</td>
                                <td>{{ $payment->details }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <p>No payments recorded for this transaction.</p>
    @endif
        </div>
        
    </div>
@endsection

@push('scripts')

@endpush
