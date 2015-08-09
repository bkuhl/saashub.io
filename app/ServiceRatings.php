<?php namespace SaaSHub;

use Illuminate\Database\Eloquent\Model;

class ServiceRatings extends Model
{
    const POSITIVE = 1;
    const NEGATIVE = 0;

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeByCategory($query, Category $category)
    {
        return $query
            ->join('services', 'services.id', '=', 'service_ratings.service_id')
            ->join('categories', 'categories.id', '=', 'services.category_id')
            ->where('categories.id', '=', $category->id);
    }
}