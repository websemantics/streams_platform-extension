<?php namespace Websemantics\StreamsPlatformExtension\Stream\Command;

use Websemantics\StreamsPlatformExtension\Entry\EntryUtility;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CompileStream
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 6th 2015
 * @package   Websemantics\StreamsPlatformExtension
 */

class CompileStream implements SelfHandling
{

    /**
     * The stream interface.
     *
     * @var StreamInterface
     */
    protected $stream;

    /**
     * Create a new CompileStream instance.
     *
     * @param StreamInterface $stream
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Handle the command.
     *
     * @param EntryUtility $utility
     */
    public function handle(EntryUtility $utility)
    {
        $utility->recompile($this->stream);
    }
}
