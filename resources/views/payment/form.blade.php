<div class="form-body">
    <div class="row">
        <div class="form-group col-6">
            <div class="row">
                <div class="col-4">

                    {!! Form::label('amount', trans('payment.amount'), ['class' => 'control-label']) !!} :
                </div>
                <div class="col-8">
                    {!! Form::number(
                        'amount',
                        $payment->amount ?? '',
                        ['class' => 'form-control']
                        ,
                    ) !!}

                    {!! $errors->first('amount', '<p class="text-danger help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group col-6">
            <div class="row">
                <div class="col-4">
                    {!! Form::label('paid_on', trans('payment.paid_on'), ['class' => 'control-label']) !!} :
                </div>
                <div class="col-8">
                    {!! Form::date(
                        'paid_on',
                        $payment->paid_on ?? '',
                        ['class' => 'form-control', 'required' => 'required']
                        ,
                    ) !!}

                    {!! $errors->first('paid_on', '<p class="text-danger help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <div class="row">
                <div class="col-4">
                    {!! Form::label('details', trans('payment.details'), ['class' => 'control-label']) !!} :
                </div>
                <div class="col-8">
                    {!! Form::text(
                        'details',
                        $payment->details ?? '',
                        ['class' => 'form-control', 'required' => 'required']
                        ,
                    ) !!}

                    {!! $errors->first('details', '<p class="text-danger help-block">:message</p>') !!}
                </div>
            </div>
        </div>
   
    </div>


</div>
<div class="form-actions text-right">
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> @lang('general.save')
    </button>
</div>
