<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'created_at', 'updated_at'];
    public static $rules = array(
        'content' => 'required|min:0|max:20',
    );
    public function getData()
    {
        $txt = $this->id . ';' . $this->content;
        return $txt;
    }
}
