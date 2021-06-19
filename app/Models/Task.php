<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  
  use HasFactory;
  
  protected $fillable = ['title', 'is_completed', 'list_id'];
  protected $casts = [
    'created_at' => 'datetime:F d-y H:i',
  ];
  
  public static function addUpdate ($data, $list_id, $id = null) {
    $object = self::findornew($id);
    $object->title = $data['title'];
    if ( !$object->list_id) $object->list_id = $list_id;
    $object->save();
    return $object;
  }
  
  public function markCompleted ($value = 1) {
    $this->is_completed = $value == 1 || $value == true ? 1 : 0;
    return $this->save();
  }
  
  
}
