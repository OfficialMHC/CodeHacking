<x-admin-master>

    @section('content')

        @include('includes.tiny-editor')

        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Posts</a>
                <span class="breadcrumb-item active">Create</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-10"><i class="ion-ios-compose"></i> CREATE POST</h6>
                        <hr>

                        {!! Form::open(['action' => 'App\Http\Controllers\AdminPostsController@store', 'method' => 'POST', 'files' => true]) !!}
                        @csrf
                        <div class="form-group">
                            {!! Form::label('title', 'Post Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', ['' =>'--- Select ---'] + $categories , null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('photo_id', 'Photo') !!}
                            {!! Form::file('photo_id', ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Description') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('SUBMIT', ['class' => 'btn btn-sm btn-success btn-block']) !!}
                        </div>

                        {!! Form::close() !!}

                        @include('includes.form-errors')
                    </div>
        </div>

    @endsection

</x-admin-master>
