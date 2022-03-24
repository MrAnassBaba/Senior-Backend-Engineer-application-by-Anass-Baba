<?php

namespace Tests\Feature;

use Tests\TestCase;

class ListUsersTest extends TestCase
{
    /**
     * A test of List Users
     *
     * @return void
     */
    public function ListUsersTest()
    {
        $response = $this->get('listUsers');
        $response->assertStatus(200);
    }
}
