<?php namespace Mom\Exceptions;

use Exception;

class PermissionDeniedException extends Exception
{
	/**
	 * Constructs a new PermissionDeniedException.
	 *
	 * @param string $message Optional message for the exception
	 */
	public function __construct($message="You are not allowed to access this resource.") {
		parent::__construct($message);
	}
}