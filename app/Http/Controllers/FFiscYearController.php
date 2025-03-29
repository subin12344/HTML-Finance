<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FFiscYear;
use Yajra\DataTables\DataTables;

class FFiscYearController extends Controller
{
  public function index()
  {
      return view('fiscal-years.index');
  }

  public function getData(Request $request)
  {
      $fiscalYears = FFiscYear::query();
      if ($request->ajax()) {
          return DataTables::of($fiscalYears)
              ->addColumn('action', function($row) {
                  // Add action buttons for Edit and Delete
                  return '<a href="' . route('fiscal-years.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                          <form action="' . route('fiscal-years.destroy', $row->id) . '" method="POST" style="display:inline-block;">
                              ' . csrf_field() . method_field('DELETE') . '
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>';
              })
              ->rawColumns(['action'])
              ->make(true);
      }
  }


    public function create()
    {
        return view('fiscal-years.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Adjust validation rules as needed
            // Add other fields relevant to FFiscYear
        ]);

        FFiscYear::create($validated);
        return redirect()->route('fiscal-years.index')->with('success', 'Fiscal Year created successfully');
    }

    public function show($id)
    {
        $fiscalYear = FFiscYear::find($id);
        if ($fiscalYear) {
            return view('fiscal-years.show', compact('fiscalYear'));
        }
        return redirect()->route('fiscal-years.index')->with('error', 'Fiscal Year not found');
    }

    public function edit($id)
    {
        $fiscalYear = FFiscYear::find($id);
        if ($fiscalYear) {
            return view('fiscal-years.edit', compact('fiscalYear'));
        }
        return redirect()->route('fiscal-years.index')->with('error', 'Fiscal Year not found');
    }

    public function update(Request $request, $id)
    {
        $fiscalYear = FFiscYear::find($id);
        if ($fiscalYear) {
            $validated = $request->validate([
                'name' => 'required|string|max:255', // Adjust validation rules as needed
                // Add other fields
            ]);

            $fiscalYear->update($validated);
            return redirect()->route('fiscal-years.index')->with('success', 'Fiscal Year updated successfully');
        }
        return redirect()->route('fiscal-years.index')->with('error', 'Fiscal Year not found');
    }

    public function destroy($id)
    {
        $fiscalYear = FFiscYear::find($id);
        if ($fiscalYear) {
            $fiscalYear->delete();
            return redirect()->route('fiscal-years.index')->with('success', 'Fiscal Year deleted successfully');
        }
        return redirect()->route('fiscal-years.index')->with('error', 'Fiscal Year not found');
    }
}
