<?php

namespace App\Repositories;

use Carbon\Carbon;

class ProductRepository extends BaseRepository
{

  private $table = "products";

  private $column = "id";

  public function index(){
    $query = "SELECT name, description, price, created_at, updated_at FROM {$this->table}";
    
    return $this->connection->select($query);


    
  }
  public function store($request){
  
   return $this->connection
   ->table($this->table)
   ->insert([
    'name' => $request['name'],
    'description' => $request['description'],
    'price' => $request['price'],
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now()

   ]);
  }
  public function update($request = [], $id){
    
    

     return $this->connection
     ->table($this->table)
     ->where($this->column, '=', $id)
     ->update([
      'name' => $request['name'],
      'description' => $request['description'],
      'price' => $request['price'],
      'updated_at' => Carbon::now()

     ]);

   
    
  }
  public function destroy($id){
    
    $this->connection
    ->table($this->table)
    ->where($this->column, '=', $id)
    ->delete();
  }
  

}
