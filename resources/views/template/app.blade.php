@include('template/header')

 <!-- Page Content -->
    <div class="container">

        <div class="row">

        @include('template/flash_messages')

            <div class="col-md-3">
                <p class="lead">Categories</p>
                <div class="list-group">
                    @include('categories/sidebar')
                </div>
            </div>

            <div class="col-md-9">
                @yield('content')
            </div>

        </div>

    </div>
    <!-- /.container -->
@include('template/footer')
