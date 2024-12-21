<!DOCTYPE html>
<html lang="en">
  <head>
    <base   href="/public">
    <style type="text/css">
        .toto{
         color:black
        }
     .title{
         
         padding-top: 25px;font-size: 25px;
         font-size:25px;
         
     
     }
     label{
         display: inline-block;
         width: 200px;
         color: rgb(238, 238, 238)
         
     }
     </style>
   @include('admin.css')
  </head>
  <body>
   @include('admin.siderbar')
      <!-- partial -->
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        <div class="container" align ="center">
        <h1 class="title">Update Image</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message')}} </div>@endif
        <form action="{{ url('updateviewvideoproducts',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div style="pandding:15px   "> 
            <label>title</label>
            <input class="toto" type="text" name="title" value="{{ $data->title }}" style=";">
        </div>
        
        <div style="pandding:15px;"> 
            <label>description</label>
            <input type="text" name="description" value="{{ $data->description }}">
        </div>
        
        <div style="pandding:15px;"> 
            <label>OLD Video</label>
            <video height="100" width="100" controls >
        <source src="/productvideo/{{ $data->video }}" type="video/mp4">
        Your browser does not support the video tag.
    </video> 
        </div>
        <div style="pandding:15px;"> 
            <label >change Video</label>
            <input type="file" name="file"  placeholder="add p"></div>
            
            <div style="pandding:15px;"> 
                <input class="btn btn-success" type="submit" ></div>
            </form>
        </div></div></div> 
        <!-- partial -->
      
          <!-- partial -->
       @include('admin.js')
  </body>
</html>