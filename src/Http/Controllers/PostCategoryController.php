<?php

namespace LoopCraft\Blog\Http\Controllers;

use LoopCraft\Blog\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LoopCraft\Blog\Traits\CrudDeleteRelatedTrait;
use LoopCraft\Blog\Traits\CrudStoreRelatedTrait;
use LoopCraft\Blog\Traits\CrudUpdateRelatedTrait;

class PostCategoryController extends Controller
{
    use CrudStoreRelatedTrait, CrudUpdateRelatedTrait, CrudDeleteRelatedTrait;

    protected function getRelationModelInstance($postId)
    {
        return Post::findOrFail($postId)->categories();
    }
}
