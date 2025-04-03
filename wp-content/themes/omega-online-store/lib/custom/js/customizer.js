/* Customizer JS Upsale*/
( function( api ) {

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($){

    // Tygoraphy
	$('#_customize-input-omega_online_store_heading_font').change(function(){

		var currentfont = this.value;

		var data = {
            'action': 'omega_online_store_customizer_font_weight',
            'currentfont': currentfont,
            '_wpnonce': omega_online_store_customizer.ajax_nonce,
        };
 
        $.post( ajaxurl, data, function(response) {

            if( response ){

                $('#_customize-input-omega_online_store_heading_weight').empty();
                $('#_customize-input-omega_online_store_heading_weight').html(response);

            }

        });

	});	

	// Archive Layout Image Control
    $('.radio-image-buttenset').each(function(){
        
        id = $(this).attr('id');
        $( '[id='+id+']' ).buttonset();
    });

});