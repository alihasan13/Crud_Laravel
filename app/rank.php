<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class rank extends Model
{
    protected $primaryKey='id';
    protected $table= 'rank';
    public $timestamp= true;
    public static function boot() {
        parent::boot();
        static::creating(function($post) {
            $post->created_by = 1;
            $post->updated_by = 1;
        });

        static::updating(function($post) {
            $post->updated_by = 1;
        });
    }
    
}
