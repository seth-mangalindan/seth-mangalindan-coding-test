<?php

namespace App\Repositories;

use Carbon\Carbon;

class ProductRepository extends BaseRepository
{
    protected $table = "products";

    protected $column = "id";

    protected $fillables = ['name', 'description', 'price'];

    public function index()
    {
        $query = "SELECT name, description, price, created_at, updated_at 
                  FROM {$this->table}";

        return $this->connection->select($query);
    }
}