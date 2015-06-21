<?php namespace Websemantics\StreamsPlatformExtension\Assignment;

use Anomaly\Streams\Platform\Assignment\AssignmentModel as AssignmentModelBase;

/**
 * Class AssignmentModel
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 6th 2015
 * @package   Websemantics\StreamsPlatformExtension
 */

class AssignmentModel extends AssignmentModelBase
{

    /**
     * Return the stream relation. This is VITAL to enable the extension to 
     * re-compile Stream Entry Models
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stream()
    {
        return $this->belongsTo('Websemantics\StreamsPlatformExtension\Stream\StreamModel');
    }

}
