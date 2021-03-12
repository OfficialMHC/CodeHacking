<x-admin-master>

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Categories</a>
                <span class="breadcrumb-item active">Manage</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20"><i class="ion-ios-list"></i> CREATE CATEGORY</h6>

                        <div class="table-wrapper table-responsive">
                            {!! Form::open(['action' => 'App\Http\Controllers\AdminCategoriesController@store', 'method' => 'POST']) !!}
                            @csrf
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control form-control-sm']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('SUBMIT', ['class' => 'btn btn-sm btn-success btn-block']) !!}
                                </div>

                            {!! Form::close() !!}

                            @include('includes.form-errors')
                        </div><!-- table-wrapper -->

                    </div><!-- br-section-wrapper -->
                </div>

                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20"><i class="ion-ios-list"></i> CATEGORIES List</h6>

                        @if(Session::has('create-category'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('create-category') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(Session::has('update-category'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('update-category') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(Session::has('delete-category'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('delete-category') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="table-wrapper table-responsive">
                            <table id="usersDataTable" class="table table-bordered table-striped table-hover display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-5p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ Str::limit($category->name) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="ion-edit"></i></a>
                                                    {!! Form::open(['action' => ['App\Http\Controllers\AdminCategoriesController@destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
                                                    {{ Form::button('<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger rounded-0'] )  }}
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->

                    </div><!-- br-section-wrapper -->
                </div>
            </div>
        </div><!-- br-pagebody -->

    @endsection

</x-admin-master>
