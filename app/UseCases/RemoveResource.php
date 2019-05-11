<?php

namespace App\UseCases;

class RemoveResource
{
    /**
     * The model.
     *
     * @var string
     */
    public $model;

    /**
     * The instance.
     *
     * @var App\Model
     */
    public $instance;

    /**
     * Create a new class instance.
     *
     * @param string $model
     * @param App\Model $instance
     */
    public function __construct($model, $instance)
    {
        $this->model = $model;

        $this->instance = $instance;
    }

    /**
     * Perform a deletion.
     *
     * @param  array $ids
     * @return void
     */
    public function perform($ids)
    {
       $this->instance ? $this->deleteOne() : $this->deleteMany($ids);
    }

    /**
     * Delete multiple resources.
     *
     * @param  array $ids
     * @return void
     */
    private function deleteMany($ids)
    {
        $this->getResources($ids)->each(function ($resource) {
            $resource->delete();
        });
    }

    /**
     * Delete a single resource.
     *
     * @return void
     */
    private function deleteOne()
    {
        $this->instance->delete();
    }

    /**
     * Get the resources.
     *
     * @param  array $ids
     * @return Illuminate\Support\Collection
     */
    private function getResources(array $ids)
    {
        return $this->model::find($ids);
    }
}