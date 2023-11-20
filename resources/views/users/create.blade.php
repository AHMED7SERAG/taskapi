@extends('layouts.acme.admin.app')

@section('title')
@lang('users.users')
@endsection
@section('content')
<div class="app-content content">
    @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'users', 'type' => 'create'])
    <div class="content-body">
        <!-- Form Section -->
        <section class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-header-jinja">
                        <h4 class="card-title text-bold">@lang('general.create')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {!! Form::open(['url' => route('admin.users.store'), 'class' => 'form-horizontal', 'files' => true]) !!}

                                @include ('admin.users.form', ['formMode' => 'create'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Form Sections -->
    </div>
</div>
@endsection

@push('scripts')

@endpush
