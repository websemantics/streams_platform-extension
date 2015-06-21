<?php namespace Websemantics\StreamsPlatformExtension\Stream;

use Websemantics\StreamsPlatformExtension\Stream\Command\CompileStream;
use Anomaly\Streams\Platform\Stream\StreamModel as StreamModelBase;

/**
 * Class StreamModel
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 6th 2015
 * @package   Websemantics\StreamsPlatformExtension
 */

class StreamModel extends StreamModelBase
{

    /**
     * Compile the entry models. This will also override the 
     * Generate Entry Model process
     *
     * @return mixed
     */
    public function compile()
    {		
        $this->dispatch(new CompileStream($this));
    }
    
}
