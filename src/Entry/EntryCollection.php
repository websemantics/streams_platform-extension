<?php namespace Websemantics\StreamsPlatformExtension\Entry;

use Anomaly\Streams\Platform\Entry\EntryCollection as EntryCollectionBase;
use Websemantics\StreamsPlatformExtension\Contracts\SerializableInterface;

/**
 * Class EntryCollection
 * 
 * Allows a EntryCollection to serialize entires
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 5th 2014, pyro 2.3
 * @since     April 18th 2015, pyro 3
 * @package   Websemantics\StreamsPlatformExtension
 */

class EntryCollection extends EntryCollectionBase implements SerializableInterface
{

		/**
		 * Serialize the collection to be used on front-end
		 * 
		 * @param  string $type node type
		 * @param  array $data external data (*not used here)
		 * @return array       serialized items
		 */
    public function serialize($type = null, $data = []) {
          
        return array_map(function($value) use($type)
        {
            return $value instanceof SerializableInterface ? $value->serialize($type) : $value;

        }, $this->items);

    }
}
