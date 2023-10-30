<?php

namespace App\Services;

interface ProdukService {
    public function getProduk();
    public function getProdukById($id);
    public function createProduk($data);
    public function editProduk($data, $id);

    public function destroyProduk($id);

}
