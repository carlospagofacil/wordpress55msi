
const module_code = 'pagofacil_direct_';

var startMsi = function(){
    
    createPaymentForm([]);
    jQuery('#'+module_code+'msi').prop( "disabled", true );
    
    jQuery("input[name='pagofacil_direct_creditcard']").on('blur', function () {
        jQuery('#'+module_code+'msi').prop( "disabled", true );
        getConfiguration( jQuery(this).val(), jQuery("input[name='idSucursal']").val(), jQuery("input[name='monto']").val() );
    });
}

var getConfiguration = function ( creditCardNumber, branchId, companyId ) {

    jQuery.ajax({
        url : 'http://api.core.tech/Woocommerce3ds/Configuration/msi/',
        type: 'GET',
        data: { "creditCardNumber": creditCardNumber, "param15" : branchId, "param16" : companyId },
        success: function ( response ) {
            
            let jsonResponse = JSON.parse(response);
            let items = jsonResponse.configuration;
            items = ( typeof items === "undefined" ) ? [] : items;

            createPaymentForm( items );
            storeConfiguration( items );
        },
        error: function (xhr, status, error) {
            jQuery('#'+module_code+'msi').prop( "disabled", true );
        }
    });
}

var createPaymentForm = function( items ) {
    jQuery('#'+module_code+'msi').empty();

    let optionsDefault = `
        <option value="" label="Forma de Pago" selected="selected" disabled="disabled">Forma de Pago</option>
        <option value="00" label="Contado">Contado</option>
    `;
    
    let paymentAmount = jQuery("input[name='monto']").val();
    
    let options = items.map(item => {
        if( validatePaymentAmount( paymentAmount,item ) ){
            return  `<option value="${item.monthlyPayment}">${item.monthlyPayment} Meses</option>`;
        }
    }).join('');
    //console.log( options, paymentAmount );
    jQuery('#'+module_code+'msi').append( optionsDefault );
    jQuery('#'+module_code+'msi').append( options );
    jQuery('#'+module_code+'msi').prop( "disabled", false );
}


var storeConfiguration = function ( items ) {
    let localStorage = window.localStorage;
    localStorage.setItem( 'configurationItems', JSON.stringify( items ) );
}

var validatePayment = function ( month ) {

    if( month == "00" ){
        return true;
    }

    let storeItems = JSON.parse( localStorage.getItem('configurationItems') );
    let configuration = storeItems.find( item => item.monthlyPayment == month );

    let minAmount = parseFloat( configuration.minLimit );
    let maxAmount = parseFloat( configuration.maxLimit );
    let amount = parseFloat( jQuery("#monto_3ds").val() );

    return ( amount >= minAmount ) && ( amount <= maxAmount );
}

var validatePaymentAmount = function ( amount, objectConfiguration ) {
    
    let minPaymentAmount = parseFloat( objectConfiguration.min );
    let maxPaymentAmount = parseFloat( objectConfiguration.max );
    let paymentAmount = parseFloat( amount );
    
    return ( paymentAmount >= minPaymentAmount ) && ( paymentAmount <= maxPaymentAmount );
}

var showMessageValidation = function ( object, isvalid, amount, msi ) {

    jQuery(".message-ql-result").empty();
    if( !isvalid ){
        let paymentAmount = amount.toFixed(2 );
        let divMessage = `
                <h1>La cantidad de $ ${paymentAmount} no se puede pagar a un plazo de ${msi} Meses sin interéses.</h1>
            `;

        jQuery("#procesar").hide();
        jQuery( object ).css("border", "solid 2px #ed1c24");
        jQuery(".message-ql-result").append( divMessage );
    }else{
        jQuery("#procesar").show();
        jQuery( object ).css("border", "");
    }
}
