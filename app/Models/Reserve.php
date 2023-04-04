<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    //テーブル
    protected $table = 'reserve';

    //id（プライマリキー）
    protected $primaryKey = 'id';

    //可変項目
    protected $fillable =
    [
        'user_name',
        'lesson_name',
        'reserve_date',
        'reserve_time',
    ];

    //タイムスタンプfalseにしないと'1054 Unknown column 'updated_at' in 'field list'エラーが出る
    public $timestamps = false ;

}{
}
