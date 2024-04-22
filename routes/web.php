<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Clothes;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $clothes = Clothes::all();

    return view('home', compact('clothes'));
});

Route::get('/dashboard', function () {
    $clothes = Clothes::all();
    return view('dashboard/index', compact('clothes'));
})->middleware('auth');

Route::get('/dashboard/tambah', function () {
   
    return view('dashboard/tambahPakaian');
})->middleware('auth');
Route::post('/dashboard/tambah', function (Request $request) {
    // tamabah data pakaian baru
    $request->validate([
        'kode_barang' => 'required|unique:clothes|max:50',
        'nama_barang' => 'required|min:5|max:250',
        'ukuran' => 'required|min:1|max:30',
        'deskripsi' => 'required|min:5|max:500',
        'harga' => 'required',
        'supplier' => 'required|min:3|max:50',
        'stok' => 'required'
        ]);

        $clothes = Clothes::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'ukuran' => $request->ukuran,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'supplier' => $request->supplier,
            'stok' => $request->stok
        ])->save();

        // $clothes->save();
        Session::flash('alert', 'Data pakaian baru ditambahkan!');
        Session::flash('alertType', 'success');
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboard/edit/{id}', function (Request $request, $id) {
    $clothes = Clothes::findOrFail($id);
    if(!$clothes) return redirect('/dashboard');
    return view('dashboard/editPakaian', compact('clothes'));
})->middleware('auth')->name('edit-pakaian');


Route::put('/dashboard/edit/{id}', function (Request $request, $id) {
    // logic merubah data di database
    $clothes = Clothes::where('id', $id)->first();
    $rules = [
        'nama_barang' => 'required|min:5|max:250',
        'ukuran' => 'required|min:1|max:30',
        'deskripsi' => 'required|min:5|max:500',
        'harga' => 'required',
        'supplier' => 'required|min:3|max:50',
        'stok' => 'required'
    ];

    $request->validate($rules);

    $clothes->kode_barang = $request->kode_barang;
    $clothes->nama_barang = $request->nama_barang;
    $clothes->ukuran = $request->ukuran;
    $clothes->deskripsi = $request->deskripsi;
    $clothes->harga = $request->harga;
    $clothes->supplier = $request->supplier;
    $clothes->stok = $request->stok;

    $clothes->save();
    Session::flash('alert', 'Data Pakaian Telah Diperbarui!');
    Session::flash('alertType', 'success');
    return redirect('dashboard');
})->middleware('auth');

Route::delete('/dashboard/hapus/{id}', function (Request $request, $id) {
    // logic hapus data di database
    $clothes = Clothes::findOrFail($id);
    $clothes->delete();
    Session::flash('alert', 'Data Pakaian Telah Dihapus!');
    Session::flash('alertType', 'success');
    return redirect('dashboard');
})->middleware('auth');

Route::get('/login', function(){

    return view('auth/login');
});

Route::post('/login', function(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if(Auth::attempt(($credentials))) {
        $request->session()->regenerate();

        Auth::user();
        return redirect()->intended('/dashboard');
        
    }
    Session::flash('alert', 'Login gagal!');
    Session::flash('alertType', 'danger');
    return redirect()->back();
});

Route::delete('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->middleware('auth');


