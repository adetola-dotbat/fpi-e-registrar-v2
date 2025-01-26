<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids, HasRoles;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'id',
    //     'title',
    //     'surname',
    //     'first_name',
    //     'other_name',
    //     'email',
    //     'gender',
    //     'dob',
    //     'marital_status',
    //     'nationality',
    //     'gpz',
    //     'state_of_origin',
    //     'local_government',
    //     'home_address',
    //     'postal_address',
    //     'phone_no',
    //     'employee_file_no',
    //     'reg_on_complete',
    //     'shortlist',
    //     'employment_status',
    //     'status',
    //     'passport',
    //     'password',
    // ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public function getFullnameAttribute()
    {
        $otherName = $this->other_name ?? '';
        return "{$this->first_name} {$this->surname}";
    }

    public function staffDetail(): HasOne
    {
        return $this->hasOne(StaffDetail::class);
    }

    public function previousEmployments(): HasMany
    {
        return $this->hasMany(PreviousEmployment::class);
    }

    public function nextOfKins(): HasMany
    {
        return $this->hasMany(NextOfKin::class);
    }

    public function emergencies(): HasMany
    {
        return $this->hasMany(Emergency::class);
    }

    public function staffBankDetails(): HasMany
    {
        return $this->hasMany(StaffBankDetail::class);
    }

    public function staffInstitutionsAttended(): HasMany
    {
        return $this->hasMany(StaffInstitutionAttended::class);
    }

    public function staffProfessionalDetails(): HasMany
    {
        return $this->hasMany(StaffProfessionalDetails::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}
