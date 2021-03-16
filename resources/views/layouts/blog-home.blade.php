@include('includes.front-header')

<!-- Navigation -->
@include('includes.front-nav')

<!-- Page Content -->
<div class="container">

    <div class="row mt-4">
        <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
            @include('includes.front_search')
        </div>
    </div>

    <div class="row my-2">

        <!-- Blog Entries Column -->
        <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">

            <!-- Blog Post -->
            @yield('content')

            {{ $posts->links('pagination::bootstrap-4') }}

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@include('includes.front-footer')
