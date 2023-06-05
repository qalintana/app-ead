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


    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
