@extend('admin_master')

@section('admin_main_content')
    <!-- Content Header (Page header) -->
    <div class="box-body">

        <div class="row">
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">Update Product</h3>
            </div>
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">
                @if(Session::has('message'))
                {{session('message')}}
                @endif
                </h3>
            </div>

                <div class="col-md-8 col-md-offset-2">


           <form action="{{url('product/'.$pro_details->id)}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}
              

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="product_name" class="form-control form-control-sm" value="{{$pro_details->product_name}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Category Name</label>
                    <div class="col-sm-10">
                       <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                      <?php
                        $all_category = DB::table('categories')
                                            ->where('publication_status',1)
                                            ->get();
                        foreach ($all_category as $category) {             
                       ?>

                       <?php 
                          if ($pro_details->category_id == $category->id) { ?>
                          <option selected="" value="{{$category->id}}">{{$category->category_name}}</option>
                       <?php  } ?>
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      <?php }?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
                    <div class="col-sm-10">
                       <textarea name="product_description" class="form-control ck_editor" id="long_description" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$pro_details->product_description}}</textarea>
                    </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Old price</label>
                    <div class="col-sm-10">
                      <input type="text" name="old_price" class="form-control form-control-sm" value="{{$pro_details->old_price}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">New price</label>
                    <div class="col-sm-10">
                      <input type="text" name="new_price" class="form-control form-control-sm" value="{{$pro_details->new_price}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="product_image" class="form-control form-control-sm">
                      <input type="hidden" name="old_image" class="form-control form-control-sm" value="{{$pro_details->product_image}}">
                    </div>
                    <br>
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                    <div class="col-sm-10">
                      <img width="60px" height="40px" src="{{asset($pro_details->product_image)}}">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Product type</label>
                    <div class="col-sm-10">
                       <select name="product_type" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                          if ($pro_details->product_type == 0) { ?>
                           <option selected="" value="0">General</option>
                       <?php    } else{?>
                           <option selected="" value="1">Featurd</option>
                       <?php } ?>
                      <option value="0">General</option>
                      <option value="1">Featurd</option>
                    </select>
                    </div>
                  </div>
                  <br>

                  <div class="form-group row">
                     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                    <div class="col-sm-10">
                       <input type="Submit" class="btn btn-primary" name="">
                    </div>
                  </div>

         </form>
                 

                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>

    </div>

 @endsection