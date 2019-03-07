$(function () {

    console.log("load modal ajax");

    $(document).on("click", ".modaleAjax", function(e) {

        console.log("load modal ajax111111");
    // $('.modaleAjax').click(function(e){
        var dataTargetWager=$(this).data('target');
        // Instantiate new modal
        var modal = new Custombox.modal(
            {
                content: {
                    effect: 'blur',
                    target: dataTargetWager,
                  //  target: '#add_testimonial',
                    // target: '/modal',
                    // width: '50%',
                    positionX: 'center',
                    positionY: 'top',
                },
                overlay: {
                    active: true,
                    color: '#000',
                    opacity: .48,
                    close: true,
                    speedIn: 300,
                    speedOut: 300,
                    onOpen: null,
                    onComplete: null,
                    onClose: null,
                },
                loader: {
                    active: true,
                    color: '#fff',
                    speed: 1500,
                }
            }
        );
// Open
        modal.open();
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        event.stopImmediatePropagation();
        event.preventDefault();
        return false;
    });





    // $('.btn-action').click(function(){
    //     var url = $(this).data("url");
    //     $.ajax({
    //         type: "GET",
    //         url: url,
    //         dataType: 'json',
    //         success: function(res) {
    //
    //             // get the ajax response data
    //             var data = res.body;
    //             // update modal content
    //             $('.modal-body').text(data.someval);
    //             // show modal
    //             $('#modalWrapper').modal('show');
    //
    //         },
    //         error:function(request, status, error) {
    //             console.log("ajax call went wrong:" + request.responseText);
    //         }
    //     });
    // });


});

function openModaleDinamik(el) {

    // $('.modaleAjax').click(function(e){
    var dataTargetWager=$(el).data('target');
    // Instantiate new modal
    var modal = new Custombox.modal(
        {
            content: {
                effect: 'blur',
                target: dataTargetWager,
                //  target: '#add_testimonial',
                // target: '/modal',
                // width: '50%',
                positionX: 'center',
                positionY: 'top',
            },
            overlay: {
                active: true,
                color: '#000',
                opacity: .48,
                close: true,
                speedIn: 300,
                speedOut: 300,
                onOpen: null,
                onComplete: null,
                onClose: null,
            },
            loader: {
                active: true,
                color: '#fff',
                speed: 1500,
            }
        }
    );
// Open
    modal.open();
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
    event.stopImmediatePropagation();
    event.preventDefault();
    return false;
}

function openModaleMoreDetail(el) {

    // $('.modaleAjax').click(function(e){
    var dataTargetWager=$(el).data('target');
    // Instantiate new modal
    var modal = new Custombox.modal(
        {
            content: {
                effect: 'blur',
                target: dataTargetWager,
                //  target: '#add_testimonial',
                // target: '/modal',
                // width: '50%',
                positionX: 'center',
                positionY: 'top',
            },
            overlay: {
                active: true,
                color: '#000',
                opacity: .48,
                close: true,
                speedIn: 300,
                speedOut: 300,
                onOpen: null,
                onComplete: null,
                onClose: null,
            },
            loader: {
                active: true,
                color: '#fff',
                speed: 1500,
            }
        }
    );
// Open
    modal.open();
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
    event.stopImmediatePropagation();
    event.preventDefault();
    return false;
}

function sendPeto(e) {

    Peto.makePeto(this);
    return false;
}





$(document).ready(function () {
    Peto.init();
});

var Peto={
    csrf:null,
    csrf_param:null,
    devStatus:false, // для разработки
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");

    },

    makePeto: function (el) {
        var data2 = {};
        data2[this.csrf_param] = this.csrf;
        data2['id'] = $('#petoMessage').val();
        data2['message'] =$('#petoUserId').val();

        $.ajax({
            url: $('#formPeto').attr('action'),
            type: "POST",
           // data:  $('#formPeto input[type=\'text\']', '#formPeto input[type=\'hidden\']'), // ???? NOT work
            data:  data2,
            dataType: "json",
            success: function (json) {

                if (json) {
                    Peto.render(json.status);
                    // if(json.status==='ok'){
                    //        Peto.render(json.status);
                    // }
                    // if(json.status==='error'){
                    //     Peto.render(json.status);
                    // }
                  //  SmartCart.getFromCart(); // update cart

                } else {
                    console.log(json);
                }
            }

        });
    },



    render:function (status) {

        if(status==='ok'){
            $('#modalePetoBody .wrapModaleText').html('');
            $('#modalePetoBody .wrapModaleText').html('<p> Ваш запрос успешно отправлен.</p>');
        }else if(status==='error'){
            $('#modalePetoBody .wrapModaleText').html('');
            $('#modalePetoBody .wrapModaleText').html('<p> Ошыбка (:</p>    ');
        }else{
            $('#modalePetoBody .wrapModaleText').html('');
            $('#modalePetoBody .wrapModaleText').html('<p> Что-то пошло не так (:</p>    ');
        }


        // var id_for_bets = $(el).attr('data-id');
        // var data_parent = $(el).parents('.row-collapse-inner').attr('data-parents');
        // var name_competition = $(el).parents('.row-collapse-inner').find('.info-bet .value-bet').text();
        // var name_bet = $(el).attr('data-text') + '&nbsp;' + $(el).find('.title-bet').text();
        // // var name_bet = $(this).attr('data-text');
        // var coefficient_bet = $(el).find('.value-bet').text();
        // var coeficient = parseFloat($(el).find('.value-bet').text());
        // if(!$(el).hasClass('selected')){
        //     tottal_coeficient = tottal_coeficient + coeficient;
        //     // $('#total-coeficient').text(tottal_coeficient);
        //     SmartCart.renderAdd(id_for_bets,data_parent,name_competition,name_bet,coefficient_bet)
        //
        // }
        // SmartCart.reloadDom(el)


    },


};







