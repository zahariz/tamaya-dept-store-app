<?php

namespace App\Services\Impl;

use App\Models\Produk;
use App\Services\ProdukService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukServiceImpl implements ProdukService {

    public function getProduk()
    {
        return Produk::all();
    }

    public function getProdukById($id)
    {
        return Produk::findOrFail($id);
    }

    public function createProduk($data)
    {
        $image = $data["image"];
        // dd($image->hashName());
        $image->storeAs('public/produk',$image->hashName());

        $produk = new Produk();
        $produk->nama_produk = $data["nama_produk"];
        $produk->merk_produk = $data["merk_produk"];
        $produk->id_category_produk = $data["id_category_produk"];
        $produk->image =  $image->hashName();
        $produk->qty = $data["qty"];
        $produk->harga = $data["harga"];
        $produk->save();
    }
    public function editProduk($data, $id)
    {
        $produk = Produk::findOrFail($id);

        if($data['image'])
        {
        $image = $data["image"];
        $image->storeAs('public/produk',$image->hashName());
        Storage::delete('public/produk/'.$image->hashName());
        $produk->nama_produk = $data["nama_produk"];
        $produk->merk_produk = $data["merk_produk"];
        $produk->id_category_produk = $data["id_category_produk"];
        $produk->image =  $image->hashName();
        $produk->qty = $data["qty"];
        $produk->harga = $data["harga"];
        $produk->update();
        } else {
            $produk->nama_produk = $data["nama_produk"];
            $produk->merk_produk = $data["merk_produk"];
            $produk->id_category_produk = $data["id_category_produk"];
            $produk->qty = $data["qty"];
            $produk->harga = $data["harga"];
            $produk->update();
        }
    }

    public function destroyProduk($id)
    {
        return Produk::destroy($id);
    }

}
