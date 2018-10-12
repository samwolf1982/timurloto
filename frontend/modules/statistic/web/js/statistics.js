/* eslint-disable no-empty-label */
var t_i = 1; //??
jQuery(document).on("click", "#createPlaylist", function (event) {
    currentButton = $(this);
    parentWrap = "play-list-drop-statistic";
    console.log("dfghj") ;
    betStatistic.csrf = jQuery("meta[name=csrf-token]").attr("content");
    betStatistic.csrf_param = jQuery("meta[name=csrf-param]").attr("content");
//   send
    var data = {};
    data[betStatistic.csrf_param] = betStatistic.csrf;
    data.newName = currentButton.parents(".create-playlist").find("input").val();
    console.log(data);
    $.ajax({
    url: "/statistic/default/add",
    type: "post",
    data: data,
   // data: $("."+parentWrap+' input[type=\'text\'], .'+parentWrap+' input[type=\'password\'], .'+parentWrap+' input[type=\'tel\'], .'+parentWrap+' input[type=\'radio\']:checked, .'+parentWrap+' input[type=\'checkbox\']:checked, .'+parentWrap+'  select '),
    dataType: "json",
    beforeSend: function () {
        $('#ajax-button-confirm').addClass('preloader');

    },
    complete: function () {
        $('#ajax-button-confirm').removeClass('preloader');

    },
    success: function (json) {
        console.log(json);
        if (json.status !== "errors"){
            if ("" !== currentButton.parents(".create-playlist").find("input").val()) {
                var i = currentButton.parents(".create-playlist").find("input").val(),
                    o = currentButton.parents(".custom-dropdown").find(".play-list .drop-item").length + 1;
                currentButton.parents(".custom-dropdown").find(".play-list").append('<div class="drop-item"><div class="check-drop"><input name="playlist" type="radio" id="playlist' + o + t_i + '" value="' + i + '"><label for="playlist' + o + '">' + i + "</label></div></div>"), currentButton.parents(".create-playlist").find("input").val("");
            }
            t_i++;
        }

    }
    });
});
// play-list-drop-statistic
if (typeof betStatistic === "undefined" || !betStatistic) {
    var betStatistic = {};
}
ReloaderBets = {
    init:function () {

    },
    reupdate: function (element) {
        var id_playlist=$(element).data('value');
        console.log(id_playlist);
        if($(element).data('type') === "statistic"){
            ReloaderBets.uploadStatistic(id_playlist);
        }else if($(element).data('type') === "game"){
            ReloaderBets.uploadBets(id_playlist);
        }


    },
    uploadBets:function (id_playlist) {
        console.log('uploadBets');
        betStatistic.csrf = jQuery("meta[name=csrf-token]").attr("content");
        betStatistic.csrf_param = jQuery("meta[name=csrf-param]").attr("content");
//   send
        var data = {};
        data[betStatistic.csrf_param] = betStatistic.csrf;
        data.id_playlist= id_playlist;
        data.url_params= ReloaderBets.getAllUrlParams();



        newPageUrl=ReloaderBets.replacePlaylistId(window.location,id_playlist);
         window.location =  newPageUrl+'#bets';
        if(0){
            $.ajax({
                url: "/statistic/default/playlistbet",
                type: "post",
                data: data,
                dataType: "json",
                beforeSend: function () {
                    $('#ajax-button-confirm').addClass('preloader');

                },
                complete: function () {
                    $('#ajax-button-confirm').removeClass('preloader');

                },
                success: function (json) {
                    console.log(json);
                    // if (json.status !== "errors"){
                    //     if ("" !== currentButton.parents(".create-playlist").find("input").val()) {
                    //         var i = currentButton.parents(".create-playlist").find("input").val(),
                    //             o = currentButton.parents(".custom-dropdown").find(".play-list .drop-item").length + 1;
                    //         currentButton.parents(".custom-dropdown").find(".play-list").append('<div class="drop-item"><div class="check-drop"><input name="playlist" type="radio" id="playlist' + o + t_i + '" value="' + i + '"><label for="playlist' + o + '">' + i + "</label></div></div>"), currentButton.parents(".create-playlist").find("input").val("");
                    //     }
                    //     t_i++;
                    // }

                }
            });
        }



    },
    uploadStatistic:function (id_playlist) {
        console.log('uploadStatistic');
    },
    getAllUrlParams:function(url) {

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
},

    replacePlaylistId:function (url,playlistid) {
        let href = new URL(url);
        href.searchParams.set('playlist', playlistid);
        href.hash='';//  replace('#','')
        // console.log(href.toString());
        // console.log(href.hash);
        return href;
    }


}






