<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // __to share dynamic title__
        Parent::__construct();
        $this->setTitle('categories');
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $categories=Category::get();
        return view('categories',compact('categories','allmessages','unreadmessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Parent::__construct();
        $this->setTitle('addcategory');
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        return view('addcategories',compact('allmessages','unreadmessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'category'=>'required|max:50',
           ]);
           Category::create($data);
           return redirect('admin/categories');
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
        Parent::__construct();
        $this->setTitle('edit category');
        $category=Category::FindOrFail($id);
        return view('editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'category'=>'required|max:50',
           ]);
           Category::where('id',$id)->update($data);
           return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       $category=Category::find($request->id);
            if(!$category){
                return redirect('admin/categories')->with('error','category notfound');
            }
       if($category->beverages()->count() > 0){
        return redirect('admin/categories')->with('error','category can not be deleted because it has beverages');
       }
        $category->delete();
        return redirect('admin/categories')->with('success','category deleted successfully');
    }
}
