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
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20">Users List</h6>

                <div class="table-wrapper table-responsive">
                    <table id="usersDataTable" class="table table-bordered table-striped table-hover display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-5p">ID</th>
                            <th class="wd-5p">Photo</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-10p">Role</th>
                            <th class="wd-20p">E-mail</th>
                            <th class="wd-10p">Status</th>
                            <th class="wd-10p">Created</th>
                            <th class="wd-10p">Updated</th>
                            <th class="wd-15p">Action</th>
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
                                            <a href="" class="btn btn-sm btn-dark rounded-0 mr-2"><i class="ion-ios-eye"></i></a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="ion-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger rounded-0"><i class="ion-trash-b"></i></button>
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
