<?php

namespace Tests\Feature;

use Tests\TestCase;

class ListRepositoryTest extends TestCase
{
    /**
     * A test of list repository.
     *
     * @return void
     */
    public function test_list_repository()
    {
        $response = $this->get('listRepository');
        $response->assertStatus(200);

    }
}
