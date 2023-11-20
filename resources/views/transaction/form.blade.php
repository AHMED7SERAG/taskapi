<div class="form-body">
    <div class="row">
        <div class="form-group col-6">
            <div class="row">
                <div class="col-4">
                    {!! Form::label('amount', trans('transaction.amount'), ['class' => 'control-label']) !!} :
                </div>
                <div class="col-8">
                    {!! Form::number(
                        'amount',
                        $transaction->amount ?? '',
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
                    {!! Form::label('payer', trans('transaction.payer-by'), ['class' => 'control-label']) !!} :
                </div>
                <div class="col-8">
                    {!! Form::select('payer', $customers, $transaction->payer ?? '', [
                        'class' =>  'form-control  select-custom ',
                        'placeholder' => '',
                    ]) !!}

                    {!! $errors->first('payer', '<p class="text-danger help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <div class="row">
                <div class="col-4">
                    {!! Form::label('due_on', trans('transaction.due_on'), ['class' => 'control-label']) !!} :
                </div>
                <div class="col-8">
                    {!! Form::date(
                        'due_on',
                        $transaction->due_on ?? '',
                        ['class' => 'form-control', 'required' => 'required']
                        ,
                    ) !!}

                    {!! $errors->first('due_on', '<p class="text-danger help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group col-6">
        <div class="row">
            <div class="col-4">
                {!! Form::label('is_vat_inclusive', trans('transaction.is_vat_inclusive'), ['class' => 'control-label']) !!} :
            </div>
            <div class="col-8">
                {{-- {!! Form::checkbox('is_vat_inclusive', 'yes',false, [
                    'class' => ' form-control',
                ]) !!} --}}
                    <input type="checkbox" class ='form-control' name="is_vat_inclusive"  {{ (isset($transaction) && ($transaction->is_vat_inclusive)) ? 'checked': ''}} value="1">

                {!! $errors->first('is_vat_inclusive', '<p class="text-danger help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-2">
            {!! Form::label('vat', trans('transaction.vat'), ['class' => 'control-label']) !!} :
        </div>
        <div class="col-4">
            {!! Form::number('vat',$transaction->vat ?? '', [
                'class' =>  'form-control ',
                'placeholder' => '',
            ]) !!}
            {!! $errors->first('vat', '<p class="text-danger help-block">:message</p>') !!}
        </div>
    </div>

</div>

<div class="form-actions text-right">
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> @lang('general.save')
    </button>
</div>
