<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Use_;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function genre()
    {
        return $this-> belongsTo(Genre::class);
    }

    public function purchase()
    {
        return $this-> hasMany(Purchase::class);
    }
    public function history()
    {
        return $this-> hasMany(History::class);
    }
}
