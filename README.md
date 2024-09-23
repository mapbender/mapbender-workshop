<a href="https://doi.org/10.5281/zenodo.5887014"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.5887014.svg" alt="DOI"></a>


# mapbender-workshop


* the workshop files work with Mapbender 4.0.x
* mapbender-workshop provides a bundle that can be used for individualized design templates 
* you can use this for the adaptation of the frontend and backend
* currently this bundle is used in workshops
* the workshop repository also contains some more demo applications



## Digitizer Demo 

If you would like to try the Digitize Demo application you need a PostgreSQL database with the demo tables. 

You can either:
* load the database backup (PostgreSQL 13/PostGIS 3.1) https://github.com/mapbender/mapbender-workshop/geobasis.backup
* Or create the tables as defined in the documentation https://doc.mapbender.org/en/functions/editing/digitizer.html#sql-for-the-demo-tables



## How to activate the WorkshopDemoBundle

* please note that you have an additional application directory (mapbender/application/) if you use the git installation 

### 1. Copy the directory src/Workshop to mapbender/src/ 

### 2. activate composer autoload for the Workshop directory

* add the Workshop location to your composer.json file (mapbender/composer.json or mapbender/application/composer.json)

```
    "autoload": {
        "psr-4": {
            "": "bin/",
            "App\\": "src/",
            "Workshop\\": "src/Workshop"
            
        }
    },
```    

### 3. dump-autoload

- https://getcomposer.org/doc/03-cli.md#dump-autoload-dumpautoload

```  
cd mapbender or cd mapbender/application
bin/composer dump-autoload
```  

### 4. copy the files from the config directory to your mapbender installation

Make sure to modify the access rights so Apache can access the file (see Mapbender Installation https://doc.mapbender.org/en/installation/installation_ubuntu.html)

* parameters.yaml - contains hints and modifications (optional)
* services.yaml   - makes classes in src/Workshop available
* bundles.php     - refers to the new WorkshopDemoBundle
* twig.yaml       - defines a path for the new WorkshopDemoBundle
* doctrine.yaml   - a new connection geodata_db was added that can be used for search and digitizer


### 5. Create a geobasis database and load the demo data 

* create a PostgreSQL/PostGIS geobasis database
* load the database backup (PostgreSQL/PostGIS) https://github.com/mapbender/mapbender-workshop/geobasis.backup
* Or create the tables as defined in the documentation https://doc.mapbender.org/en/functions/editing/digitizer.html#sql-for-the-demo-tables


### 6. Activate the dev mode and add a new database connection to your .env.local file

- make sure that the connection defined for GEOBASIS_DATABASE_URL refers to your geobasis database
- GEOBASIS_DATABASE_URL is used in the doctrine.yaml for the new connection

```  
APP_ENV=dev

GEOBASIS_DATABASE_URL="postgresql://postgres:postgres@localhost:5432/geobasis?serverVersion=16&charset=utf8"
```  

### 7. Check your configuration

- Check the configuration and clear the cache

```  
bin/console mapbender:config:check
bin/console cache:clear
``` 
