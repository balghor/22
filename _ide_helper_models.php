<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\medias
 *
 * @property int $id
 * @property string $filename
 * @property string $extension
 * @property string $mime
 * @property string|null $description
 * @property string $path
 * @property string|null $size
 * @property int|null $project_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\medias whereUserId($value)
 */
	class medias extends \Eloquent {}
}

namespace App{
/**
 * App\projects
 *
 * @property int $id
 * @property string $project_name
 * @property int $cp_id
 * @property string $start_date
 * @property string $end_date
 * @property string $album
 * @property string $description
 * @property string|null $detail
 * @property int $user_id
 * @property string $physical_progress
 * @property string $cost
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereAlbum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereCpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects wherePhysicalProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereProjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\projects whereUserId($value)
 */
	class projects extends \Eloquent {}
}

namespace App{
/**
 * App\users
 *
 * @property int $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property string $type
 * @property string|null $access_project
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereAccessProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\users whereUsername($value)
 */
	class users extends \Eloquent {}
}

