mapbender-workshop
==================

* mapbender-workshop provides a bundle that can be used in workshops 
* this branch is for the mapbender version 3.0.6
* Get a detailed description about how to use the Workshop-Bundle at:
* http://doc.mapbender3.org/en/book/templates.html


Styling of Backend 
------------------

You can overwrite the manager.html.twig file. It works like this in Symfony.
Follow these steps to add your styling manually:

* Create the file structure to where the file is located f.e
 * /app/Resources/FOMManagerBundle/views/
 * /app/Resources/FOMUserBundle/views/
* You find the sample.twig in the workshop bundle. 
 * https://github.com/mapbender/mapbender-workshop/blob/3.0.6/app/Resources/FOMManagerBundle/views/
 * or copy the file from the origin location to this location
 * cp fom/src/FOM/ManagerBundle/Resources/views/manager.html.twig app/Resources/FOMManagerBundle/views/
* now you can add a new css to you twig
 * <link rel="stylesheet" href="{{ asset('bundles/workshopdemo/manager.css') }}"/>
 * Overwrite Information from the original style or change the twig structure
* You find a sample manager.css in the workshop bundle.
 * https://github.com/mapbender/mapbender-workshop/tree/master/src/Workshop/DemoBundle/Resources/public


