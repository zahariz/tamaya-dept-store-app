<?php

namespace App\Services\Impl;

use App\Models\CategoryProduk;
use App\Services\CategoryProdukService;

class CategoryProdukServiceImpl implements CategoryProdukService {

   public function getCategoryProduk()
   {
    return CategoryProduk::all();
   }

   public function getCategoryProdukById($id)
   {
    return CategoryProduk::find($id);
   }

   public function createCategoryProduk($data)
   {
    $category = new CategoryProduk();
    $category->nama_category_produk = $data["nama_category_produk"];
    $category->save();
   }

   public function editCategoryProduk($data, $id)
   {
    $category = CategoryProduk::find($id);
    $category->nama_category_produk = $data["nama_category_produk"];
    $category->update();
   }

   public function destroyCategoryProduk($id)
   {
    return CategoryProduk::destroy($id);
   }

}
