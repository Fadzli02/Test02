<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as Michie;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, Michie;

    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];
    public $timestamps = false;

    public function gallery() {
        return $this->hasMany(Gallery::class, 'id_user', 'id_user');
    }
    
}
