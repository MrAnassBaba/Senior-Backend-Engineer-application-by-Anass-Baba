<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Psr\Http\Message\StreamInterface;
use function PHPUnit\Framework\isEmpty;

class GitHubApiService
{

    /**
     * function to get list of repository form gitHub API
     */
    public function getListRepository(Request $request)
    {
        $githubAccessToken = $request->session()->get('githubAccessToken')->access_token;
        return $this->getListRepositoryByName('NextmediaMa',$githubAccessToken);
    }

    public function getListUserWithCountRPsAndCountViewed()
    {

    }

    public function getListUsers(Request $request)
    {
        $githubAccessToken = $request->session()->get('githubAccessToken')->access_token;
        $client = new Client();
        $response = $client->request('GET', "https://api.github.com/users?since=1&per_page=10",[
            'headers' => [
                'content-type' => 'application/json',
                'Accept'     => 'application/json',
                'client_id' => config('github.GITHUB_CLIENT_ID'),
                'client_secret' => config('github.GITHUB_CLIENT_SECRET'),
                'authorization' => 'Bearer '.$githubAccessToken,
            ]
        ]);
        $users = json_decode($response->getBody());
        foreach ($users as $user){
            $repositories = $this->getListRepositoryByName($user->login,$githubAccessToken);
            $repositoriesWatchersCount = 0;
            foreach ($repositories as $repository){
                $repositoriesWatchersCount = $repositoriesWatchersCount + $repository->watchers;
            }
            $user->countRPs = count($repositories);
            $user->repositoriesWatchersCount = $repositoriesWatchersCount;

        }
        return collect($users)->sortBy('repositoriesWatchersCount')->reverse()->toArray();
    }

    /**
     * function to get list of repository form gitHub API By Username
     */
    public function getListRepositoryByName($username,$githubAccessToken)
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
        return json_decode($response->getBody());
    }


}
