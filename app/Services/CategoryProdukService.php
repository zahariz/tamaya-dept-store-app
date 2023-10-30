<?php

namespace App\Services;

interface CategoryProdukService {
    public function getCategoryProduk();
    public function getCategoryProdukById($id);
    public function createCategoryProduk($data);
    public function editCategoryProduk($data, $id);

    public function destroyCategoryProduk($id);

}
