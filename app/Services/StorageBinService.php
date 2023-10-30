<?php

namespace App\Services;


interface StorageBinService {
    public function getStorageBin();
    public function getStorageBinById($id);
    public function createStorageBin($data);

    public function editStorageBin($data, $id);

    public function destroyStorageBin($id);

}
