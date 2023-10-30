<?php

namespace App\Services\Impl;

use App\Models\StorageBin;
use App\Services\StorageBinService;

class StorageBinServiceImpl implements StorageBinService {

    public function getStorageBin() {
        return StorageBin::all();
    }

    public function getStorageBinById($id)
    {
        return StorageBin::findOrFail($id);
    }

    public function createStorageBin($data)
    {
        $storageBin = new StorageBin();
        $storageBin->bin = $data["bin"];

        $storageBin->save();
    }

    public function editStorageBin($data, $id)
    {
        $storageBin = StorageBin::findOrFail($id);
        $storageBin->bin = $data["bin"];

        $storageBin->update();

    }

    public function destroyStorageBin($id)
    {
        return StorageBin::destroy($id);
    }



}
