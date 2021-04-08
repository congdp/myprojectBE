<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'status',
        'date',
        'customer_id'


    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';

      /**
     *  get customer 
     * @return Array customer
     */
    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
