<x-admin-master>

    @section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Posts</a>
                <a class="breadcrumb-item" href="">Comments</a>
                <span class="breadcrumb-item active">Replies</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20">{{ Str::limit($comment->body, 10) }} <i class="fa fa-reply-all" aria-hidden="true"></i> Replies</h6>

                @if(Session::has('update-reply'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('update-reply') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(Session::has('delete-reply'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete-reply') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-wrapper table-responsive">
                    @if(count($replies) > 0)
                        <table id="usersDataTable" class="table table-bordered table-striped table-hover display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="wd-5p">ID</th>
                                <th class="wd-5p">Photo</th>
                                <th class="wd-20p">Author</th>
                                <th class="wd-15p">Email</th>
                                <th class="wd-30p">Reply</th>
                                <th class="wd-15p">Created At</th>
                                <th class="wd-5p">Post</th>
                                <th class="wd-5p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($replies as $reply)
                                <tr>
                                    <td>{{ $reply->id }}</td>
                                    <td>
                                        <img src="{{ $reply->photo }}" alt="author photo" class="img-thumbnail rounded-circle">
                                    </td>
                                    <td>{{ $reply->author }}</td>
                                    <td>{{ $reply->email }}</td>
                                    <td>{{ Str::limit($reply->body, 105) }}</td>
                                    <td>{{ $reply->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('home.post', $reply->comment->post->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2">View Post</a>
                                    </td>
                                    <td>
                                        <div class="btn-group">

                                            @if ($reply->is_active ==1)
                                                {!! Form::open(['action' => ['App\Http\Controllers\CommentRepliesController@update', $reply->id], 'method' => 'PATCH', 'onsubmit' => 'return confirm("Are You Sure to Un-Approve this?")']) !!}
                                                <input type="hidden" name="is_active" value="0">
                                                {{ Form::submit('Un-Approve', ['class' => 'btn btn-sm btn-info rounded-0 mr-2'] )  }}
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open(['action' => ['App\Http\Controllers\CommentRepliesController@update', $reply->id], 'method' => 'PATCH', 'onsubmit' => 'return confirm("Are You Sure to Approve this?")']) !!}
                                                <input type="hidden" name="is_active" value="1">
                                                {{ Form::submit('Approve', ['class' => 'btn btn-sm btn-success rounded-0 mr-2'] )  }}
                                                {!! Form::close() !!}
                                            @endif

                                            {!! Form::open(['action' => ['App\Http\Controllers\CommentRepliesController@destroy', $reply->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
                                            {{ Form::button('<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger rounded-0'] )  }}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-center">NO Replies AVAILABLE</h2>
                    @endif
                </div><!-- table-wrapper -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    @endsection

</x-admin-master>
