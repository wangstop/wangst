<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $newid
 * @property string $img-url
 * @property string $sort
 * @property string $created_at
 * @property string $updated_at
 */
class News_img extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_img';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['newid', 'img-url', 'sort', 'created_at', 'updated_at'];

    

}
