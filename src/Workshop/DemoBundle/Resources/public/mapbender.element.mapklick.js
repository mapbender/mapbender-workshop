(function($) {

$.widget('mapbender.mbMapKlick', $.mapbender.mbButton, {
    options: {
	target: undefined,
	icon: undefined,
	label: true,
	group: undefined
    },
    map: null,
    mbMap: null,
    mapClickProxy: null,
        // invoked on close; informs controlling button to de-highlight
    closeCallback: null,
    isActive: false,

        _create: function() {
            var self = this;
            var target = this.options.target;
            Mapbender.elementRegistry.waitReady(target).then(
                function(mbMap) {
                    self._setup(mbMap);
                },
                function() {
                    Mapbender.checkTarget("mbMapKlick", target);
                }
            );
        },

    _setup: function(mbMap) {
        //this.map = $('#' + this.options.target);
        //this.mapClickProxy = $.proxy(this._mapClickHandler, this);
            this.mbMap = mbMap;
            this.mbMap.element.on('mbmapclick', this._mapClickHandler.bind(this));

    },

    /**
     * On activation, bind the onClick function to handle map click events.
     * For the call to be made in the right context, the onClickProxy must
     * be used.
     */
    activate: function() {
        this._super('activate');
        if(this.mbMap.length !== 0) {
            this.mbMap.element.off('mbmapclick', this.mapClickProxy);
        }
    },

    /**
     * On deactivation, unbind the onClick handler
     */
    deactivate: function() {
        this._super('deactivate');
        if(this.mbMap.length !== 0) {
            this.mbMap.element.off('mbmapclick', this.mapClickProxy);
        }
    },



    /**
     * The actual click event handler. The coordinates
     * are extracted and then send to the mapClickWorker
     */
    _mapClickHandler: function(event, data) {

 	    var srsName = Mapbender.Model.getCurrentProjectionCode();
            var deci = (Mapbender.Model.getProjectionUnitsPerMeter(srsName) < 0.25) ? 5 : 2;

            var coordinates = {
                world: {
                    x: data.coordinate[0].toFixed(deci),
                    y: data.coordinate[1].toFixed(deci)
                },
		srs: {
		    current: srsName
		}
              };

        this._mapClickWorker(coordinates);
    },

    /**
     * This should be used for your own logic. This function receives an
     * coordinates object which has two properties 'world' and 'srs' which
     * hold the coordinates and the current of the mouse click.
     */
    _mapClickWorker: function(coordinates) {
        alert('You clicked: ' +
                coordinates.world.x + ' x ' + coordinates.world.y +
                ' (' + coordinates.srs.current + ')');


      // or open OpenStreetMap
      // window.open('http://www.openstreetmap.org/export#map=15/' + coordinates.world.y + '/' + coordinates.world.x);

    }
});

})(jQuery);
