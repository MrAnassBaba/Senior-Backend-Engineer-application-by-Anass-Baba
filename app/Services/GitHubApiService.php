<?php

namespace App\Services;

use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Psr\Http\Message\StreamInterface;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class GitHubApiService
{

    /**
     * function to get list of repository form gitHub API
     */
    public function getListRepository(Request $request)
    {
        $githubAccessToken = data_get($request->session()->get('githubAccessToken'),'access_token');
        $haveAccessToken = (bool)$request->session()->get('githubAccessToken');
        if (!$haveAccessToken){
            return redirect()->home();
        }
        return $this->getListRepositoryByName('NextmediaMa',$githubAccessToken);
    }

    public function getListUserWithCountRPsAndCountViewed()
    {

    }

    public function getListUsers(Request $request)
    {
        $githubAccessToken = data_get($request->session()->get('githubAccessToken'),'access_token');

        $client = new Client();
        $response = $client->request('GET', "https://api.github.com/users?since=1&per_page=20",[
            'headers' => [
                'content-type' => 'application/json',
                'Accept'     => 'application/json',
                'client_id' => config('github.GITHUB_CLIENT_ID'),
                'client_secret' => config('github.GITHUB_CLIENT_SECRET'),
                'authorization' => 'Bearer '.$githubAccessToken,
            ]
        ]);
        $users = json_decode($response->getBody());

        $duration = $this->checkDuration($request);

        $startDuration = data_get($duration,'startDate');
        $endDuration =  data_get($duration,'endDate');


        foreach ($users as $user){
            $repositories = $this->getListRepositoryByName($user->login,$githubAccessToken,$startDuration,$endDuration);
            $repositoriesWatchersCount = 0;
            foreach ($repositories as $repository){
                $repositoriesWatchersCount = $repositoriesWatchersCount + $repository->watchers;
            }
            $user->countRPs = count($repositories);
            $user->repositoriesWatchersCount = $repositoriesWatchersCount;
        }


        return [
            'users' => collect($users)->sortBy(["repositoriesWatchersCount"])->reverse()->toArray(),
            'startDate' => $startDuration,
            'endDate' => $endDuration,
        ];
    }

    /**
     * function to get list of repository form gitHub API By Username
     */
    public function getListRepositoryByName($username,$githubAccessToken,$startDuration = null,$endDuration = null)
    {
        $client = new Client();
        $response = $client->request('GET', "https://api.github.com/users/".$username."/repos",[
            'headers' => [
                'content-type' => 'application/json',
                'Accept'     => 'application/json',
                'client_id' => config('github.GITHUB_CLIENT_ID'),
                'client_secret' => config('github.GITHUB_CLIENT_SECRET'),
                'authorization' => 'Bearer '.$githubAccessToken,
            ]
        ]);
        if ($startDuration == null && $endDuration == null) {
            return json_decode($response->getBody());
        }

        $repositoryCollection = collect(json_decode($response->getBody()));
        return $repositoryCollection->whereBetween('created_at',[$startDuration,$endDuration]);
    }

    public function checkDuration(Request $request): array
    {
        $startDuration = new DateTime($request->get('startDate'));
        $endDuration = new DateTime($request->get('endDate'));

        $startDuration = Carbon::instance($startDuration)->startOfDay()->format("Y-m-d\TH:i:s");
        $endDuration = Carbon::instance($endDuration)->startOfDay()->format("Y-m-d\TH:i:s");

        if (empty($request->get('startDate'))) {
            $startDuration = Carbon::today()->subMonth()->startOfMonth()->format("Y-m-d\TH:i:s");
        }

        if (empty($request->get('endDate'))) {
            $endDuration = Carbon::today()->subMonth()->endOfMonth()->format("Y-m-d\TH:i:s");
        }

        return [
            "startDate" => $startDuration,
            "endDate" => $endDuration
        ];
    }


}
