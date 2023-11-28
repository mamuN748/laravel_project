<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model{
    use HasFactory;

    protected $praimeryKey="Incate_id";

    public function creatorinfo(){
        return $this->belongsTo('App\Models\User','Incate_creator','id');
    }
    public function editorinfo(){
        return $this->belongsTo('App\Models\User','editor','id');
    }
   
}
