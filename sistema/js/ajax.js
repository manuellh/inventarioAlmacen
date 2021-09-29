console.log('ajax cargado');
$( function() {
    $( "#Proveedor_autocomplete" ).autocomplete({
        source: function( request, response ) {

            $.ajax({
                url: "../js/autocomplete.php",
                type: 'post',
                dataType: "json",
                data: {
                    buscarProveedor: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#Proveedor_autocomplete').val(ui.item.label); // display the selected text
            $('#idProveedor').val(ui.item.value); // save selected id to input
            return false;
        }
    });

    $( "#moneda" ).autocomplete({
        source: function( request, response ) {

            $.ajax({
                url: "../js/autocomplete.php",
                type: 'post',
                dataType: "json",
                data: {
                    buscarMoneda: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#moneda').val(ui.item.label); // display the selected text
            $('#tipoCambio').val(ui.item.value); // save selected id to input
            return false;
        }
    });

    $( "#cliente_autocomplete" ).autocomplete({
        source: function( request, response ) {

            $.ajax({
                url: "../js/autocomplete.php",
                type: 'post',
                dataType: "json",
                data: {
                    buscarCliente: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#cliente_autocomplete').val(ui.item.label); // display the selected text
            $('#idCliente').val(ui.item.value); // save selected id to input
            return false;
        }
    });

    $( "#moneda_CV" ).autocomplete({
        source: function( request, response ) {

            $.ajax({
                url: "../js/autocomplete.php",
                type: 'post',
                dataType: "json",
                data: {
                    busca_id_moneda: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#moneda_CV').val(ui.item.label); // display the selected text
            $('#id_moneda_CV').val(ui.item.value); // save selected id to input
            return false;
        }
    });



});
