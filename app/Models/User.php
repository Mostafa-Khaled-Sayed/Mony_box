<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Score;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Wallate;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    public function datanormales()
    {
        return $this->belongsTo(Datanormale::class, 'datanormales_id');
    }
    public function notification()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }
    public function scores()
    {

        return $this->hasOne(Score::class, 'user_id');
    }
      public function wallet(){
        return $this->hasMany(Wallate::class, 'user_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function announcements()
    {
        return $this->belongsToMany(announcement::class, table: 'user_announcement');
    }
    public function profit()
    {

        return $this->hasMany(Profit::class, 'user_id');
    }
    public function withdrawOrDdepositMony()
    {
        return $this->hasMany(WithdrawOrDepositMoney::class, 'user_id');
    }
    public function monysend()
    {
        return $this->hasMany(TransferMony::class, 'user_id');
    }
    public function resiveMony()
    {
        return $this->hasMany(TransferMony::class, 'resive_user_id');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $encryptable=[
                'password'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];
}
