<?php

namespace App\Repositories\UserReps;

use App\Models\UserReps;
use App\Repositories\AbstractRepository;
use App\Repositories\RepositoryInterface;

class UserRepsRepository extends AbstractRepository
{

    function model()
    {
       return UserReps::class;
    }
}
