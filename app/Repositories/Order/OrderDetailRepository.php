<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderDetailRepository extends BaseRepository 
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\OrderDetail::class;
    }

    public function getOrderDetail()
    {
        // dd($this->getModel()::all());
        return $this->getModel()::with(['Product','Order'])->get()->toArray();
    }
}