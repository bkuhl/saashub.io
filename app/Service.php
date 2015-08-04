<?php namespace FreeTier;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $guarded = ['id'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('logo', [
            'url' => '/services/:id/logo/:style/:filename'
        ]);

        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metas()
    {
        return $this->hasMany(ServiceMeta::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRedirectUrl()
    {
        return url('/service/'.$this->id.'/go');
    }
}