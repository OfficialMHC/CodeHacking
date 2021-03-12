<x-admin-master>

@section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Users</a>
                <span class="breadcrumb-item active">Create</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3"></div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-10"><i class="ion-person"></i> CREATE USER</h6>
                        <hr>

                        {!! Form::open(['action' => 'App\Http\Controllers\AdminUsersController@store', 'method' => 'POST', 'files' => true]) !!}
                        @csrf
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('role_id', 'Role') !!}
                            {!! Form::select('role_id', ['' =>'--- Select ---'] + $roles, null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Status') !!}
                            {!! Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], 0, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('photo_id', 'Photo') !!}
                            {!! Form::file('photo_id', ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('SUBMIT', ['class' => 'btn btn-sm btn-success btn-block']) !!}
                        </div>

                        {!! Form::close() !!}

                        @include('includes.form-errors')
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3"></div>
            </div>
        </div>

@endsection

</x-admin-master>
