<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment byPost(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\County
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|County newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County query()
 * @method static \Illuminate\Database\Eloquent\Builder|County whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereUpdatedAt($value)
 */
	class County extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $title
 * @property string $text
 * @property int $trainee
 * @property int $profession_id
 * @property string $year
 * @property int|null $remote
 * @property string $duration
 * @property string $company
 * @property int $county_id
 * @property-read \App\Models\County $county
 * @property-read \App\Models\Profession $profession
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Post byCounty(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Post byJobType(?bool $type)
 * @method static \Illuminate\Database\Eloquent\Builder|Post byProfession(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Post byRemote(?bool $type)
 * @method static \Illuminate\Database\Eloquent\Builder|Post byYear(?int $yearMin = null, ?int $yearMax = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereProfessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRemote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTrainee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereYear($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profession
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Profession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profession query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profession whereUpdatedAt($value)
 */
	class Profession extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

