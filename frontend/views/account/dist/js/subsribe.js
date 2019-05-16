
// cвои модалки. делаю через события и привязку к данным из елемента если есть какойто параметр тогда что-то делаю.  e.th -this e.modal_block -> модальное ид
$(window).on('loadeModale', function (e) {
    console.log('loadeModale vent');
    if($(e.th).data('target') === '#edit_subscriber' || $(e.th).data('target') ===  '#edit_bet'){
        console.log('printer state changed', e.th);
        console.log('printer state changed', e.modal_block);
        $(e.modal_block).find(".body-modal").load($(e.th).attr("href"));

    }
});

$(function () {
    $('.tabs-nav a').on('click', function () {
        console.log('sdfg')
        var id_tab_change = $(this).attr('href');
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');
        if (!$(id_tab_change).hasClass('active')) {
            $('.tabs-item').fadeOut(400).removeClass('active');
            setTimeout(function () {
                $(id_tab_change).fadeIn(400).addClass('active');
            }, 401);
        }

    });
});


// aвтосохранялки
var timeoutId;
$(document.body).on('input propertychange change','textarea.add-notification',function (el) {
  // $('textarea.add-notification').on('input propertychange change', function() {
    var gl_this=this;
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 1 second (1000 ms) after the last change
        UserSubscriber.autoSaveSubscriberComment(gl_this)
        //saveToDB();
    }, 1000);
});

$(document.body).on('click','#subscribersModalBlock .TabOpenMe .btn-subscribe',function (el) {
    UserSubscriber.removeSubscriberFromModal(this);
});

$(function () {

    $('.event-subscribe-btn').on('click', function () {
      // subscriberMail
        if($(this).children('.unSubscribeMail').length>0 ){
            UserSubscriber.removeMailSubscriber();
        }else{
            UserSubscriber.addMailSubscriber();

        }
        return false;
    });

})




$(document).ready(function () {
    UserSubscriber.init();
});

var UserSubscriber={
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
        $(document).on("click", ".trigg-op-block", function(e) {
            if($(this).parent().hasClass('locked-bet')){
                UserSubscriber.test('is locked hide on prod');
                UserSubscriber.removeSubscriber(this);
                // UserSubscriber.showPop(this);
            }else{
                UserSubscriber.test('is Open');
                UserSubscriber.showPop(this);
            }
            e.preventDefault();
            return false;
        });

        $(document).on("click", ".trig-val", function(e) {
            console.log('Init UserSubscriber 22');
            UserSubscriber.addSubscriber(this);
           UserSubscriber.showOpen(this);
            e.preventDefault();
            return false;
        });

        console.log('Init UserSubscriber 2');
    },

    addSubscriber: function (el) {
        var data = {};
        data.Subscriber = {};
        data.Subscriber.id = $('#period_parent').data("parent-id");
        data.Subscriber.period = $(el).data('value');
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/account/addsubscriber",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    UserSubscriber.test(json);
                  //  SmartCart.getFromCart(); // update cart

                } else {
                    UserSubscriber.test('No json');
                }
            }
        });
    },
    removeSubscriber:function (el) {
        var data = {};
        data.Subscriber = {};
       data.Subscriber.id = $('#period_parent').data("parent-id");
       data[this.csrf_param] = this.csrf;
       $.ajax({
            url: "/account/remove-subscriber",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    UserSubscriber.test(json);
                    UserSubscriber.showOpen(el)
                } else {
                    UserSubscriber.test('No json');
                }
            }
        });

    },
    removeMailSubscriber:function (el) {
        var data = {};
        data.Subscriber = {};
        data.Subscriber.id = $('#period_parent').data("parent-id");
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/account/remove-mail-subscriber",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    UserSubscriber.subscribeMailShow();
                } else {
                    UserSubscriber.test('No json');
                }
            }
        });

    },
    addMailSubscriber: function (el) {
        var data = {};
        data.Subscriber = {};
        data.Subscriber.id = $('#period_parent').data("parent-id");
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/account/add-mail-subscriber",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    UserSubscriber.unSubscribeMailShow();
                } else {
                    UserSubscriber.test('No json');
                }
            }
        });
    },

  showPop:function (el) {
      $(el).parents('.drop-open-block').find('.drop-list').stop().fadeToggle(400);

  },
    showOpen:function (el) {
          // $(el).parents().find('.drop-list').stop().fadeOut(400);
           // fix c панелью входа в аккаунте
           $(el).parent().parent().parent().parent().find('.drop-list').stop().fadeOut(400);
        if ($(el).parents('.drop-open-block').hasClass('locked-bet')) {
            $(el).parents('.drop-open-block').removeClass('locked-bet');
        } else {
            $(el).parents('.drop-open-block').addClass('locked-bet');
        }

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
    test:function (data) {
        console.log(data)
    },

    unSubscribeMailShow:function () {
        $('#subscriberMail').html('');
        $('#subscriberMail').append('<i class="text-show unSubscribeMail">Отписаться</i>');
    },
    subscribeMailShow:function () {
        $('#subscriberMail').html('');
        $('#subscriberMail').append('<i class="text-show subscribeMail">Подписаться</i>');
    },
    autoSaveSubscriberComment:function (el) {
        // autocomplete-comment
        var data = {};
        data.Subscriber = {};
        console.log($(el));
        data.Subscriber.id = $(el).data("parent-id");
        data.Subscriber.text = $(el).val();
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/account/autocomplete-comment?uid="+data.Subscriber.id,
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    // UserSubscriber.unSubscribeMailShow();
                    // UserSubscriber.test(json);
                    //  SmartCart.getFromCart(); // update cart
                } else {
                    // UserSubscriber.test('No json');
                }
            }
        });
    },
    removeSubscriberFromModal:function (el) {
        var data = {};
        data.Subscriber = {};
        data.Subscriber.id = $(el).data("parent-id");
        data[this.csrf_param] = this.csrf;
        $.ajax({
            url: "/account/remove-subscriber",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (json) {
                if (json) {
                    $('.subscribe-item_'+json.id).remove();
                    $('.countOpenMe').html(json.countOpenMe);
                } else {
                    UserSubscriber.test('No json');
                }
            }
        });

    },
};

function showNotification(message) {

    $('.notification-calculate').html(message);
    $('.notification-calculate').fadeIn(400);
    setTimeout(function () {
        $('.notification-calculate').fadeOut(400);
    },2000);
}






