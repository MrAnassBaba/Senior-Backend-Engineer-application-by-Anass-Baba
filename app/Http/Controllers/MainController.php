<?php

namespace App\Http\Controllers;

use App\Services\GitHubApiService;
use GuzzleHttp\Client;
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
    public function welcome(Request $request): Response
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'client_id' => config('github.GITHUB_CLIENT_ID'),
            'redirect_uri' => config('github.GITHUB_REDIRECT_URI'),
            'listRepositories' => $this->gitHubApiService->getListRepository($request)
        ]);
    }

    /**
     * function get list of users
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listUsers(Request $request)
    {
        return Inertia::render('ListUsers', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'listUsers' => $this->gitHubApiService->getListUsers($request)
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request)
    {
        # POST back to GitHub
        $client = new Client();
        $response = $client->request('POST', "https://github.com/login/oauth/access_token",[
            'headers' => [
                'Accept'     => 'application/json',
            ],
            'form_params' => [
                'client_id' => config('github.GITHUB_CLIENT_ID'),
                'client_secret' => config('github.GITHUB_CLIENT_SECRET'),
                'redirect_uri' => config('github.GITHUB_REDIRECT_URI'),
                'code' => $request->get('code'),
            ]
        ]);

        session()->put('githubAccessToken',json_decode($response->getBody()));
        return redirect()->home();
    }
}
