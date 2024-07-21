<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $primaryKey = "tag_id";

    public function artists()
    {
        return $this->belongsToMany(Artist::class); 
    }

    protected $fillable = [
        'tag_name',
        // 他の大量代入で許可する属性があればここに追加
    ];
}
