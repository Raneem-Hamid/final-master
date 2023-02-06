<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitter extends Model
{
    use HasFactory;
    protected $table = "sitters";
    protected $fillable = [
        "available",
        "users_id",
        "pending_id",
        "description",
    ];
    public function users()
    {
        return  $this->hasOne(User::class,);
    }
}
