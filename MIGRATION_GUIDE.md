Migration Guide
***************************


Migration to Mapbender 3.2
==========================

You can migrate older Mapbender installations to Mapbender 3.2.

Check the [Mapbender Update process](https://doc.mapbender.org/en/installation/update.html).

* Make sure you have PHP >= 7.1.0
* Provide a backup of your database. 
* Update your database schema to 3.2 with app/console doctrine:schema:update --force

Some elements may not work after the update and  need a closer look.

Update map_engine_code
--------------------------
If it makes sense update all applications to map_engine_code cureent.

    Update mb_core_application set map_engine_code = 'current';


SearchRouter
--------------------------

You find a demo at https://github.com/mapbender/mapbender-workshop/blob/release/3.2/app/config/applications/mapbender_demo_nrw.yml

1. deprecated empty: use placeholder instead

2. For text and choice you have to define the full class-path.

You also find information at https://github.com/mapbender/mapbender/wiki/Best-practices:-form-types#inversion-of-choices

You can update the configuration with the following SQL.

    Update mb_core_element set configuration =
    replace(configuration,'s:6:"choice"','s:53:"Symfony\Component\Form\Extension\Core\Type\ChoiceType"')
        where class = 'Mapbender\CoreBundle\Element\SearchRouter';

    Update mb_core_element set configuration =
    replace(configuration,'s:4:"text"','s:51:"Symfony\Component\Form\Extension\Core\Type\TextType"')
    where class = 'Mapbender\CoreBundle\Element\SearchRouter';

    Select configuration from mb_core_element where class = 'Mapbender\CoreBundle\Element\SearchRouter';


3. For choice: Please not that key or value are passed flipped that means value and the key- see also https://github.com/mapbender/mapbender/wiki/Best-practices:-form-types#inversion-of-choices

    choices:
        Bonn - this is the value not the key: Bonn
        Cologne - this is the value not the key: Cologne
        Siegburg - this is the value not the key: Siegburg


SimpleSearch
--------------------------
SimpleSearch element was improved. You can now define the projection of the result that comes from the Solr Service. Mapbender will then transform the result to the projection of the map.

Define sourceSrs in your SimpleSearch definition. If not defined the default ('EPSG:4326') be be choosen. You find an example at https://github.com/mapbender/mapbender-workshop/blob/release/3.2/app/config/applications/mapbender_demo_nrw.yml

                     sourceSrs: 'EPSG:25832'

 
BaseSourceSwitcher
--------------------------
Please note that on start of an apllication all WMS are activated where the root-Layer is activated.

Before 3.2 it was possible to activate all Basesource and only the first WMS was visible on start.


Template / CSS
--------------------------

CSS change and there will be a big redesign in the backend and frontend in the upcoming versions.

* Check the workshop Bundle for the changes
* Define your template as desktop-template


Digitizer
--------------------------

Digitizer is available for Mapbender >= 3.2.2. The new Digitizer Version is 1.4. Some functionality is not updated to 1.4 already (f.e. cluster).

* see list of deprecated features https://github.com/mapbender/mapbender-digitizer/releases/tag/1.4
* see also https://github.com/mapbender/mapbender-digitizer/blob/1.4/Element/Digitizer.php
* you find a demo in the workshop bundle https://github.com/mapbender/mapbender-workshop/blob/release/3.2/app/config/applications/mapbender_digitize_demo.yml
* font definitions see https://github.com/mapbender/mapbender/issues/1308
  - fontSize: 38 definition without px 
  - labelxOffset: 18 (not supported in 3.2.3)
  - labelYOffset: 18 (not supported in 3.2.3)

There is a new style unsaved.

    unsaved:
        strokeWidth: 3
        strokeColor: "#f0f0f0"
        fillColor:   "#ffff"
        fillOpacity: 0.5
        pointRadius: 6
        label: 'Neu - bitte speichern'
        fontColor: red
        fontFamily: 'Arial, Courier New, monospace'
        fontColor: red
        fontSize: 38
        fontWeight: bold


WMS Layer visibility
--------------------------

Make sure that your WMS provides a proper extent for all supported EPSG-codes (this is used and saved in table mb_wms_wmslayersource Spalten latlonbounds und boundingboxes). 
Else it can happen, that a layer is not requested for the given extent of your map.

Sketch
----------
Redlining was renamed to Sketch (>= 3.2.3)

	Update  public.mb_core_element set class = 'Mapbender\CoreBundle\Element\Sketch',
	title = 'mb.core.sketch.class.title'
		where class = 'Mapbender\CoreBundle\Element\Redlining';
		
		
FeatureInfo
--------------
* showOriginal deprecated - parameter not available anymore from 3.2.3
* highlighting: true - new >= 3.2.3 highlights the geometry if you have WKT integrated in the featureinfo result - see https://github.com/mapbender/mapbender/issues/1287 
