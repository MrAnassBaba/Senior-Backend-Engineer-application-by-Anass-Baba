<?php

namespace App\Repositories\userReps;

use App\Models\UserReps;
use App\Repositories\AbstractRepository;
use App\Repositories\RepositoryInterface;

class userRepsRepository extends AbstractRepository
{

    function model()
    {
       return UserReps::class;
    }
}
