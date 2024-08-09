<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Goods extends Model
{
    use HasFactory;

    protected $table = 'goods';
    protected $guarded = false;
    public $timestamps = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'orders', 'goods_id', 'user_id')->withPivot('quantity');
    }

}
