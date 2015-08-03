<?php namespace FreeTier;

use Config;
use Storage;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Service extends Model
{
    protected $guarded = ['id'];

    const LOGO_PATH = 'logos';

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
    public function services()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRedirectUrl()
    {
        return url('/service/'.$this->id.'/go');
    }

    public function setLogo(UploadedFile $file)
    {
        $storage = Storage::disk(Config::get('filesystems.cloud'));
        $logoFilename = $this->id.'_'.time().'.'.$file->getClientOriginalExtension();
        $storage->put(self::LOGO_PATH.DIRECTORY_SEPARATOR.$logoFilename, file_get_contents($file), 'public');
    }

    public function logoUrl()
    {
        return 'pathUrl'.self::LOGO_PATH.DIRECTORY_SEPARATOR.$this->logo;
    }
}