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
                    <td style="padding:20px">{{  $products->prices}}</td>
                    <td style="padding:20px"><video height="100" width="100" controls >
        <source src="/productvideo/{{ $products->video }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
                    </td>
                        <td style="padding:20px"><a class="btn btn-primary" href="{{  url('updatevideohomepage',$products->id) }}">Update</td>
                          <td style="padding:20px"><a class="btn btn-danger" href="{{ url('deletevideo',$products->id) }}">Delete</td>
                </tr>
                @endforeach
            </table>
        </div></div>
       @include('admin.js')
  </body>
</html> 