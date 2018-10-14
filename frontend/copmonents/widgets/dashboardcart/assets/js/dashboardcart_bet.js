var tottal_coeficient=0;
$(document).ready(function () {
    SmartCart.init();
    SmartCart.getFromCart(); // update cart
});

var SmartCart={
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
        $(document).on("click", ".bet-parent-val", function(e) {
            //  DashboardCategoryGroup.sendData(this,$(this).data());
            // $(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);

            SmartCart.addToCart(this);

            e.preventDefault();
            return false;
        });

        console.log('Init SmartCart');
    },
    addToCart: function (el) {
        var data = {};
        data.CartElement = {};
        data.CartElement.model = 'common\\models\\Bets';
        data.CartElement.item_id = $(el).data("id");
        data.CartElement.cat_id = $(el).data("cat");
        data.CartElement.players_id = $(el).data("players");
        data.CartElement.parent_id= $(el).data("parent");
        data.CartElement.count = 1;
        data.CartElement.price = 0;
        data.CartElement.options = $(el).data("options");
        data.CartElement.current_outcome_id = $(el).data("current_outcome_id");
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/cart/element/create",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                console.log(json);
                if (json.elementsHTML) {

                    SmartCart.render(el,json);
                    // console.log(data.elementsHTML);
                    // $("#cartBet .cartElements").html(data.elementsHTML);

                } else {
                    console.log(json);
                }
            }

        });
    },

    render:function (el,json) {

        var id_for_bets = $(el).attr('data-id');
        var data_parent = $(el).parents('.row-collapse-inner').attr('data-parents');
        var name_competition = $(el).parents('.row-collapse-inner').find('.info-bet .value-bet').text();
        var name_bet = $(el).attr('data-text') + '&nbsp;' + $(el).find('.title-bet').text();
        // var name_bet = $(this).attr('data-text');
        var coefficient_bet = $(el).find('.value-bet').text();
        var coeficient = parseFloat($(el).find('.value-bet').text());
        if(!$(el).hasClass('selected')){
            tottal_coeficient = tottal_coeficient + coeficient;
            // $('#total-coeficient').text(tottal_coeficient);
            SmartCart.renderAdd(id_for_bets,data_parent,name_competition,name_bet,coefficient_bet)
            // $('.bet-coup-list').append('<li class="'+id_for_bets+'" data-child="'+data_parent+'">' +
            //     '<div class="bet-coup-info">' +
            //     '<div class="bet-coup-icon">' +
            //     ' <input type="checkbox" id="'+id_for_bets+'" checked="checked">' +
            //     ' <label for="'+id_for_bets+'"></label>' +
            //     '</div>' +
            //     '<div class="bet-coup-text">'+name_competition+'</div>' +
            //     '<button class="delete-item"><span class="icon-close2"></span></button>' +
            //     '</div>' +
            //     '<div class="bet-calc-row">' +
            //     '<div class="title-bet-calc">'+name_bet+'</div>' +
            //     '<div class="percent-bet-calc">x <span class="perc-for-calc">'+coefficient_bet+'</span></div>' +
            //     '</div>' +
            //     '</li>');
        }
        SmartCart.reloadDom(el)
        // var count_items = $('.bet-coup-list li').length;
        // if(count_items >= 1){
        //     $('.no-bet-selected-text').fadeOut(400);
        //     setTimeout(function () {
        //         $('.coupon-tabs-wrapper-inner').fadeIn(400);
        //     },410);
        // } else {
        //     $('.coupon-tabs-wrapper-inner').fadeOut(400);
        //     setTimeout(function () {
        //         $('.no-bet-selected-text').fadeIn(400);
        //     },410);
        // }
        // if(count_items > 1){
        //     $('.ordinator').removeClass('active');
        //     $('.express').addClass('active');
        //     $('.all-coeficient,.delete-block').slideDown(400);
        // } else {
        //     $('.ordinator').addClass('active');
        //     $('.express').removeClass('active');
        //     $('.all-coeficient,.delete-block').slideUp(400);
        // }
        // $('.open-coupon .count-coup').text(count_items);
        // $(el).parents('.row-collapse').find('.bet-parent-val').removeClass('selected');
        // $(el).toggleClass('selected');


        // var id_for_bets = $(this).attr('data-id');
        // var data_parent = $(this).parents('.row-collapse-inner').attr('data-parents');
        // var name_competition = $(this).parents('.row-collapse-inner').find('.info-bet .value-bet').text();
        // var name_bet = $(this).attr('data-text') + '&nbsp;' + $(this).find('.title-bet').text();
        // // var name_bet = $(this).attr('data-text');
        // var coefficient_bet = $(this).find('.value-bet').text();
        // var coeficient = parseFloat($(this).find('.value-bet').text());
        // if(!$(this).hasClass('selected')){
        //     tottal_coeficient = tottal_coeficient + coeficient;
        //
        //     // $('#total-coeficient').text(tottal_coeficient);
        //     $('li[data-child="'+data_parent+'"]').remove();
        //     $('.bet-coup-list').append('<li class="'+id_for_bets+'" data-child="'+data_parent+'">' +
        //         '<div class="bet-coup-info">' +
        //         '<div class="bet-coup-icon">' +
        //         ' <input type="checkbox" id="'+id_for_bets+'" checked="checked">' +
        //         ' <label for="'+id_for_bets+'"></label>' +
        //         '</div>' +
        //         '<div class="bet-coup-text">'+name_competition+'</div>' +
        //         '<button class="delete-item"><span class="icon-close2"></span></button>' +
        //         '</div>' +
        //         '<div class="bet-calc-row">' +
        //         '<div class="title-bet-calc">'+name_bet+'</div>' +
        //         '<div class="percent-bet-calc">x <span class="perc-for-calc">'+coefficient_bet+'</span></div>' +
        //         '</div>' +
        //         '</li>');
        // }
        // var count_items = $('.bet-coup-list li').length;
        // if(count_items >= 1){
        //     $('.no-bet-selected-text').fadeOut(400);
        //     setTimeout(function () {
        //         $('.coupon-tabs-wrapper-inner').fadeIn(400);
        //     },410);
        // } else {
        //     $('.coupon-tabs-wrapper-inner').fadeOut(400);
        //     setTimeout(function () {
        //         $('.no-bet-selected-text').fadeIn(400);
        //     },410);
        // }
        // if(count_items > 1){
        //     $('.ordinator').removeClass('active');
        //     $('.express').addClass('active');
        //     $('.all-coeficient,.delete-block').slideDown(400);
        // } else {
        //     $('.ordinator').addClass('active');
        //     $('.express').removeClass('active');
        //     $('.all-coeficient,.delete-block').slideUp(400);
        // }
        // $('.open-coupon .count-coup').text(count_items);
        // $(this).parents('.row-collapse').find('.bet-parent-val').removeClass('selected');
        // $(this).toggleClass('selected');

    },

    renderAdd: function (id_for_bets,data_parent,name_competition,name_bet,coefficient_bet) {

        $('li[data-child="'+data_parent+'"]').remove();
        $('.bet-coup-list').append('<li class="'+id_for_bets+'" data-child="'+data_parent+'">' +
            '<div class="bet-coup-info">' +
            '<div class="bet-coup-icon">' +
            ' <input type="checkbox" id="'+id_for_bets+'" checked="checked">' +
            ' <label for="'+id_for_bets+'"></label>' +
            '</div>' +
            '<div class="bet-coup-text">'+name_competition+'</div>' +
            '<button class="delete-item"><span class="icon-close2"></span></button>' +
            '</div>' +
            '<div class="bet-calc-row">' +
            '<div class="title-bet-calc">'+name_bet+'</div>' +
            '<div class="percent-bet-calc">x <span class="perc-for-calc">'+coefficient_bet+'</span></div>' +
            '</div>' +
            '</li>');
    },

    reloadDom:function (el){
        var count_items = $('.bet-coup-list li').length;
        if(count_items >= 1){
            $('.no-bet-selected-text').fadeOut(400);
            setTimeout(function () {
                $('.coupon-tabs-wrapper-inner').fadeIn(400);
            },410);
        } else {
            $('.coupon-tabs-wrapper-inner').fadeOut(400);
            setTimeout(function () {
                $('.no-bet-selected-text').fadeIn(400);
            },410);
        }
        if(count_items > 1){
            $('.ordinator').removeClass('active');
            $('.express').addClass('active');
            $('.all-coeficient,.delete-block').slideDown(400);
        } else {
            $('.ordinator').addClass('active');
            $('.express').removeClass('active');
            $('.all-coeficient,.delete-block').slideUp(400);
        }
        $('.open-coupon .count-coup').text(count_items);
        $(el).parents('.row-collapse').find('.bet-parent-val').removeClass('selected');
        $(el).toggleClass('selected');
    },

    getFromCart:function () {
        // /cart/default/info
        var data = {};
        data.CartElement = {};
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/cart/default/info",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {

                    $.each(json.elements, function( index, value ) {
//                        console.log([value.item_id,value.parent_id,value]);
                    outcome=    JSON.parse(value.options);
                        console.log(value);
                        console.log(outcome);


                        // $.each(JSON.parse(value.options), function( index_out, value_out ) {
                        //     // console.log([index_out, value_out]);
                        //     //         if(value.current_outcome_id === value_out.outcome_id ){
                        //     //             console.log('OKI');
                        //     //             curent_coef=value_out.outcome_coef;
                        //     //         }
                        // });
                        //outcome.outcome_name
                        SmartCart.renderAdd(value.item_id,value.parent_id,value.current_market_name+' '+value.result_type_name+' '+outcome.outcome_name,value.gamers_name,outcome.outcome_coef);
                        SmartCart.reloadDom();
                    });



                    // console.log(data.elementsHTML);
                    // $("#cartBet .cartElements").html(data.elementsHTML);

                } else {
                    console.log(json);
                }
            }

        });
    },
    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};

