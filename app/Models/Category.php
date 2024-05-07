<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
protected $fillable=['name','slugs'];
//creation de la relation une catégorie a plusieurs produits
public function products(){
    return $this->hasMany(Product::class);
}
}