/* eslint-disable no-empty-label */
var StickyCart = {
    close: function (el) {
     $(el).parent().parent().remove();
     this.removeCartBet(el);
                },
    removeCartBet: function (el) {
        var data = {};
      //  data.CartElement = {};
        data.elementId = $(el).data("id");
        $.ajax({
            url: "/cart/element/delete",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
            }
        });
        console.log("remove");
    },
    addToCart: function (el) {
        console.log("addToCart");
        var data = {};
        data.CartElement = {};
        data.CartElement.model = $(el).data("model");
        data.CartElement.item_id = $(el).data("id");
        data.CartElement.cat_id = $(el).data("cat");
        data.CartElement.players_id = $(el).data("players");
        data.CartElement.count = 1;
        data.CartElement.price = 0;
        data.CartElement.options = "{}";
        $.ajax({
            url: "/cart/element/create",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.elementsHTML) {
                    console.log(data.elementsHTML);
                    $("#cartBet .cartElements").html(data.elementsHTML);
                } else {
                    console.log(data);
                }
            }
            // error: function (xhr, ajaxOptions, thrownError) {
            //     alert(xhr.status);
            //     alert(thrownError);
            // }
        });
    },
    changeState: function (el,status) {
        var data = {};
        //  data.CartElement = {};
        data.elementId = $(el).data("id");
        data.status = status;
        $.ajax({
            url: "/cart/element/chose",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
            }
        });
        console.log("remove");
    },
      ordinar: function () {

      },
    express: function () {
    },
    sys:function () {
    }
};

$("#betTab a[data-toggle='tab']").on("shown.bs.tab", function (e) {
    alert(e.target.href);
})

// $(".stickiClose").on("click",function (e) {
//     StickyCart.close(this);
// });


//---------- document events
$(document).on("click",".stickiClose", function(e) {
    StickyCart.close(this);
});
$(document).on("click",".betLi", function(e) {
    $(".betLi").removeClass("selectedItem");
    $(this).addClass("selectedItem");
    StickyCart.addToCart(this);
    console.log("betLi");
});
$(document).on("change",".form-check-input:checkbox", function(e) {
    if (this.checked) {
        StickyCart.changeState(this,1);
        console.log("change");
    } else {
        StickyCart.changeState(this,0);
        console.log("NOT change");
    }
});



$("#cartBet").submit(function(e){

  //  var formData=$(this).serialize();
//   send
     var data = $(this).serializeArray();
     data[jQuery("meta[name=csrf-param]").attr("content")]=jQuery("meta[name=csrf-token]").attr("content");
//     data[jQuery("meta[name=csrf-param]").attr("content")] = jQuery("meta[name=csrf-token]").attr("content");
   console.log(data);

    $.ajax({
        url: "/wager/default/add",
        type: "post",
        data:data,
        // data: $(this).serialize()+"&"+jQuery("meta[name=csrf-param]").attr("content")+'='+jQuery("meta[name=csrf-token]").attr("content"),
      //   data: $("."+parentWrap+' input[type=\'text\'], .'+parentWrap+' input[type=\'password\'], .'+parentWrap+' input[type=\'tel\'], .'+parentWrap+' input[type=\'radio\']:checked, .'+parentWrap+' input[type=\'checkbox\']:checked, .'+parentWrap+'  select '),
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


//   console.log(formData);



   //      stop bulk
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
    event.stopImmediatePropagation();
    event.preventDefault();
});

// $('#myform :checkbox').change(function() {
//     // this will contain a reference to the checkbox
//     if (this.checked) {
//         // the checkbox is now checked
//     } else {
//         // the checkbox is now no longer checked
//     }
// });
