<?php

namespace App\Domain;

interface IUserContext
{

	/**
	 * Determine user is in role.
	 *
	 * @param $role
	 **/
	public function isInRole($role): bool;
}
