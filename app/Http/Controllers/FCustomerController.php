<?php


namespace App\Http\Controllers;

use App\Models\FCustomer;
use Illuminate\Http\Request;

class FCustomerController extends Controller
{
    public function create(Request $request)
    {
        $customer = FCustomer::create($request->all());
        return response()->json($customer, 201);
    }

    public function index()
    {
        $customers = FCustomer::all();
        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = FCustomer::find($id);
        if ($customer) {
            return response()->json($customer);
        }
        return response()->json(['message' => 'Customer not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $customer = FCustomer::find($id);
        if ($customer) {
            $customer->update($request->all());
            return response()->json($customer);
        }
        return response()->json(['message' => 'Customer not found'], 404);
    }

    public function destroy($id)
    {
        $customer = FCustomer::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json(['message' => 'Customer deleted']);
        }
        return response()->json(['message' => 'Customer not found'], 404);
    }
}
