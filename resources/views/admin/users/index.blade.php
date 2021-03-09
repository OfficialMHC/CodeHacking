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
                    <table id="usersDataTable" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-5p">ID</th>
                            <th class="wd-20p">Name</th>
                            <th class="wd-10p">Role</th>
                            <th class="wd-20p">E-mail</th>
                            <th class="wd-10p">Active</th>
                            <th class="wd-10p">Created At</th>
                            <th class="wd-10p">Updated At</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary rounded-0"><i class="ion-edit"></i></button>
                                        <button type="submit" class="btn btn-sm btn-danger rounded-0"><i class="ion-trash-b"></i></button>
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
