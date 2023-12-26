<?php

namespace App\Models\racharch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeCountry extends Model
{
    use HasFactory;
protected $table= "recharge_countries";
    protected $fillable=['status','country_background','country_image','country_name'];
    public function companyIncountry(){
        return $this->hasMany(companyIncountry::class,'recharge_countrie_id');
    }
}
