<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;

trait CrudStoreTrait {

    // eg: method: POST url: /api/posts

    public function store(Request $request) {
      $data = $request->all();
      $validator = $this->makeValidator($data);
      if($validator->fails()) {
        return response()->json([
          'errors' => $validator->errors()->all()
        ], 400);
      }
      $createdModel = $this->getModel()->create($validator->validated());
      return response()->json($createdModel, 201);
    }
}