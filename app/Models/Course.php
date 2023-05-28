<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    use UuidTrait;



    protected $fillable = ['name', 'description', 'image'];

    public $incrementing = false;

    protected $keyType = 'uuid';

    // public static function booted()
    // {
    //     static::creating(function ($model) {
    //         $model->id =(string) Str::uuid();
    //     });
    // }
}
