<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageBinCreateRequest;
use App\Http\Requests\StorageBinEditRequest;
use App\Services\StorageBinService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StorageBinController extends Controller
{
    private StorageBinService $storageBinService;

    public function __construct(StorageBinService $storageBinService)
    {
        $this->storageBinService = $storageBinService;
    }

    public function index()
    {
        $sbin = $this->storageBinService->getStorageBin();
        return view("storage_bin.index", compact("sbin"));
    }

    public function create()
    {
        return view("storage_bin.create");
    }

    public function store(StorageBinCreateRequest $request)
    {
        $data =  $request->validated();
        // dd($categories);
        DB::beginTransaction();
        try {
            //panggil service create storage bin
            $this->storageBinService->createStorageBin($data);
            // Commit ke database
            DB::commit();
            // redirek ke halaman index
            return redirect()->route("sbin.admin.index")->with("message","Data berhasil disimpan");
        } catch (\Throwable $th) {
            //rollback database
            DB::rollBack();
            // redirek back page
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function edit($id)
    {
        $data = $this->storageBinService->getStorageBinById($id);
        return view("storage_bin.edit", compact("data"));
    }

    public function update(StorageBinEditRequest $request, $id)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            //panggil service edit storage bin
            $this->storageBinService->editStorageBin($data, $id);
            // Commit ke database
            DB::commit();
            // redirek ke halaman index
            return redirect()->route("sbin.admin.index")->with("message","Data berhasil diupdate");
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
        try {
            //panggil service hapus storage bin
            $this->storageBinService->destroyStorageBin($id);
            // Commit ke database
            DB::commit();
            // redirek ke halaman index
            return redirect()->route("sbin.admin.index")->with("message","Data berhasil dihapus");
        } catch (\Throwable $th) {
            //rollback database
            DB::rollBack();
            // redirek back page
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
}
