<x-admin-master>

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Categories</a>
                <a class="breadcrumb-item" href="">Manage</a>
                <span class="breadcrumb-item active">Edit</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="br-section-wrapper">
                        @if(Session::has('update-category'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('update-category') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20"><i class="ion-ios-list"></i> EDIT CATEGORY</h6>

                        <div class="table-wrapper table-responsive">
                            {!! Form::model($category, ['action' => ['App\Http\Controllers\AdminCategoriesController@update', $category->id], 'method' => 'PATCH']) !!}
                            @csrf
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control form-control-sm']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('UPDATE', ['class' => 'btn btn-sm btn-primary btn-block']) !!}
                            </div>

                            {!! Form::close() !!}

                            @include('includes.form-errors')
                        </div><!-- table-wrapper -->

                    </div><!-- br-section-wrapper -->
                </div>

                <div class="col-sm-12 col-md-8 col-lg-8">
                </div>
            </div>
        </div><!-- br-pagebody -->

    @endsection

</x-admin-master>
