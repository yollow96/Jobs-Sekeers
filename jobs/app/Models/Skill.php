<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Skill whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $candidate
 * @property-read int|null $candidate_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 */
class Skill extends Model
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:skills,name|max:150',
    ];

    public $table = 'skills';

    public $fillable = [
        'name',
        'description',
        'is_default',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'is_default' => 'boolean',
    ];

    public function candidate(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'candidate_skills');
    }

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'jobs_skill');
    }
}
