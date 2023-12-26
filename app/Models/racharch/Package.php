<?php

namespace App\Models\racharch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable=['photo','identifiedcharge','company_incountrie_id','status','price','valite','samplercharge','description','type','name'];
}
