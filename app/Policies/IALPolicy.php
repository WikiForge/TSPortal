<?php

namespace App\Policies;

use App\Models\IAL;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IALPolicy
{
	use HandlesAuthorization;

	/**
	 * Initial auth check
	 *
	 * @param User $user
	 *
	 * @return Response|null
	 */
	public function before( User $user ): ?Response
	{
		if ( $user->hasFlag( 'ts' ) ) {
			return Response::allow();
		}

		return null;
	}

	/**
	 * Determine whether the user can view all IALs.
	 *
	 * @param User $user
	 *
	 * @return Response
	 */
	public function viewAny( User $user ): Response
	{
		return Response::deny();
	}

	/**
	 * Determine whether the user can update an IAL.
	 *
	 * @param User $user
	 * @param IAL $ial
	 *
	 * @return Response
	 */
	public function update( User $user, IAL $ial ): Response
	{
		return Response::deny();
	}
}
