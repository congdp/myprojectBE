<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository 
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function getOrder()
    {
        // dd($this->getModel()::all());
        return $this->getModel()::with(['Customer'])->get()->toArray();
    }
}