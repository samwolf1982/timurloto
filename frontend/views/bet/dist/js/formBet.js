$(function () {
    console.log('Scrool to');
    // console.log(getAllUrlParams().top);

//    tournament=2
// parse url top
    if(getAllUrlParams().top){

            $([document.documentElement, document.body]).animate({
                scrollTop: $("#tope100").offset().top
            }, 800);
    }

});

$(document).ready(function () {
    LoadeNext.init();
    // next loade
    $(document).on("click", ".all-rate-btn", function(e) {
        console.log($(this).data())
        LoadeNext.sendData(this,$(this).data(),'/bet/nextload');
        // $(this).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
      //  e.preventDefault();
        return false;
    });

});

var LoadeNext={
    csrf:null,
    csrf_param:null,
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
    },
    sendData: function (el,data, link) {
        if (!link) {
            link = '/bet/nextload';
        }
        data[this.csrf_param] = this.csrf;
        if(getAllUrlParams().level){
            data['level'] = 'pro';
        }



        jQuery.post(link, data,
            function (json) {
                console.log(json);
                if (json.errors) {
                    console.log(json.errors);
                }
                else {
                    if(json.offset){ $(el).data('offset',json.offset);}
                    if(json.html){ $('#wrape_next_bet').before(json.html);}


                    // if(json.meta.type==='sports'){
                    //     DashboardCategory.renderSport(el,json.data);
                    // }else if(json.meta.type==='tourney'){
                    //     DashboardCategory.renderTourney(el,json.data);
                    // }else if(json.meta.type==='games'){
                    //     DashboardCategory.renderGames(el,json.data);
                    // }else if(json.meta.type==='gamesTab') {
                    //     DashboardCategory.renderTabsGames(el, json.data);
                    // }else if(json.meta.type==='event') {
                    //     DashboardCategory.renderEvents(el, json);
                    // }else{
                    //     DashboardCategory.render(el,json); // not using
                    // }
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
                        DashboardCategory.renderTabsGames(el, json.data);
                    }else{
                        console.log('is no popularsports')
                    }
                }
            }, "json");



        return false;
    },

    render: function (el,json) {
        // console.log($(el).data());
        // $('#child_colapse_'+$(el).data('id')).html(json.html);
        // $(el).parents('.collapsed-type').toggleClass('active_coll_main').find('.collapse-block').stop().slideToggle(400);
    },

    test:function () {
        console.log(this.csrf)
        console.log(this.csrf_param)
    }
};


// разбор урла
function getAllUrlParams(url) {

    // get query string from url (optional) or window
    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

    // we'll store the parameters here
    var obj = {};

    // if query string exists
    if (queryString) {

        // stuff after # is not part of query string, so get rid of it
        queryString = queryString.split('#')[0];

        // split our query string into its component parts
        var arr = queryString.split('&');

        for (var i=0; i<arr.length; i++) {
            // separate the keys and the values
            var a = arr[i].split('=');

            // in case params look like: list[]=thing1&list[]=thing2
            var paramNum = undefined;
            var paramName = a[0].replace(/\[\d*\]/, function(v) {
                paramNum = v.slice(1,-1);
                return '';
            });

            // set parameter value (use 'true' if empty)
            var paramValue = typeof(a[1])==='undefined' ? true : a[1];

            // (optional) keep case consistent
            paramName = paramName.toLowerCase();
            paramValue = paramValue.toLowerCase();

            // if parameter name already exists
            if (obj[paramName]) {
                // convert value to array (if still string)
                if (typeof obj[paramName] === 'string') {
                    obj[paramName] = [obj[paramName]];
                }
                // if no array index number specified...
                if (typeof paramNum === 'undefined') {
                    // put the value on the end of the array
                    obj[paramName].push(paramValue);
                }
                // if array index number specified...
                else {
                    // put the value at that index number
                    obj[paramName][paramNum] = paramValue;
                }
            }
            // if param name doesn't exist yet, set it
            else {
                obj[paramName] = paramValue;
            }
        }
    }

    return obj;
}






