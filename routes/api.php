<?php

use Illuminate\Http\Request;
use App\Food;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/foods', function(){
    return Food::all();
});

Route::post('/food', function(Request $req){
    if ($req){
        Food::create([
            'nama' => $req->input('nama'),
            'foto1' => $req->input('foto1'),
            'foto2' => $req->input('foto2'),
            'foto3' => $req->input('foto3'),
            'exp' => $req->input('exp'),
            'user_id' => $req->input('user_id')
        ]);
        return ("Terimakasih telah menambahkan makanan");
    }else{
        return ("Gagal menambahkan data");
    }
});

Route::get('/food/{id}', function($id){
    if ($id){
        return Food::find($id);
    }
    return ("Data tidak ditemukan");
});

Route::put('/food/{id}', function(Request $req, $id){
    if ($req && $id){
        Food::find($id)->update([
            'nama' => $req->input('nama'),
            'foto1' => $req->input('foto1'),
            'foto2' => $req->input('foto2'),
            'foto3' => $req->input('foto3'),
            'exp' => $req->input('exp'),
            'user_id' => $req->input('user_id')
        ]);
        return ("Data berhasil diupdate");
    }else{
        return ("Gagal mengubah data");
    }
    
});

Route::delete('/food/{id}', function($id){
    if ($id){
        Food::find($id)->delete();
        return ("Data berhasil dihapus");
    }else{
        return ("Data gagal dihapus");
    }
});