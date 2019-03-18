$(document).ready(function () {
    DashboardCategory.init();
    DashboardCategory.gerSports();
    DashboardCategory.getPopularSports();
    // DashboardCategory.test();


    // $('.trigger-collapse').on('click',function (e) {
    // step 2
        $(document).on("click", ".trigger-collapse", function(e) {
            DashboardCategory.sendData(this,$(this).data(),'/provider/tourney');
        // $(this).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
            e.preventDefault();
        return false;
    });

     // step 3
    $(document).on("click", ".trigger-sub-collapse", function(e) {

        DashboardCategory.sendData(this,$(this).data(),'/provider/tourneygame');
        DashboardCategory.sendData(this,$(this).data(),'/provider/updatetabstourneygame');

      //   DashboardCategoryGroup.sendData(this,$(this).data());

       // $(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
         e.preventDefault();
        return false;
    });


    // 4
    $(document).on("click", ".turnire_fin , .total.show-all-bets.do_open_line,  .info-bet.do_open_line ", function(e) {
        console.log('turnire_fin')
        DashboardCategory.sendData(this,$(this).data(),'/provider/events');
        // DashboardCategoryFinlink.sendData(this,$(this).data());
        // $(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
        e.preventDefault();
        return false;
    });

    // // open event
    // // open line    delete this
    $(document).on('click','.total.show-all-bets.do_open_line11111',function (e) {
        // console.log('getLine')
        // DashboardCategory.sendData(this,$(this).data(),'/provider/events');
        // // DashboardCategoryFinlink.sendData(this,$(this).data());
        // // $(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
        // e.preventDefault();
        // return false;
        SmartCart.getLine(this);
        e.preventDefault();
        return false;
    });

});

var DashboardCategory={
    csrf:null,
    csrf_param:null,
      init:function () {
          this.csrf = jQuery('meta[name=csrf-token]').attr("content");
          this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
      },
    sendData: function (el,data, link) {
        if (!link) {
            link = '/dashboard/get-by-country';
        }
        data[this.csrf_param] = this.csrf;
        jQuery.post(link, data,
            function (json) {
                if (json.errors) {
                    console.log(json.errors);
                }
                else {
                    if(json.meta.type==='sports'){
                        DashboardCategory.renderSport(el,json.data);
                    }else if(json.meta.type==='tourney'){
                        DashboardCategory.renderTourney(el,json.data);
                    }else if(json.meta.type==='games'){
                        DashboardCategory.renderGames(el,json.data);
                    }else if(json.meta.type==='gamesTab') {
                        DashboardCategory.renderTabsGames(el, json.data);
                    }else if(json.meta.type==='event') {
                        DashboardCategory.renderEvents(el, json);
                    }else{
                        DashboardCategory.render(el,json); // not using
                    }
                }
            }, "json");
        return false;
    },
    sendDataProgressBar: function (el,data, link) {
        data[this.csrf_param] = this.csrf;
        $('.progresse_bare').css({width: 100+'%'});
        jQuery.post(link, data,
            function (json) {
                if (json.errors) {
                    console.log(json.errors);
                }
                else {
                    $('.progresse_bare').hide();
                    if(json.meta.type==='popularsports'){
                        // DashboardCategory.renderTabsGames(el, json.data);
                        $.each(json.data, function( index, value ) {
                            if(index===0)  DashboardCategory.renderTabsGames(el, value,'active'); //массив елементов
                            else DashboardCategory.renderTabsGames(el, value,''); //массив елементов
                        });

                        $('#dashboard_center_block_tab_blocks .tab-block').hide();
                        $('#dashboard_center_block_tab_blocks .tab-block:first').show();

                         // DashboardCategory.renderTabsGames(el, json.data2[0]);
                         // DashboardCategory.renderTabsGames(el, json.data2[1]);
                        // DashboardCategory.renderTabsGames(el, json.data);
                    }else{
                        console.log('is no popularsports')
                    }
                }
            }, "json");



        return false;
    },

    render: function (el,json) {
        // console.log($(el).data());
        $('#child_colapse_'+$(el).data('id')).html(json.html);
        $(el).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
    },

    // 1
    renderSport: function (el,data) {
        if(data.length)  $('.preloaderSport').fadeOut(100, function() {
            $.each(data, function( k, e ) {    // e.id e.name e.count
                $('#sportTypeSidebar').append('<div class="collapsed-type">\n' +
                    '                    <div class="collapse-head">\n' +
                    '                        <button class="trigger-collapse" data-id="'+e.id +'"><span class="icon-football"></span>'+e.name +'</button>\n' +
                    '                    </div>\n' +
                    '                    <div class="collapse-block" >\n' +
                    '                        <ul class="collapse-list" id="child_colapse_'+e.id+'" >\n' +
                    '                        </ul>\n' +
                    '                    </div>\n' +
                    '                </div>');
            });
        });
        console.log('renderSport');
    },

    // 2
    renderTourney: function (el,data) {
        $('#child_colapse_'+$(el).data('id')).html('');
        $.each(data, function( k, e ) {    // e.id e.name e.count
            $('#child_colapse_'+$(el).data('id')).append('    <li class="">\n' +
                '            <a href="#" class="trigger-sub-collapse flevel" data-id="'+e.id+'">\n' +
                '            <span class="flag">\n' +
                '            <img src="images/ua.png" alt="">\n' +
             //   '            </span>\n' + e.name.substr(0, 26) +'        </a>\n' +
                '            </span>\n' + e.name +'        </a>\n' +
                '        <div class="sub-collapse">\n' +
                '            <ul class="sub-collapse-list" id="child_sub_colapse_'+e.id+'" >\n' +
                '            <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>\n' +
                '        <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>\n' +
                '        <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>\n' +
                '        <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>\n' +
                '        <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>\n' +
                '        </ul>\n' +
                '        </div>\n' +
                '        </li>');
        });
        $(el).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
    console.log('renderTourney');
},

        // 3
        renderGames: function (el,data) {
            $('#child_sub_colapse_'+$(el).data('id')).html("");
            $.each(data, function( k, e ) {    // e.id e.name e.count
                $('#child_sub_colapse_'+$(el).data('id')).append(' <li><a href="#" class="turnire_fin"' +
                    ' data-id="' + e.id + '" >' + e.name + ' <span class="count-block">'+e.count+'</span></a></li>');
            });
            $(el).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
            console.log('renderGames');
        },

    // 4
     renderEvents: function (el,data) {

        fullgamename=data.meta.attr[0].attributes['team-1-user-locale-lng-name']+' - '+data.meta.attr[0].attributes['team-2-user-locale-lng-name']
         starteTime=timeConverter(data.meta.attr[0].attributes['start']);

         $('.main_center_block').fadeOut(400);
        openline =  $('.open_line_center_block');
        openline.html('');
         openline.append('<a href="bet-dashboard.html" class="head-pink"> <h3>'+data.meta.attr[0].attributes['league-user-locale-lng-name']+'</h3> </a>');




         openline.append('<div class="content-bg pb-5">\n' +
             '                                    <div class="open-bet-wrapper">\n' +
             '                                        <div class="open-bet-wrapper-inner" data-parents="'+data.meta.id+'">\n' +
             '                                        </div>\n' +
             '                                    </div>\n' +
             '                </div>');
         openBetWrapperInner=$('.open-bet-wrapper-inner[data-parents="'+data.meta.id+'"]')
         openBetWrapperInner.append('<div class="head-open-bet">\n' +
             '                                                <div class="icon-open-bet">\n' +
             '                                                    <span class="icon-football"></span>\n' +
             '                                                </div>\n' +
             '                                                <div class="title-open-bet">\n' +
             '                                                    <h3>'+fullgamename+'</h3>\n' +
             '                                                </div>\n' +
             '                                                <div class="date-open-icon">'+starteTime+'</div>\n' +
             '                                                <a href="bet-dashboard.html" class="total show-all-bets closeLine">'+data.meta.count+'</a>\n' +
             '                                            </div>');
// console.log(data.meta.attr[0].attributes);
         openBetWrapperInner.append('<div class="body-open-bets">\n' +
             '                                                <div class="body-open-bets-inner">\n' +
             '                                                    <div class="search-bets-block">\n' +
             '                                                        <div class="search-bets-block-inner">\n' +
             '                                                            <form action="#">\n' +
             '                                                                <input type="text" class="livesearcheform" name="livesearcheform" placeholder="Поиск по событию" >\n' +
             '                                                                <button id="search-bets" type="submit"><span class="icon-search"></span></button>\n' +
             '                                                            </form>\n' +
             '                                                        </div>\n' +
             '                                                    </div>\n' +
             '                                                </div>\n' +
             '                     <div class="open-collapsed-wrapper"></div>                       </div>' +
             '');

         openCollapsedWrapper=$('.open-collapsed-wrapper');
         currentName='';

          grouppedArray=_.groupBy(data.data,'marketName');
         $.each(grouppedArray, function( k, eld ) {    // e.id e.name e.count

             collapseOpenBet=$('<div class="collapse-open-bet"></div>');
             collapseOpenBet.append('<div class="collapse-open-bet-head"><button class="collapse-open-bet-trigger active">'+k+'</button></div>')

             collapseopenbetcontent=$('<div class="collapse-open-bet-content"></div>');
             collapseopenbetitem=$('<div class="collapse-open-bet-item"></div>');

             rowbetsstats=$('<div class="row-bets-stats"></div>');

             $.each(eld,function (k1,eldIn) {
                  console.log(eldIn);
                //  dParent=eldIn.id.split('-')[0]  + '_'+eldIn.id.split('-')[2];  // группа фора и тд
                  dParent=eldIn.id.split('-')[0];  // группа фора и тд
                 rowbetsstats.append( '<div class="column4">\n' +
                     '<button class="bets-val" data-id="'+eldIn.id+'" data-parent="'+dParent+'"  data-text1="'+fullgamename+'" data-text2="'+eldIn.eventName+'"  data-text3="'+eldIn.marketName+'"  data-coof="'+eldIn.cf+'">\n' +
                     '<span class="mobile-name">'+eldIn.eventName+'</span>\n' +
                     '<span class="name-b">'+eldIn.eventName+'</span>\n' +
                     '<span class="coefficient-b">'+eldIn.cf+'</span>\n' +
                     '</button>\n' +
                     '                                                                        </div>' )
             });


             collapseopenbetitem.append(rowbetsstats); // loop here

             collapseopenbetcontent.append(collapseopenbetitem);
             collapseOpenBet.append(collapseopenbetcontent);



             openCollapsedWrapper.append(collapseOpenBet);



         });
         $('.open_line_center_block').fadeIn(400);


         $('#child_sub_colapse_'+$(el).data('id')).html("");
        $.each(data, function( k, e ) {    // e.id e.name e.count
            $('#child_sub_colapse_'+$(el).data('id')).append(' <li><a href="#" class="turnire_fin"' +
                ' data-id="' + e.id + '" >' + e.name + ' <span class="count-block">'+e.count+'</span></a></li>');
        });
        $(el).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
        console.log('render Event Game');
        SmartCart.backlight();
    },


    renderTabsGames: function (el,data,activeStatus) {

      var tabeUp = $('#sp_'+data[0].sport_id);//tabs
      if(tabeUp.length===0){
          var sportName='';
          if(data[0].data[0].attributes['user-locale-lng-name'].length){

              sportName=data[0].data[0].attributes['user-locale-lng-name'];
              // sportName=data[0].data[0].attributesuser-locale-lng-name;
          }
          $('#sporttabsNavigation').append('<li>\n' +
              '                <a href="#tab_'+data[0].sport_id+'" id="sp_'+data[0].sport_id+'" class="'+activeStatus+' tab-trigger" data-toggle="tabs"><span class="icon-football"></span> '+sportName+'</a>\n' +
              '            </li>');
      }


        var tabeBody = $('#tab_'+data[0].sport_id);// body tabs
        if(tabeBody.length===0){
            $('.tab-block').hide();
            $('#dashboard_center_block_tab_blocks').append('<div style="display: block;" class="tab-block" id="tab_'+data[0].sport_id+'">\n' + '<div class="tab-block-inner">\n' + '</div>\n' + '</div>');
            tabeBody = $('#tab_'+data[0].sport_id);// body tabs
        }


        var colapsetab=$('#tab-collapse-tournire_'+data[0].id);// body tabs // турнир название синея линия
        console.log(data[0].id);
        if(colapsetab.length===0){
            tabeBody.append('<div class="tab-collapse" id="tab-collapse-tournire_'+data[0].id+'">\n' +
                '                <div class="tab-collapse-head">\n' +
                '                    <button class="trigger-tab-collapse active">'+data[0].name+'</button>\n' +
                '                </div><div class="tab-collapse-content-inner"></div>\n' +
                '                \n' +
                '            </div>');

        }

        colapsetabInner=$('#tab-collapse-tournire_'+data[0].id);// тело таблиц
        colapsetabInner.children('.tab-collapse-content-inner').html('');

        $.each(data[0].data, function( index, value ) {
            mainGameId=value.attributes['main-game-id'];
            fullNamePlayers=value.attributes['team-1-user-locale-lng-name']+ ' - '+value.attributes['team-2-user-locale-lng-name'];
            timeStartMatch=timeConverter(value.attributes['start'])
            colapsetabInner.children('.tab-collapse-content-inner').append('<div class="row-collapse">\n' +
                '                            <div class="row-collapse-inner" data-parents="'+mainGameId+'">\n' +
                '                                <div class="icon-bet"><span class="icon-football"></span></div>\n' +
                '                                <a class="info-bet do_open_line" data-id="'+mainGameId+'"  href="bet-dashboard-open.html">\n' +
                '                                    <div class="title-bet">'+timeStartMatch+'</div>\n' +
                '                                    <div class="value-bet">'+fullNamePlayers+'</div>\n' +
                '                                </a>'+
                '                            </div>\n' +
                '                        </div>');

          colapseLine=colapsetabInner.find('.row-collapse-inner[data-parents="'+mainGameId+'"]');
                $.each(value.events['12341'], function( indexEv, valueEv ) {  //value.events['12341'] из маркета одна или вторая команда
                    // colapseLine.append('zzzz '+indexEv)
                    // colapseLine.append(valueEv)
                    eventNameLoop=valueEv.attributes['event-name'];
                    eventCooef=valueEv.attributes['odd'];
                    mName=valueEv.attributes['market-name'];
                    eventId=valueEv.id;
                    console.log(valueEv);
                    spid=valueEv.id;
                    colapseLine.append('<div class="team">\n' +
                        '                                <button class="bet-parent-val" data-id="'+eventId+'" data-parent="'+mainGameId+'"  data-text1="'+fullNamePlayers+'" data-text2="'+eventNameLoop+'" data-text3="'+mName+'"  data-coof="'+eventCooef+'" >\n' +
                        '                                    <div class="title-bet">'+eventNameLoop+'</div>\n' +
                        '                                    <div class="value-bet">'+eventCooef+'</div>\n' +
                        '                                </button></div> ');
                });
            colapseLine.append('<a href="bet-dashboard-open.html" class="total show-all-bets do_open_line" data-id="'+mainGameId+'">0</a>');
        });

        // $('#child_sub_colapse_'+$(el).data('id')).html("");
        // $.each(data, function( k, e ) {    // e.id e.name e.count
        //     $('#child_sub_colapse_'+$(el).data('id')).append(' <li><a href="#" class="turnire_fin"' +
        //         ' data-id="' + e.id + '" >' + e.name + ' <span class="count-block">'+e.count+'</span></a></li>');
        // });
        // $(el).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
        // console.log('renderGames');
    },


       gerSports:function () {
        DashboardCategory.sendData(null,{},'/provider/sports');
            console.log('gerSports');
    },

    getPopularSports:function () {
        DashboardCategory.sendDataProgressBar(null,{id:131927},'/provider/popularsports');
        console.log('getPopularSports');
    },
    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};

var DashboardCategoryGroup={
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
    },
    sendData: function (el,data, link) {
        if (!link) {
            link = '/dashboard/get-by-country-group';
        }
        data[this.csrf_param] = this.csrf;
        jQuery.post(link, data,
            function (json) {
                if (json.result === 'fail') {
                    console.log(json.error);
                }
                else {
                    DashboardCategoryGroup.render(el,json);
                }
            }, "json");
        return false;
    },
    render: function (el,json) {
        // console.log($(el).data());
         $('#child_sub_colapse_'+$(el).data('id')).html(json.html);
        //$(this).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
      $(el).parent().toggleClass('active_coll').find('.sub-collapse').stop().slideToggle(400);
       // $(el).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
    },
    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};


var DashboardCategoryFinlink={
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
    },
    sendData: function (el,data, link) {
        if (!link) {
            link = '/dashboard/get-by-country-group-fin';
        }
        data[this.csrf_param] = this.csrf;
        jQuery.post(link, data,
            function (json) {
                if (json.result === 'fail') {
                    console.log(json.error);
                }
                else {
                    DashboardCategoryFinlink.render_nav(el,json);
                    DashboardCategoryFinlink.render_block(el,json);
                }
            }, "json");
        return false;
    },
    render_nav:function (el,json) {

    },
    render_block:function (el,json) {
        $('#dashboard_center_block_tab_blocks').html(json.html_block);
    },
    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};









function timeConverter(UNIX_timestamp){
    var a = new Date(UNIX_timestamp * 1000);
    // var a = new Date(UNIX_timestamp);
    var months = [    'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря',];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    if(min<10) min= '0' + min
    var sec = a.getSeconds();
    // var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min;
    var time = date + ' ' + month + ' ' + hour + ':' + min;
    return time;
}

