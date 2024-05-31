<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Pengaduan; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;


//import Facades Storage
use Illuminate\Support\Facades\Storage;


class PengaduanController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all pengaduans
        $pengaduans = Pengaduan::latest()->paginate(10);

        //render view with pengaduans
        return view('pengaduans.index', compact('pengaduans'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('pengaduans.create');
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
            'nama'          => 'required',
            'pengaduan'     => 'required',
            'foto'          => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status'        => 'required|in:diproses,menunggu,selesai',
            'created_at'    => ['required', 'regex:/^\d{4}-\d{2}-\d{2}$/'],
            'updated_at'    => ['required', 'regex:/^\d{4}-\d{2}-\d{2}$/'],
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/pengaduan', $foto->hashName());

        //create product
        Pengaduan::create([
            
            'NIM'          => $request->NIM,
            'nama'         => $request->nama,
            'pengaduan'    => $request->pengaduan,
            'foto'         => $foto->hashName(),
            'status'        => $request->status,
            'created_at'    => $request->created_at,
            'updated_at'     => $request->updated_at,
        ]);

        //redirect to index
        return redirect()->route('pengaduans.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $pengaduan = Pengaduan::findOrFail($id);

        //render view with product
        return view('pengaduans.show', compact('pengaduan'));
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
        $pengaduan = Pengaduan::findOrFail($id);

        //render view with kritiksaran
        return view('pengaduans.edit', compact('pengaduan'));
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
            'nama'          => 'required',
            'pengaduan'     => 'required',
            'foto'          => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status'        => 'required|in:diproses,menunggu,selesai',
            'created_at'    => ['required', 'regex:/^\d{4}-\d{2}-\d{2}$/'],
            'updated_at'    => ['required', 'regex:/^\d{4}-\d{2}-\d{2}$/'],
        ]);
    
        //get kritiksaran by ID
        $pengaduan = Pengaduan::findOrFail($id);
    
                //check if image is uploaded
                if ($request->hasFile('foto')) {

                    //upload new image
                    $foto = $request->file('foto');
                    $foto->storeAs('public/pengaduans', $foto->hashName());
        
                    //delete old image
                    Storage::delete('public/pengaduans/'.$pengaduan->foto);
        //update kritiksaran with new data
        $pengaduan->update([
            'NIM'          => $request->NIM,
            'nama'         => $request->nama,
            'pengaduan'    => $request->pengaduan,
            'foto'         => $foto->hashName(),
            'status'        => $request->status,
            'created_at'    => $request->created_at,
            'updated_at'     => $request->updated_at,
        ]);
    
        //redirect to index
        return redirect()->route('pengaduans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
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
        $pengaduan = Pengaduan::findOrFail($id);


        //delete product
        $pengaduan->delete();

        //redirect to index
        return redirect()->route('pengaduans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

