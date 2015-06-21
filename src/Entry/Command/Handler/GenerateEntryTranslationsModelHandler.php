<?php namespace Websemantics\StreamsPlatformExtension\Entry\Command\Handler;

use Anomaly\Streams\Platform\Application\Application;
use Websemantics\StreamsPlatformExtension\Entry\Command\GenerateEntryTranslationsModel;
use Anomaly\Streams\Platform\Entry\Parser\EntryNamespaceParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTranslationsClassParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTranslationsTableParser;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Support\Parser;

/**
 * Class GenerateEntryTranslationsModelHandler
 *
 * @link      http://websemantics.ca/ibuild
 * @link      http://ibuild.io
 * @author    WebSemantics, Inc. <info@websemantics.ca>
 * @author    Adnan Sagar <msagar@websemantics.ca>
 * @copyright 2012-2015 Web Semantics, Inc.
 * @since     April 6th 2015
 * @package   Websemantics\StreamsPlatformExtension
 */

class GenerateEntryTranslationsModelHandler
{

    /**
     * The parser utility.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new GenerateEntryTranslationsModelHandler instance.
     *
     * @param Parser      $parser
     * @param Application $application
     */
    function __construct(Parser $parser, Application $application)
    {
        $this->parser      = $parser;
        $this->application = $application;
    }

    /**
     * Handle the command.
     *
     * @param GenerateEntryTranslationsModel $command
     */
    public function handle(GenerateEntryTranslationsModel $command)
    {
        $stream = $command->getStream();

        $data = $this->getTemplateData($stream);

        $template = file_get_contents(__DIR__ . '/../../../../resources/assets/generator/translation.twig');

        $file = $this->getFilePath($stream);

        @unlink($file);

        file_put_contents($file, $this->parser->parse($template, $data));
    }

    /**
     * Get the compiled entry model path for a stream.
     *
     * @param  StreamInterface $stream
     * @return string
     */
    protected function getFilePath(StreamInterface $stream)
    {
        $path = $this->application->getStoragePath('models/' . studly_case($stream->getNamespace()));

        $path .= '/' . studly_case($stream->getNamespace()) . studly_case($stream->getSlug());

        return $path . 'EntryTranslationsModel.php';
    }

    /**
     * Get the template data from a stream object.
     *
     * @param  StreamInterface $stream
     * @return array
     */
    protected function getTemplateData(StreamInterface $stream)
    {
        $entryModelTranslations = config('websemantics.extension.streams_platform::settings.entry_model_translations');

        return [
            'entry_model_translations' => $entryModelTranslations,
            'namespace' => (new EntryNamespaceParser())->parse($stream),
            'class'     => (new EntryTranslationsClassParser())->parse($stream),
            'table'     => (new EntryTranslationsTableParser())->parse($stream),
        ];
    }
}
