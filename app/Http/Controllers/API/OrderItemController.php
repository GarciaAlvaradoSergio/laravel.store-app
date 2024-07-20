<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItem = OrderItem::all();
        return response()->json($orderItem);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());

        return response()->json($orderItem, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderItem = OrderItem::find($id);
        if ($orderItem) {
            return response()->json($orderItem);
        } else {
            return response()->json(['message' => 'Order item not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderItem = OrderItem::find($id);
        if ($orderItem) {
            $orderItem->update($request->all());
            return response()->json($orderItem);
        } else {
            return response()->json(['message' => 'Order item not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderItem = OrderItem::find($id);
        if ($orderItem) {
            $orderItem->delete();
            return response()->json(['message' => 'Order item deleted']);
        } else {
            return response()->json(['message' => 'Order item not found'], 404);
        }
    }
}
