@extends('layouts.acme.admin.app')

@section('title')
    @lang('users.users')
@endsection


@section('content')
    <div class="app-content content">
        @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'users', 'type' => 'update'])
        <div class="content-body">
            <!-- Form Section -->
            <section class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-header-jinja">
                            <h4 class="card-title text-bold">@lang('general.update')</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form method="POST" class="form form-horizontal" action="{{route('admin.users.update', $user->id)}}"  enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    @include ('admin.users.form', ['formMode' => 'edit'])

                                </form>
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

