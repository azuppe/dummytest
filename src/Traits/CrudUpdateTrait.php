<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;

trait CrudUpdateTrait {

    // eg: method: PUT url: /api/posts/{modelId}

    public function update(Request $request, $modelId) {

      
      $data = $request->all();
      $validator = $this->makeValidator($data);
      if($validator->fails()) {
        return response()->json([
          'errors' => $validator->errors()->all()
        ], 400);
      }
      
      $relatedModel = $this->getModel($modelId)
        ->fill($data)
        ->save($validator->validated());
    
      return response()->json($relatedModel, 200);
    }
}