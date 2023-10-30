<?php

namespace App\Services;

interface WarehouseManagementService {
    public function getWarehouse();
    public function getWarehouseBySearch($search);
    public function getWarehouseById($id);
    public function createWarehouse($data);

    public function editWarehouse($data, $id);

    public function destroyWarehouse($id);

}
