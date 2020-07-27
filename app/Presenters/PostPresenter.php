<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @copyright Copyright (c) 2020, Nezuko - Content Management System
 */

namespace App\Presenters;

use App\Models\Post;
use Exception;
use Illuminate\Support\Str;

/**
 * @property-read string $show
 * @property-read string $edit
 * @property-read string $update
 * @property-read string $delete
 */
class PostPresenter
{
    /**
     * The model instance.
     *
     * @var Post
     */
    protected $model;

    /**
     * The route name.
     *
     * @var string
     */
    protected $route = 'posts';

    /**
     * Url constructor.
     *
     * @param  Post  $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * Dynamically access property.
     *
     * @param  string  $key
     * @return mixed
     * @throws Exception
     */
    public function __get($key)
    {
        $method = Str::camel($key);

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new Exception("Property [{$key}] does not exist on the url presenter instance.");
    }

    /**
     * Show model url.
     *
     * @return string
     */
    private function show(): string
    {
        return route($this->route.'.show', $this->model);
    }

    /**
     * Edit model url.
     *
     * @return string
     */
    public function edit(): string
    {
        return route($this->route.'.edit', $this->model);
    }

    /**
     * Update model url.
     *
     * @return string
     */
    public function update(): string
    {
        return route($this->route.'.update', $this->model);
    }

    /**
     * Delete model url.
     *
     * @return string
     */
    public function delete(): string
    {
        return route($this->route.'.destroy', $this->model);
    }
}
