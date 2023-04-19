<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function token(){
        $token = \csrf_token();
        return Response::json([
            "token" => $token
        ]);
    }

    public function index(){
        $products = DB::table("products")
                ->orderBy("name", "asc")
                ->get();

        return Response::json([
            "products" => $products
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => "required|max:255|string",
            "category" => "required|max:255|string",
            "price" => "required|numeric",
            "discount" => "required|numeric",
            "image" => "required|url",
            "url" => "required|url"
        ]);

        if($validator->fails()){
            return Response::json([
                "errors" => $validator->errors()
            ], 400);
        }

        $validated = $validator->validated();

        $product = new Product;
        $product->name = $validated["name"];
        $product->category = $validated["category"];
        $product->price = $validated["price"];
        $product->discount = $validated["discount"];
        $product->image = $validated["image"];
        $product->url = $validated["url"];
        $save = $product->save();
        if($save){
            return Response::json([
                "product" => "The product has inserted successfully."
            ]);
        }
    }

    public function show($id){
        $products = DB::table("products")
                ->where("id", $id)
                ->get();

        if(count($products) == 0){
            return Response::json([
                "errors" => "The product not found."
            ], 404);
        }

        return Response::json([
            "products" => $products
        ]);
    }
    
    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            "price" => "required|numeric",
            "discount" => "required|numeric"
        ]);

        if($validator->fails()){
            return Response::json([
                "errors" => $validator->errors()
            ], 400);
        }

        $validated = $validator->validated();

        $product = Product::find($id);

        if(!$product){
            return Response::json([
                "errors" => "The product not found."
            ], 404);
        }

        $product->update([
            "price" => $validated["price"],
            "discount" => $validated["discount"]
        ]);
        $save = $product->save();
        if($save){
            return Response::json([
                "product" => "The product has updated successfully."
            ]);
        }   
    }

    public function destroy($id){
        $product = Product::find($id);

        if(!$product){
            return Response::json([
                "errors" => "The product not found."
            ], 404);
        }

        $save = $product->delete();
        if($save){
            return Response::json([
                "product" => "The product has deleted successfully."
            ]);
        }   
    }
}