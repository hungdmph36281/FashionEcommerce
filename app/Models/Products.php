<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';


    protected $primaryKey = 'ProductID';

    public function listProducts()
    {
        $query = DB::table($this->table)
            ->select($this->table . '.*', 'categories.CategoryName as category_name')
            ->join('categories', 'categories.CategoryID', '=', $this->table . '.CategoryID');
    
        dd($query->toSql(), $query->getBindings());
    
        return $query->get();
    }


    public function addProduct($data)
    {
        return DB::table($this->table)->insert($data);
    }


    public function getDetail($id)
    {
        return DB::table($this->table)->where('ProductID', $id)->first(); // Đảm bảo 'id' là tên cột đúng
    }


    public function updateProduct($data, $id)
    {
        return DB::table($this->table)->where('ProductID', $id)->update($data); // Đảm bảo 'ProductID' là tên cột đúng
    }
    

    public function deleteProduct($id)
    {
        return DB::table($this->table)->where('ProductID', $id)->delete(); // Đảm bảo 'id' là tên cột đúng
    }
    public static function deleteOrderItemsByCategoryId($categoryId)
    {
        return DB::table('order_items')->whereIn('ProductID', function($query) use ($categoryId) {
            $query->select('ProductID')->from('products')->where('CategoryID', $categoryId);
        })->delete();
    }
    
}
