<?php

namespace App\Models;

// use App\Models\Traits\UuidTrait;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Module extends Model
{
    use HasFactory;
    use UuidTrait;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = ['name', 'course_id'];

    // public static function booted()
    // {
    //     static::creating(function ($model) {
    //         $model->id =(string) Str::uuid();
    //     });
    // }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
