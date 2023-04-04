<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //テーブル
    protected $table = 'users';

    //id（プライマリキー）
    protected $primaryKey = 'id';

    //可変項目
    protected $fillable =
    [
        'name',
        'age',
        'tel',
        'email',
        'password',
        'role',
    ];

    //タイムスタンプfalseにしないと'1054 Unknown column 'updated_at' in 'field list'エラーが出る
    public $timestamps = false ;

}
