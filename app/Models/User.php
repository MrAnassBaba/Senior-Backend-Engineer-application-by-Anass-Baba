<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const PRIMARY_KEY_COLUMN_NAME                   =   'id';
    const NAME_COLUMN_NAME                          =   'name';
    const EMAIL_COLUMN_NAME                         =   'email';
    const GIT_USERNAME_COLUMN_NAME                  =   'gitUsername';
    const GIT_COUNT_RP_VIEWS_COLUMN_NAME            =   'gitCountRpViews';
    const GIT_COUNT_RPS_COLUMN_NAME                 =   'gitCountRps';
    const PASSWORD_COLUMN_NAME                      =   'password';
    const REMEMBER_TOKEN_COLUMN_NAME                =   'remember_token';
    const EMAIL_VERIFIED_AT_COLUMN_NAME             =   'email_verified_at';
    const CREATED_AT__COLUMN_NAME                   =   'created_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME_COLUMN_NAME,
        self::EMAIL_COLUMN_NAME,
        self::PASSWORD_COLUMN_NAME,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD_COLUMN_NAME,
        self::REMEMBER_TOKEN_COLUMN_NAME,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT_COLUMN_NAME => 'datetime',
    ];

    /**
     * Getters
     */

    public function getUserKey()
    {
        return $this->getAttributeValue(self::PRIMARY_KEY_COLUMN_NAME);
    }

    public function getUserName()
    {
        return $this->getAttributeValue(self::NAME_COLUMN_NAME);
    }

    public function getUserEmail()
    {
        return $this->getAttributeValue(self::EMAIL_COLUMN_NAME);
    }

    public function getGitUserName()
    {
        return $this->getAttributeValue(self::GIT_USERNAME_COLUMN_NAME);
    }

    public function getGitCountRpViews()
    {
        return $this->getAttributeValue(self::GIT_COUNT_RP_VIEWS_COLUMN_NAME);
    }

    public function getGitCountRps()
    {
        return $this->getAttributeValue(self::GIT_COUNT_RPS_COLUMN_NAME);
    }



    /**
     * ORM relations
     */

    /**
     * Table User Has Many Repositories GitHub #UserReps
     * @return HasMany
     */
    public function userReps(): HasMany
    {
        return $this->hasMany(UserReps::class,
            UserReps::USER_KEY_COLUMN_NAME,
            self::PRIMARY_KEY_COLUMN_NAME);
    }
}
