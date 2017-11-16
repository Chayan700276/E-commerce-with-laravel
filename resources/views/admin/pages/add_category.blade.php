@extend('admin_master')
@section('admin_main_content')
    <!-- Content Header (Page header) -->
    <div class="box-body">

        <div class="row">
            <div>
                <h2 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">Add Category</h2>

                @if($errors->any())
                <div class="alert alert-danger" style="text-align: center;">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">
                @if(Session::has('message'))
                {{session('message')}}
                @endif
                </h3>
            </div>
          <form action="{{url('category')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-8 col-md-offset-2">

                    <div class="form-group">
                        <label> Add category </label>
                        <input type="text" class="form-control" name="category_name" placeholder=" Add Category....">
                    </div>
                    <div class="form-group">
                        <label> Publication Status </label>
                        <select class="form-control" name="publication_status">
                            <option value="">Select Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Submitt" style="float: right">
                </div>
           </form>

        </div>
        <!-- /.row -->


    </div>

@endsection