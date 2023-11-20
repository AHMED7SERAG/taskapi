<!DOCTYPE html>
<html class="loading" lang="{{app()->getLocale()}}">

<!-- BEGIN: Head-->
@include('layouts.acme.metadata._head')
<!-- END: Head-->

<body dir="{{(app()->getLocale() == 'ar')?"rtl":"ltr"}}" class="hold-transition  sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center"  style= "background-color:white">
        <img class="animation__shake"src="{{ asset('preloading.gif') }}" alt="AdminLTELogo" >
      </div>

    @include('layouts.acme.metadata._aside')
    @include('layouts.acme.admin._header')
<!-- END: Main Menu-->

<div class="content-wrapper">
    @yield('content')
</div>


<!-- END: Content-->

<!-- BEGIN: Footer-->
@include('layouts.acme.metadata._footer')
<!-- END: Footer-->
</div>
<!-- BEGIN: Script-->
<!-- END: Script-->

@include('layouts.acme.metadata._script')
</body>
<!-- END: Body-->
</html>
