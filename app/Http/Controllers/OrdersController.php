<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = "Order List";

        // Ambil semua order dengan produk terkait
        $orders = Orders::with('products')->get();

        return response()->json([
            'message' => $message,
            'data' => $orders
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
            // Validasi input tanpa customer_name
        $validator = \Validator::make($request->all(), [
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Jika validasi gagal, kembalikan Bad Request (400)
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            // Membuat order baru tanpa customer_name
            $order = Orders::create();

            // Mengaitkan produk dengan order
            foreach ($request->products as $product) {
                $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
            }

            return response()->json([
                'message' => 'Order created successfully!',
                'data' => $order->load('products')
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500); // Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
        {
            $order = Orders::with('products')->find($id);

        // Jika order tidak ditemukan, kembalikan 404
        if (!$order) {
            return response()->json([
                'message' => 'Order not found',
                'data' => null
            ], 404);
        }

        // Jika order ditemukan, kembalikan datanya beserta produk terkait
        return response()->json([
            'message' => 'Order detail',
            'data' => $order
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            try {
            // Cari order berdasarkan ID
            $order = Orders::find($id);

            if (!$order) {
                return response()->json([
                    'message' => 'Order not found',
                    'data' => null
                ], 404);
            }

            // Debugging: cek jika order ditemukan
            \Log::info('Order found: ', ['id' => $id]);

            // Hapus relasi di tabel pivot
            $order->products()->detach();

            // Hapus order
            $order->delete();

            // Debugging: cek jika penghapusan sukses
            \Log::info('Order deleted successfully: ', ['id' => $id]);

            return response()->json([
                'message' => 'Order deleted successfully!',
                'data' => null
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Error deleting order: ' . $e->getMessage());

            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500); // Internal Server Error
        }
    }
}
