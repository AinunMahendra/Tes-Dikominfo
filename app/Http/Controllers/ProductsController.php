<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Set message
        $message = "Product List";

        // Ambil semua data produk dari database
        $products = Products::all();

        // Return data dalam format JSON dengan message dan data
        return response()->json([
            'message' => $message,    // Pesan yang ingin ditampilkan
            'data' => $products       // Data produk dari database
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('Reached the store method');
        $rules = [
            'name'=>'required|unique:Products,name',
            'price' => 'required|integer|min:1', // Wajib, integer, minimal 1
            'stock' => 'required|integer|min:0', // Wajib, integer, minimal 0
        ];

        $data = $request->validate($rules);
        Products::create($data);

        return response()->json([
        'message' => 'Product created successfully!',
        'data' => $data
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Temukan produk berdasarkan ID
        $product = Products::find($id);

        if ($product) {
            // Jika produk ditemukan, kembalikan datanya
            return response()->json([
                'message' => 'product detail',
                'data' => $product
            ]);
        } else {
            // Jika produk tidak ditemukan, kembalikan pesan kesalahan
            return response()->json([
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan produk berdasarkan ID
        $product = Products::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        // Validasi data yang masuk
        $rules = [
            'name' => 'required|unique:products,name,' . $id, // Menghindari konflik dengan produk yang sama
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
        ];

        $data = $request->validate($rules);

        // Update data produk menggunakan metode instance
        $product->update($data);

        return response()->json([
            'message' => 'Product updated successfully!',
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            // Temukan produk berdasarkan ID
        $product = Products::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        // Hapus produk
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully!',
            'data' => null
        ], 204); // Mengembalikan status 204 No Content
    }
}
