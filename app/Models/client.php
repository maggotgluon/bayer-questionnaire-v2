<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'age',
        'progress',
        'type',
        'age',
        'answer',
        'symptom',
        'remark',
        'member_code'
    ];

    protected $casts = [
        'created_at'=>'date',
        'answer'=>'array',
        'symptom'=>'array',
        'remark'=>'array'
    ];

}
