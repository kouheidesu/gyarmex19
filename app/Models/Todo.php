<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable=['content','created_at','updated_at'];
    public static $rules = array(
        'content'=>'required|min:0|max:20',
        'created_at'=>'required|min:0|max:20',
        'updated_at'=>'required|min:0|max:20',
    );
    public function getData(){
        return $this->text. ':' . $this->created_at. '(' . $this->updated_at . ')';
    }
}
