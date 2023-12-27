<?php

namespace App\Models\racharch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\racharch\Package;
use App\Models\racharch\PackagePrice;
class companyIncountry extends Model
{
    use HasFactory;
    protected $fillable=["recharge_countrie_id","name"];
    public function PackagePrice(){
        return $this->hasMany(PackagePrice::class,'company_incountrie_id')->where('status', 1);
    }
    public function Package(){
        return $this->hasMany(Package::class,'company_incountrie_id')->where('status', 1);}
    public function Company(){
        return $this->belongsTo(RechargeCountry::class, 'recharge_countrie_id');
    }

}
