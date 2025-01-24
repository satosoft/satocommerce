<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttributeGroupDescription extends Model
{
    protected $table = 'product_attribute_group_description';
    protected $fillable = ['language_id','attribute_group_id', 'name'];

    public function buildMultiLang($id,$data) {
      $returnArr = [];
      foreach ($data as $key => $value) {
          $returnArr[] = [
            'attribute_group_id' => $id,
            'language_id' => $key,
            'name' => $value['name'],
          ];
      }
      return $returnArr;
  }

}
