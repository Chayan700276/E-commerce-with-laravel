@extend('admin_master')

@section('admin_main_content')
    <!-- Content Header (Page header) -->
    <div class="box-body">

        <div class="row">
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;"> Product Details</h3>
            </div>
            <div>
            </div>

                <div class="col-md-8 col-md-offset-2">

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" disabled="" value="{{$product->product_name}}" name="product_name" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Category Name</label>
                    <div class="col-sm-10">
                      
                       <input type="text" class="form-control form-control-sm" disabled="" value="{{$product->category_id}}"> 

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
                    <div class="col-sm-10">
                       <textarea name="product_description" class="form-control ck_editor" id="long_description" disabled="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->product_name}}</textarea>
                    </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Old price</label>
                    <div class="col-sm-10">
                      <input type="text" disabled="" name="old_price" value="{{$product->old_price}}" class="form-control form-control-sm">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">New price</label>
                    <div class="col-sm-10">
                      <input type="text" disabled="" name="new_price" value="{{$product->new_price}}"  class="form-control form-control-sm">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
                    <div class="col-sm-10">
                      <img width="60px" height="40px" src="{{asset($product->product_image)}}">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Product type</label>
                    <div class="col-sm-10">
   
                        <?php 
                            if ($product->product_type == 0) { ?>
                            <input type="text" disabled="" name="new_price" value="General"  class="form-control form-control-sm">
                         <?php    } else {?>
                             <input type="text" disabled="" name="new_price" value="Featured"  class="form-control form-control-sm">
                            <?php } ?>
                    </div>
                  </div>
                  <br>

                  <div class="form-group row">
                     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                    <div class="col-sm-10">
                       <a href="{{url('product')}}" class="btn btn-primary" >Back</a>
                    </div>
                  </div>
                 
    </div>

 @endsection