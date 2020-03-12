<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $table='products';


    protected $fillable = [
        'id','img','title','content','sort','type_id','price',

    ];

    public function drink()
    {
        // return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
        //要存到別人的欄位id=local_key不重複 type_id=要存的欄位

        return $this->belongsTo('App\ProductTypes','type_id','id')->orderBy('sort','desc');
    }
}
