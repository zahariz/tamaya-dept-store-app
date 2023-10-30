<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukCreateRequest;
use App\Http\Requests\ProdukUpdateRequest;
use App\Services\CategoryProdukService;
use App\Services\ProdukService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{

    private ProdukService $produkService;
    private CategoryProdukService $categoryProdukService;

    public function __construct(ProdukService $produkService, CategoryProdukService $categoryProdukService)
    {
        $this->produkService = $produkService;
        $this->categoryProdukService = $categoryProdukService;
    }

    public function index()
    {
        // Panggil service produk
        $produk = $this->produkService->getProduk();
        // return ke page
        return view("produk.index", compact("produk"));
    }

    public function create()
    {
        $categories = $this->categoryProdukService->getCategoryProduk();
        return view("produk.create", compact("categories"));
    }

    public function store(ProdukCreateRequest $request)
    {
        // Validasi create produk
        $produk = $request->validated();
        // dd($produk);

        DB::beginTransaction();
        try {
            //Panggil service create produk
            $this->produkService->createProduk($produk);
            DB::commit();
            return redirect()->route("produk.admin.index")->with("success","Data berhasil disimpan");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route("produk.admin.create")->with("error", $th->getMessage());
        }

    }

    public function edit($id)
    {
        $data = $this->produkService->getProdukById($id);
        return view("produk.edit", [
            "data" => $data,
            "getCategoryProduk" => $this->categoryProdukService->getCategoryProduk()
        ]);
    }

    public function update(ProdukUpdateRequest $request, $id)
    {
        $produk = $request->validated();

        DB::beginTransaction();
        try {
            //panggil service update produk
            $this->produkService->editProduk($produk, $id);
            DB::commit();
            return redirect()->route("produk.admin.index")->with("message","Data berhasil disimpan");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            // Panggil service destroy category produk
            $this->produkService->destroyProduk($id);
            // Commit ke database
            DB::commit();
            return redirect()->route("produk.admin.index")->with('message', 'Data berhasil dihapus');

        }catch(\Throwable $th)
        {
            //rollback database
            DB::rollBack();
            // redirek back page
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
}
