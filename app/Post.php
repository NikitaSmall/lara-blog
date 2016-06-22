<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'published'];

    public function change_status() {
      $this->published = !$this->published;
      $this->save();
    }

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function comments() {
      return $this->hasMany(Comment::class);
    }
}
