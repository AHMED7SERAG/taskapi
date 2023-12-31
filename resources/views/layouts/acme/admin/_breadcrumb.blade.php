<div class="content-header-left col-md-6 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('general.dashboard')</a>
                </li>
                <li class="breadcrumb-item"><a href="{{route( $viewName . '.index')}}">@lang($viewName. '.' . $viewName)</a>
                </li>
                @if($type != 'index')
                    <li class="breadcrumb-item active"> @lang('general.' . $type)
                    </li>
                @endif
            </ol>
        </div>
    </div>
</div>
