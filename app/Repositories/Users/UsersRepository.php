<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\AbstractRepository;

class UsersRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return User::class;
    }

}
