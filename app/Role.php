<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    $fillable = ['name'];

    public function function users() {
      return $this->hasMany(User::class);
    }
}
