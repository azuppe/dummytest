<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;

trait CrudDeleteTrait {

    // eg: method: DELETE url: /api/post/{modelId}
    public function destroy(Request $request, $modelId, $relatedModelId) {
      $this->getModel($modelId)->delete();
      return response()->json('Deleted', 200);
    }
}