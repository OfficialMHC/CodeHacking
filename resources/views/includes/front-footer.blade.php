<!-- Footer -->
<footer class="py-3 bg-light" id="ch-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <p class="m-0 text-center text-dark float-md-left">Copyright &copy; {{ \Carbon\Carbon::now()->year  }} <a href="http://hanif.intels.co/">OfficialMHC</a> All Rights Reserved.</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <p class="m-0 text-center text-dark float-md-right">DEVELOPED BY: <a href="https://facebook.com/hanif.mhc">HANIF</a></p>
            </div>
        </div>
    </div>
    <!-- /.container -->
</footer>

<!-- jQuery -->
<script src="{{ asset('front-end/js/blog-home-jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('front-end/js/blog-home-bootstrap.min.js') }}"></script>

@yield('scripts')

</body>

</html>
