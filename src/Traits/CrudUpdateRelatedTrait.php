<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;

trait CrudUpdateRelatedTrait {

    // eg: method: PUT url: /api/post/{modelId}/tags/{relatedModelId}

    public function update(Request $request, $modelId, $relatedModelId) {

      
      $data = $request->all();
      $validator = $this->makeValidator($data);
      if($validator->fails()) {
        return response()->json([
          'errors' => $validator->errors()->all()
        ], 400);
      }
      
      $relatedModel = $this->getRelation($modelId)
        ->findOrFail($relatedModelId)
        ->fill($data)
        ->save($validator->validated());
    
      return response()->json($relatedModel, 200);
    }
}