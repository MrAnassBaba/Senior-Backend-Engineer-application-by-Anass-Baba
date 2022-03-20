<?php

namespace App\Http\Controllers;

use App\Services\GitHubApiService;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    /**
     * @var GitHubApiService
     */
    private $gitHubApiService;

    /**
     * @param GitHubApiService $gitHubApiService
     */
    public function __construct(GitHubApiService $gitHubApiService)
    {
        $this->gitHubApiService = $gitHubApiService;
    }

    /**
     * function welcome default path of application
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function welcome(): Response
    {
        dd($this->gitHubApiService->getListRepository());
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'listRepositories' => $this->gitHubApiService->getListRepository()
        ]);
    }
}
