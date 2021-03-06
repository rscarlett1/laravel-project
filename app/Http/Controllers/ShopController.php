<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Products;
use Intervention\Image\ImageManager

class ShopController extends Controller
{
   public function index(){
   		return view('shop.index');
   }

   public function add(){
   		return view('shop.add');
   }

   public function submit(Request $request){
   		$this->validate($request, [
   			'product_title'=>'required|min:1|max:255',
   			'product_description'=>'required|min:10',
            'product_image'=>'required|image',
            'product_price'=>'required|numeric',
            'product_quantity'=>'required|numeric',
   ]);

         $newProduct = new Products();
         $newProduct->title = $request->product_title;
         $newProduct->description =$request->desceiption;
         $newProduct->price = $request->product_price;
         $newProduct->quantity = $request->product_quantity;

         // $newProduct->save();
         return redirect('/Shop');

         $manager = new ImageManager();

         $folder="./images/Products";
         $imagename = preg_replace("/[^0-9a-zA-Z]/", "", $request->title);

         $productImage = $manager->make($request->product_image);
         $productImage->fit(462, 462, function ($constraint)){
            $constraint->upsize();
         });
         $productImage->save($folder.'/'.$imagename.'jpg, 100');

         //$newProducts->save();

         return redirect('/Shop');
   


   }
}
