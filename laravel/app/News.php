<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';

    public function img_data()
    {
        // 1對多連到News_img的newid對sort大到小排序
        return $this->hasMany('App\News_img','newid')->orderBy('sort','desc');
    }

// 1對多
    // foreign_key為 News_img model的id 資料庫預設為New_id
    // 名子不是預設所以加foreign_key

//     public function user()
// {
//     return $this->belongsTo('App\User', 'foreign_key', 'other_key');
// }

    protected $fillable = [
        'img', 'title', 'content','sort',
    ];
}
