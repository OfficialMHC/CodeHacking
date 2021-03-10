<x-admin-master>

@section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Users</a>
                <span class="breadcrumb-item active">Manage</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="row">
                    <div class="col-6">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20">Users List</h6>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success float-right rounded-0">CREATE USER</a>
                    </div>
                </div>

                @if(Session::has('create-user'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('create-user') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(Session::has('update-user'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('update-user') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(Session::has('delete-user'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete-user') }}
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
                            <th class="wd-20p">Name</th>
                            <th class="wd-10p">Role</th>
                            <th class="wd-20p">E-mail</th>
                            <th class="wd-5p">Status</th>
                            <th class="wd-15p">Created At</th>
                            <th class="wd-15p">Updated At</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <img src="{{ $user->photo ? $user->photo->photo_path : 'https://placehold.it/400x400' }}" alt="user photo" width="50" height="50" class="img-thumbnail rounded-circle">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="ion-edit"></i></a>
                                            {!! Form::open(['action' => ['App\Http\Controllers\AdminUsersController@destroy', $user->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}
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


@section('scripts')

        <script>
            $(function(){
                'use strict';

                $('#usersDataTable').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });
                // Select2
                $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            });
        </script>

@endsection

</x-admin-master>
