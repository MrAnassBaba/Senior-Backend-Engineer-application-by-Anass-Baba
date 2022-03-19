<?php

namespace App\Services;

use App\Models\UserReps;
use App\Repositories\UserReps\UserRepsRepository;
use Illuminate\Http\Request;

class UserRepsService
{
    /**
     * @var UserRepsRepository
     */
    public $userRepsRepository;

    /**
     * @param UserRepsRepository $userRepsRepository
     */
    public function __construct(UserRepsRepository $userRepsRepository)
    {
        $this->userRepsRepository = $userRepsRepository;
    }

    public function createUserReps(Request $request,$userKey)
    {
        $data = [
          UserReps::USER_KEY_COLUMN_NAME => $userKey,
          UserReps::NAME_COLUMN_NAME => $request->get('name'),
          UserReps::DESCRIPTION_COLUMN_NAME => $request->get('description'),
          UserReps::URL_RPS_COLUMN_NAME => $request->get('urlRps')
        ];

        $this->userRepsRepository->create($data);
    }

}
