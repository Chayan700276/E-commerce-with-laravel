@extend('admin_master')
@section('admin_main_content')

 <table class="table">
  <caption>List of Product</caption>
  <p style="color:green;font-size: 20px;">
        @if(session::has('message'))
        {{session('message')}}
        @endif
  </p>

  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Product Name</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Old price</th>
      <th scope="col">New price</th>
      <th scope="col">Image</th>
      <th colspan="3" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i =1;
       foreach ($all_product as $product) {        
    ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$product->product_name}}</td>

      <?php if(!empty($product->category->category_name)){ ?>
      <td>{{$product->category->category_name}}</td> <!--   here category is method name which is in product model     -->
      <?php }else{echo "<td></td>";}?>

      <td><?php echo substr( $product->product_description, 0,30)?>...</td>
      <td>{{$product->old_price}}</td>
      <td>{{$product->new_price}}</td>
      <td><img width="60px" height="40px" src="{{asset($product->product_image)}}"></td>
      <td>
        <form class="ff" action="{{url('product/'.$product->id)}}" method="GET">
          {{csrf_field()}}
          <!-- {{method_field('GET')}} -->
           <input type="submit" class="btn btn-primary" value="Show">

        </form>
        <form class="ff" action="{{url('product/'.$product->id.'/edit')}}" method="GET">
          {{csrf_field()}}
          <input type="submit" class="btn btn-default" value="Edit">
        </form>
        <form class="ff" action="{{url('product/'.$product->id)}}" method="post" >
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input onclick="return check_delete()" type="submit" class="btn btn-danger" value="Delete">
        </form>
      </td>
    </tr>
    <?php 
    $i++;
  } ?>
  </tbody>
</table>
<style type="text/css">
  .ff{float: left;}
</style>
@endsection