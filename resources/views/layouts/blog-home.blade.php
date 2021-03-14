@include('includes.front-header')

<!-- Navigation -->
@include('includes.front-nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- Blog Post -->
            @yield('content')

            <!-- Pagination -->
{{--            <ul class="pagination justify-content-center mb-4">--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="#">&larr; Older</a>--}}
{{--                </li>--}}
{{--                <li class="page-item disabled">--}}
{{--                    <a class="page-link" href="#">Newer &rarr;</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
            {{ $posts->links('pagination::bootstrap-4') }}

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            @include('includes.front-sidebar')

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@include('includes.front-footer')
