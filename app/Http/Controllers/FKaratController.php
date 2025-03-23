<?php
namespace App\Http\Controllers;

use App\Models\FKarat;
use Illuminate\Http\Request;

class FKaratController extends Controller
{
    public function create(Request $request)
    {
        $customer = FKarat::create($request->all());
        return response()->json($customer, 201);
    }

    public function index()
    {
        $customers = FKarat::all();
        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = FKarat::find($id);
        if ($customer) {
            return response()->json($customer);
        }
        return response()->json(['message' => 'Customer not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $customer = FKarat::find($id);
        if ($customer) {
            $customer->update($request->all());
            return response()->json($customer);
        }
        return response()->json(['message' => 'Customer not found'], 404);
    }

    public function destroy($id)
    {
        $customer = FKarat::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json(['message' => 'Customer deleted']);
        }
        return response()->json(['message' => 'Customer not found'], 404);
    }
}
