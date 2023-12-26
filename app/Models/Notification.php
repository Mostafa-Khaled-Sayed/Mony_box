<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
       protected $fillable = ['user_id', 'admin_id', 'read','status', 'type' , 'message'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function SendOrrecive()
    {
        return $this->hasOne(WithdrawOrDepositMoney::class, 'notification_id');
    }

    public function TransferMony()
    {
        return $this->belongsTo(TransferMony::class, 'notification_id');
    }
}
