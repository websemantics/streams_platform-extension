<?php namespace Websemantics\StreamsPlatformExtension\Entry;

use Anomaly\Streams\Platform\Entry\EntryModel as EntryModelBase;
use Websemantics\StreamsPlatformExtension\Contracts\SerializableInterface;

/**
 * Class EntryModel
 * 
 * Extends the functionality of EntryModel
 * - Override the default EntryCollection class
 * - Skips database fields
 * - Sync (if any) with Openshift before toArray
 * 
 * 
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 2nd 2014, pyro 2.3
 * @since     April 18th 2014, pyro 3
 * @package   Websemantics\StreamsPlatformExtension
 */

class EntryModel extends EntryModelBase implements SerializableInterface
{

		protected $hidden = array('created_at','updated_at','created_by','sort_order');

    /**
     * @param array $items
     * @return EntryCollection
     */
    public function newCollection(array $items = [])
    {
        $collection = substr(get_class($this), 0, -5) . 'Collection';

        if (class_exists($collection)) {
            return new $collection($items);
        }

        return new EntryCollection($items);
    }

    /**
     * Run fields through their toData
     * @access  public
     */
    
    public function toData($skips = []) {

    		$fields = $this->getAssignments();

        $data = [];

        if ($fields) {
            foreach ($fields as $field) {
               
                // If this is not in our skips list, process it.
                if (!in_array($field->field_slug, $skips)) {
                    
                    $type = $field->getType($this);

                    if (!$type->alt_process)
                    	$data[$type->getColumnName()] = $type->getValue();

                }
            }
        }

        return $data;
    }

		public function serialize($data = []) {
				
				$data = array_merge($data, $this->toData());
				
				return array_diff_key($data,array_flip($this->hidden));
			
		}

 }
