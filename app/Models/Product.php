<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    

//creer relation un produit appartient à une seule categorie
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getCreatedAttribute() {
        return $this->created_at->format('d/m/Y H:i:s');
    }
}