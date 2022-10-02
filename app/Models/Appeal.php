<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appeal extends Model
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
		'created',
		'reviewed'
	];

	/**
	 * Defines a relationship to the investigation of this appeal
	 *
	 * @return BelongsTo
	 */
	public function investigation(): BelongsTo
	{
		return $this->belongsTo( Investigation::class, 'investigation' );
	}

	/**
	 * Defines a relationship to the user assigned to the appeal
	 *
	 * @return BelongsTo
	 */
	public function assigned(): BelongsTo
	{
		return $this->belongsTo( User::class, 'assigned' );
	}

	/**
	 * Return a user object when querying the assigned attribute
	 *
	 * @param int $id
	 *
	 * @return User[]|Collection|Model|null
	 */
	public function getAssignedAttribute( int $id )
	{
		return User::findById( $id );
	}

	/**
	 * Return an investigation object when querying the investigation attribute
	 *
	 * @param int $id
	 *
	 * @return Investigation[]|Collection|Model|null
	 */
	public function getInvestigationAttribute( int $id )
	{
		return Investigation::find( $id );
	}
}
