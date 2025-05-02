<?php

namespace App\Http\Controllers;

use App\Models\Trend;
use Illuminate\Http\Request;

class TrendController extends Controller
{
    public function index() {
        $trends = Trend::all();
        return view('trends.index', compact('trends'));
    }

    public function create() {
        return view('trends.create');
    }

    public function store(Request $request) {
        $data = $request->except('_token');

        Trend::create($data);

        return redirect()->route('trends.index');
    }

    public function destroy($id)
    {
        $trend = Trend::findOrFail($id);
        $trend->delete();

        return redirect()->route('trends.index')->with('success', 'Trend deleted successfully');
    }
}
