<?php

namespace App\Repository\Blog;

interface BlogInterface  {
    public function index();
    public function show($id);
}