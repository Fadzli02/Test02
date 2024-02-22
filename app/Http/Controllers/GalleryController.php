<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'My Profile';
        $user = User::where('id_user', auth()->id())->first();
        $foto = Gallery::where('id_user', auth()->id())->get();

        return view('user.gallery.index', compact('title', 'user', 'foto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create new post';
        
        return view('user.gallery.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        $foto = request()->file('foto');
        $data = [
            'judul_foto' => request('title'),
            'deskripsi_foto' => request('deskripsi'),
            'path_foto' => $foto->store(auth()->id()),
            'id_user' => auth()->id()
        ];
        
        Gallery::create($data);

        session()->flash('berhasil', 'Succesfully uploaded photo');
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $id_foto)
    {
        $title = 'Detail photo';
        $foto = $id_foto;

        return view('user.gallery.detail', compact('title', 'foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $id_foto)
    {
        $foto = $id_foto;
        $title = 'Edit Photo';

        return view('user.gallery.edit', compact('foto', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $id_foto)
    {
        $data = [
            'judul_foto' => request('title'),
            'deskripsi_foto' => request('deskripsi'),
        ];

        $id_foto->update($data);

        session()->flash('berhasil', 'Succesfull updated photo');
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $id_foto)
    {
        Storage::delete($id_foto->path_foto);
        $id_foto->destroy($id_foto->id_foto);

        session()->flash('berhasil', 'Succesfull deleted photo');
        return redirect('/profile');
    }
}
