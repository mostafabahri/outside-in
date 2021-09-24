<?php

namespace App\Domain;

interface IUserContext
{
	public function isInRole($role): bool;
}
