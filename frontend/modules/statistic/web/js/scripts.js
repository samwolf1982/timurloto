if (typeof dvizh == "undefined" || !dvizh) {
    var dvizh = {};
}

var buyElementButton = '[data-role=cart-buy-button]';
jQuery(document).on('click', buyElementButton, function (event) {

    var self = this;
    url = jQuery(self).data('url');
    itemModelName = jQuery(self).data('model');
    itemId = jQuery(self).data('id');
    itemCount = jQuery(self).data('count');
    itemPrice = jQuery(self).data('price');
    // var   itemOptionsT = $(this).data('options');  // ЗА ТАКОЕ ПО ПАЛЬЦАМ ЛИНЕЙКОЙ НУЖНО БИТЬ
    var   itemOptionsT = $(this).attr('data-options');
    console.log(itemOptionsT);
    dvizh.cart.addElement(itemModelName, itemId, itemCount, itemPrice, itemOptionsT, url);
    // if (event.preventDefault) {
    //     event.preventDefault();
    // } else {
    //     event.returnValue = false;
    // }
    // event.stopImmediatePropagation();
    // event.preventDefault();
    return false;
});

dvizh.cart = {
    init: function () {

        cartElementsCount = '[data-role=cart-element-count]';
        buyElementButton = '[data-role=cart-buy-button]';
        deleteElementButton = '[data-role=cart-delete-button]';
        truncateCartButton = '[data-role=truncate-cart-button]';

        dvizh.cart.csrf = jQuery('meta[name=csrf-token]').attr("content");
        dvizh.cart.csrf_param = jQuery('meta[name=csrf-param]').attr("content");

        jQuery(document).on('change', cartElementsCount, function () {

            var self = this,
                url = jQuery(self).data('href');

            if (jQuery(self).val() < 0) {
                jQuery(self).val('0');
                return false;
            }

            cartElementId = jQuery(self).data('id');
            cartElementCount = jQuery(self).val();

            dvizh.cart.changeElementCount(cartElementId, cartElementCount, url);
            dvizh.cart.changeElementCost(cartElementId, cartElementCount, url);
        });



        jQuery(document).on('click', truncateCartButton, function () {

            var self = this,
                url = jQuery(self).data('url');

            dvizh.cart.truncate(url);
            
            return false;
        });

        jQuery(document).on('click', deleteElementButton, function (e) {

            e.preventDefault();
;
            var self = this,
                url = jQuery(self).data('url'),
                elementId = jQuery(self).data('id');

            dvizh.cart.deleteElement(elementId, url);

            var imgtodrag =  $('#remove_cart_id_'+elementId);

            if (imgtodrag) {

                imgtodrag.hide('slow', function(){
                    $(this).remove();
                });
            }


            if (lineSelector = jQuery(self).data('line-selector')) {
               // jQuery(self).parents(lineSelector).last().hide('slow');

            }

            return false;
        });
        
        jQuery(document).on('click', '.dvizh-arr', this.changeInputValue);
        jQuery(document).on('change', '.dvizh-cart-element-before-count', this.changeBeforeElementCount);
        jQuery(document).on('change', '.dvizh-option-values-before', this.changeBeforeElementOptions);
        jQuery(document).on('change', '.dvizh-option-values', this.changeElementOptions);

       // jQuery(document).on('change', '.dvizh-cart-element-before-count', this.changeInputValue);
       // jQuery(document).on('change', '.dvizh-cart-element-before-count', this.changeBeforeElementCount);

        return true;
    },
    elementsListWidgetParams: [],
    jsonResult: null,
    csrf: null,
    csrf_param: null,
    changeElementOptions: function () {

        jQuery(document).trigger("changeCartElementOptions", this);

        var id = jQuery(this).data('id');

        var options = {};

        if (jQuery(this).is('select')) {
            var els = jQuery('.dvizh-cart-option' + id);
        }
        else {
            var els = jQuery('.dvizh-cart-option' + id + ':checked');
            console.log('radio');
        }

        jQuery(els).each(function () {
            var name = jQuery(this).data('id');

            options[id] = jQuery(this).val();
        });

        var data = {};
        data.CartElement = {};
        data.CartElement.id = id;
        data.CartElement.options = JSON.stringify(options);


        dvizh.cart.sendData(data, jQuery(this).data('href'));

        return false;
    },
    changeBeforeElementOptions: function () {

        var id = jQuery(this).data('id');
        var filter_id = jQuery(this).data('filter-id');
        var buyButton = jQuery('.dvizh-cart-buy-button' + id);

        var options = jQuery(buyButton).data('options');
        if (!options) {
            options = {};
        }

        options[filter_id] = jQuery(this).val();

        jQuery(buyButton).data('options', options);
        jQuery(buyButton).attr('data-options', options);

        $parent_food=jQuery(this).closest('.food');
        $modificator=$parent_food.find('.dvizh-cart-element-before-count').val();
        if (typeof $modificator === 'undefined'){
            console.log('Возможно карточка продукта 1 ');
            $modificator=    $('#single_prod_page .dvizh-cart-element-before-count').val()
          //  dvizh-cart-element-before-count

        }


        jQuery(document).trigger("beforeChangeCartElementOptions", {id:id,val:$modificator});

       console.log('oki n modif');


        return true;
    },
    deleteElement: function (elementId, url) {
        console.log('pip3');
        dvizh.cart.sendData({elementId: elementId}, url);

        return false;
    },
    changeInputValue: function () {

        console.log('changeInputValue');
        var val = parseInt(jQuery(this).siblings('input').val());
        var input = jQuery(this).siblings('input');

        if (jQuery(this).hasClass('dvizh-downArr')) {
            if (val <= 1) {
                val=1;
            }else{
                val--;
            }


            jQuery(input).val(val);
        }
        else {
            val=val + 1;
            jQuery(input).val(val);
        }


        jQuery(input).change();
        // берем родителя food    // ищем модификатор и инпут и шлем в модификаторы

         $parent_food=jQuery(this).closest('.food');

        //$parent_food=$(this).parent().parent().parent('.porciya_drop_price');
        //$parent_food=$(this).parent();
//STOP HERE     POST
//         options	[
//             3 => '16'
//     ]
//         productId	'36'
//         _csrf	'FIOVvUeLnk6TmD9coc3hiV5czH5cLGGipj6mJ9h_4YIlws_fNsHmOMv6YGSXj9feKjv_MwxrBObNVM8TgDLR0A=='

         $prod_id=input.data('id');
        $modificator=$parent_food.find('.dvizh-option-values-before');

        console.log( $modificator);
        $modif_val=$modificator.val();
        $modif_id=$modificator.attr('data-filter-id');

        console.log( [input.attr('name') , $prod_id,$modif_id,$modif_val,val]);
        // dvizh.cart.sendData(data, '/shop/tools/get-modification-by-options');

      // console.log(  input.attr('name'));
        ia=input.attr('name');
       if (input.attr('name')!='CartElement[count]'){ // если не корзина
            dvizh.modificationconstruct.setModification($prod_id,val);
       }else {
           console.log('in cart');
       }


        return false;
    },
    changeBeforeElementCount: function () {
        if (jQuery(this).val() <= 0) {
            jQuery(this).val('1');
        }

        var id = jQuery(this).data('id');
        var buyButton = jQuery('.dvizh-cart-buy-button' + id);
        jQuery(buyButton).data('count', jQuery(this).val());
        jQuery(buyButton).attr('data-count', jQuery(this).val());

        //узнаем цену и меняем значение.
        //
        //     link = '/cart/element/create';
        //
        //
        //
        //
        // data.elementsListWidgetParams = dvizh.cart.elementsListWidgetParams;
        // data[dvizh.cart.csrf_param] = dvizh.cart.csrf;
        //
        // jQuery('.dvizh-cart-block').css({'opacity': '0.3'});
        // jQuery('.dvizh-cart-count').css({'opacity': '0.3'});
        // jQuery('.dvizh-cart-price').css({'opacity': '0.3'});
        // jQuery('.dvizh-cart-price-ext').css({'opacity': '0.3'});
        // jQuery('.dvizh-cart-price-total').css({'opacity': '0.3'});
        //
        // jQuery.post(link, data,
        //     function (json) {
        //         jQuery('.dvizh-cart-block').css({'opacity': '1'});
        //         jQuery('.dvizh-cart-count').css({'opacity': '1'});
        //         jQuery('.dvizh-cart-price').css({'opacity': '1'});
        //         jQuery('.dvizh-cart-price-ext').css({'opacity': '1'});
        //         jQuery('.dvizh-cart-price-total').css({'opacity': '1'});
        //
        //         if (json.result == 'fail') {
        //             console.log(json.error);
        //         }
        //         else {
        //             dvizh.cart.renderCart(json);
        //             $(document).trigger('dvizhCartChanged');
        //         }
        //
        //     }, "json");
        //узнаем цену и меняем значение.



        return true;
    },
    changeElementCost: function(cartElementId, cartElementCount) {
        var newCost = jQuery('.dvizh-cart-element-price'+cartElementId).html() * cartElementCount;
        jQuery('.dvizh-cart-element-cost'+cartElementId).html(newCost);
    },
    changeElementCount: function (cartElementId, cartElementCount, url) {

        var data = {};
        data.CartElement = {};
        data.CartElement.id = cartElementId;
        data.CartElement.count = cartElementCount;

        dvizh.cart.sendData(data, url);

        return false;
    },
    addElement: function (itemModelName, itemId, itemCount, itemPrice, itemOptions, url) {

        var data = {};
        data.CartElement = {};
        data.CartElement.model = itemModelName;
        data.CartElement.item_id = itemId;
        data.CartElement.count = itemCount;
        data.CartElement.price = itemPrice;
        data.CartElement.options = itemOptions;

        // CartElement[options][3]: 16
        console.log(itemModelName);
        console.log(itemId);
        console.log(itemOptions);
        console.log(['data_WER',itemOptions]);
        if('common\\models\\Productext'==itemModelName  ){ // для комплекса модификация опций
            //data.CartElement.options.complexlist = [{'id':123,'count':1,'modif':''},{'id':1234,'count':3,'modif':''}];
           // data.CartElement.options.complexlist = [{'id':123,'count':1,'modif':''},{'id':1234,'count':3,'modif':''}];
        }


        dvizh.cart.sendData(data, url);

        return false;
    },
    truncate: function (url) {

        dvizh.cart.sendData({}, url);
        return false;
    },

    sendData: function (data, link) {
        console.log('pip4');


        if (!link) {
            link = '/cart/element/create';
        }

        jQuery(document).trigger("sendDataToCart", data);

        data.elementsListWidgetParams = dvizh.cart.elementsListWidgetParams;
        data[dvizh.cart.csrf_param] = dvizh.cart.csrf;

        jQuery('.dvizh-cart-block').css({'opacity': '0.3'});
        jQuery('.dvizh-cart-count').css({'opacity': '0.3'});
        jQuery('.dvizh-cart-price').css({'opacity': '0.3'});
        jQuery('.dvizh-cart-price-ext').css({'opacity': '0.3'});
        jQuery('.dvizh-cart-price-total').css({'opacity': '0.3'});
        jQuery('.dvizh-cart-delivery-price').css({'opacity': '0.3'});

        jQuery.post(link, data,
            function (json) {
                jQuery('.dvizh-cart-block').css({'opacity': '1'});
                jQuery('.dvizh-cart-count').css({'opacity': '1'});
                jQuery('.dvizh-cart-price').css({'opacity': '1'});
                jQuery('.dvizh-cart-price-ext').css({'opacity': '1'});
                jQuery('.dvizh-cart-price-total').css({'opacity': '1'});
                jQuery('.dvizh-cart-delivery-price').css({'opacity': '1'});

                if (json.result == 'fail') {
                    console.log(json.error);
                }
                else {
                    dvizh.cart.renderCart(json);
                    $(document).trigger('dvizhCartChanged');
                }

            }, "json");

        return false;
    },
    renderCart: function (json) {
        console.log('pip5');
        if (!json) {
            var json = {};
            jQuery.post('/cart/default/info', {},
                function (answer) {
                    json = answer;
                    console.log('not json only update');

                    if(json['info_message']!=''){
                        showStackBottomRight('notice',json['info_message']);
                    }else{
                        PNotify.removeAll();
                    }


                }, "json");
        }
        console.log(json);
        if(json['info_message']!='' && typeof json['info_message'] != 'undefined'){
            if (typeof showStackBottomRight !== 'undefined'){
                showStackBottomRight('notice',json['info_message']);
            }


        }else{
            PNotify.removeAll();
        }

        jQuery('.dvizh-cart-block').replaceWith(json.elementsHTML);
        jQuery('.dvizh-cart-count').html(json.count);
        jQuery('.dvizh-cart-price').html(json.price);
        jQuery('.dvizh-cart-price-ext').html(json.total_price_ext);
        jQuery('.dvizh-cart-price-total').html(json.total_price);
        jQuery('.dvizh-cart-delivery-price').html(json.delivery_price);
        jQuery('.count_prod_in_cart').attr('title', json.count);

        jQuery('#cart_price_'+json.elementId).html(json.single_price);


        console.log('change price');
        console.log(json);

        jQuery(document).trigger("renderCart", json);

        return true;
    },
    renderCartmap: function (json) {
        console.log('pip map');
        if (!json) {
            jQuery('.dvizh-cart-price-total').css({'opacity': '0.3'});
            jQuery('.dvizh-cart-delivery-price').css({'opacity': '0.3'});
            var json = {};
            jQuery.post('/cart/default/infomap', {distance: distance },
                function (answer) {
                    json = answer;
                    console.log('not json only update');
                    if(json['info_message']!=''){
                        showStackBottomRight('notice',json['info_message']);
                    }else{
                        PNotify.removeAll();
                    }
                    console.log(json);
                    jQuery('.dvizh-cart-price-total').html(json.total_price);
                    jQuery('.dvizh-cart-delivery-price').html(json.delivery_price);
                    jQuery('.dvizh-cart-price-total').css({'opacity': '1'});
                    jQuery('.dvizh-cart-delivery-price').css({'opacity': '1'});

                }, "json");
        }
        console.log(json);
        if(json['info_message']!='' && typeof json['info_message'] != 'undefined'){
            showStackBottomRight('notice',json['info_message']);
        }else{
            PNotify.removeAll();
        }

        jQuery('.dvizh-cart-block').replaceWith(json.elementsHTML);
        jQuery('.dvizh-cart-count').html(json.count);
        jQuery('.dvizh-cart-price').html(json.price);
        jQuery('.dvizh-cart-price-ext').html(json.total_price_ext);
        jQuery('.dvizh-cart-price-total').html(json.total_price);

        jQuery('.count_prod_in_cart').attr('title', json.count);

        jQuery('#cart_price_'+json.elementId).html(json.single_price);


        console.log('change price');

        jQuery(document).trigger("renderCart", json);

        return true;
    },
};

$(function() {
    dvizh.cart.init();
});

var gate_submit_map=false;

function on_submit_cart(event) {

    var form=$(this);

    if(gate_submit_map){
        console.log('gate '+gate_submit_map)
        form.submit();
    }else{

        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        event.stopImmediatePropagation();
        event.preventDefault();



        // cart update check
        // dvizh.cart.renderCartmap();
        jQuery.post('/cart/default/infomap', {distance: distance },
            function (answer) {
                json = answer;
                console.log('not json only update');
                if(json['info_message']!=''){
                    showStackBottomRight('notice',json['info_message']);
                }else{
                    PNotify.removeAll();
                }
                if(json['confirm_order_delivery_distrance']==true){
                    gate_submit_map=true;
                    console.log('GATE open');

                    var form=$('#w0');
                    form.submit();

                }else{
                    console.log('GATE close');
                    gate_submit_map=false;
                }
                // console.log(json);
              //  gate_submit_map=true;
            //    form.submit();
            }, "json");
        //gate_submit_map=true;

        if(1){
            console.log('on_submit_cart 1');
            return false;
        }else{
            console.log('on_submit_cart2');
            return false;
        }
        // e.preventDefault(); // avoid to execute the actual submit of the form
        return false;

    }
    // default val
    console.log('def val submit is error');
}



