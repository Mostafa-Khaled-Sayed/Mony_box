<?php

namespace App\Models\racharch;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rchagesuser extends Model
{
    use HasFactory;
    protected $fillable=['type', 'phone', 'user_id', 'package_id', 'package_price_id', 'notification_id'];

    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function packagePrice(){
        return $this->belongsTo(packagePrice::class, 'package_price_id');
    }
    public function notification(){
        return $this->belongsTo(Notification::class, 'notification_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
