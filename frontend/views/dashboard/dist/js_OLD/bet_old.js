/* eslint-disable no-empty-label */
$(document).ready(function () {

    // $('.type-list').on('click',function () {
    //     $(this).find('span').toggleClass('show');
    //     return false;
    // });


    // $('.trigger-sub-collapse').on('click',function () {
    //
    //     $(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
    //     return false;
    // });

    // $(document).on("click", ".trigger-sub-collapse", function(e) {
    //     $(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
    //     e.preventDefault();
    //     return false;
    // });


    // $('.trigger-collapse').on('click',function () {
    //     console.log('mimim')
    //     $(this).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
    //     return false;
    // });
    $('.show-all-bets').on('click',function () {
        // $(this).parents('.row-collapse').toggleClass('active').find('.sub-collapse-tab').stop().slideToggle(400);
        // $(this).toggleClass('active');
        // return false;
    });
    $('.trigger-tab-collapse').on('click',function () {
        $(this).parents('.tab-block-inner').toggleClass('active').find('.tab-collapse-content').stop().slideToggle(400);
        $(this).toggleClass('active');
        return false;
    });


    $(document).on("click", ".tab-trigger", function(e) {
        var id_tabs_b = $(this).attr('href');
        $('.tab-trigger').removeClass('active');
        if(!$(this).hasClass('active')) {
            $(this).addClass('active');
            $('.tab-block').fadeOut(200);
            setTimeout(function () {
                $(id_tabs_b).fadeIn(400);
            },201);
        }
        return false;
    });
    // $('.coupon-trigger').on('click',function () {
    //     var id_tabs_b = $(this).attr('href');
    //     if(!$(this).hasClass('active')) {
    //         $('.coupon-trigger').removeClass('active');
    //         $(this).addClass('active');
    //         $('.coupon-tab-item').fadeOut(200);
    //         setTimeout(function () {
    //             $(id_tabs_b).fadeIn(400);
    //         },201);
    //     }
    //     return false;
    // });
    $('.collapse-open-bet-trigger').on('click',function () {
        $(this).parents('.open-bet-wrapper-inner').find('.collapse-open-bet-content').fadeToggle(400);
        $(this).toggleClass('active');
        return false;
    });
    $('.bets-val').on('click',function () {
        var id_for_bets = $(this).attr('data-id');
        var icon_sport = $(this).parents('.open-bet-wrapper-inner').find('.icon-open-bet').find('span').attr('class');
        var name_competition = $(this).parents('.open-bet-wrapper-inner').find('.title-open-bet h3').text();
        var data_parent = $(this).parents('.open-bet-wrapper-inner').attr('data-parents');
        var name_bet = $(this).parents('.collapse-open-bet').find('.collapse-open-bet-head .collapse-open-bet-trigger').text() + '&nbsp;' + $(this).find('.name-b').text();
        var coefficient_bet = $(this).find('.coefficient-b').text();
        if(!$(this).hasClass('selected')){
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
        }
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
        $('.bets-val').removeClass('selected');
        $(this).toggleClass('selected');
        return false;
    });





    // var tottal_coeficient=0;
    // $('.bet-parent-val').on('click',function () {
    //     var id_for_bets = $(this).attr('data-id');
    //     var data_parent = $(this).parents('.row-collapse-inner').attr('data-parents');
    //     var name_competition = $(this).parents('.row-collapse-inner').find('.info-bet .value-bet').text();
    //     var name_bet = $(this).attr('data-text') + '&nbsp;' + $(this).find('.title-bet').text();
    //     var coefficient_bet = $(this).find('.value-bet').text();
    //     var coeficient = parseFloat($(this).find('.value-bet').text());
    //     if(!$(this).hasClass('selected')){
    //         tottal_coeficient = tottal_coeficient + coeficient;
    //         // $('#total-coeficient').text(tottal_coeficient);
    //         $('li[data-child="'+data_parent+'"]').remove();
    //         $('.bet-coup-list').append('<li class="'+id_for_bets+'" data-child="'+data_parent+'">' +
    //             '<div class="bet-coup-info">' +
    //             '<div class="bet-coup-icon">' +
    //             ' <input type="checkbox" id="'+id_for_bets+'" checked="checked">' +
    //             ' <label for="'+id_for_bets+'"></label>' +
    //             '</div>' +
    //             '<div class="bet-coup-text">'+name_competition+'</div>' +
    //             '<button class="delete-item"><span class="icon-close2"></span></button>' +
    //             '</div>' +
    //             '<div class="bet-calc-row">' +
    //             '<div class="title-bet-calc">'+name_bet+'</div>' +
    //             '<div class="percent-bet-calc">x <span class="perc-for-calc">'+coefficient_bet+'</span></div>' +
    //             '</div>' +
    //             '</li>');
    //     }
    //     var count_items = $('.bet-coup-list li').length;
    //     if(count_items >= 1){
    //         $('.no-bet-selected-text').fadeOut(400);
    //         setTimeout(function () {
    //             $('.coupon-tabs-wrapper-inner').fadeIn(400);
    //         },410);
    //     } else {
    //         $('.coupon-tabs-wrapper-inner').fadeOut(400);
    //         setTimeout(function () {
    //             $('.no-bet-selected-text').fadeIn(400);
    //         },410);
    //     }
    //     if(count_items > 1){
    //         $('.ordinator').removeClass('active');
    //         $('.express').addClass('active');
    //         $('.all-coeficient,.delete-block').slideDown(400);
    //     } else {
    //         $('.ordinator').addClass('active');
    //         $('.express').removeClass('active');
    //         $('.all-coeficient,.delete-block').slideUp(400);
    //     }
    //     $('.open-coupon .count-coup').text(count_items);
    //     $(this).parents('.row-collapse').find('.bet-parent-val').removeClass('selected');
    //     $(this).toggleClass('selected');
    //     return false;
    // });
    //
    //



    $('.bet-parent-val-slider').on('click',function () {
        var id_for_bets = $(this).attr('data-id');
        var data_parent = $(this).parents('.content-top-block').attr('data-parents');
        var name_competition = $(this).parents('.content-top-block').find('.title-value').text();
        var name_bet = $(this).attr('data-text') + '&nbsp;' + $(this).find('.dark-text').attr('data-team');
        var coefficient_bet = $(this).find('.value-bet').text();
        var coeficient = parseFloat($(this).find('.value-bet').text());
        if(!$(this).hasClass('selected')){
            tottal_coeficient = tottal_coeficient + coeficient;
            // $('#total-coeficient').text(tottal_coeficient);
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
        }
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
        $(this).parents('.content-top-block').find('.bet-parent-val-slider').removeClass('selected');
        $(this).toggleClass('selected');
        return false;
    });




     // console.log('sdfghjk')
    $('.plus-minus-block .plus').on('click',function () {
        var val_perc = $('.plus-minus-block input').attr('data-val');
        var new_perc_val = parseInt(val_perc) + 1;
        var max_val = 10;
        if(new_perc_val <= max_val){
            $('.plus-minus-block input').attr('data-val',new_perc_val).val(new_perc_val+'%');
            console.log('plus-minus-block .plus <=')
        }
        if(new_perc_val == max_val) {
            $('.notification-calculate').stop().fadeIn(300).addClass('active_notification');
            console.log('plus-minus-block .plus =')
        }
        console.log('plus-minus-block .plus default')
        return false;
    });
    $('.plus-minus-block .minus').on('click',function () {
        console.log('plus-minus-block .plus default2')
        var val_perc = $('.plus-minus-block input').attr('data-val');
        var new_perc_val = parseInt(val_perc) - 1;
        var max_val = 10;
        var min_val = 0;
        if(new_perc_val <= max_val && new_perc_val >= min_val){
            $('.plus-minus-block input').attr('data-val',new_perc_val).val(new_perc_val+'%');
        }
        if(new_perc_val < max_val) {
            $('.notification-calculate').stop().fadeOut(300).removeClass('active_notification');
        }
        return false;
    });



    // $('.delete-all-bets').on('click',function () {
    //     $('.bet-coup-list li').remove();
    //     $('.bet-parent-val,.bets-val').removeClass('selected');
    //     $('.ordinator').addClass('active');
    //     $('.express').removeClass('active');
    //     $('.all-coeficient,.delete-block').slideUp(400);
    //     $('.coupon-tabs-wrapper-inner').fadeOut(200);
    //     setTimeout(function () {
    //         $('.no-bet-selected-text').fadeIn(400);
    //     },210);
    //     return false;
    // });




        // $("#filter").keyup(function(){
        //
        //     // Retrieve the input field text and reset the count to zero
        //     var filter = $(this).val(), count = 0;
        //
        //     // Loop through the comment list
        //     $("nav ul li").each(function(){
        //
        //         // If the list item does not contain the text phrase fade it out
        //         // if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        //         //     $(this).fadeOut();
        //         //
        //         //     // Show the list item if the phrase matches and increase the count by 1
        //         // } else {
        //         //     $(this).show();
        //         //     count++;
        //         // }
        //     });
        //
        //     console.log(filter);
        //     // // Update the count
        //     // var numberItems = count;
        //     // $("#filter-count").text("Number of Filter = "+count);
        // });



});



$(document).on('keyup', $(".livesearcheform"), function(el) {
    var filtero =$(el.target).val().toLowerCase();
    $('.collapse-open-bet-trigger').each(function (i,elem) {
            // проход по детям
      // dt=   $(elem).parent().next().find('.bets-val .mobile-name').html();
        countChech=0;
        $(elem).parent().next().find('.bets-val .mobile-name').each(function (j,chelem) {
            dt=$(chelem).html();

            if(dt.toLowerCase().indexOf(filtero) + 1) {
                console.log('ok1 '+ dt)
                $(chelem).parent().fadeIn();
                countChech++;
                $(elem).parent().parent().fadeIn();
            }else{
                $(chelem).parent().fadeOut();
                 // $(elem).parent().parent().fadeOut();
            }


        });
        console.log('countChech '+countChech);
        if(countChech>0){ // если пусто тогда скрываем
            $(elem).parent().parent().fadeIn();
        }else{
            $(elem).parent().parent().fadeOut();
        }



        // if($(elem).html().toLowerCase().indexOf(filtero) + 1) {
        //     console.log('ok1 '+  $(elem).html())
        //     $(elem).parent().parent().fadeIn();
        // }else{
        //     $(elem).parent().parent().fadeOut();
        // }
    });
});
// фильтр старый по заголовкам
$(document).on('keyup2', $(".livesearcheform"), function(el) {
    var filtero =$(el.target).val().toLowerCase();
    $('.collapse-open-bet-trigger').each(function (i,elem) {
        if($(elem).html().toLowerCase().indexOf(filtero) + 1) {
            console.log('ok1 '+  $(elem).html())
            $(elem).parent().parent().fadeIn();
        }else{
            $(elem).parent().parent().fadeOut();
        }
    });
});
