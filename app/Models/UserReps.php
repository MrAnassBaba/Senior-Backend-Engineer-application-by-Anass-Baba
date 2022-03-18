<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserReps extends Model
{
    use HasFactory;

    const PRIMARY_KEY_COLUMN_NAME                   =   'id';
    const USER_KEY_COLUMN_NAME                      =   'user_id';
    const NAME_COLUMN_NAME                          =   'name';
    const DESCRIPTION_COLUMN_NAME                   =   'description';
    const URL_RPS_COLUMN_NAME                       =   'urlRps';

    /**
     * Getters
     */
    public function getKey()
    {
        return $this->getAttributeValue(self::PRIMARY_KEY_COLUMN_NAME);
    }

    public function getUserKey()
    {
        return $this->getAttributeValue(self::USER_KEY_COLUMN_NAME);
    }

    public function getName()
    {
        return $this->getAttributeValue(self::NAME_COLUMN_NAME);
    }

    public function getDescription()
    {
        return $this->getAttributeValue(self::DESCRIPTION_COLUMN_NAME);
    }

    public function getUrlRps()
    {
        return $this->getAttributeValue(self::URL_RPS_COLUMN_NAME);
    }


    /**
     * Relations ORM
     */

    /**
     * this class belong to table User
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,
            self::USER_KEY_COLUMN_NAME,
            User::PRIMARY_KEY_COLUMN_NAME);
    }
}
