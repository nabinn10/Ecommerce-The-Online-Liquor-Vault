<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // fillable fields
    protected $fillable = ['name', 'description', 'price', 'discounted_price', 'stock', 'category_id', 'photopath', 'status'];

    // relationship with category
    // app/Models/Product.php

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
