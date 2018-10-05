(function($) {

$.widget('mapbender.mbMapKlick', $.mapbender.mbButton, {
    options: {
        target: undefined,
        icon: undefined,
        label: true,
        group: undefined
    },

    map: null,
    mapClickProxy: null,

    _create: function() {
        this._super('_create');
        Mapbender.elementRegistry.onElementReady(this.options.target, $.proxy(this._setup, this));
    },

    _setup: function() {
        this.map = $('#' + this.options.target);
        this.mapClickProxy = $.proxy(this._mapClickHandler, this);
    },

    /**
     * On activation, bind the onClick function to handle map click events.
     * For the call to be made in the right context, the onClickProxy must
     * be used.
     */
    activate: function() {
        this._super('activate');
        if(this.map.length !== 0) {
            this.map.bind('click', this.mapClickProxy);
        }
    },

    /**
     * On deactivation, unbind the onClick handler
     */
    deactivate: function() {
        this._super('deactivate');
        if(this.map.length !== 0) {
            this.map.unbind('click', this.mapClickProxy);
        }
    },

    /**
     * The actual click event handler. Here Pixel and World coordinates
     * are extracted and then send to the mapClickWorker
     */
    _mapClickHandler: function(event) {
        var x = event.pageX - this.map.offset().left,
            y = event.pageY - this.map.offset().top,
            olMap = this.map.data('mapbenderMbMap').map.olMap,
            ll = olMap.getLonLatFromPixel(new OpenLayers.Pixel(x, y)),
            coordinates = {
                pixel: {
                    x: x,
                    y: y
                },
                world: {
                    x: ll.lon,
                    y: ll.lat
                }
            };

        this._mapClickWorker(coordinates);
    },

    /**
     * This should be used for your own logic. This function receives an
     * coordinates object which has two properties 'pixel' and 'world' which
     * hold the pixel and world coordinates of the mouse click. Each property
     * has x and y values.
     */
    _mapClickWorker: function(coordinates) {
        alert('You clicked: ' +
                coordinates.pixel.x + ' x ' + coordinates.pixel.y +
                ' (Pixel), which equals ' +
                coordinates.world.x + ' x ' + coordinates.world.y +
                ' (World).');
       

      // or open OpenStreetMap
      // window.open('http://www.openstreetmap.org/export#map=15/' + coordinates.world.y + '/' + coordinates.world.x);

    }
});

})(jQuery);
