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
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20"><i class="fa fa-comments" aria-hidden="true"></i> Comments List</h6>

                @if(Session::has('update-comment'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('update-comment') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(Session::has('delete-comment'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete-comment') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-wrapper table-responsive">
                    @if(count($comments) > 0)
                    <table id="usersDataTable" class="table table-bordered table-striped table-hover display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-5p">ID</th>
                            <th class="wd-5p">Photo</th>
                            <th class="wd-20p">Author</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-30p">Comment</th>
                            <th class="wd-10p">Created At</th>
                            <th class="wd-5p">Post</th>
                            <th class="wd-5p">Replies</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>
                                        <img src="{{ $comment->photo }}" alt="author photo" class="img-thumbnail rounded-circle">
                                    </td>
                                    <td>{{ $comment->author }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ Str::limit($comment->body, 105) }}</td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('home.post', $comment->post->id) }}" class="btn btn-sm btn-dark rounded-0 mr-2"><i class="fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('replies.show', $comment->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="fa fa-reply-all"></i></a>
                                    </td>
                                    <td>
                                        <div class="btn-group">

                                            @if ($comment->is_active ==1)
                                            {!! Form::open(['action' => ['App\Http\Controllers\PostCommentsController@update', $comment->id], 'method' => 'PATCH', 'onsubmit' => 'return confirm("Are You Sure to Un-Approve this?")']) !!}
                                                <input type="hidden" name="is_active" value="0">
                                                {{ Form::submit('Un-Approve', ['class' => 'btn btn-sm btn-info rounded-0 mr-2'] )  }}
                                            {!! Form::close() !!}
                                            @else
                                            {!! Form::open(['action' => ['App\Http\Controllers\PostCommentsController@update', $comment->id], 'method' => 'PATCH', 'onsubmit' => 'return confirm("Are You Sure to Approve this?")']) !!}
                                                <input type="hidden" name="is_active" value="1">
                                                {{ Form::submit('Approve', ['class' => 'btn btn-sm btn-success rounded-0 mr-2'] )  }}
                                            {!! Form::close() !!}
                                            @endif

                                            {!! Form::open(['action' => ['App\Http\Controllers\PostCommentsController@destroy', $comment->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
                                                {{ Form::button('<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger rounded-0'] )  }}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h2 class="text-center">NO COMMENT's AVAILABLE</h2>
                    @endif
                </div><!-- table-wrapper -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    @endsection

</x-admin-master>
