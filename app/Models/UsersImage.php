<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersImage
 *
 * @property int $id
 * @property string $img_url
 * @property int $fk_id_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UsersImage extends Model
{
	protected $table = 'users_images';

	protected $casts = [
		'fk_id_user' => 'int'
	];

	protected $fillable = [
		'img_url',
		'fk_id_user'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_id_user');
	}
}
