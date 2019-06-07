mapbender-workshop
==================

* mapbender-workshop provides a bundle that can be used for individualized design templates 
* you can use this for the adaptation of the frontend and backend
* currently this bundle is used in workshops and various projects
* Get a detailed description about how to use the Workshop-Bundle for your applications at:
* http://doc.mapbender.org/en/book/templates.html


Styling of Backend 
------------------

You can overwrite the manager.html.twig file. It works like this in Symfony.
Follow these steps to add your styling manually:

* Create the file structure to where the file is located f.e

```
  /app/Resources/MapbenderManagerBundle/views/
  /app/Resources/MapbenderCoreBundle/views/
  /app/Resources/FOMUserBundle/views/Password/
```

* You find the sample.twig in the [workshop bundle](https://github.com/mapbender/mapbender-workshop/tree/master/app/Resources/)
* or copy the file from the origin location to this location

```
    cp fom/src/Mapbender/ManagerBundle/Resources/views/manager.html.twig app/Resources/MapbenderManagerBundle/views/
```

* now you can add a new css to you twig

```
  <link rel="stylesheet" href="{{ asset('bundles/workshopdemo/manager.css') }}"/>
```

* Overwrite Information from the original style or change the twig structure
* You find a sample manager.css in the [workshop bundle](https://github.com/mapbender/mapbender-workshop/tree/master/src/Workshop/DemoBundle/Resources/public)


