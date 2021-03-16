@include('includes.front-header')

<!-- Navigation -->
@include('includes.front-nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8 offset-lg-2">

            <div class="post-content">
                @yield('content')
            </div>

        </div>

        <!-- Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
@include('includes.front-footer')
