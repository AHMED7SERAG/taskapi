<!-- Brand Logo -->
<div class="text-center">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <i class="fa ml-3  fa-flag"></i>
        <span class="brand-text font-weight-light mr-3"> {{ __('general.dashboard') }}</span>
    </a>
</div>

<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin-assets//dist/img/business-male.jpg') }}" class="img-circle elevation-2"
                 alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name ?? '' }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
{{-- <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div> --}}

<!-- Admin Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"
            style="overflow: hidden">



                <li class="nav-item menu-open ">
                    <a href="dashboard" class="nav-link  active ">
                        <i class="fa fa-bullseye mr-1"></i>
                        <p>
                            <i class="{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} fas fa-angle-left"></i>
                            {{ __('transaction.transaction') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href=""
                                   class="nav-link p-0 active">
                                    <div class="container">
                                        <div class="row p-2">
                                            <div class="col-3 ">
                                                <i class="nav-icon py-1"></i>
                                            </div>

                                            <p style="font-size: small;">
                                                {{ __('transaction.transaction') }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                    </ul>
                </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
