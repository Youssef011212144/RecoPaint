<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style type="text/css">
   .toto{
    color:black
    font-color:black
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
  </head>
  <body>
   @include('admin.siderbar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align ="center">
        <h1 class="title">Add Product</h1>
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        @if(session()->has('message'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message')}} </div>@endif
        <form action="{{ url('AddImg') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div style="pandding:15px   "> 
            <label>title</label>
            <input class="toto" type="text" name="title" placeholder="Give a product title " style=";">
        </div>
        <div style="pandding:15px;"> 
            <label>price</label>
            <input type="text" name="price" placeholder="Give a price ">
        </div>
        <div style="pandding:15px;"> 
            <label>description</label>
            <input type="text" name="description" placeholder="Give A desc ">
        </div>
        <div style="pandding:15px;"> 
            <input type="file" name="file"  placeholder="add p"></div>
            
            <div style="pandding:15px;"> 
                <input class="btn btn-success" type="submit" ></div>
            </form>
        </div></div></div> 
          <!-- partial -->
          
       @include('admin.js')
  </body>
</html>