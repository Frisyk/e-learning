<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'occupation',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_students');
    }

    public function subcribe_transactions() {
        return $this->hasMany(SubcribeTransaction::class);
    }
    
    public function hasActiveSubscription() {
        $latestSubcription= $this->subcribe_transactions() 
        ->where('is_paid', true) 
        ->latest('updated_at')
        ->first();
        
        if(!$latestSubcription) {
        return false;
        }
        $subcriptionEndDate = Carbon::parse($latestSubcription->subcription_start_date)->addMonths(1);
        return Carbon::now()->lessThanOrEqualTo ($subcriptionEndDate); // true = dia berlangganan
        
    }
}
