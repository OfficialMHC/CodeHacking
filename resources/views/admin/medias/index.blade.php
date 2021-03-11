<x-admin-master>

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Medias</a>
                <span class="breadcrumb-item active">Manage</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-6">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20">Medias List</h6>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('medias.create') }}" class="btn btn-sm btn-success float-right rounded-0">UPLOAD MEDIA</a>
                    </div>
                </div>

                @if(Session::has('delete-media'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete-media') }}
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
                            <th class="wd-30p">Photo</th>
                            <th class="wd-25p">Created At</th>
                            <th class="wd-25p">Updated At</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($photos)
                            @foreach($photos as $photo)
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td>
                                        <img src="{{ $photo->photo_path }}" alt="media photo" class="img-thumbnail" style="height: 100px">
                                    </td>
                                    <td>{{ $photo->created_at->diffForHumans() }}</td>
                                    <td>{{ $photo->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('medias.edit', $photo->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="ion-edit"></i></a>
                                            {!! Form::open(['action' => ['App\Http\Controllers\AdminMediasController@destroy', $photo->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
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
        </div><!-- br-pagebody -->

    @endsection

</x-admin-master>
