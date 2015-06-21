<?php namespace Websemantics\StreamsPlatformExtension\Entry;

use Websemantics\StreamsPlatformExtension\Entry\Command\GenerateEntryModel;
use Websemantics\StreamsPlatformExtension\Entry\Command\GenerateEntryTranslationsModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Entry\EntryUtility as EntryUtilityBase;

/**
 * Class EntryUtility
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 6th 2015
 * @package   Websemantics\StreamsPlatformExtension
 */

class EntryUtility extends EntryUtilityBase
{

    /**
     * Recompile entry models for a given stream.
     *
     * @param StreamInterface $stream
     */
    public function recompile(StreamInterface $stream)
    { 
        // Generate the base model.
        $this->dispatch(new GenerateEntryModel($stream));

        /**
         * If the stream is translatable generate
         * the translations model too.
         */
        if ($stream->isTranslatable()) {
            $this->dispatch(new GenerateEntryTranslationsModel($stream));
        }
    }
}
