<?php

namespace App\Http\Controllers;

use App\Services\WarehouseManagementService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private WarehouseManagementService $warehouseManagementService;

    public function __construct(WarehouseManagementService $warehouseManagementService)
    {
        $this->warehouseManagementService = $warehouseManagementService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = $this->warehouseManagementService->getWarehouseBySearch($request->cari);
        return view('produk', [
            'data'=> $data
        ]);
    }
}
