<x-admin-master>

    @section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css">
    @endsection

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Medias</a>
                <span class="breadcrumb-item active">Upload</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-10"><i class="ion-images"></i> UPLOAD MEDIA</h6>
                <hr>

                {!! Form::open(['action' => 'App\Http\Controllers\AdminMediasController@store', 'method' => 'POST', 'class' => 'dropzone']) !!}
                    @csrf
                {!! Form::close() !!}

                @include('includes.form-errors')
            </div>
        </div>

    @endsection

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.js"></script>
    @endsection

</x-admin-master>
