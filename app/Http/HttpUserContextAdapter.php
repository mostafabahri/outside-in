<?php

namespace App\Http;

use App\Domain\IUserContext;

class HttpUserContextAdapter implements IUserContext
{
	/**
	 * Determine user is in role.
	 *
	 * @param $role
	 **/
	public function isInRole($role): bool
	{
		return true;
	}
}
