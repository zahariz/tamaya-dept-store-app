<?php

namespace App\Services\Impl;

use App\Models\WarehouseManagement;
use App\Services\WarehouseManagementService;
use Illuminate\Support\Facades\DB;

class WarehouseManagementServiceImpl implements WarehouseManagementService {

    public function getWarehouse() {
        $query = DB::table("warehouse_management")
        ->select('produks.nama_produk as nama_produk', 'produks.merk_produk as merk_produk', 'produks.qty as qty', 'storage_bins.bin as bin', 'warehouse_management.id as id', 'produks.harga as harga', 'produks.image as image')
        ->join("produks","produks.id","=","warehouse_management.id_produk")
        ->join("storage_bins","storage_bins.id","=","warehouse_management.id_sbin")
        ->get();
        return $query;
    }

    public function getWarehouseBySearch($search)
    {
        return $search === null ? DB::table("warehouse_management")
        ->select('produks.nama_produk as nama_produk', 'produks.merk_produk as merk_produk', 'produks.qty as qty', 'storage_bins.bin as bin', 'warehouse_management.id as id', 'produks.harga as harga', 'produks.image as image')
        ->join("produks","produks.id","=","warehouse_management.id_produk")
        ->join("storage_bins","storage_bins.id","=","warehouse_management.id_sbin")
        ->get() :
         DB::table("warehouse_management")
        ->select('produks.nama_produk as nama_produk', 'produks.merk_produk as merk_produk', 'produks.qty as qty', 'storage_bins.bin as bin', 'warehouse_management.id as id', 'produks.harga as harga', 'produks.image as image', 'category_produks.nama_category_produk as category')
        ->join("produks","produks.id","=","warehouse_management.id_produk")
        ->join("storage_bins","storage_bins.id","=","warehouse_management.id_sbin")
        ->join("category_produks", "category_produks.id", "=", "produks.id_category_produk")
        ->where("produks.nama_produk", "like", "%" . $search . "%")
        ->orWhere("category_produks.nama_category_produk", "like", "%" . $search . "%")
        ->get();
    }

    public function getWarehouseById($id)
    {
        return WarehouseManagement::findOrFail($id);
    }

    public function createWarehouse($data)
    {
        $WarehouseManagement = new WarehouseManagement();
        $WarehouseManagement->id_produk = $data["id_produk"];
        $WarehouseManagement->id_sbin = $data["id_sbin"];
        $WarehouseManagement->save();
    }

    public function editWarehouse($data, $id)
    {
        $WarehouseManagement = WarehouseManagement::findOrFail($id);
        $WarehouseManagement->bin = $data["bin"];

        $WarehouseManagement->update();

    }

    public function destroyWarehouse($id)
    {
        return WarehouseManagement::destroy($id);
    }



}
