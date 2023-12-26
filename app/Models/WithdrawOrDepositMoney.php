<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawOrDepositMoney extends Model
{
    use HasFactory;
    protected $fillable = ['deposit_money', 'withdraw_money', 'notification_id', 'user_id', 'stauts_mony','status' , 'admin_id'];
    public function Notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
