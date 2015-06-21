<?php namespace Websemantics\StreamsPlatformExtension\Stream;

use Anomaly\Streams\Platform\Stream\StreamRepository as StreamRepositoryBase;

/**
 * Class StreamRepository
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 6th 2015
 * @package   Websemantics\StreamsPlatformExtension
 */

class StreamRepository extends StreamRepositoryBase
{

    /**
     * Create a new StreamRepository instance.
     *
     * @param StreamModel $model
     */
    public function __construct(StreamModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find all streams by their namespace
     *
     * @param  $namespace
     * @return null|StreamInterface
     */
    public function findByNamespace($namespace)
    {
        return $this->model->where('namespace', $namespace)->get();
    }
}
