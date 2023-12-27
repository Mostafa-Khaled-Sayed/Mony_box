<?php

namespace App\Models\racharch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    use HasFactory;
        protected $fillable=['name','company','status','imagebackground','image','simble_reacherage','identified_code','validate', 'company_incountrie_id','validate','price','description'];
    public function compantincom()
    {
        return $this->belongsTo(companyIncountry::class, 'company_incountrie_id');
    }
}
