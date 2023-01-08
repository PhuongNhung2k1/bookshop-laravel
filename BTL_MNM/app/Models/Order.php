<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Models\Cart;
use Models\Products;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'customer_id',
        'order_note',
    ];
}
