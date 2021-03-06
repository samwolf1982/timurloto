(function($){
    var count_tpl = 1;
    var flag_fp_init = true;
    $(document).ready(function() {
        // $('.list-block-subscribe-inner').each(element, new SimpleBar);
        $('.trigg-op-block').on('click',function () {
            $(this).parents('.drop-open-block').find('.drop-list').stop().fadeToggle(400);
            // if($(this).parents('.drop-open-block').hasClass('locked-bet')) {
            //     $(this).parents('.drop-open-block').removeClass('locked-bet');
            // } else {
            //     $(this).parents('.drop-open-block').addClass('locked-bet');
            // }
            return false;
        });
        $('.trig-val').on('click',function () {
            $(this).parents().find('.drop-list').stop().fadeOut(400);
            if($(this).parents('.drop-open-block').hasClass('locked-bet')) {
                $(this).parents('.drop-open-block').removeClass('locked-bet');
            } else {
                $(this).parents('.drop-open-block').addClass('locked-bet');
            }
            return false;
        });
        $('.btn-subscribe').on('click',function () {
            $(this).toggleClass('subscribed');
            return false;
        });
        $('.tabs-nav a').on('click',function () {
            var id_tab_change = $(this).attr('href');
            $('.tabs-nav li').removeClass('active');
            $(this).parent().addClass('active');
            if(!$(id_tab_change).hasClass('active')) {
                $('.tabs-item').fadeOut(400).removeClass('active');
                setTimeout(function () {
                    $(id_tab_change).fadeIn(400).addClass('active');
                },401);
            }
            return false;
        });
        $('.load-more-btn').on('click',function (e) {
            $(this).parents('.search-list-items').find('.hide-s-r').stop().slideToggle(400);
            $(this).toggleClass('loaded-btn');
            e.preventDefault();
        });
        $('[data-toggle="collap"]').on('click',function (e) {
            var id_toggle = $(this).attr('href');
            $(this).toggleClass('active');
            $(id_toggle).stop().slideToggle(500);
           e.preventDefault();
        });
        $('.all-rate-btn').on('click',function (e) {
            $(this).parents('.table-body').find('.hide-col').slideToggle(400);
            $(this).toggleClass('shown-rate');
            e.preventDefault();
        });
        $('.list-setting-massage button').on('click',function (e) {
            $(this).toggleClass('active');
        });
        $('.drop-trig-lay').on('click',function (e) {
            $(this).parents('.play-list-drop').toggleClass('active');
            $(this).parents('.play-list-drop').find('.drop-play').fadeToggle(400);
            e.preventDefault();
        });
        $('.pl-item').on('click',function (e) {
            var text_pl = $(this).text();
            $(this).parents('.play-list-drop').find('.drop-trig-lay').text(text_pl);
            $(this).parents('.play-list-drop').removeClass('active');
            $(this).parents('.play-list-drop').find('.drop-play').fadeOut(400);
            e.preventDefault();
        });
        $('.search-inp-modal').change(function () {
            if($(this).val() != ''){
                $(this).parents('.search-modal-block').find('.result-search').slideDown(400);
            } else {
                $(this).parents('.search-modal-block').find('.result-search').slideUp(400);
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
        $('.all-item-chat .favorite-btn').on('click', function (event) {
            var lenth_item_selected = $('.chat-item input[name="chat"]:checked').length;
            var lenth_item_selected_fav = $('.favorite-list-chat .chat-item').length + 1;
            if(lenth_item_selected > 1) {
                $('.chat-item input[name="chat"]:checked').parents('.chat-item').find('.favorite-btn').addClass('active');
                $('.favorite-list-chat').prepend($('.chat-item input[name="chat"]:checked').parents('.chat-item'));

                $('.chat-item input[name="chat"]:checked').prop('checked',false);
                $('.favorite-list-chat .chat-item').removeClass('selected-item');
            } else {
                $('.favorite-list-chat').prepend($(this).parents('.chat-item'));
            }
            if(lenth_item_selected_fav >= 1){
                $('.list-chat-item h3').fadeIn(400);
            } else {
                $('.list-chat-item h3').fadeOut(400);
            }
            event.preventDefault();
        });
        $('.favorite-list-chat').on('click', '.favorite-btn', function (e) {
            var lenth_item_selected = $('.favorite-list-chat .chat-item input[name="chat"]:checked').length;
            var lenth_item_selected_fav = $('.favorite-list-chat .chat-item').length;
            if(lenth_item_selected > 1) {
                $('.chat-item input[name="chat"]:checked').parents('.chat-item').find('.favorite-btn').removeClass('active');
                $('.all-item-chat').prepend($('.chat-item input[name="chat"]:checked').parents('.chat-item'));

                $('.chat-item input[name="chat"]:checked').prop('checked',false);
                $('.all-item-chat .chat-item').removeClass('selected-item');
            } else {
                $('.all-item-chat').prepend($(this).parents('.chat-item'));
            }
            if(lenth_item_selected_fav >= 1){
                $('.list-chat-item h3').fadeIn(400);
            } else {
                $('.list-chat-item h3').fadeOut(400);
            }
            e.preventDefault();
        });
        $('.create-groupe').on('click',function (e) {
            $('.groupe-block').addClass('active');
            e.preventDefault();
        });
        $('.new_c').on('click',function (e) {
            $('.groupe-block').removeClass('active');
            $('.chanel-block').addClass('active');
            e.preventDefault();
        });
        $('.new_g').on('click',function (e) {
            $('.chanel-block').removeClass('active');
            $('.groupe-block').addClass('active');
            e.preventDefault();
        });
        $('.shared').on('click',function (e) {
            $(this).parents('.shared-block').toggleClass('active');
            e.preventDefault();
        });
        $('.delete-btn').on('click',function (e) {
            $(this).parents('.chat-item').remove();
            var lenth_item_selected_fav = $('.favorite-list-chat .chat-item').length;
            if(lenth_item_selected_fav >= 1){
                $('.list-chat-item h3').fadeIn(400);
            } else {
                $('.list-chat-item h3').fadeOut(400);
            }
            e.preventDefault();
        });
        $('input[name="chat"]').on('change',function () {
            $(this).parents('.chat-item').toggleClass('selected-item');
        });
        $('.save-btn').on('click',function () {
            $(this).addClass('saved-btn');
            setTimeout(function () {
                $('.modal-wrapper').fadeOut(500).removeClass('active');
                $('body').removeClass('noScroll');
            },2000);
            return false;
        });
        $('.event-subscribe-btn').on('click',function (e) {
            $(this).toggleClass('subscribed-btn');
            e.preventDefault();
        });
        $('.search-trigger').on('click',function () {
            $('.search-block').addClass('active');
            return false;
        });
        $('.close-search').on('click',function () {
            $('.search-block').removeClass('active');
            return false;
        });
        $('.trig-filter').on('click',function () {
            $(this).parents('.for-mobile-drop').find('.head-tabs').fadeToggle(400);
            return false;
        });
        // fullPageInit();
        inputFocus();
        destroyHomeCarousel();
        addBetFunc();
        $(window).resize(function () {
            destroyHomeCarousel();
        });
        $('.btn-hover')
            .on('mouseenter', function(e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top:relY, left:relX})
            })
            .on('mouseout', function(e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top:relY, left:relX})
            });
        $('.arrow-down').on('click',function () {
            $.fn.fullpage.moveSectionDown();
            return false;
        });
        $('.arrow-up').on('click',function () {
            $.fn.fullpage.moveSectionUp();
            return false;
        });
        $('.pagination-wrapper').css({
            'right': ($('body').width() - 1060) / 2
        });
        $(window).resize(function () {
            $('.pagination-wrapper').css({
                'right': ($('body').width() - 1060) / 2
            });
        });
        if($('div').is('#scene')){
            var scene = document.getElementById('scene');
            var parallaxInstance = new Parallax(scene);
        }
        $('.forgot-btn').on('click',function () {
            $('.forgot-inner').addClass('show-reset');
            $('.login-inner').addClass('hide-login');
            return false;
        });
        $('.auth-btn').on('click',function () {
            $('.forgot-inner').removeClass('show-reset');
            $('.login-inner').removeClass('hide-login');
            return false;
        });
        tabToggle();

        countSlideElementsReview();
        $('.close-text').on('click',function () {
           $(this).parent().fadeOut(400);
           return false;
        });
        $('.toggle-tabs-mobile').on('click',function () {
            $(this).toggleClass('active');
            $(this).parents('.tab-panel').find('.tab-panel-inner').stop().slideToggle(400);
            return false;
        });
        $('.circle-wrapper').each(function () {
            var circle = $(this).find('.circle');
            var data_ptc = $(this).attr('data-ptc');
            var data_ptc_prc = (data_ptc*4.76190476)/100;
            var null_color_fill;
            if($(this).hasClass('grey-null-full')){
                null_color_fill = '#E6E6E6';
            } else {
                null_color_fill = 'rgba(255, 255, 255, .07)';
            }
            // console.log(data_ptc);
            var fill_color;
            if(data_ptc == 1) {
                fill_color = '#FEFF01';
            }
            if(data_ptc == 2) {
                fill_color = '#B9FF00';
            }
            if(data_ptc == 3) {
                fill_color = '#72FF00';
            }
            if(data_ptc == 4) {
                fill_color = '#00FF0D';
            }
            if(data_ptc == 5) {
                fill_color = '#119300';
            }
            if(data_ptc == 6) {
                fill_color = '#01FE6D';
            }
            if(data_ptc == 7) {
                fill_color = '#02FEC1';
            }
            if(data_ptc == 8) {
                fill_color = '#00D8FF';
            }
            if(data_ptc == 9) {
                fill_color = '#0190FF';
            }
            if(data_ptc == 10) {
                fill_color = '#0053FF';
            }
            if(data_ptc == 11) {
                fill_color = '#0000FE';
            }
            if(data_ptc == 12) {
                fill_color = '#0500A4';
            }
            if(data_ptc == 13) {
                fill_color = '#772A9E';
            }
            if(data_ptc == 14) {
                fill_color = '#BA27C8';
            }
            if(data_ptc ==15) {
                fill_color = '#D912A3';
            }
            if(data_ptc == 16) {
                fill_color = '#FD018A';
            }
            if(data_ptc == 17) {
                fill_color = '#FE722B';
            }
            if(data_ptc == 18) {
                fill_color = '#FE4E00';
            }
            if(data_ptc == 19) {
                fill_color = '#FFFFFF';
            }
            if(data_ptc == 20) {
                fill_color = '#454545';
            }
            if(data_ptc == 21) {
                fill_color = '#1A1A1A';
            }
            $(circle).circleProgress({
                value: data_ptc_prc,
                fill: fill_color,
                animation: false,
                size: 74,
                thickness: 2,
                emptyFill: null_color_fill
            });
        });

        $('.big-circle-wrapper').each(function () {
            var circle = $(this).find('.big-circle');
            var data_ptc = $(this).attr('data-ptc');
            var data_ptc_prc = (data_ptc*4.76190476)/100;
            // console.log(data_ptc);
            var fill_color;
            if(data_ptc == 1) {
                fill_color = '#FEFF01';
            }
            if(data_ptc == 2) {
                fill_color = '#B9FF00';
            }
            if(data_ptc == 3) {
                fill_color = '#72FF00';
            }
            if(data_ptc == 4) {
                fill_color = '#00FF0D';
            }
            if(data_ptc == 5) {
                fill_color = '#119300';
            }
            if(data_ptc == 6) {
                fill_color = '#01FE6D';
            }
            if(data_ptc == 7) {
                fill_color = '#02FEC1';
            }
            if(data_ptc == 8) {
                fill_color = '#00D8FF';
            }
            if(data_ptc == 9) {
                fill_color = '#0190FF';
            }
            if(data_ptc == 10) {
                fill_color = '#0053FF';
            }
            if(data_ptc == 11) {
                fill_color = '#0000FE';
            }
            if(data_ptc == 12) {
                fill_color = '#0500A4';
            }
            if(data_ptc == 13) {
                fill_color = '#772A9E';
            }
            if(data_ptc == 14) {
                fill_color = '#BA27C8';
            }
            if(data_ptc ==15) {
                fill_color = '#D912A3';
            }
            if(data_ptc == 16) {
                fill_color = '#FD018A';
            }
            if(data_ptc == 17) {
                fill_color = '#FE722B';
            }
            if(data_ptc == 18) {
                fill_color = '#FE4E00';
            }
            if(data_ptc == 19) {
                fill_color = '#FFFFFF';
            }
            if(data_ptc == 20) {
                fill_color = '#454545';
            }
            if(data_ptc == 21) {
                fill_color = '#1A1A1A';
            }
            $(circle).circleProgress({
                value: data_ptc_prc,
                fill: fill_color,
                // animation: false,
                size: 160,
                thickness: 5,
                emptyFill: "rgba(255, 255, 255, .07)"
            });
        });
        $('.like').on('click',function () {
            $(this).toggleClass('liked');
            return false;
        });
        $('#top-btn').on('click',function () {
            $("html, body").animate({scrollTop: 0}, 1500);
            return false;
        });
        $('.drop-menu-trigger').on('click',function () {
            $('.drop-wrapper').stop().fadeOut(400);
            $(this).parents('.drop-menu').find('.drop-wrapper').stop().fadeToggle(400);
            return false;
        });
        $(document).click( function(event){
            if( $(event.target).closest(".drop-wrapper").length )
                return;
            $(".drop-wrapper").fadeOut(400);
            event.stopPropagation();
        });
        $('.ancor').on('click',function () {
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            if(id != '') {
                $('body,html').animate({scrollTop: top}, 1500);
            }
        });
        $('.back-two-slide').css({
            'height' : $(window).height(),
            'width' : $(window).height()
        });
        $('.chose-item input').on('change', function() {
            if($('.chose-item input:checked').length > 3) {
                this.checked = false;
            }
        });
        $('.add-event-btn').on('click',function (e) {
            var tmpl =
                '<div class="event-item">' +
                    '<div class="row delete-row"><div class="column-12"><a href="#" class="delete-event">- Удалить</a></div></div>'+
                    '<div class="row">' +
                        '<div class="input-row column-6">' +
                            '<div class="input-row-inner">' +
                                '<select name="Вид спорта" class="single-select">'+
                                    '<option value="1">Вид спорта</option>'+
                                    '<option value="1">Вид спорта 1</option>'+
                                    '<option value="1">Вид спорта 2</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>' +
                        '<div class="input-row column-6">' +
                            '<div class="input-row-inner">' +
                                '<div class="custom-dropdown">\n' +
                                    '<div class="custom-dropdown-inner">\n' +
                                    '    <div class="val-drop">\n' +
                                    '        <button class="val-drop-btn">Лист #A</button>\n' +
                                    '    </div>\n' +
                                    '    <div class="dropdown-list">\n' +
                                    '        <div class="play-list">\n' +
                                    '            <div class="drop-item">\n' +
                                    '                <div class="check-drop">\n' +
                                    '                    <input name="playlist" type="radio" id="playlist1'+count_tpl+'" checked="checked" value="Лист #A">\n' +
                                    '                    <label for="playlist1'+count_tpl+'">Лист #A</label>\n' +
                                    '                </div>\n' +
                                    '            </div>\n' +
                                    '            <div class="drop-item">\n' +
                                    '                <div class="check-drop">\n' +
                                    '                    <input name="playlist" type="radio" id="playlist2'+count_tpl+'" value="Лига Чемпионов">\n' +
                                    '                    <label for="playlist2'+count_tpl+'">Лига Чемпионов</label>\n' +
                                    '                </div>\n' +
                                    '            </div>\n' +
                                    '            <div class="drop-item">\n' +
                                    '                <div class="check-drop">\n' +
                                    '                    <input name="playlist" type="radio" id="playlist3'+count_tpl+'" value="НБА">\n' +
                                    '                    <label for="playlist3'+count_tpl+'">НБА</label>\n' +
                                    '                </div>\n' +
                                    '            </div>\n' +
                                    '        </div>\n' +
                                    '        <div class="drop-item">\n' +
                                    '            <div class="create-playlist">\n' +
                                    '                <div class="input-create">\n' +
                                    '                    <input type="text" placeholder="Новый плейлист">\n' +
                                    '                </div>\n' +
                                    '                <div class="btn-create">\n' +
                                    '                    <button class="btn-primary btn btn-hover create-btn">Создать</button>\n' +
                                    '                </div>\n' +
                                    '            </div>\n' +
                                    '        </div>\n' +
                                    '    </div>\n' +
                                    '</div>\n' +
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>' +
                    '<div class="row">\n' +
                    '    <div class="input-row column-6">\n' +
                    '        <div class="input-row-inner">\n' +
                    '            <input type="text" placeholder="Название матча">\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '    <div class="input-row column-6">\n' +
                    '        <div class="input-row-inner">\n' +
                    '            <input type="text" placeholder="Прогноз">\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '</div>\n' +
                    '<div class="row">\n' +
                    '    <div class="input-row column-3">\n' +
                    '        <div class="input-row-inner">\n' +
                    '            <input type="text" placeholder="Коэффициент">\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '    <div class="input-row column-3">\n' +
                    '        <div class="input-row-inner">\n' +
                    '            <input type="text" placeholder="Процент от банка (%)">\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '    <div class="input-row column-6 column-m-12">\n' +
                    '        <div class="input-row-inner date-drop">\n' +
                    '            <input type="text" placeholder="Дата">\n' +
                    '            <span class="icon-calendar"></span>\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '</div>'+
                '</div>';
                count_tpl++;
                $('.event-block').append(tmpl);
                if($('.event-item').length > 1){
                    $('.delete-row').slideDown(400);
                } else {
                    $('.delete-row').slideUp(400);
                }
                addBetFunc();
            e.preventDefault();
        });
        $('.delete-event').on('click',function (e) {
            $(this).parents('.event-item').remove();
            e.preventDefault();
        });
        $('#menu-slide li a').on('click',function () {

        });
        $('.left-sidebar-trigger').on('click',function () {
            $('.dash-left-col').addClass('active-sidebar');
            $('body').addClass('no-scroll');
            $('.overlay-sidebar').fadeIn(400);
            $('.dasboard-page .header-main').css({
                'z-index':'9'
            });
            return false;
        });
        $('.left-sidebar-close,.overlay-sidebar').click(function () {
            $('.dash-left-col').removeClass('active-sidebar');
            $('body').removeClass('no-scroll');
            $('.overlay-sidebar').fadeOut(400);
            setTimeout(function () {
                $('.dasboard-page .header-main').css({
                    'z-index':'100'
                });
            },400);
            return false;
        });
        $('.open-coupon').on('click',function () {
            $(this).fadeOut(400);
            $('.overlay-sidebar-right').fadeIn(400);
            $('body').removeClass('no-scroll');
            $('.dash-right-col').addClass('active-sidebar');
            $('.dasboard-page .header-main').css({
                'z-index':'9'
            });
            return false;
        });
        $('.right-sidebar-close,.overlay-sidebar-right').click(function () {
            $('.dash-right-col').removeClass('active-sidebar');
            $('body').removeClass('no-scroll');
            $('.overlay-sidebar-right').fadeOut(400);
            $('.open-coupon').fadeIn(400);
            setTimeout(function () {
                $('.dasboard-page .header-main').css({
                    'z-index':'100'
                });
            },400);
            return false;
        });
    });
    var cleatTabs;
    function addBetFunc() {
        $('.single-select').select2();
        $('.val-drop-btn').on('click',function (e) {
            $(this).parents('.custom-dropdown').toggleClass('active-drop');
            $(this).parents('.custom-dropdown').find('.dropdown-list').stop().fadeToggle(400);
            e.preventDefault();
        });
        $(document).click( function(event){
            if( $(event.target).closest(".custom-dropdown").length )
                return;
            $('.custom-dropdown').find('.dropdown-list').stop().fadeOut(400);
            $('.custom-dropdown').removeClass('active-drop');
            event.stopPropagation();
        });
        $('.custom-dropdown input[type="radio"]').on('change',function () {
            var this_val_text = $(this).val();
            $(this).parents('.custom-dropdown').find('.val-drop-btn').text(this_val_text);
            $('.custom-dropdown').find('.dropdown-list').stop().fadeOut(400);
            $('.custom-dropdown').removeClass('active-drop');
        });
        var count_tpl = 1;
        $('.dropdown-list').on('click','.create-btn',function (e) {
            if($(this).parents('.create-playlist').find('input').val() != '') {
                var namePlaylist = $(this).parents('.create-playlist').find('input').val();
                var count_items = $(this).parents('.custom-dropdown').find('.play-list .drop-item').length + 1;
                $(this).parents('.custom-dropdown').find('.play-list').append('<div class="drop-item"><div class="check-drop"><input name="playlist" type="radio" id="playlist'+ count_items + count_tpl +'" value="'+ namePlaylist +'"><label for="playlist'+count_items+'">'+namePlaylist+'</label></div></div>');
                $(this).parents('.create-playlist').find('input').val('');
            }
            count_tpl++;
            e.preventDefault();
        });
        $('.delete-event').on('click',function (e) {
            $(this).parents('.event-item').remove();
            e.preventDefault();
        });
    }
    function tabToggle() {
        $('.btn-tab').on('click',function () {
            var id_tab = $(this).attr('data-target');
            $(this).parents('.tab').find('li').removeClass('active');
            $(this).parent().addClass('active');
            $(id_tab).parents('.tab-content').find('.tab-panel').stop().fadeOut(400,function () {

            });
            clearTimeout(cleatTabs);
            cleatTabs = setTimeout(function () {
                $('.tab-panel').removeClass('active');
                $(id_tab).stop().fadeIn(400).addClass('active');
            },400);
            return false;
        });
    }
    function countSlideElementsReview() {
        var curent_after_cange;
        var show_page;
        var allslide = $('.rev-slider .slick-slide').length;
        var curent_page_slide = 1;
        if($(window).width() > 990) {
            show_page = Math.round(allslide/2);
        }
        if($(window).width() < 990) {
            show_page = allslide;
        }
        $(window).resize(function () {
            if($(window).width() > 990) {
                show_page = Math.round(allslide/2);
            } else {
                show_page = allslide;
            }
        });
        $('.arrow-review').append('<div class="count-slides"><span class="cur-slide">'+ curent_page_slide +'</span>/<span class="all-slides">'+ show_page +'</span></div>');
        $('.rev-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
            $('.rev-slider .slick-slide').removeClass('cpr_count');
            $('.rev-slider .slick-current').prevAll('.slick-slide').addClass('cpr_count');
            if($(window).width() > 990) {
                curent_page_slide = $('.cpr_count').length + 2;
                curent_after_cange = Math.round(curent_page_slide/2);
            }
            if($(window).width() < 990) {
                curent_page_slide = $('.cpr_count').length + 1;
                curent_after_cange = curent_page_slide;
            }
            $('.arrow-review .cur-slide').text(curent_after_cange);
        });
        $('.line-list a').on('click',function () {
            var indexSection = $(this).attr('data-index');
            $.fn.fullpage.moveTo(indexSection);
            return false;
        });
    }
    function fullPageInit() {
        var timeout_section;
        if($('div').is('#home-scroll')) {
            $('#home-scroll').fullpage({
                menu: '#menu-slide',
                // lockAnchors: true,
                anchors:['mainScreen','textScreen', 'aboutScreen', 'reviewScreen'],
                scrollingSpeed: 1100,
                // normalScrollElements:'.review-section',
                verticalCentered: true,
                onLeave: function(index, nextIndex, direction){
                    var nIndex;
                    if(nextIndex <= 4) {
                        nIndex = nextIndex;
                    } else {
                        nIndex = 4;
                    }
                    $('.active-screen span').text(nIndex);
                    var next_item_line = nextIndex - 1;
                    $('.line-list li').removeClass('active');
                    $('.line-list li').eq(next_item_line).addClass('active');
                    // var this_image_section =
                    $('.image-background-section-'+index).removeClass('active');
                    clearTimeout(timeout_section);
                    timeout_section = setTimeout(function () {
                        $('.image-background-section-'+nextIndex).addClass('active');
                    },500);
                    if(nextIndex != 1) {
                        $('.arrow-main-slider').addClass('two-arrows');
                        $('.arrow-up').fadeIn(400);
                    } else {
                        $('.arrow-main-slider').removeClass('two-arrows');
                        $('.arrow-up').fadeOut(400);
                    }
                    if(nextIndex == 1) {
                        $('.image-first-screen').addClass('active');
                    } else {
                        $('.image-first-screen').removeClass('active');
                    }
                    if(nextIndex == 5) {
                        $('.fixed-footer').addClass('big-footer');
                        $('.arrow-main-slider').addClass('hide-bootm-arrow');
                        $('.header-main').addClass('scrolled-header');
                        $('.pagination-wrapper').addClass('scroll-pag');
                    } else {
                        $('.fixed-footer').removeClass('big-footer');
                        $('.arrow-main-slider').removeClass('hide-bootm-arrow');
                        $('.header-main').removeClass('scrolled-header');
                        $('.pagination-wrapper').removeClass('scroll-pag');
                    }
                    if(nextIndex != 2) {
                        $('.image-back').removeClass('animate-image');
                        $('.back-two-slide').removeClass('active-slide-back');
                    }
                    // console.log(nextIndex);
                },
                afterLoad: function(anchorLink, index){
                    if(index == 2){
                        $('.back-two-slide').addClass('active-slide-back');
                        $('.image-back').addClass('animate-image');
                    }
                }
            });
        }
    }
    function destroyHomeCarousel() {
        if($('div').is('#home-scroll')) {
            if($(window).width() < 768) {
                if(flag_fp_init == false){
                    $.fn.fullpage.destroy('all');
                    flag_fp_init = true
                }
            } else {
                if(flag_fp_init == true) {
                    fullPageInit();
                    flag_fp_init = false;
                }
            }
        }
    }
    function inputFocus() {
        $('.input-row input,.input-row textarea').each(function () {
            if($(this).val() != '') {
                $(this).parents('.input-row').addClass('hasData');
            }
        });
        $('.input-row input,.input-row textarea').bind('blur', function(){
            if($(this).val() != ''){
                $(this).parents('.input-row').addClass('hasData');
            } else {
                $(this).parents('.input-row').removeClass('hasData');
            }
            $(this).parents('.input-row').removeClass('focus');
        });

        $('.input-row input,.input-row textarea').bind('focus', function(){
            $(this).parents('.input-row').addClass('focus');
            if($(this).val() != ''){
                $(this).parents('.input-row').addClass('hasData');
            } else {
                $(this).parents('.input-row').removeClass('hasData');
            }
        });
        $('#show-login').on('click',function (e) {
            $('.right-side-login').addClass('login-show');
            $('.body-modal-inner').addClass('padding-left-form');
            $('.login-block').removeClass('active');
            $('.register-block').addClass('active');
            e.preventDefault();
        });
        $('#show-register').on('click',function (e) {
            $('.right-side-login').removeClass('login-show');
            $('.body-modal-inner').removeClass('padding-left-form');
            $('.login-block').addClass('active');
            $('.register-block').removeClass('active');
            e.preventDefault();
        });
        $('[data-toggle="modal-dismiss"]').on('click',function () {
            $(this).parents('.modal-wrapper').fadeOut(500).removeClass('active');
            $('body').removeClass('noScroll');
            return false;
        });
        $('[data-toggle="modal"]').on('click',function () {
            var modal_block = $(this).attr('data-target');
            $(modal_block).fadeIn(500).addClass('active');
            $('body').addClass('noScroll');
            $('.circle-wrapper-modal').each(function () {
                var circle = $(this).find('.circle');
                var data_ptc = $(this).attr('data-ptc');
                var data_ptc_prc = (data_ptc*4.76190476)/100;
                // console.log(data_ptc);
                var fill_color;
                if(data_ptc == 1) {
                    fill_color = '#FEFF01';
                }
                if(data_ptc == 2) {
                    fill_color = '#B9FF00';
                }
                if(data_ptc == 3) {
                    fill_color = '#72FF00';
                }
                if(data_ptc == 4) {
                    fill_color = '#00FF0D';
                }
                if(data_ptc == 5) {
                    fill_color = '#119300';
                }
                if(data_ptc == 6) {
                    fill_color = '#01FE6D';
                }
                if(data_ptc == 7) {
                    fill_color = '#02FEC1';
                }
                if(data_ptc == 8) {
                    fill_color = '#00D8FF';
                }
                if(data_ptc == 9) {
                    fill_color = '#0190FF';
                }
                if(data_ptc == 10) {
                    fill_color = '#0053FF';
                }
                if(data_ptc == 11) {
                    fill_color = '#0000FE';
                }
                if(data_ptc == 12) {
                    fill_color = '#0500A4';
                }
                if(data_ptc == 13) {
                    fill_color = '#772A9E';
                }
                if(data_ptc == 14) {
                    fill_color = '#BA27C8';
                }
                if(data_ptc ==15) {
                    fill_color = '#D912A3';
                }
                if(data_ptc == 16) {
                    fill_color = '#FD018A';
                }
                if(data_ptc == 17) {
                    fill_color = '#FE722B';
                }
                if(data_ptc == 18) {
                    fill_color = '#FE4E00';
                }
                if(data_ptc == 19) {
                    fill_color = '#FFFFFF';
                }
                if(data_ptc == 20) {
                    fill_color = '#454545';
                }
                if(data_ptc == 21) {
                    fill_color = '#1A1A1A';
                }
                $(circle).circleProgress({
                    value: data_ptc_prc,
                    fill: fill_color,
                    animation: false,
                    size: 74,
                    thickness: 2,
                    emptyFill: "rgba(255, 255, 255, .07)"
                });
            });
            return false;
        });
        $('.chat-tab-trigger').on('click',function () {
            var id_tab_chat = $(this).attr('data-toggle');
            $('.chat-content-item').stop().fadeOut(400,function () {
                setTimeout(function () {
                    $(id_tab_chat).stop().fadeIn(400).addClass('active');
                },400);
            });
            $('.chat-tab-trigger').removeClass('active');
            $(this).addClass('active');
            if($(window).width() < 768) {
                $('.left-chat').removeClass('active');
            }
            return false;
        });
        $('.button-trig-l-s').on('click',function () {
            $('.left-chat').toggleClass('active');
        });
        if($(window).width()<990) {

        }
    }
})(jQuery);