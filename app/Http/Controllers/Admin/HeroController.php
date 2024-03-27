<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HeroDataTable;
use App\Http\Controllers\Controller;

use App\Models\Hero;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HeroController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(HeroDataTable $datatable):View| JsonResponse
    {
        return $datatable->render('admin.hero.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {

        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'background' => ['image','max:10000','required'],
            'title' => ['string','required', 'max:255'],
            'subtitle' => ['string','required']
        ]);

        $background = $this->uploadImage($request, 'background');
        $hero = new Hero();

        $hero->background = $background;
        $hero->title = $request->title;
        $hero->subtitle  = $request->subtitle;
        $hero->status = 0;
        $hero->save();
        toastr()->success('Uploaded Success!');
        return redirect()->back();
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
    public function destroy(string $id):Response
    {
        $hero = Hero::findOrFail($id);
        $this->deleteFile($hero->background);
        $hero->delete();
        return response(['status' => 'success', 'message' =>'deleted successfully!']);
    }
}
