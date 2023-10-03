<?php

namespace App\Repositories;

use Illuminate\Database\Connection;

class BaseRepository
{
    public function __construct(public Connection $connection){}
}
