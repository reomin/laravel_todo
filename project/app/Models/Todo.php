<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App\Models
 * @version March 23, 2025, 11:11 pm JST
 *
 * @property integer $user_id
 * @property string $title
 * @property integer $status
 */
class Todo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'todos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:255',
        'status' => 'required|numeric'
    ];

    public static $statusNames = [
        0 => "未対応",
        1 => '処理中',
        2 => '処理済',
        3 => '完了',
    ];

    public static $hoge = [
        0 => "hoge",
        1 => 'hoga',
        2 => '処理済',
        3 => '完了',
    ];

    public function getStatusNameAttribute()
    {
        return self::$statusNames[$this->status];
    }

    public function getHogeAttribute()
    {
        return self::$hoge[$this->status];
    }
}
