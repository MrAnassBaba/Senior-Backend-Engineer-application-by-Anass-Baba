<?php

namespace App\Http\Controllers;

use App\Services\GitHubApiService;
use Carbon\Carbon;
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
        $haveAccessToken = (bool)$request->session()->get('githubAccessToken');
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'client_id' => config('github.GITHUB_CLIENT_ID'),
            'redirect_uri' => config('github.GITHUB_REDIRECT_URI'),
            'haveAccessToken' => $haveAccessToken
        ]);
    }

    /**
     * function get list of repositories
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listRepository(Request $request): Response
    {
        $haveAccessToken = (bool)$request->session()->get('githubAccessToken');
        if (!$haveAccessToken){
            return $this->welcome($request);
        }

        return Inertia::render('ListRepository', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'client_id' => config('github.GITHUB_CLIENT_ID'),
            'redirect_uri' => config('github.GITHUB_REDIRECT_URI'),
            'haveAccessToken' => $haveAccessToken,
            'listRepositories' => $this->gitHubApiService->getListRepository($request)
        ]);
    }

    /**
     * function get list of users
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listUsers(Request $request)
    {
        $haveAccessToken = (bool)$request->session()->get('githubAccessToken');
        if (!$haveAccessToken){
            return $this->welcome($request);
        }

        $listUsers = data_get($this->gitHubApiService->getListUsers($request),"users");
        $duration = $this->gitHubApiService->checkDuration($request);

        $startDate = Carbon::parse(data_get($duration,'startDate'))->format('Y-m-d');
        $endDate = Carbon::parse(data_get($duration,'endDate'))->format('Y-m-d');

        return Inertia::render('ListUsers', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'listUsers' => $listUsers,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'haveAccessToken' => $haveAccessToken,
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
        return redirect()->route('listUsers');
    }
}
