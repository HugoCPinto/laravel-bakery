<?php

namespace App\Http\Controllers;

use App\Models\SnackProduct;
use Illuminate\Http\Request;

class SnackProductController extends Controller
{
    public function index() {
        $snackProducts = SnackProduct::all();
        return view('snack_products.index', compact('snackProducts'));
    }

    public function create() {
        return view('snack_products.create');
    }

    public function store(Request $request) {

        $data = $request->except('_token');

        SnackProduct::create($data);

        return redirect()->route('snack_products.index');
    }

    public function destroy($id){
        $snackProduct = SnackProduct::findOrFail($id);
        $snackProduct->delete();

        return redirect()->route('snack_products.index')->with('success', 'Snack Product deleted successfully');
    }
}
