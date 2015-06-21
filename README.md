# Stream Platform Extension

This example extension is a how-to guide to extending the Stream Platform core. 

After successfully installing the extension, all newly created streams will get custom  generated code for the stream models and their translations, find template here `resources/assets/generator/model.twig` & `resources/assets/generator/translation.twig`

This will make it easy to have a common super-class for your module generated streams. You can set the super-class from the config file `resources/config/settings.php`

Here's a list of all the extended core classes/interfaces:

* Anomaly\Streams\Platform\Stream\StreamModel
* Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface
* Anomaly\Streams\Platform\Stream\StreamRepository
* Anomaly\Streams\Platform\Entry\EntryModel
* Anomaly\Streams\Platform\Assignment\AssignmentModel

Feel free to add your own function etc as your find fit, 

Enjoy
