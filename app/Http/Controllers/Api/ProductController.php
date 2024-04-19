<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::paginate(10);

        return response()->json([
            'products' => $products
        ], 200);
    }

    //
    public function store(ProductStoreRequest $request)
    {
        try {
            $name = $request->name;
            $price = $request->price;
            $imageName = Str::random(32). "." . $request->image->getClientOriginalExtension();

            Storage::disk('public')->put($imageName, file_get_contents($request->image));

            Product::create([
                'name' => $name,
                'price' => $price,
                'image' => $imageName,
            ]);

            return response()->json([
                'results' => "Product successfully created. '$name'"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => "Product Not Found."
            ], 404);
        }

        return response()->json([
            'product' => $product
        ], 200);
    }

    public function update(ProductStoreRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'message' => "Product Not Found."
                ], 404);
            }

            $product->name = $request->name;
            $product->price = $request->price;

            if ($request->image) {
                $storage = Storage::disk('public');

                if ($storage->exists($product->image)) {
                    $storage->delete($product->image);
                }

                $imageName = Str::random(32). "." . $request->image->getClientOriginalExtension();
                $product->image = $imageName;

                $storage->put($imageName, file_get_contents($request->image));
            }

            $product->save();

        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => "Product Not Found."
            ], 404);
        }

        $storage = Storage::disk('public');

        if ($storage->exists($product->image)) {
            $storage->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'message' => "Product successfully deleted."
        ], 200);
    }
}
