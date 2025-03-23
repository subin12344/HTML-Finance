<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FFiscYear;

class FFiscYearController extends Controller
{
  public function create(Request $request)
  {
      $customer = FFiscYear::create($request->all());
      return response()->json($customer, 201);
  }

  public function index()
  {
      $customers = FFiscYear::all();
      return response()->json($customers);
  }

  public function show($id)
  {
      $customer = FFiscYear::find($id);
      if ($customer) {
          return response()->json($customer);
      }
      return response()->json(['message' => 'Customer not found'], 404);
  }

  public function update(Request $request, $id)
  {
      $customer = FFiscYear::find($id);
      if ($customer) {
          $customer->update($request->all());
          return response()->json($customer);
      }
      return response()->json(['message' => 'Customer not found'], 404);
  }

  public function destroy($id)
  {
      $customer = FFiscYear::find($id);
      if ($customer) {
          $customer->delete();
          return response()->json(['message' => 'Customer deleted']);
      }
      return response()->json(['message' => 'Customer not found'], 404);
  }
}
