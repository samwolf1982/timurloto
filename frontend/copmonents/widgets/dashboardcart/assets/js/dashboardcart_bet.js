var tottal_coeficient=1;

$(document).ready(function () {
    SmartCart.init();
    SmartCart.getFromCart(); // update cart




    //--------ставка
    // todo
    $('input[type=radio][name=playlistPercent]').change(function() {
              console.log('percent change val: '+this.value);
              SmartCart.currentCooeficientDrop=this.value.replace("%", "");
        SmartCart.getFromCart();
    });

});

var SmartCart={
    currentCooeficientDrop:1,
    currentBalance:0,
    tottal_coeficient:0,
    sumBet:0,
    maybeWin:0,
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
        $(document).on("click", ".bet-parent-val", function(e) {
            SmartCart.addToCart(this);
            e.preventDefault();
            return false;
        });
        // delete
       // $('.bet-coup-list').on('click','.delete-item',function () {
        $(document).on('click','.delete-item',function (e) {
            SmartCart.deleteSingle(this);
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
        data.CartElement.currentCooeficientDrop = SmartCart.currentCooeficientDrop;
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/cart/element/create",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    SmartCart.getFromCart(); // update cart

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
            '<button class="delete-item" ><span class="icon-close2"></span></button>' +
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
                local_tottal_coeficient=1;
                if (json) {

                    $.each(json.elements, function( index, value ) {
//                        console.log([value.item_id,value.parent_id,value]);
                    outcome=    JSON.parse(value.options);
                        console.log(value);
                        console.log(outcome);
    local_tottal_coeficient*=outcome.outcome_coef;
    SmartCart.renderAdd(value.item_id,value.parent_id,value.current_market_name+' '+value.result_type_name+' '+outcome.outcome_name,value.gamers_name,outcome.outcome_coef);
    SmartCart.reloadDom();
    $('#total-coeficient').html( Math.round10(local_tottal_coeficient, -2));
                    });
        SmartCart.tottal_coeficient=local_tottal_coeficient;
        SmartCart.currentBalance=json.currentBalance;
        SmartCart.currentCooeficientDrop=json.currentCooeficientDrop;
        SmartCart.recalculateSumBet();
        SmartCart.recalculateMaybeWin();
        SmartCart.renderCalculate();

                } else {
                    console.log(json);
                }
            }

        });
    },
    recalculateSumBet: function () {
        SmartCart.sumBet=    Math.round10((SmartCart.currentBalance * SmartCart.currentCooeficientDrop / 100), -2)  ;
    },
    recalculateMaybeWin: function () {
        SmartCart.maybeWin=    Math.round10((SmartCart.sumBet * SmartCart.tottal_coeficient), -2)  ;
    },
    renderCalculate: function () {
        $('#currentBalance').html(SmartCart.currentBalance);
        $('#betSum').html(SmartCart.sumBet);
        $('#betSum').parent().removeClass('hidden');

        $('#maybeWin').html(SmartCart.maybeWin);



    },
    deleteSingle:function (el) {



        var id_bet = $(el).parents('li').attr('class');

        var data = {};
        data['elementId']=id_bet;
        // data.CartElement = {};
        // data.CartElement.model = 'common\\models\\Bets';
        // data.CartElement.item_id = $(el).data("id");
        // data.CartElement.cat_id = $(el).data("cat");
        // data.CartElement.players_id = $(el).data("players");
        // data.CartElement.parent_id= $(el).data("parent");
        // data.CartElement.count = 1;
        // data.CartElement.price = 0;
        // data.CartElement.options = $(el).data("options");
        // data.CartElement.current_outcome_id = $(el).data("current_outcome_id");
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/cart/element/delete",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    SmartCart.getFromCart(); // update cart

                } else {
                    console.log(json);
                }
            }

        });




        console.log(id_bet)
        var count_items = $('.bet-coup-list li').length-1;
        if(count_items >= 1){
            $('.no-bet-selected-text').fadeOut(200);
            setTimeout(function () {
                $('.coupon-tabs-wrapper-inner').fadeIn(400);
            },210);
        } else {
            $('.coupon-tabs-wrapper-inner').fadeOut(200);
            setTimeout(function () {
                $('.no-bet-selected-text').fadeIn(400);
            },210);
        }
        if(count_items >= 2){
            $('.ordinator').removeClass('active');
            $('.express').addClass('active');
            $('.all-coeficient,.delete-block').slideDown(400);
        } else {
            $('.ordinator').addClass('active');
            $('.express').removeClass('active');
            $('.all-coeficient,.delete-block').slideUp(400);
        }
        $('.open-coupon .count-coup').text(count_items);
        $('.bets-val[data-id="'+id_bet+'"]').removeClass('selected');
        $('.bet-parent-val[data-id="'+id_bet+'"]').removeClass('selected');
        $(el).parents('li').remove();


    },
    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};






// Замыкание
(function() {
    /**
     * Корректировка округления десятичных дробей.
     *
     * @param {String}  type  Тип корректировки.
     * @param {Number}  value Число.
     * @param {Integer} exp   Показатель степени (десятичный логарифм основания корректировки).
     * @returns {Number} Скорректированное значение.
     */
    function decimalAdjust(type, value, exp) {
        // Если степень не определена, либо равна нулю...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Если значение не является числом, либо степень не является целым числом...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Сдвиг разрядов
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Обратный сдвиг
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    // Десятичное округление к ближайшему
    if (!Math.round10) {
        Math.round10 = function(value, exp) {
            return decimalAdjust('round', value, exp);
        };
    }
    // Десятичное округление вниз
    if (!Math.floor10) {
        Math.floor10 = function(value, exp) {
            return decimalAdjust('floor', value, exp);
        };
    }
    // Десятичное округление вверх
    if (!Math.ceil10) {
        Math.ceil10 = function(value, exp) {
            return decimalAdjust('ceil', value, exp);
        };
    }
})();
