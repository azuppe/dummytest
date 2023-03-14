<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;

trait CrudDeleteRelatedTrait {

    // eg: method: DELETE url: /api/post/{modelId}/tags/{relatedModelId}
    public function destroy(Request $request, $modelId, $relatedModelId) {
      $this->getRelation($modelId)->destroy($relatedModelId);
      return response()->json('Deleted', 200);
    }
}