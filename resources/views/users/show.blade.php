
@extends('layouts.acme.admin.app')

@section('title')
    @lang('users.users')
@endsection


@section('content')
    <div class="app-content content">
        @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'users', 'type' => 'show'])
        <div class="content-body">
            <!-- datatable -->
            <section class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-header-jinja">
                            <h4 class="card-title text-bold">@lang('general.show')</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.full_name') }} </th>
                                            <td>

                                                    {{ $user->full_name }}


                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.email') }} </th>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.username') }} </th>
                                            <td>
                                                {{ $user->username }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.role') }} </th>
                                            <td>
                                                @foreach($user->roles->pluck('label') as $role)

                                                    <span class="badge badge-info">{{$role}}</span>
                                                    <br>

                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.job_title') }} </th>
                                            <td>
                                                {{ $user->job->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.selection') }} </th>
                                            <td>
                                                {{ trans('users.'.$user->selection) }}
                                            </td>
                                        </tr>
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

@endpush
