<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Di dalam model Log atau model yang sesuai
    protected $fillable = ['activity', 'user_id', 'updated_at', 'created_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
