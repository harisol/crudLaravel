<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
	public function index()
    {
        $title = 'Home';
        $content = 'Saat ini kita berada di halaman Home';

        return view('home.index', compact('title', 'content'));
    }

    public function getPage()
    {
        $title = 'Page 1';
        $content = 'Saat ini kita berada di halaman 1';

        return view('home.index2', compact('title', 'content'));
    }

    public function getOne()
    {
        $title = 'One To One Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi One To One.';
        $users = \App\User::get();
        //dd($users);
        return view('home.user', compact('title', 'content', 'users'));
    }

    public function hasOne($id)
    {
        $title = 'One To One Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi One To One.';
        $profile = \App\Profile::where('id', $id)->first();

        return view('home.profile', compact('title', 'content', 'profile'));
    }

    public function getOneMany()
    {
        $title = 'One To Many and Many To One Relationships ONPHPID.';
        $content = 'Contoh One To Many';
        $users = \App\User::all();

        return view('home.one_to_many', compact('users', 'title', 'content'));
    }
     
    public function getmanyOne()
    {
        $title = 'One To Many and Many To One Relationships ONPHPID.';
        $content = 'Contoh Many To One.';
        $kendaraans = \App\Kendaraan::all();

        return view('home.many_to_one', compact('kendaraans', 'title', 'content'));
    }

    public function getManyToMany($name = 'billy')
    {
        $title = 'Many To Many Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi Many To Many.';
        $users = \App\User::where('name', $name)->first();

        return view('home.many_to_many', compact('users', 'title', 'content', 'name'));
    }

    public function hasManyThrough($id = 1)
    {
        $title = 'Has Many Through Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi Has Many Through.';
        $kota = \App\Kota::find($id); // method find sama seperti where id = ..

        return view('home.has_many_through', compact('kota', 'title', 'content'));
    }

}
