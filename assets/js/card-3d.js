; (function ($) {

	jQuery( document ).ready(
		function ($) {
			$( ".dp-wrap" ).each(
				function () {
					var container = $( this );
					container.find( ".dp-prev" ).click(
						function () {
							var total = container.find( ".dp_item" ).length;
							container.find( ".dp_item:last-child" ).hide().prependTo( container.find( ".dp-slider3d" ) ).fadeIn();
							container.find( '.dp_item' ).each(
								function (index, dp_item) {
									$( dp_item ).attr( 'data-position', index + 1 );
								}
							);
						}
					);

					container.find( ".dp-next" ).click(
						function () {
							var total = container.find( ".dp_item" ).length;
							container.find( ".dp_item:first-child" ).hide().appendTo( container.find( ".dp-slider3d" ) ).fadeIn();
							container.find( '.dp_item' ).each(
								function (index, dp_item) {
									$( dp_item ).attr( 'data-position', index + 1 );
								}
							);
						}
					);
				}
			);
		}
	);

})( jQuery );