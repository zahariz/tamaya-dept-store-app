<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProdukCreateRequest;
use App\Http\Requests\CategoryProdukEditRequest;
use App\Services\CategoryProdukService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryProdukController extends Controller
{
    private CategoryProdukService $categoryProdukService;

    public function __construct(CategoryProdukService $categoryProdukService)
    {
        $this->categoryProdukService = $categoryProdukService;
    }

    public function index()
    {
        $categories = $this->categoryProdukService->getCategoryProduk();
        return view("category_produk.index", compact("categories"));
    }

    public function create()
    {
        return view("category_produk.create");
    }

    public function store(CategoryProdukCreateRequest $request)
    {
        $categories =  $request->validated();
        // dd($categories);
        DB::beginTransaction();
        try {
            //panggil service create category produk
            $this->categoryProdukService->createCategoryProduk($categories);
            // Commit ke database
            DB::commit();
            // redirek ke halaman index
            return redirect()->route("category.produk.admin.index")->with("message","Data berhasil disimpan");;
        } catch (\Throwable $th) {
            //rollback database
            DB::rollBack();
            // redirek back page
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function edit($id)
    {
        $data = $this->categoryProdukService->getCategoryProduk($id);
        return view("category_produk.edit", compact("data"));
    }

    public function update(CategoryProdukEditRequest $request, $id)
    {

        $categories = $request->validated();
        DB::beginTransaction();
        try {
            //panggil service edit category produk
            $this->categoryProdukService->editCategoryProduk($categories, $id);
            // Commit ke database
            DB::commit();
            return redirect()->route("category.produk.admin.index")->with("message","Data berhasil diubah");
        } catch (\Throwable $th) {
            //rollback database
            DB::rollBack();
            // redirek back page
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            // Panggil service destroy category produk
            $this->categoryProdukService->destroyCategoryProduk($id);
            // Commit ke database
            DB::commit();
            return redirect()->route("category.produk.admin.index")->with('message', 'Data berhasil dihapus');

        }catch(\Throwable $th)
        {
            //rollback database
            DB::rollBack();
            // redirek back page
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
}

