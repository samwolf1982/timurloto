var AutocomleteWidget={
    current_sport_id:null,
    current_country_id:null,
    init:function () {
        this.current_sport_id= $("#popularcountry-sport_id").val();
        this.current_country_id= $("#popularturnire-country_id_id").val();
        $("#popularcountry-sport_id").change(function() {
            AutocomleteWidget.current_sport_id=$("#popularcountry-sport_id option:selected").val();
            AutocomleteWidget.clear();
            // AutocomleteWidget.test(AutocomleteWidget.current_sport_id)
        });

        $("#popularturnire-country_id_id").change(function() {
            AutocomleteWidget.current_country_id=$("#popularturnire-country_id_id option:selected").val();
            AutocomleteWidget.clear();
            // AutocomleteWidget.test(AutocomleteWidget.current_sport_id)
        });
    },
    clear:function () {
        $("#popularcountry-selected_country_id-wrapper input").val('')
        $("#popularcountry-selected_country_id").val('')

        $("#popularturnire-selected_turnire_id-wrapper input").val('')
        $("#popularturnire-selected_turnire_id").val('')




    },
    test:function (data) {
        console.log(data);
    }
}
var autocomleteDropdownInit = function(elId, options, source, ajaxGlobal){
    var el = jQuery('#'+elId);
    var hiddenInput = el.find('input[type="hidden"]');
    var autocompleteInput = el.find('.autocomplete');
    var selectedItemLabel;
    options.select = function(e, ui){
        selectedItemLabel = ui.item.label;
        hiddenInput.val(ui.item.id);
    };

    options.source = function ( request, response ) {

        AutocomleteWidget.test(request);
        // переключалка на разыне роуты для бека
          if(source==='/popularcountry/autocomplete-source'){
              $.ajax({
                  data: { "term": request.term,"sport_id":AutocomleteWidget.current_sport_id},
                  global: ajaxGlobal,
                  type: 'GET',
                  url: source,
                  success: function ( items ) {
                      return response(items);
                  }
              });
          }else if(source==='/popularturnire/autocomplete-source'){
              $.ajax({
                  data: { "term": request.term,"country_id":AutocomleteWidget.current_country_id},
                  global: ajaxGlobal,
                  type: 'GET',
                  url: source,
                  success: function ( items ) {
                      return response(items);
                  }
              });
          }else {
              $.ajax({
                  data: { "term": request.term },
                  global: ajaxGlobal,
                  type: 'GET',
                  url: source,
                  success: function ( items ) {
                      return response(items);
                  }
              });
          }

    };
    autocompleteInput.autocomplete(options);
    autocompleteInput.change(function(){
        if ( selectedItemLabel !== jQuery(this).val() ) {
            hiddenInput.val(null);
        }
    });
};

$(function () {
    AutocomleteWidget.init();
    AutocomleteWidget.test(AutocomleteWidget.current_sport_id);
});



