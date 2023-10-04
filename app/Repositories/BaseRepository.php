<?php

namespace App\Repositories;

use Illuminate\Database\Connection;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class BaseRepository
{
    protected $column = '';

    protected $table = '';

    protected $fillables = [];

    public function __construct(public Connection $connection) {}

    public function store($request)
    {
        $request = $this->filterFillables($request);

        $request = array_merge(
            $request,
            [
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]
        );

        return $this->connection
            ->table($this->table)
            ->insert($request);
    }

    public function destroy($id)
    {
        $this->connection
            ->table($this->table)
            ->where($this->column, '=', $id)
            ->delete();
    }

    public function update($request = [], $id)
    {
        $request = $this->filterFillables($request);

        $request = array_merge(
            $request,
            ['updated_at' => Carbon::now()]
        );

        return $this->connection
            ->table($this->table)
            ->where($this->column, '=', $id)
            ->update($request);
    }

    public function filterFillables($request = [])
    {
        if (empty($this->fillables))
        {
            return $request;
        }
        
        return Arr::only($request, $this->fillables);
    }
}