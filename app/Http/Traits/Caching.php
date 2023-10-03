<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Cache;

trait Caching
{
 
    
    public function cache($data) 
    {
        $key = $_SERVER['REQUEST_URI'];

        if (Cache::has($key) == null){
            Cache::remember($key, 5, function() use ($data){
                return $data;
            });
        }
          
        return Cache::get($key);
       
    }
}