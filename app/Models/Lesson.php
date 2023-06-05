<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory;
    use UuidTrait;


    protected $fillable = ['name', 'description', 'video'];

    public $incrementing = false;

    protected $keyType = 'uuid';


    public function supports()
    {
        return $this->hasMany(Support::class);
    }



}
