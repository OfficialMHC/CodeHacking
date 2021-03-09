<x-admin-master>

@section('content')
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="">CodeHacking</a>
                <a class="breadcrumb-item" href="">Users</a>
                <span class="breadcrumb-item active">Create</span>
            </nav>
        </div><!-- br-pageheader -->

    {!! Form::open(['action' => 'App\Http\Controllers\AdminUsersController@store', 'method' => 'POST', 'files' => true]) !!}
    @csrf
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

    {!! Form::close() !!}
@endsection

</x-admin-master>
