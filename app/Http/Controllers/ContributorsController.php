<?php

namespace App\Http\Controllers;

use App\Services\UserRepsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ContributorsController extends Controller
{
    /**
     * @var UserRepsService
     */
    private $userRepsService;

    /**
     * @param UserRepsService $userRepsService
     */
    public function __construct(UserRepsService $userRepsService)
    {
        $this->userRepsService = $userRepsService;
    }


    /**
     * get list of repositories
     * @return \Inertia\Response
     */
    public function createRepository(): Response
    {
        return Inertia::render('createRepositories');
    }

    public function actionPostToCreateRepository(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'urlRps' => 'required|string|max:255',
        ]);

        $userKey = 1; // Auth::id();
        $this->userRepsService->createUserReps($request,$userKey);
        return redirect()->route('createRepository')->with('message', 'repository create with success');
    }
}
