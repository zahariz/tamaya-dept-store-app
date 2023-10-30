<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseManagementCreateRequest;
use App\Services\ProdukService;
use App\Services\StorageBinService;
use App\Services\WarehouseManagementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseManagementController extends Controller
{
    private WarehouseManagementService $warehouseManagementService;
    private ProdukService $produkService;
    private StorageBinService $storageBinService;

    public function __construct(WarehouseManagementService $warehouseManagementService, ProdukService $produkService, StorageBinService $storageBinService)
    {
        $this->warehouseManagementService = $warehouseManagementService;
        $this->produkService = $produkService;
        $this->storageBinService = $storageBinService;
    }

    public function index()
    {
        $wm = $this->warehouseManagementService->getWarehouse();
        return view("warehouse.index", compact("wm"));
    }

    public function create()
    {
        $produk = $this->produkService->getProduk();
        $bin = $this->storageBinService->getStorageBin();
        return view("warehouse.create", [
            "produk" => $produk,
            "bin" => $bin,
        ]);
    }

    public function store(WarehouseManagementCreateRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try{
            $this->warehouseManagementService->createWarehouse($data);
            DB::commit();
            return redirect()->route("wm.admin.index")->with("message","Data berhasil disimpan");
        }catch(\Throwable $th)
        {
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

}
