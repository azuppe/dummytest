<?php

namespace LoopCraft\Blog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LoopCraft\Blog\Blog
 */
class Blog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LoopCraft\Blog\Blog::class;
    }
}
