<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest as AdminCategoryRequest;

use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function Termwind\render;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $datatable):View | JsonResponse
    {
        return $datatable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create():View
    // {
    //     return view('admin.category.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
        public function store(AdminCategoryRequest $request):RedirectResponse
        {



            $category = new Category();

            $category->title = $request->title;
            $category->status = $request->status;
            $category->save();

            return redirect()->back()->with(['success' => 'Category created successfully!']);

        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response(['status' => 'success', 'message' =>'Item deleted successfully!']);
    }
}
