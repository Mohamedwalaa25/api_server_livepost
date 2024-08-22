<?php

namespace App\Repositories;

interface BaseRepository
{
    public function create(array $attributes);
    public function update($model, array $attributes);
    public function delete($model);
}
