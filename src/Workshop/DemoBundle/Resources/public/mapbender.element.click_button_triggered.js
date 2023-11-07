(function ($) {

    $.widget('mapbender.mbClickButtonTriggered', {
        options: {
            help: undefined,
            link: undefined,
        },
        mbMap: null,
        clickProxy: null,

        _create: function () {
            // on creation, wait for the map to be loaded before continuing setup
            Mapbender.elementRegistry.waitReady('.mb-element-map').then(
                (mbMap) => this._setup(mbMap)
            );
        },

        _setup: function (mbMap) {
            // save reference to map and create proxy for click handler
            // (so "this" is always safe to use within the handler)
            this.mbMap = mbMap;
            this.clickProxy = $.proxy(this._clickHandler, this);
            // this.clickProxy = this._clickHandler.bind(this);
        },

        /**
         * On activation, bind the onClick function to handle map click events.
         * For the call to be made in the right context, the onClickProxy must
         * be used.
         */
        activate: function () {
            console.log('activate');
            if (this.mbMap) {
                this.mbMap.element.on('mbmapclick', this.clickProxy);
                Mapbender.info(Mapbender.trans(this.options.help), 2000);
            }
        },

        /**
         * On deactivation, unbind the onClick handler
         */
        deactivate: function () {
            console.log('deactivate');
            if (this.mbMap) {
                this.mbMap.element.off('mbmapclick', this.clickProxy);
            }
        },


        /**
         * The actual click event handler. The coordinates
         * are extracted and then send to the mapClickWorker
         */
        _clickHandler: function (event, data) {
            console.log('Clicked on map');
            const srsName = Mapbender.Model.getCurrentProjectionCode();
            const deci = (Mapbender.Model.getProjectionUnitsPerMeter(srsName) < 0.25) ? 5 : 2;

            const coordinates = {
                world: {
                    x: data.coordinate[0].toFixed(deci),
                    y: data.coordinate[1].toFixed(deci)
                },
                srs: {
                    current: srsName
                }
            };

            this._clickMapWorker(coordinates);
        },

        /**
         * This should be used for your own logic. This function receives an
         * coordinates object which has two properties 'world' and 'srs' which
         * hold the coordinates and the current of the mouse click.
         */
        _clickMapWorker: function (coordinates) {
            if (confirm('You clicked: ' +
                coordinates.world.x + ' x ' + coordinates.world.y +
                ' (' + coordinates.srs.current + '). Open link?')) {

                const transformedCoordinate = Mapbender.mapEngine.transformCoordinate(
                    coordinates.world,
                    coordinates.srs.current,
                    'EPSG:4326'
                );

                let url = this.options.link || 'http://www.openstreetmap.org/export#map=15/';
                window.open(url + transformedCoordinate.y + '/' + transformedCoordinate.x);
            }


        }
    });

})(jQuery);
