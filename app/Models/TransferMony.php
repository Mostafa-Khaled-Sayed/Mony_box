<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferMony extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'mony_after_discount', 'mony_resive', 'mony_send', 'resive_user_id', 'notification_id'];
    public function usersend()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function resiveUser()
    {
        return $this->belongsTo(User::class, 'resive_user_id');
    }
    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }
}
