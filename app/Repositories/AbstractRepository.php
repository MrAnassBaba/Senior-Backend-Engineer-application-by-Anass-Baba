<?php

namespace App\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository
 * @package App\Repositories
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /** @var App */
    protected $app;
    /**
     * @var Model
     */
    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Get all records.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Not scalable
     * @param $attribute
     * @param $value
     */
    public function getAllBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, $value)->get($columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginateByAdminIdOrdered($attribute, $value, $perPage = 20, $columns = array('*'))
    {
        return $this->model->where($attribute, $value)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage,$columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 20, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * Not scalable
     * @param $attribute
     * @param $value
     */

    public function paginateOrdered($perPage = 20, $columns = array('*'))
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update($id, array $data, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate($id, Array $data)
    {
        return $this->model->updateOrCreate([
            'id'  =>  $id
        ], $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findOneBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
	}

	/**
     * @param $attribute
     * @param $value
     * @return mixed
     */
	public function findOrFail($attribute, $value)
    {
        return $this->model->findOrFail($value);
    }

    /**
     * @param $attribute
     * @param $values
     * @param array $columns
     * @return mixed
     */
    public function findByIn($attribute, $values, $columns = ['*']) {
        return $this->model->whereIn($attribute, $values)->get($columns);
    }


    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    public function getById(Int $id)
    {
        return $this->model->findOrFail($id);
    }
}
