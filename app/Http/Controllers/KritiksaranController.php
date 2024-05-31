<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Kritiksaran; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;


//import Facades Storage
use Illuminate\Support\Facades\Storage;


class KritiksaranController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all kritiksarans
        $kritiksarans = Kritiksaran::latest()->paginate(10);

        //render view with kritiksarans
        return view('kritiksarans.index', compact('kritiksarans'));
    }

     /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('kritiksarans.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'NIM'           => 'required|min:9',
            'nama'          => 'required|min:3',
            'kritiksaran'   => 'required',
            
        ]);

       

        //create kritiksaran
        Kritiksaran::create([
            
            'NIM'           => $request->NIM,
            'nama'          => $request->nama,
            'kritiksaran'   => $request->kritiksaran,
           
        ]);

        //redirect to index
        return redirect()->route('kritiksarans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $kritiksaran = Kritiksaran::findOrFail($id);

        //render view with product
        return view('kritiksarans.show', compact('kritiksaran'));
    }

    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $kritiksaran = Kritiksaran::findOrFail($id);

        //render view with kritiksaran
        return view('kritiksarans.edit', compact('kritiksaran'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'NIM'           => 'required|min:9',
            'nama'          => 'required|min:3',
            'kritiksaran'   => 'required',
        ]);
    
        //get kritiksaran by ID
        $kritiksaran = Kritiksaran::findOrFail($id);
    
        //update kritiksaran with new data
        $kritiksaran->update([
            'NIM'           => $request->NIM,
            'nama'          => $request->nama,
            'kritiksaran'   => $request->kritiksaran,
        ]);
    
        //redirect to index
        return redirect()->route('kritiksarans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

     /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $kritiksaran = Kritiksaran::findOrFail($id);


        //delete product
        $kritiksaran->delete();

        //redirect to index
        return redirect()->route('kritiksarans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}