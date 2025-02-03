<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socialmedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socials = Socialmedia::all();
        return view('admin.social-media.index', compact('socials'));
    }

    public function edit($id)
    {
        $social = Socialmedia::find($id);
        return view('admin.social-media.edit',compact('social'));
    }
    public function create()
    {
        return view('admin.social-media.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'link' => 'required',
        ]);
        $socials = new Socialmedia;
        $socials->icon = $request->icon;
        $socials->link = $request->link;
        $socials->save();

        return redirect('admin/social')->with('success', 'tambah social-media berhasil');
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'icon' => 'required',
            'link' => 'required',
        ]);
        $socials = Socialmedia::find($id);
        $socials->icon = $request->icon;
        $socials->link = $request->link;
        $socials->save();

        return redirect('admin/social')->with('success', 'tambah social-media berhasil');
    }

    public function destroy($id){

        $social = Socialmedia::find($id);
        $social->delete();

        return redirect('admin/social')->with('success','berhasil menghapus social-media');
    }
}
