<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
   @include('admin.siderbar')
      <!-- partial -->
      @include('admin.navbar')-->
        <!-- partial -->
     <div class="container-fluid page-body-wrapper">

        <div class="container" align="center">
             
        @if(session()->has('message'))
        <div class="alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
      </div>
      @endif
            <table>
                <tr>
                    <td style="padding:20px">title</td>
                    <td style="padding:20px">description</td>
                    <td style="padding:20px">Price</td>
                    <td style="padding:20px">img</td>
                    <td style="padding:20px">update</td>
                    <td style="padding:20px">delete</td>
                </tr>
                @foreach ($data = $data->reverse() as $products)
                    
          
                <tr style="background-color:#434a5488;align-item=center">
                    <td style="padding:20px">{{  $products->title}}</td>
                    <td style="padding:20px">{{  $products->description}}</td>
                    <td style="padding:20px">{{  $products->price}}</td>
                    <td style="padding:20px"><img src="producforselltimage/{{$products->img}}" 
                        height="100px" width="100px"> </td>
                        <td style="padding:20px"><a class="btn btn-primary" href="{{  url('updateproductshomepage',$products->id) }}">Update</td>
                          <td style="padding:20px"><a class="btn btn-danger" href="{{ url('deleteproductforsell',$products->id) }}">Delete</td>


                </tr>
                @endforeach
            </table>
        </div></div>
          <!-- partial -->
       @include('admin.js')
  </body>
</html> 