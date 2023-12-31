<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::User()){
            $user = Auth::user();
            if($user->hasRole('Admin')){
                return redirect('/admin');
            } elseif ($user->hasRole('Vendor')){
                return redirect('/admin');
            } elseif ($user->hasRole('User')){
                return $this->CategorizedProduct();
            }
        }else {
            return $this->CategorizedProduct();
        }
    }

    protected function CategorizedProduct(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View
    {
        if (request()->category) {
            $category_name = request()->category;
            $category_id = Category::query()->where('categoryName', '=', [$category_name])->get()->pluck('id');
            $products = Product::query()->where('category_id', '=', [$category_id])->get();
            view::share('CategorizedProducts', $products);
            return view('dashboard'/*, ['CategorizedProducts' => $products, 'CategoryName' => $category_name]*/ );
        }
        return view('dashboard');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
