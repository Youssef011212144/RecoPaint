<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeVideo;
use App\Models\Video;
use App\Models\Products;

class AdminController extends Controller
{
    public function product(){
        return view('admin.product');
    } 
    public function AddImgHomePage(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure the file is an image
        ],
        [
            'file.required' => 'Please upload an image of the product.', // Custom message for file field
            'file.image' => 'The file must be a valid image (jpeg, png, jpg, gif, svg).',
            'file.mimes' => 'Only jpeg, png, jpg, gif, and svg formats are allowed.',
            'file.max' => 'Image size should not exceed 2MB.',
        ]);
        $data=new HomeVideo ;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->img=$imagename; 
        $data->title=$request->title;
        $data->rgb=$request->rgb;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('message','Product Add');
        }
        public function AddVideo(Request $request){
            $data=new Video ;
            $video=$request->file;
            $imagename=time().'.'.$video->getClientOriginalExtension();
            $request->file->move('productvideo',$imagename);
            $data->video=$imagename; 
            $data->title=$request->title;
            $data->description=$request->description;
            $data->save();
            return redirect()->back()->with('message','video Add');
            }
            public function AddProductsHomePage(Request $request){
                $data=new Products;
                $image=$request->file;
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->file->move('producforselltimage',$imagename);
                $data->img=$imagename; 
                $data->title=$request->title;
                $data->rgb=$request->rgb;
                $data->relation=$request->relation;
                $data->description=$request->description;
                $data->save();
                return redirect()->back()->with('message','Product for sell Add succesfuly');
                }
        public function ViewAdmin(){
            return view('admin.home');
        }
        public function ShowVideoAdmin(){
            return view('admin.addVideo');
        }
        public function ShowAddProductsAdmin(){
            return view('admin.addProductsSell');
        }
        public function deleteproduct($id){
            $data=HomeVideo::find($id);
            $data->delete();
            return redirect()->back()->with('message','product '.$id.' is'.' deleted');
            }
            public function deleteproductforsell($id){
                $data=Products::find($id);
                $data->delete();
                return redirect()->back()->with('message','product '.$id.' is'.' deleted');
                }
                public function deletevideos($id){
                    $data=Video::find($id);
                    $data->delete();
                    return redirect()->back()->with('message','Video'.$id.' is'.' deleted');
                    }
            public function showAllImages(){
                $data=HomeVideo::all();
                return view('admin.showAllImgesUpdates',compact('data'));
            } 
            public function showAllVideo(){
                $data=Video::all();
                return view('admin.showAllVideosUpdates',compact('data'));
            } 
            public function showAllProductes(){
                $data=Products::all();
                return view('admin.showAllProductsUpdates',compact('data'));
            } 
            public function updateimagehomepage($id){
                $data=HomeVideo::find($id);
                return view('admin.updateimages',compact('data'));
                
            }
            public function updatevideohomepage($id){
                $data=Video::find($id);
                return view('admin.updatevideo',compact('data'));
                
            }
            public function updateproductshomepage($id){
                $data=Products::find($id);
                return view('admin.updateproducts',compact('data'));
                
            }
            public function updateviewimagehome(Request $request,$id){
                $data=HomeVideo::find($id) ;
                $image=$request->file;
                if($image){
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->file->move('productimage',$imagename);
                $data->img=$imagename; }
                $data->title=$request->title;  
                $data->description=$request->description;
                $data->save();
                return redirect()->back()->with('message','image '.$id.' is'.' updated');
            }
            public function updateviewvideohome(Request $request,$id){
                $data=Video::find($id) ;
                $video=$request->file;
                if($video){
                $imagename=time().'.'.$video->getClientOriginalExtension();
                $request->file->move('productvideo',$imagename);
                $data->video=$imagename; }
                $data->title=$request->title;  
                $data->description=$request->description;
                $data->save();
                return redirect()->back()->with('message','video '.$id.' is'.' updated');
            }
            public function updateviewvideoproducts(Request $request,$id){
                $data=Products::find($id) ;
                $image=$request->file;
                if($image){
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->file->move('producforselltimage',$imagename);
                $data->img=$imagename; }
                $data->title=$request->title;  
                $data->description=$request->description;
                $data->price=$request->price;
                $data->save();
                return redirect()->back()->with('message','product '.$id.' is'.' updated');
            }
           
}
