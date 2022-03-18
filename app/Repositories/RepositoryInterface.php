<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param array $data
     * @param $attribute
     * @return mixed
     */
    public function update($id, array $data, $attribute = "id");

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'));
}