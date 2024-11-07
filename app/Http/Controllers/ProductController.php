<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = product::all();
        return view('products.index',['products'=>$products]);
        }
        public function destroy($id){   
            $product = Product::find($id);
            $product ->delete();
            return redirect( route('product.index'))->with ( 'success', 'Product Delete successfully' );
            
            }
        
        
        public function create(){
            return view('products.create');
            }
            public function edit($id)
            {
                $product = Product::findOrFail($id);
                return view('products.edit', compact('product'));
            }
            public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $data = $request->validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|decimal:0,2',
        'description' => 'nullable',
    ]); 
    $product->update($data); 

    return redirect(route('product.index'))->with('success', 'Product updated successfully');
}

            public function store(Request $request){
                $data = $request->validate([
                    'name' => 'required',
                    'qty' => 'required|numeric',
                    'price' => 'required|decimal:0,2',
                    'description' => 'nullable',
                ]);
                $newproduct = product::create($data);
                return redirect(route('product.index'));
                Product::create($validateddata);
            }
                }

