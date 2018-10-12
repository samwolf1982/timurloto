/* eslint-disable no-empty-label */
$(function () {
    console.log('Modale bet');
})

// клик по дропу


    // $(document).on("click", ".pagination-page .btn-nav ", function(e) {
    //     // get url и добавить суффикс page
    //     e.preventDefault();
    //
    // });


    $( "#sportcategorynamesExt").change(function() {
        console.log(this.value);
        console.log('sportcategorynamesExt');
        UpdaterForm.update('common\\models\\wraps\\SportcategoryExt',this.value);
    });

    $( "#sportcategoryExt").change(function() {  //2
        console.log(this.value);
        console.log('sportcategoryExt');
        UpdaterForm.update('common\\models\\wraps\\TournamentsnamesExt',this.value);
    });

$( "#tournamentsnamesExt").change(function() {  //3
    console.log(this.value);
    console.log('tournamentsnamesExt');
    UpdaterForm.update('common\\models\\wraps\\EventsnamesExt',this.value);
  //  UpdaterForm.update('common\\models\\wraps\\TournamentsnamesExt3',this.value);
});

$( "#eventsnamesExt").change(function() {
    console.log(this.value);
    console.log('eventsnamesExt');
    UpdaterForm.update('common\\models\\wraps\\BetsExt',this.value);
});



var UpdaterForm = { // обновить форму.
    update: function (type, val) {   // =
        var jqxhr = $.post("/rest/filter", {type_filter: type, data: val}, function (json) {
            //console.log(json);

            if (json.ai) {
                 console.log(json.ai['type_filter']);
                if (json.ai['type_filter'] == 'sportcategoryExt') {   //
                    // prepare options and name
                    UpdaterForm.reloaddorpSimple('#sportcategoryExt',json.ai['models'], "Cтрана");
                 //   UpdaterForm.reloaddorp('#area_ext', json.ai['areas']['options'], json.ai['areas']['name'], "Областной район");
                    UpdaterForm.cleardorp('#tournamentsnamesExt', "Турнир");
                }
                if (json.ai['type_filter'] == 'tournamentsnamesExt') {   //
                    UpdaterForm.reloaddorpSimple2('#tournamentsnamesExt',json.ai['models'], "Турнир");
                   // UpdaterForm.reloaddorp('#place_ext', json.ai['location']['options'], json.ai['location']['name'], "Населенный пункт");
                   //  UpdaterForm.cleardorp('#district_city', "Район города");
                   //  UpdaterForm.cleardorp('#district_city_novostroi', "Район города");
                   //  UpdaterForm.cleardorp('#district_city_house', "Район города");
                   //  UpdaterForm.cleardorp('#district_city_place', "Район города");
                   //  UpdaterForm.cleardorp('#district_city_comerce', "Район города");
                }
               // if (json.ai['type_filter'] == 'tournamentsnamesExt2') {   //
                if (json.ai['type_filter'] == 'eventsnamesExt') {   //
                    UpdaterForm.reloaddorpSimple3('#eventsnamesExt',json.ai['models'], "Собитие");
                }

                if (json.ai['type_filter'] == 'eventsbetsExt') {   //
                   // UpdaterForm.reloaddorpSimple3('#eventsnamesExt',json.ai['models'], "Собитие");
                     console.log(json.ai['models']);

                    UpdaterForm.reloaddorpBetArea('#betsArea',json.ai['models']);
                }


            } else {
                console.log('error ai');
            }
        })
            .done(function () {
                console.log('done')
            })
            .fail(function () {
                console.log('error')
            })
            .always(function () {
                console.log('always fin')

            });

    },
    reloaddorpSimple: function (id, opt, buttonName) {
        console.log('reloaddorp');
        console.log(opt);
        if (opt.length) {
            $(id).html('');
        }
        $(id).append($('<option>', {value: "", text: buttonName, selected: "selected"}));
        //chDropSib.append( '<li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Областной район</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>');
        for (i = 0; i < opt.length; i++) {
            $(id).append($('<option>', {value: opt[i].category_id, text: opt[i].category_name}));
           // chDropSib.append('<li data-original-index="' + (i + 1) + '"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">' + opt[i]['name'] + '</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>');

        }
    },
    reloaddorpSimple2: function (id, opt, buttonName) {
        console.log('reloaddorp');
        console.log(opt);
        if (opt.length) {
            $(id).html('');
        }
        $(id).html('');
        $(id).append($('<option>', {value: "", text: buttonName, selected: "selected"}));
        //chDropSib.append( '<li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Областной район</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>');
        for (i = 0; i < opt.length; i++) {
           // $(id).append($('<option>', {value: opt[i].category_id, text: opt[i].tournament_name}));
            $(id).append($('<option>', {value: opt[i].tournament_id, text: opt[i].tournament_name}));
           // $(id).append($('<option>', {value: opt[i].tournament_id, text: opt[i].tournament_name}));

        }
    },
    reloaddorpSimple3: function (id, opt, buttonName) {
        console.log('reloaddorp reloaddorpSimple3');
        console.log(opt);
        if (opt.length) {
            $(id).html('');
        }
        $(id).append($('<option>', {value: "", text: buttonName, selected: "selected"}));
        //chDropSib.append( '<li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Областной район</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>');
        for (i = 0; i < opt.length; i++) {
            $(id).append($('<option>', {value: opt[i].event_id, text: opt[i].event_name}));
            // $(id).append($('<option>', {value: opt[i].tournament_id, text: opt[i].tournament_name}));

        }
    },

    reloaddorp: function (id, opt, dropName, buttonName) {
        console.log('reloaddorp');
        console.log(opt);
        dropSib = $(id).siblings(".dropdown-menu");
        chDropSib = dropSib.find('ul.dropdown-menu')
        chDropSibButton = $(id).siblings(".btn.dropdown-toggle.btn-default");
        console.log(dropSib);
        console.log(chDropSib);
        console.log(chDropSibButton);
        // dropSib
        if (opt.length) {
            $(id).html('');
            chDropSib.html('');
            chDropSibButton.attr('title', dropName);
            chDropSibButton.find('.filter-option').text(dropName);
        }
        $(id).append($('<option>', {value: "", text: buttonName, selected: "selected"}));
        //chDropSib.append( '<li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Областной район</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>');
        for (i = 0; i < opt.length; i++) {
            $(id).append($('<option>', {value: opt[i]['val'], text: opt[i]['name']}));
            chDropSib.append('<li data-original-index="' + (i + 1) + '"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">' + opt[i]['name'] + '</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>');
            // $("#header ul").append('<li><a href="/user/messages"><span class="tab">Message Center</span></a></li>');
        }
    },


    reloaddorpBetArea: function (id, opt) {
        console.log('reloaddorpBetArea');
        // dropSib
        if (opt.length) {
            $(id).html('');
        }
        for (i = 0; i < opt.length; i++) {
            $(id).append(opt[i].res);
        }

     //   $(".gridder").data('gridderExpander').gridderAddItem('TEST');
        // Call Gridder

        console.log($('.gridder'));
        reinitGridder();
        // $('.inputBetForm').mask('0#');

    },


    cleardorp: function (id, dropName) {
        dropSib = $(id).siblings(".dropdown-menu");
        // chDropSib = dropSib.find('ul.dropdown-menu')
        // chDropSibButton = $(id).siblings(".btn.dropdown-toggle.btn-default");
        // console.log(dropSib);
        // console.log(chDropSib);
        // console.log(chDropSibButton);
        // clear
        $(id).html('');
        $(id).append($('<option>', {value: '', text:dropName}));
        // chDropSib.html('');
        // chDropSibButton.attr('title', dropName);
        // chDropSibButton.find('.filter-option').text(dropName);

    }
};


function reinitGridder() {
    $('.gridder').gridderExpander({
        scroll: true,
        scrollOffset: 30,
        scrollTo: "panel", // panel or listitem
        animationSpeed: 400,
        animationEasing: "easeInOutExpo",
        showNav: true, // Show Navigation
        nextText: "", // Next button text
        prevText: "", // Previous button text
        closeText: "", // Close button text
        onStart: function () {
            //Gridder Inititialized
            console.log('On Gridder Initialized...');
        },
        onContent: function () {
            //Gridder Content Loaded
            console.log('On Gridder Expand...');
        },
        onClosed: function () {
            //Gridder Closed
            console.log('On Gridder Closed...');
        }
    });
}


// --------------------  forms from grid
function  submitBetForm(el) {
    // event.preventDefault();
    console.log(el);
    var idElBetForm=$(el).attr('id');
    console.log(" submi22 okay " +idElBetForm);
    $.ajax({
    url: '/rest/add',
    type: 'post',
    data: $('#'+idElBetForm +' .input-row-inner input[type=\'text\'], #'+idElBetForm+' .input-row-inner input[type=\'hidden\']   ,  .checkout-checkout .payment-data input[type=\'password\'], .checkout-checkout .payment-data input[type=\'tel\'], .checkout-checkout .payment-data input[type=\'radio\']:checked, .checkout-checkout .payment-datainput input[type=\'checkbox\']:checked, .checkout-checkout .payment-data  select '),
    dataType: 'json',
    beforeSend: function () {
        $('.gridder-show').addClass('preloader');
    },
    complete: function () {
        $('.gridder-show').removeClass('preloader');



    },
    success: function (json) {
        console.log(json);
        $('.user-money.numberOnly').html(json.balance);
        $('.infoMessage_'+json.hash).html(json.message);
        $('.infoMessage_'+json.hash).addClass('success');


        $('.inputBetForm').val('');
    }
});
    return false;
}

// $.ajax({
//     url: 'index.php?route=checkout/onepagecheckout',
//     type: 'post',
//     data: $('.checkout-checkout .payment-data input[type=\'text\'], .checkout-checkout .payment-data input[type=\'password\'], .checkout-checkout .payment-data input[type=\'tel\'], .checkout-checkout .payment-data input[type=\'radio\']:checked, .checkout-checkout .payment-datainput input[type=\'checkbox\']:checked, .checkout-checkout .payment-data  select '),
//     dataType: 'json',
//     beforeSend: function () {
//         $('#ajax-button-confirm').addClass('preloader');
//
//     },
//     complete: function () {
//         $('#ajax-button-confirm').removeClass('preloader');
//
//     },
//     success: function (json) {
//         console.log(json);
//     }
// });
// stysky




//  delete
(function(){  // анонимная функция (function(){ })(), чтобы переменные "a" и "b" не стали глобальными
    var a = document.querySelector('#cartStycky'), b = null;  // селектор блока, который нужно закрепить
    window.addEventListener('scroll', Ascroll, false);
    document.body.addEventListener('scroll', Ascroll, false);  // если у html и body высота равна 100%
    function Ascroll() {
        if (b == null) {  // добавить потомка-обёртку, чтобы убрать зависимость с соседями
            var Sa = getComputedStyle(a, ''), s = '';
            for (var i = 0; i < Sa.length; i++) {  // перечислить стили CSS, которые нужно скопировать с родителя
                if (Sa[i].indexOf('overflow') == 0 || Sa[i].indexOf('padding') == 0 || Sa[i].indexOf('border') == 0 || Sa[i].indexOf('outline') == 0 || Sa[i].indexOf('box-shadow') == 0 || Sa[i].indexOf('background') == 0) {
                    s += Sa[i] + ': ' +Sa.getPropertyValue(Sa[i]) + '; '
                }
            }
            b = document.createElement('div');  // создать потомка
            b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
            a.insertBefore(b, a.firstChild);  // поместить потомка в цепляющийся блок первым
            var l = a.childNodes.length;
            for (var i = 1; i < l; i++) {  // переместить во вновь созданного потомка всех остальных потомков (итого: создан потомок-обёртка, внутри которого по прежнему работают скрипты)
                b.appendChild(a.childNodes[1]);
            }
            a.style.height = b.getBoundingClientRect().height + 'px';  // если под скользящим элементом есть другие блоки, можно своё значение
            a.style.padding = '0';
            a.style.border = '0';  // если элементу присвоен padding или border
        }
        if (a.getBoundingClientRect().top <= 0) { // elem.getBoundingClientRect() возвращает в px координаты элемента относительно верхнего левого угла области просмотра окна браузера
            b.className = 'sticky';
        } else {
            b.className = '';
        }
        window.addEventListener('resize', function() {
            a.children[0].style.width = getComputedStyle(a, '').width
        }, false);  // если изменить размер окна браузера, измениться ширина элемента
    }
})()
