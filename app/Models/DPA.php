<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DPA extends Model
{
	use HasFactory;

	/**
	 * Disable standard timestamps
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * Allow mass-assignment of all variables
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * Automatically convert these to Carbon date items
	 *
	 * @var string[]
	 */
	protected $dates = [
		'filed',
		'completed'
	];

	/**
	 * Type casting the main ID
	 *
	 * @var string
	 */
	protected $keyType = 'string';

	/**
	 * Table associated with model
	 *
	 * @var string
	 */
	protected $table = 'dpas';

	/**
	 * Return a relationship between a DPA and the subject user
	 *
	 * @return BelongsTo
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo( User::class, 'user' );
	}

	/**
	 * Return a user object when querying the user attribute
	 *
	 * @param int $id
	 *
	 * @return User[]|Collection|Model|null
	 */
	public function getUserAttribute( int $id )
	{
		return User::findById( $id );
	}
}
