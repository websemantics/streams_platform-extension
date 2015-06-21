<?php namespace Websemantics\StreamsPlatformExtension\Contracts;

/**
 * Class SerializableInterface
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @package   Websemantics\StreamsPlatformExtension\Contracts
 */

interface SerializableInterface {

	/**
	 * Get the instance as an array.
	 *
	 * @return array
	 */
	public function serialize($data = []);

}