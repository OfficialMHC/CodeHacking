<x-admin-master>

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Posts</a>
                <span class="breadcrumb-item active">Comments</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-6">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20"><i class="fa fa-comments" aria-hidden="true"></i> Comment List</h6>
                    </div>
                    <div class="col-6">
{{--                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success float-right rounded-0">CREATE POST</a>--}}
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
                            <th class="wd-5p">Photo</th>
                            <th class="wd-20p">Author</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-30p">Comment</th>
                            <th class="wd-15p">Created At</th>
                            <th class="wd-5p">Post</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($comments) > 0)
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>
                                        <img src="{{ $comment->post->user->photo->photo_path }}" alt="author photo" class="img-thumbnail rounded-circle">
                                    </td>
                                    <td>{{ $comment->author }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ Str::limit($comment->body, 105) }}</td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('home.post', $comment->post->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2">View Post</a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(['action' => ['App\Http\Controllers\AdminPostsController@destroy', $comment->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
                                            {{ Form::button('<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger rounded-0'] )  }}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <h2 class="text-center">NO COMMENT's AVAILABLE</h2>
                        @endif
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    @endsection

</x-admin-master>
