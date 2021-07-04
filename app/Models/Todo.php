<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable=['text','created_at','updated_at'];
    public static $rules = array(
        'text'=>'integer|min:0|max:20',
    );
    public function getData(){
        return $this->text;
    }
}

