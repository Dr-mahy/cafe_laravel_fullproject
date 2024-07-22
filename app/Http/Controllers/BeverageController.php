<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\Common;
use App\Models\Beverage;
use App\Models\Category;
use App\Models\Specialitem;
use App\Models\Contact;

class BeverageController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $beverages=Beverage::get();
        return view('beverages',compact('beverages','allmessages','unreadmessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $data=Category::select('id','category')->get();
        return view('addbeverage',compact('data','allmessages','unreadmessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|max:100',
            'content'=>'required',
            'price' => 'required',
            'img' => 'required|image',
            'category_id' => 'required',
          
           ]);
           $data['published']=isset($request->published);
           $data['special']=isset($request->special);
           $file_name = $this->uploadFile($request->img, 'assets/images');
           $data['img']= $file_name;
           $beverage=Beverage::create($data);

        //    add beverage to specialitems table if marked as special
        if($beverage->special){
            Specialitem::create([
                'title'=>$beverage->title,
                'content'=>$beverage->content,
                'img'=>$beverage->img,
                'beverage_id'=>$beverage->id,
            ]);
        }
           return redirect('admin/beverages')->with('success','beverage inserted successfully');
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
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $data=Category::select('id','category')->get();
        $beverage=Beverage::FindOrFail($id);
        return view('editbeverage',compact('beverage','data','unreadmessages','almessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id , Beverage $beverage)
    {
        // $beverage=Beverage::findOrFail($request->id);
        $beverage=Beverage::findOrFail($id);
        
        $data=$request->validate([
            'title'=>'required|max:100',
            'content'=>'required',
            'price' => 'required',
            'img' => 'nullable|image',
            'category_id' => 'required',
          
           ]);
           $data['published']=isset($request->published);
           $data['special']=isset($request->special);

           if($request['img'] !=""){
            File::delete(public_path('assets/images/'.$beverage->img));
           }
           if($request->hasfile('img')){
           $file_name = $this->uploadFile($request->img, 'assets/images');
           $data['img']= $file_name;
           }else{
            $data['img']=$beverage->img;
           }
        // $beverage=Beverage::where('id',$id)->update($data);
        $beverage->update($data);
        //    logic update special item with beverage
        if($beverage->special){
            $specialitem=$beverage->specialitem;
            if(!$specialitem){
                Specialitem::create([
                    'title'=>$beverage->title,
                    'content'=>$beverage->content,
                    'img'=>$beverage->img,
                    'beverage_id'=>$beverage->id
                ]);
            }else{
                $specialitem->update([
                    'title'=>$beverage->title,
                    'content'=>$beverage->content,
                    'img'=>$beverage->img,
                ]);
            }
        }else{
            $beverage->specialitem()->delete();
        }
           return redirect('admin/beverages')->with('success','beverage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Beverage::where('id',$id)->delete();
        return redirect('admin/beverages')->with('success','beverage deleted successfully');
    }
    // public function forcedelete(Request $request)
    // {
    //    $id=$request->id;
    //    Beverage::where('id',$id)->forcedelete();
    //     return redirect('admin/beverages')->with('success','beverage deleted successfully');
    // }
}
