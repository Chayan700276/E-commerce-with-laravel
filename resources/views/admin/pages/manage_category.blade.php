@extend('admin_master')
@section('admin_main_content')

      <div class="row">
	  <div>
                <h2 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">View Category</h2>
            </div>
        <div class="col-md-10 col-md-offset-1">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-border">
                <tr>
                  <th style="width: 10px">SL.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th colspan="5" ">Action</th>
                </tr>
                   @foreach($all_category as $v_category)
                    <tr>
                    <td>{{$v_category->id}}</td>
                    <td>{{$v_category->category_name}}</td>
                    @if($v_category->publication_status == 1)
                    <td>Publish</td>
                    @else
                    <td style="color:red">Unpublish</td>
                    @endif
                    <td>
                        @if($v_category->publication_status == 1)
                        <form class="ff"><a  class=" btn btn-primary"  href="{{URL::to('unpublish-category/'.$v_category->id)}}">Unpublished</a></form>
                        @else
                       <form class="ff"> <a  class=" btn btn-primary"  href="{{URL::to('/publish-category/'.$v_category->id)}}">Published</a></form>
                        @endif
                      <form class="ff"> <a  class=" btn btn-default" href="{{URL::to('category/'.$v_category->id.'/edit')}}">Edit</a> </form>

                        <form class="ff" action="{{url('category/'.$v_category->id)}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                           <input onclick="return check_delete()" class="btn btn-danger" type="submit" value="Delete" >
                        </form>

                       
                    </td>
                    
                    </tr>
                   @endforeach
               
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <style type="text/css">
  .ff{float: left;}
</style>
@endsection

