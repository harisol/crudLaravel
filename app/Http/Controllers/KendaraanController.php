<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
    	$title = 'View';
    	$kendaraans = \App\Kendaraan::all(); // mengambil semua data kendaraan

    	return view('crud.kendaraan.view', compact('title', 'kendaraans')); // melempar data ke view
    }

	public function create()
    {
    	$title = 'Create';
        // mengambil semua users untuk di jadikan dropdwon list pemilik di form create
        $users = \App\User::all();

        // melempar ke view di file create.blade.php yang berada di folder crud/kendaraan, sekaligus mengirim data user yang disimpan di variable $users

    	return view('crud.kendaraan.create', compact('title', 'users'));
    }

    public function store(Request $request)
    {
        // memvalidasi inputan users, form tidak boleh kosong (required)
        // nama_kendaraan,jenis_kendaraan,made_in,pemilik adalah name yang ada di form, contoh name="nama_kendaran" (lihat form)
        // \Validator adalah class yg ada pada Laravel untuk validasi
        // $request->all() adalah semua inputan dari form kita validasi

    	$validate = \Validator::make($request->all(), [
			'nama_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'made_in' => 'required', 
            'pemilik' => 'required'
		],

        // $after_save adalah isi session ketika form kosong dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan error dan alert warna merah di ambil dari 'alert' => 'danger', dst.

        $after_save = [
            'alert' => 'danger',
            'title' => 'Oh wait!',
            'text-1' => 'Ada kesalahan',
            'text-2' => 'Silakan coba lagi.'
        ]);

        // jika form kosong maka artinya fails() atau gagal di proses, maka di return redirect()->back()->with('after_save', $after_save) artinya page di kembalikan ke form dengan membawa session after_save yang sudah kita deklarasi di atas.

        if($validate->fails()){
            return redirect()->back()->with('after_save', $after_save);
        }

        // $after_save adalah isi session ketika data berhasil disimpan dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan success dan alert warna merah di ganti menjadi warna hijau di ambil dari 'alert' => 'success', dst.

        $after_save = [
            'alert' => 'success',
            'title' => 'Good Job!',
            'text-1' => 'Tambah lagi',
            'text-2' => 'Atau kembali.'
        ];

        // jika form tidak kosong artinya validasi berhasil di lalui maka proses di bawah ini di jalankan, yaitu mengambil semua kiriman dari form
        // nama_kendaraan,jenis_kendaraan,buatan,user_id adalah nama kolom yang ada di table kendaraan
        // sedangkan $request->nama_kendaraan adalah isi dari kiriman form

    	$data = [
            'nama_kendaraan' => $request->nama_kendaraan,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'buatan' => $request->made_in,
            'user_id' => $request->pemilik,
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
        ];

        // di bawah ini proses insert ke tabel kendaraan

    	$store = \App\Kendaraan::insert($data);

        // jika berhasil kembalikan ke page form dengan membawa session after_save success.
        
    	return redirect()->back()->with('after_save', $after_save);
    }

    public function show($id)
    {
    	$title = 'Update';

        // mengambil semua users untuk di jadikan dropdwon list pemilik di form create
        $users = \App\User::all();

        // melempar ke view di file create.blade.php yang berada di folder crud/kendaraan, sekaligus mengirim data user yang disimpan di variable $users dan data yg akan di edit yaitu $showById
    	$showById = \App\kendaraan::find($id);

    	return view('crud.kendaraan.edit', compact('title', 'showById', 'users'));
    }

    public function update(Request $request, $id)
    {
        // memvalidasi inputan users, form tidak boleh kosong (required)
        // nama_kendaraan,jenis_kendaraan,made_in,pemilik adalah name yang ada di form, contoh name="nama_kendaran" (lihat form)
        // \Validator adalah class yg ada pada Laravel untuk validasi
        // $request->all() adalah semua inputan dari form kita validasi

        $validate = \Validator::make($request->all(), [
            'nama_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'made_in' => 'required', 
            'pemilik' => 'required'
        ],

        // $after_update adalah isi session ketika form kosong dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan error dan alert warna merah di ambil dari 'alert' => 'danger', dst.

        $after_update = [
            'alert' => 'danger',
            'title' => 'Oh wait!',
            'text-1' => 'Ada kesalahan',
            'text-2' => 'Silakan coba lagi.'
        ]);

        // jika form kosong maka artinya fails() atau gagal di proses, maka di return redirect()->back()->with('after_update', $after_update) artinya page di kembalikan ke form dengan membawa session after_update yang sudah kita deklarasi di atas.

        if($validate->fails()){
            return redirect()->back()->with('after_update', $after_update);
        }

        // $after_update adalah isi session ketika data berhasil disimpan dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan success dan alert warna merah di ganti menjadi warna hijau di ambil dari 'alert' => 'success', dst.

        $after_update = [
            'alert' => 'success',
            'title' => 'Good Job!',
            'text-1' => 'Update berhasil',
            'text-2' => '.'
        ];

        // jika form tidak kosong artinya validasi berhasil di lalui maka proses di bawah ini di jalankan, yaitu mengambil semua kiriman dari form
        // nama_kendaraan,jenis_kendaraan,buatan,user_id adalah nama kolom yang ada di table kendaraan
        // sedangkan $request->nama_kendaraan adalah isi dari kiriman form

        $data = [
            'nama_kendaraan' => $request->nama_kendaraan,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'buatan' => $request->made_in,
            'user_id' => $request->pemilik,
            'updated_at' => \Carbon\Carbon::now('Asia/Jakarta')
        ];

        // di bawah ini proses update tabel kendaraan, jika kolom id sama dengan $id yang dikirim dari form

        $update = \App\Kendaraan::where('id', $id)->update($data);

        // jika berhasil kembalikan ke page data kendaraan dengan membawa session after_update success.
        
        return redirect()->to('kendaraan')->with('after_update', $after_update);
    }

    public function destroy($id)
    {
        $after_update = [
            'alert' => 'success',
            'title' => 'Good Job!',
            'text-1' => 'Delete berhasil',
            'text-2' => '.'
        ];

        // di bawah ini proses update tabel kendaraan, jika kolom id sama dengan $id yang dikirim dari form

        \App\Kendaraan::find($id)->delete();

        // jika berhasil kembalikan ke page data kendaraan dengan membawa session after_update success.
        
        return redirect()->to('kendaraan')->with('after_update', $after_update);
    }

}
