<?php

namespace LoopCraft\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rule;

class Post extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'status',
        'published_on',
        'published_by',
        'cover_image_id',
        'created_by',
        'featured',
        'content',
        'link',
        'tint',
        'soe',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'published_on' => 'date',
        'published_by' => 'integer',
        'cover_image_id' => 'integer',
        'created_by' => 'integer',
        'featured' => 'boolean',
        'soe' => 'array',
    ];

    public function validationRules() {
        return [

            'title' => ['required'],
            'slug' => ['required', 'alpha_dash', 'unique'],
            'status' => ['required', Rule::in(['published', 'private', 'draft'])],
            'published_on' => ['required', 'date'],
            'cover_image_id' => ['required'],
            'featured' => ['boolean'],
            'content' => ['required'],
            'link' => [],
            'tint' => [],
            'soe' => [],
        ];
     }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class);
    }

    public function publishedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coverImage(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
