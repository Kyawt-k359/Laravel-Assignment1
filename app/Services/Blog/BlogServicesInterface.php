<?php

namespace App\Services\Blog;

interface BlogServicesInterface {

    public function store($request);
    public function update($data,$blog);
}
