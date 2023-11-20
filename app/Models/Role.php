<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use App\Traits\HasTranslations;


class Role extends Model
{
    // use softDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];
    public $translatable = ['label'];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function devices()
    {
        return $this->belongsToMany(Device::class)->withTimestamps();
    }
    public function phases(){
        return $this->belongsToMany(Phase::class);
    }
    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function listablePermissions()
    {
        return $this->belongsToMany(Permission::class)/*->where('route', 'not like', "%{%")*/->groupBy('masked_link');
    }

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     *
     * @return mixed
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
    public function givePhaseTo(Phase $phases)
    {
        return $this->phases()->save($phases);
    }

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    public function getTranslatableFields()
    {
        return $this->translatable;
    }
}
