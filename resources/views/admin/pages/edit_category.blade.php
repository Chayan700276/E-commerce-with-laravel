@extend('admin_master')
@section('admin_main_content')
    <!-- Content Header (Page header) -->
    <div class="box-body">

        <div class="row">
            <div>
                <h2 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">Edit Category</h2>
            </div>
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">
                @if(Session::has('message'))
                {{session('message')}}
                @endif
                </h3>
            </div>
            <form action="{{url('category/'.$cat_item->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <label> Category name </label>
                        <input type="text" class="form-control" value="{{$cat_item->category_name}}" name="category_name" placeholder=" Add Category....">
                    </div>
                    <div class="form-group">
                        <label> Publication Status </label>
                        <select class="form-control" id="publication_status" name="publication_status" >
                            @if($cat_item->publication_status == 1)
                            <option selected="" value="1">Published</option>
                             @else
                             <option value="0">Unpublished</option>
                             @endif

                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Update" style="float: right">
                </div>
           </form>

        </div>
        <!-- /.row -->


    </div>
    <script type='text/javascript'>
        //document.form['edit_category'].elements['publication_status'].value='1';
    </script>
 @endsection