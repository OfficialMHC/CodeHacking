<x-admin-master>

    @section('styles')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    @endsection

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
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-20"><i class="ion-images"></i> Medias List</h6>
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

                <form action="{{ route('delete.media') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select name="checkBoxArray" id="" class="form-control form-control-sm">
                                    <option value="">Delete</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button type="submit" name="deleteAll" class="btn btn-sm btn-primary" value="submit">SUBMIT</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-wrapper table-responsive">
                    <table id="usersDataTable" class="table table-bordered table-striped table-hover display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-5p"><input type="checkbox" id="options"></th>
                            <th class="wd-5p">ID</th>
                            <th class="wd-55p">Photo</th>
                            <th class="wd-15p">Created At</th>
                            <th class="wd-15p">Updated At</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($photos)
                            @foreach($photos as $photo)
                                <tr>
                                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                                    <td>{{ $photo->id }}</td>
                                    <td>
                                        <img src="{{ $photo->photo_path }}" alt="media photo" class="img-thumbnail" style="height: 100px">
                                    </td>
                                    <td>{{ $photo->created_at->diffForHumans() }}</td>
                                    <td>{{ $photo->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group">
{{--                                            {!! Form::open(['action' => ['App\Http\Controllers\AdminMediasController@destroy', $photo->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are You Sure to Delete this?")']) !!}--}}
{{--                                                {{ Form::button('<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger rounded-0'] )  }}--}}
{{--                                            {!! Form::close() !!}--}}
                                            <input type="hidden" name="photo" value="{{ $photo->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger rounded-0" name="deleteSingle" value="delete"><i class="ion-trash-b"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
                </form>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->



    @endsection

    @section('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

            @if(Session::has('delete-media'))
                <script>
                    toastr.success("{!! Session::get('delete-media') !!}");
                </script>
            @endif

            <script>

                $(document).ready(function () {
                    $('#options').click(function () {
                        if(this.checked) {
                            $('.checkBoxes').each(function () {
                                this.checked = true;
                            });
                        }else{
                            $('.checkBoxes').each(function () {
                                this.checked = false;
                            });
                        }
                    });
                });

            </script>

    @endsection

</x-admin-master>
