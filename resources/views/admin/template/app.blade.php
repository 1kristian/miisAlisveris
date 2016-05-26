@include('admin/template/header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        @include('admin/template/flash_messages')
        @yield('content')
</div>
</div>
<!-- /.content-wrapper -->
@include('admin/template/footer')
