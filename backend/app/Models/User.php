<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = false;
    public $timestamps = false;

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Goods::class, 'orders', 'user_id', 'goods_id')->withPivot('quantity');
    }

}
