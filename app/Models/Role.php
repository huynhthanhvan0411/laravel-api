<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongTo(User::class, 'role_id');
    }
}
