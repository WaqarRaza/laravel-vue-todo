<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
  
  use HasFactory;
  
  
  protected $fillable = ['name'];
  
  public function tasks () {
    return $this->hasMany(Task::class, 'list_id');
  }
  
  public static function addUpdate ($data, $id = null) {
    $object = self::findornew($id);
    $object->name = $data['name'];
    $object->save();
    return $object;
  }
  
  
}

