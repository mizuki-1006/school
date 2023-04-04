<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    //テーブル
    protected $table = 'lesson';

    //id（プライマリキー）
    protected $primaryKey = 'lesson_id';

    //可変項目
    protected $fillable =
    [
        'lesson_name',
        'price',
        'content',
    ];

    //タイムスタンプfalseにしないと'1054 Unknown column 'updated_at' in 'field list'エラーが出る
    public $timestamps = false ;

}
