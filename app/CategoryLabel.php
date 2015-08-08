<?php namespace SaaSHub;

use Illuminate\Database\Eloquent\Model;

class CategoryLabel extends Model
{
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metas()
    {
        return $this->belongsTo(ServiceMeta::class);
    }
}