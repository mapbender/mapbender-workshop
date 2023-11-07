(function($) {

$.widget('mapbender.mbClick', {
    options: {
	target: undefined,
	icon: undefined,
	label: true,
	group: undefined
    },
    map: null,
    mbMap: null,
    clickProxy: null,
        // invoked on close; informs controlling button to de-highlight
    closeCallback: null,
    isActive: false,
    popup: null,
    useDialog_: null,

        _create: function() {
            var self = this;

            //this.useDialog_ = this.checkDialogMode();
            Mapbender.elementRegistry.waitReady('.mb-element-map').then(function (mbMap) {
               // self.mbMap = mbMap;
                self._setup(mbMap);
            }, function () {
                Mapbender.checkTarget('mbClick');
            });
        },

    _setup: function(mbMap) {
        //this.map = $('#' + this.options.target);
            this.mbMap = mbMap;
            this.clickProxy = $.proxy(this._clickHandler, this);
            this.mbMap = mbMap;
            this.mbMap.element.on('mbclick', this._ClickHandler.bind(this));

    },

    /**
     * On activation, bind the onClick function to handle map click events.
     * For the call to be made in the right context, the onClickProxy must
     * be used.
     */
    activate: function() {
        console.log('activate');
        //this._super('activate');
        if(this.mbMap.length !== 0) {
            //this.mbMap.bind('click', this.clickProxy);
            this.mbMap.map.olMap.on('click', function(event) {

            });
        }
    },

    /**
     * On deactivation, unbind the onClick handler
     */
    deactivate: function() {
         console.log('deactivate');
        ///this._super('deactivate');
      if(this.mbMap.length !== 0) {
            this.mbMap.unbind('click', this.clickProxy);
        }
    },



    /**
     * The actual click event handler. The coordinates
     * are extracted and then send to the mapClickWorker
     */
    _clickHandler: function(event, data) {
        console.log('Geht click');
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

        this._clickMapWorker(coordinates);
    },

    /**
     * This should be used for your own logic. This function receives an
     * coordinates object which has two properties 'world' and 'srs' which
     * hold the coordinates and the current of the mouse click. 
     */
    _clickMapWorker: function(coordinates) {
        alert('You clicked: ' +
                coordinates.world.x + ' x ' + coordinates.world.y +
                ' (' + coordinates.srs.current + ')');
       

      // or open OpenStreetMap
      // window.open('http://www.openstreetmap.org/export#map=15/' + coordinates.world.y + '/' + coordinates.world.x);

    }
});

})(jQuery);
