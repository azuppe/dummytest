<?php

namespace LoopCraft\Blog\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait MakeValidatorTrait {

    // eg: method: POST url: /api/posts

    public function makeValidator($data, $model, $ignoreRequired = false) {
      return Validator::make($data, $model->rules);
    }

    public function getRules($model, $ignoreRequired)
    {
      if($ignoreRequired) {
        return collect($model->validationRules())->map(fn ($rules) => Arr::forget($rules, 'required'));
      }
      return $model->validationRules();
    }
}