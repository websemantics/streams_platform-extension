<?php namespace Websemantics\StreamsPlatformExtension;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class StreamsPlatformExtensionServiceProvider
 *`
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @package   Websemantics\StreamsPlatformExtension
 */

class StreamsPlatformExtensionServiceProvider extends AddonServiceProvider
{
    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [

        /* Override Stream Platform Classes */
        'Anomaly\Streams\Platform\Stream\Contract\StreamInterface'           => 'Websemantics\StreamsPlatformExtension\Stream\StreamModel',
        'Anomaly\Streams\Platform\Stream\StreamModel'                        => 'Websemantics\StreamsPlatformExtension\Stream\StreamModel',
        'Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface' => 'Websemantics\StreamsPlatformExtension\Stream\StreamRepository',
        'Anomaly\Streams\Platform\Stream\StreamRepository'                   => 'Websemantics\StreamsPlatformExtension\Stream\StreamRepository',
        'Anomaly\Streams\Platform\Entry\EntryModel'                          => 'Websemantics\StreamsPlatformExtension\Entry\EntryModel',
        'Anomaly\Streams\Platform\Assignment\AssignmentModel'                => 'Websemantics\StreamsPlatformExtension\Assignment\AssignmentModel'
    ];

}


