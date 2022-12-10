<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tumbuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreTumbuhanRequest;
use App\Http\Requests\UpdateTumbuhanRequest;

class TumbuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tumbuhans = Tumbuhan::all();
        return view('dashboard.index', [
            'tumbuhans' => $tumbuhans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all(),
        ]);
    }

    
   
    public function store(Request $request, Tumbuhan $tumbuhan)
    {
        $validate = $request->validate(
            [
                'nama' => 'required',
                'nama_ilmiah' => 'required',
                'harga' => 'numeric|required',
                'stok' => 'numeric|required',
                'category_id' => 'required',
                'deskripsi' => 'required',
                'photo' => 'required|file|image|max:2000',
            ]
        );

        if($request->hasFile('photo')){
            if ($request->oldPhoto){
                unlink($request->oldPhoto);
            }
            $validate['photo'] = $request->file('photo');
            $ext = $validate['photo']->getClientOriginalExtension();
            $filename= "tumbuhan-" . time() . "." .$ext;
            request()->photo->move(public_path('storage/'), $filename);
            $validate['photo'] = $filename;

        }

        Tumbuhan::create($validate);
        return redirect()->route('tumbuhans.index')->with('message', "Data $tumbuhan->nama berhasil disimpan");
    }

    public function edit(Tumbuhan $tumbuhan){
       
        $categories = Category::all();
        return view('dashboard.edit',[
            'categories' => $categories,
            'tumbuhan' => $tumbuhan
        ]);
    }


    public function update(Request $request, Tumbuhan $tumbuhan){
        $validate = $request->validate(
            [
                'nama' => 'required',
                'nama_ilmiah' => 'required',
                'harga' => 'numeric|required',
                'stok' => 'numeric|required',
                'category_id' => 'required',
                'deskripsi' => 'required',
            ]
        );

         if ($request->hasfile('photo')) {
            if ($request->oldPhoto){
                unlink($request->oldPhoto);
            }
            $validate['photo'] = $request->file('photo');
            $extension = $validate['photo']->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension;
            request()->photo->move(public_path('storage/'), $filename);
            $validate['photo'] = $filename;  
        }

         Tumbuhan::where('id', $tumbuhan->id)->update($validate);
         return redirect()->route('tumbuhans.index')->with('message', "berhasil diedit");
    }

    public function destroy(Tumbuhan $tumbuhan){
        $image_path ='storage/'.$tumbuhan->photo;
        if (File::exists(public_path( $image_path ))){
            unlink($image_path);
         }
        Tumbuhan::destroy($tumbuhan->id);
        return redirect()->route('tumbuhans.index')->with('message',"Data $tumbuhan->nama berhasil dihapus");

    }

    public function show(Tumbuhan $tumbuhan){
        return view('dashboard.show',[
            'tumbuhan' => $tumbuhan
        ]);
    }
}
