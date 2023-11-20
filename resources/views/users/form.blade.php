<div class="form-body">
    <div class="row">
        @foreach ($languages as $language)
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                    {!! Form::label(
                        'full_name' . '_' . $language->code,
                        trans('users.full_name') . ' ' . __('general.' . $language->code),
                        ['class' => 'control-label'],
                    ) !!}
                    {!! Form::text(
                        'full_name' . '_' . "$language->code",
                        $user->getTranslation('full_name', $language->code),
                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                    ) !!}
                    {!! $errors->first('full_name' . '_' . $language->code, '<p class="text-danger help-block">:message</p>') !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                {!! Form::label('username', __('users.username'), ['class' => 'control-label']) !!}
                {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                {!! $errors->first('username', '<p class="text-danger help-block">:message</p>') !!}
            </div>
        </div>
        @if ($formMode === 'create')
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', __('users.password'), ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    {!! $errors->first('password', '<p class="text-danger help-block">:message</p>') !!}

                </div>
            </div>
        @endif
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', __('users.email'), ['class' => 'control-label']) !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                {!! $errors->first('email', '<p class="text-danger help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('max_missions') ? ' has-error' : '' }}">
                {!! Form::label('max_missions', __('users.max_missions'), ['class' => 'control-label']) !!}
                {!! Form::number('max_missions', $user->max_missions, ['class' => 'form-control']) !!}
                {!! $errors->first('max_missions', '<p class="text-danger help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}" id="roles-div">
                {!! Form::label('role', __('users.role'), ['class' => 'control-label']) !!}
                {!! Form::select('roles[]', $roles, isset($roles) ? $user->roles : [], [
                    'class' => 'form-control select-custom',
                    'multiple' => true,
                    'id' => 'roles',
                ]) !!}
                {!! $errors->first('roles', '<p class="text-danger help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('jobs_id') ? ' has-error' : '' }}" id="jobs-div">
                {!! Form::label('job_id', __('users.job_id'), ['class' => 'control-label']) !!}
                {!! Form::select('job_id', $jobs, null, ['class' => 'form-control select-custom', 'id' => 'name']) !!}
                {!! $errors->first('jobs', '<p class="text-danger help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('selection') ? 'has-error' : '' }}">
                {!! Form::label('selection', trans('users.selection'), ['class' => 'control-label']) !!}
                {!! Form::select(
                    'selection',
                    [
                        'yes' => trans('users.yes'),
                        'no' => trans('users.no'),
                    ],
                    $user->selection,
                    'required' == 'required'
                        ? ['class' => 'form-control select2']
                        : ['class' => 'form-control select2'],
                ) !!}
            </div>
        </div>
    </div>

</div>
<div class="form-actions text-right">
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> @lang('general.save')
    </button>
</div>

@push('scripts')
    <script>
        triggerType();
        $(function() {
            $('#password-change-btn').on('click', function(e) {
                togglePassword();
            });
            $('#type').on('change', function(e) {
                triggerType();
            });
        });


        function togglePassword() {
            var isDisabled = $('#password').attr('disabled');
            if (isDisabled == 'disabled') {
                $('#password').removeAttr('disabled');
            } else {
                $('#password').attr('disabled', 'disabled');
            }
        }
    </script>
@endpush
