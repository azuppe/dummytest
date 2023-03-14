<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;

trait CrudStoreRelatedTrait {

    // eg: method: POST url: /api/post/{modelId}/tags

    public function store(Request $request, $modelId) {
      $data = $request->all();
      $validator = $this->makeValidator($data);
      if($validator->fails()) {
        return response()->json([
          'errors' => $validator->errors()->all()
        ], 400);
      }
      $createdModel = $this->getRelation($modelId)->create($validator->validated());
      return response()->json($createdModel, 201);
    }
}