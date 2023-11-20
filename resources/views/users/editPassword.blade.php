
@extends('layouts.acme.admin.app')
@section('content')

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'users', 'type' => 'edit'])

    <div class="container-fluid">
        
        @include('includes.flash_message')

        <!-- datatable -->
        <section id="column-filtering">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-bold">@lang('users.change-password')</h4> 
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content show">
                            <div class="card-body card-dashboard ">
                                <form action="{{ route('admin.users.change-password',$id) }}" method="post">
                                    @csrf
                                    <div class="row  mt-3">
                                        <div class="col-2 text-bold">
                                           {{ trans('users.password') }}
                                        </div>
                                        <div  class="col-7">
                                            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                                            {!! $errors->first('password', '<p class="text-danger help-block">:message</p>') !!}
                                        </div>
                                     </div>
                                     <div class="row  mt-3">
                                        <div class="col-2 text-bold">
                                           {{ trans('users.password_confirmation') }}
                                        </div>
                                        <div  class="col-7">
                                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                                            {!! $errors->first('password_confirmation', '<p class="text-danger help-block">:message</p>') !!}
                                        </div>
                                     </div>
                                    <div class="mt-4">
                                        <div class="form-actions float-right">
                                            <button type="submit" class="btn btn-success float-left">{{ trans('general.save') }}</button> 
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ datatable -->

    </div><!-- /.container-fluid -->
</section>
@endsection




