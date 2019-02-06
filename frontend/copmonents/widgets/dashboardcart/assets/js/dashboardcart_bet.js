var tottal_coeficient=1;

$(document).ready(function () {
    SmartCart.init();
    SmartCart.getFromCart(); // update cart



});

statusBet=localStorage.getItem('statusBet'); // public  private
if(statusBet === null) {statusBet='public'; localStorage.setItem('statusBet',statusBet);}
var SmartCart={
    currentCooeficientDrop:1,
    currentBalance:0,
    tottal_coeficient:0,
    sumBet:0,
    maybeWin:0,
    max_coeficientDrop:10,
    statusBet:statusBet, // public  private
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");

        // $(document).on("click", ".bet-parent-val", function(e) {
        //
        //     SmartCart.addToCart(this);
        //     e.preventDefault();
        //     return false;
        // });

        $(document).on("click", ".bet-parent-val, .bets-val", function(e) {

           SmartCart.addToCartLocalStorage(this);
            e.preventDefault();
            return false;
        });

        // $(document).on("click", ".bets-val", function(e) {
        //     // SmartCart.addToCart(this);
        //     SmartCart.addToCartLocalStorage(this);
        //     e.preventDefault();
        //     return false;
        // });


        // delete
       // $('.bet-coup-list').on('click','.delete-item',function () {
        $(document).on('click','.delete-item',function (e) {
            SmartCart.deleteSingle(this);
            e.preventDefault();
            return false;
        });

        //--------ставка
        $('input[type=radio][name=playlistPercent]').change(function() {
            console.log('percent change val: '+this.value);
            SmartCart.currentCooeficientDrop=this.value.replace("%", "");
            SmartCart.updateCoefficient(SmartCart.currentCooeficientDrop);
            // SmartCart.getFromCart();
        });


        //-------- cтатус
        $('.type-list').on('click',function () {
            $(this).find('span').toggleClass('show');
            if($(this).find("span.show > .icon-open").length){
                SmartCart.updateStatus('public');
            }else {
                SmartCart.updateStatus('private');
            }
            return false;
        });


        // playlist
        $('input[type=radio][name=playlistUser]').change(function() {
            console.log('playlistUser change val: '+$(this).data('value'));
            SmartCart.updatePlaylist($(this).data('value'));
        });

        // delete-all-bets
        $('.delete-all-bets').on('click',function () {
            SmartCart.deleteAll();

            return false;
        });


        // playlist
        // $('input[type=radio][name=playlistUser]').change(function() {
        //     console.log('playlistUser change val: '+$(this).data('value'));
        //     SmartCart.updatePlaylist($(this).data('value'));
        // });
        $(document).on('change','.bet-coup-info input[type=checkbox]',function (e) {
            console.log('change '+ $(this).attr('id'));
            if ($(this).prop('checked')) {
                SmartCart.updateCheckboxStatus($(this).attr('id'),0);
            }
            else {
                SmartCart.updateCheckboxStatus($(this).attr('id'),1);
            }
            // e.preventDefault();
            return false;
        });
        // // open line
        // $(document).on('click','.total.show-all-bets.do_open_line',function (e) {
        //     SmartCart.getLine(this);
        //     e.preventDefault();
        //     return false;
        // });
        // close line
        $(document).on('click','.closeLine',function (e) {
            SmartCart.hideLine(this);
            e.preventDefault();
            return false;
        });

// закрытие модального для корзины
        $('#modal-success-bet .close').on('click', function (e) {
            console.log('Close modal');
            $('.dashboard-row .dash-right-col').hide();
            location.reload(true);
        });
        console.log('Init SmartCart');
    },

    addToCart: function (el) {   // not use !
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

    addToCartLocalStorage: function (el) {
     var cartLS= JSON.parse ( localStorage.getItem('cartLS'));
        if(!cartLS){
            localStorage.setItem('cartLS',JSON.stringify([]));
            cartLS=JSON.parse(localStorage.getItem( 'cartLS'));
        }
        // data-text1="Манчестер Юнайтед - ПСЖ" data-text2="П1" data-coof="3.11"
        var data = {};
        data.CartElement = {};
        // data.CartElement.group_item_id = $(el).data("id").split('-')[0]; // parent id
      //  data.CartElement.group_item_id = $(el).data("id").split('-')[0]+'_'+$(el).data("id").split('-')[2]; // parent id   // группа фора и тд
        data.CartElement.group_item_id = $(el).data("id").split('-')[0]; // parent id   // группа фора и тд
        data.CartElement.item_id = $(el).data("id");
        data.CartElement.gamersName = $(el).data("text1");
        data.CartElement.name = $(el).data("text2");
        data.CartElement.status = true;
        data.CartElement.coef = $(el).data("coof");
        data.CartElement.shid = $(el).data("shid");
        data.CartElement.spid = $(el).data("spid");
        if(cartLS.length===0){cartLS.push(data);}else{
            gatecartLS=true;
            cartLS.forEach(function (item,i,arr) {
                if(item.CartElement.group_item_id===data.CartElement.group_item_id){
                    console.log('check it' + item.CartElement.group_item_id);
                    arr[i]=data;
                    gatecartLS=false;
                    return;
                }
            });

            if(gatecartLS===true){       // новый об
                console.log('Pusdh data' + data.CartElement.group_item_id);
                cartLS.push(data);
            }

        }
        console.log(data);
        // $.ajax({
        //     url: "/cart/element/create",
        //     type: "POST",
        //     data: data,
        //     dataType: "json",
        //     success: function (json) {
        //
        //         if (json) {
        //             SmartCart.getFromCart(); // update cart
        //
        //         } else {
        //             console.log(json);
        //         }
        //     }
        //
        // });

        localStorage.setItem('cartLS',JSON.stringify(cartLS));

        SmartCart.getFromCart(); // update cart

    },





    updateStatus: function (status) {
        console.log(status)
        localStorage.setItem('statusBet',status)
        SmartCart.statusBet= status;

        // var data = {};
        // data.CartElement = {};
        // data.CartElement.status = status;
        // data[this.csrf_param] = this.csrf;
        // $.ajax({
        //     url: "/cart/element/update-status",
        //     type: "POST",
        //     data: data,
        //     dataType: "json",
        //     success: function (json) {
        //         if (json) {
        //             SmartCart.getFromCart(); // update cart
        //
        //         } else {
        //             console.log(json);
        //         }
        //     }
        // });


    },

    updateCheckboxStatus: function (id,status) {
        // переход в локалстораge
        var cartLS= JSON.parse ( localStorage.getItem('cartLS'));
        cartLS.forEach(function (item,i,arr) {
            if(item.CartElement.item_id===id){
                console.log('check it update Staus ' + item.CartElement.item_id);
                if(item.CartElement.status)arr[i].CartElement.status=false;
                else arr[i].CartElement.status=true;
               return;
            }
        });
        localStorage.setItem('cartLS',JSON.stringify(cartLS));

        // var data = {};
        // data.CartElement = {};
        // data.CartElement.id = id;
        // data.CartElement.status = status;
        // data[this.csrf_param] = this.csrf;
        // $.ajax({
        //     url: "/cart/element/update-bet-status",
        //     type: "POST",
        //     data: data,
        //     dataType: "json",
        //     success: function (json) {
        //             SmartCart.getFromCart(); // update cart
        //     }
        // });

        SmartCart.getFromCart(); // update cart
    },
    updateCoefficient: function (coefficient) {
        var data = {};
        data.CartElement = {};
        data.CartElement.currentCooeficientDrop = SmartCart.currentCooeficientDrop;
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/cart/element/update-coefficient",
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
    updatePlaylist: function (playlist) {
        var data = {};
        data.CartElement = {};
      //  data.CartElement.currentCooeficientDrop = SmartCart.currentCooeficientDrop;
        data.CartElement.playlist = playlist;
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/cart/element/update-playlist",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    SmartCart.getFromCart(); // update cart
                    console.log(json);
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

        }
        SmartCart.reloadDom(el)


    },

    renderAdd: function (id_for_bets,data_parent,name_competition,name_bet,coefficient_bet,status_select_bet) {

        $('li[data-child="'+data_parent+'"]').remove();
        is_checked= '';
        console.log(status_select_bet);
        if(status_select_bet==='true'){
            is_checked= 'checked="checked"';
        }

        $('.bet-coup-list').append('<li class="'+id_for_bets+'" data-child="'+data_parent+'">' +
            '<div class="bet-coup-info">' +
            '<div class="bet-coup-icon">' +
            ' <input type="checkbox" id="'+id_for_bets+'" '+is_checked+'>' +
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


        // статус обнова
        if(SmartCart.statusBet==='private')  $("#statusBetPuPr").html('    <span class=""><i class="icon-open"></i> Открытый</span>\n' + '        <span class="show"><i class="icon-lock"></i> Закрытый</span>');
    },



    getFromCart:function () {
        // /cart/default/info
        var data = {};
        data.CartElement = {};
        var cartLS= JSON.parse ( localStorage.getItem('cartLS'));
        if(!cartLS){
            localStorage.setItem('cartLS',JSON.stringify([]));
            cartLS=JSON.parse(localStorage.getItem( 'cartLS'));
        }
        data.CartElements = cartLS ;
        // data.CartElements = cartLS ;
        data[this.csrf_param] = this.csrf;
        data['currentCooeficientDrop'] = SmartCart.currentCooeficientDrop;
        $.ajax({
            url: "/cart/default/info",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                local_tottal_coeficient=1;
                if (json) {
                    //console.log(json);
                    $.each(json.elements, function( index, value ) {
                        console.log(value);
//                        console.log([value.item_id,value.parent_id,value]);
                       // outcome=    JSON.parse(value.options);
                        outcome=0;
                        // console.log(value.CartElement.item_id);
                        // console.log(outcome);
                        if(value.CartElement.status==='true'){
                            local_tottal_coeficient*=value.CartElement.coef;
                        }
                        // SmartCart.renderAdd(value.item_id,value.parent_id,value.current_market_name+' '+value.result_type_name+' '+outcome.outcome_name,value.gamers_name,outcome.outcome_coef,value.status);
                        SmartCart.renderAdd(value.CartElement.item_id,value.CartElement.group_item_id, value.CartElement.gamersName,value.CartElement.name,value.CartElement.coef,value.CartElement.status);
                        SmartCart.reloadDom();

                        $('#total-coeficient').html( Math.round10(local_tottal_coeficient, -2));
                    });


                    SmartCart.tottal_coeficient=local_tottal_coeficient;
                    SmartCart.currentBalance=json.currentBalance;
                    SmartCart.currentCooeficientDrop=json.currentCooeficientDrop;
                    SmartCart.max_coeficientDrop=json.max_coeficientDrop;
                    SmartCart.recalculateSumBet();
                    SmartCart.recalculateMaybeWin();
                    SmartCart.renderCalculate();

                    //-----------------------------
//                     $.each(json.elements, function( index, value ) {
// //                        console.log([value.item_id,value.parent_id,value]);
//                         outcome=    JSON.parse(value.options);
//                         console.log(value);
//                         console.log(outcome);
//                         if(!value.status){
//                             local_tottal_coeficient*=outcome.outcome_coef;
//                         }
//                         SmartCart.renderAdd(value.item_id,value.parent_id,value.current_market_name+' '+value.result_type_name+' '+outcome.outcome_name,value.gamers_name,outcome.outcome_coef,value.status);
//                         SmartCart.reloadDom();
//
//                         $('#total-coeficient').html( Math.round10(local_tottal_coeficient, -2));
//                     });
//
//
//                     SmartCart.tottal_coeficient=local_tottal_coeficient;
//                     SmartCart.currentBalance=json.currentBalance;
//                     SmartCart.currentCooeficientDrop=json.currentCooeficientDrop;
//                     SmartCart.max_coeficientDrop=json.max_coeficientDrop;
//                     SmartCart.recalculateSumBet();
//                     SmartCart.recalculateMaybeWin();
//                     SmartCart.renderCalculate();




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
        $('.currentCooeficientDrop').html(SmartCart.currentCooeficientDrop+'%');

        for (var i = 1; i <= SmartCart.max_coeficientDrop; i++) {
            if (i === 1) { $('#currentCooeficientDropList').html('');}
                $("#currentCooeficientDropList").append('<div class="drop-item">\n' +
                    '<div class="check-drop">\n' +
                    '<input name="playlistPercent" type="radio" id="playlistPercent_' + i + '" value="' + i + '%">\n' +
                    '<label for="playlistPercent_' + i + '">' + i + '%</label>\n' +
                    '</div>\n' +
                    '</div>');

            }
        addEventForNewDrop();



    },
    deleteSingle:function (el) {

        var id_bet = $(el).parents('li').attr('class');

        var cartLS= JSON.parse ( localStorage.getItem('cartLS'));
        cartLS.forEach(function (item,i,arr) {
            if(item.CartElement.item_id===id_bet){
                arr.splice(i,1)
                return;
            }
        });
        localStorage.setItem('cartLS',JSON.stringify(cartLS));


        SmartCart.getFromCart(); // update cart




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
    deleteAll:function () {

        localStorage.removeItem('cartLS');
        SmartCart.getFromCart(); // update cart

        $('.bet-coup-list li').remove();
        $('.bet-parent-val,.bets-val').removeClass('selected');
        $('.ordinator').addClass('active');
        $('.express').removeClass('active');
        $('.all-coeficient,.delete-block').slideUp(400);
        $('.coupon-tabs-wrapper-inner').fadeOut(200);
        setTimeout(function () {
            $('.no-bet-selected-text').fadeIn(400);
        },210);





    },

    getLine:function (el) {
        console.log('getLine');
        var data = {};
        data = {};
        data.id = $(el).data('id');
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/dashboard/get-line",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {

                if(json.html_block){
                    SmartCart.showLine(json.html_block);
                }
            }
        });

    },
    showLine:function (html) {
        $('.main_center_block').fadeOut(400);
        $('.open_line_center_block').html(html);
       $('.open_line_center_block').fadeIn(400);
    },
    hideLine:function () {
        $('.open_line_center_block').fadeOut(400);
        $('.main_center_block').fadeIn(400);
    },



    createBet:function (el) {
        console.log('createBet 78');
        // var data = {};
        // data[jQuery("meta[name=csrf-param]").attr("content")]=jQuery("meta[name=csrf-token]").attr("content");
        // console.log(data);

//--------------
        var data = {};
        data.CartElement = {};
        var cartLS= JSON.parse ( localStorage.getItem('cartLS'));
        if(!cartLS){
            localStorage.setItem('cartLS',JSON.stringify([]));
            cartLS=JSON.parse(localStorage.getItem( 'cartLS'));
        }
        data.CartElements = cartLS ;
        // data.CartElements = cartLS ;
        data[this.csrf_param] = this.csrf;
        data['currentCooeficientDrop'] = SmartCart.currentCooeficientDrop;
        data['statusBet'] = SmartCart.statusBet;
        //-------------
        $.ajax({
            url: "/wager/default/add",
            type: "post",
            data:data,
            dataType: "json",
            beforeSend: function () {
                $('#ajax-button-confirm').addClass('preloader');
            },
            complete: function () {
                $('#ajax-button-confirm').removeClass('preloader');

            },
            success: function (json) {
                console.log(json);
                if(json.message){
                    showNotification(json.message);
                }else{   // showPOPap
                          // не работает делаю тригер для невидимой кнопки LIfeHac(^-^)  #smartCartButtonModal
                     // $('#modal-success-bet').modal({'show'});
                     // $('#modal-success-bet').modal('show');
                     //$('#modal-success-bet').modal();

                    $('#smartCartButtonModal').trigger('click');

                }
                if(json.status !== 'error'){

                   // showNotification(json.message);
                }

            }
        });

        //      stop bulk
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        event.stopImmediatePropagation();
        event.preventDefault();

    },
    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};

function showNotification(message) {

    $('.notification-calculate').html(message);
    $('.notification-calculate').fadeIn(400);
    setTimeout(function () {
        $('.notification-calculate').fadeOut(400);
    },2000);
}


function  addEventForNewDrop() {
    $('.custom-dropdown input[type="radio"]').on('change',function () {
        var this_val_text = $(this).val();
        $(this).parents('.custom-dropdown').find('.val-drop-btn').text(this_val_text);
        $('.custom-dropdown').find('.dropdown-list').stop().fadeOut(400);
        $('.custom-dropdown').removeClass('active-drop');
    });
    $('input[type=radio][name=playlistPercent]').change(function() {
        console.log('percent change val: '+this.value);
        SmartCart.currentCooeficientDrop=this.value.replace("%", "");
        console.log('SmartCart.currentCooeficientDrop' + SmartCart.currentCooeficientDrop)
       // SmartCart.updateCoefficient(SmartCart.currentCooeficientDrop);
         SmartCart.getFromCart();
    });
}




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
