<x-admin-master>

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Posts</a>
                <span class="breadcrumb-item active">Manage</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-6">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20">Posts List</h6>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success float-right rounded-0">CREATE POST</a>
                    </div>
                </div>

                @if(Session::has('create-post'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('create-post') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(Session::has('update-post'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('update-post') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(Session::has('delete-post'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete-post') }}
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
                            <th class="wd-20p">Photo</th>
                            <th class="wd-15p">Owner</th>
                            <th class="wd-10p">Category</th>
                            <th class="wd-15p">Title</th>
                            <th class="wd-30p">Description</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <img src="{{ $post->photo ? $post->photo->photo_path : 'https://placehold.it/400x400' }}" alt="user photo" class="img-thumbnail">
                                    </td>
                                    <td>{{ $post->user->name}}</td>
                                    <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="ion-edit"></i></a>
                                            {!! Form::open(['action' => ['App\Http\Controllers\AdminPostsController@destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
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
