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
    UserReg.init();
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

var UserReg={
    csrf:null,
    csrf_param:null,
    devStatus:false, // для разработки
    init:function () {
        this.csrf = jQuery('meta[name=csrf-token]').attr("content");
        this.csrf_param = jQuery('meta[name=csrf-param]').attr("content");
    },

    loadFormReg: function () {
        var dataFormReg = {};
        dataFormReg[this.csrf_param] = this.csrf;
        $.ajax({
            url: '/uregistration/register',
            type: "POST",
            // data:  $('#formPeto input[type=\'text\']', '#formPeto input[type=\'hidden\']'), // ???? NOT work
            data:  dataFormReg,
            // dataType: "json",
            success: function (data) {

                $('#formWrapperRegister').html(data);
                inputFocusUpdate();
                // console.log(data);
                // if (json) {
                //     Peto.render(json.status);
                // } else {
                //     console.log(json);
                // }
            }

        });
        return false;
    },
    loadFormLogin: function () {
        var dataFormReg = {};
        dataFormReg[this.csrf_param] = this.csrf;
        $.ajax({
            url: '/usecurity/login',
            type: "POST",
            // data:  $('#formPeto input[type=\'text\']', '#formPeto input[type=\'hidden\']'), // ???? NOT work
            data:  dataFormReg,
            // dataType: "json",
            success: function (data) {

                $('#formWrapperLogin').html(data);
                $('.innerEmail').show();
                inputFocusUpdate();
                // console.log(data);
                // if (json) {
                //     Peto.render(json.status);
                // } else {
                //     console.log(json);
                // }
            }

        });
        return false;
    },
    loadForgotForm: function () {
        var dataFormReg = {};
        dataFormReg[this.csrf_param] = this.csrf;
        $.ajax({
            url: '/urecovery/request',
            type: "POST",
            data:  dataFormReg,
            // dataType: "json",
            success: function (data) {

                $('#formWrapperLogin').html(data);
                $('.innerEmail').hide();
                inputFocusUpdate();
            }

        });
    },



    render:function (status) {



        // if(status==='ok'){
        //     $('#modalePetoBody .wrapModaleText').html('');
        //     $('#modalePetoBody .wrapModaleText').html('<p> Ваш запрос успешно отправлен.</p>');
        // }else if(status==='error'){
        //     $('#modalePetoBody .wrapModaleText').html('');
        //     $('#modalePetoBody .wrapModaleText').html('<p> Ошыбка (:</p>    ');
        // }else{
        //     $('#modalePetoBody .wrapModaleText').html('');
        //     $('#modalePetoBody .wrapModaleText').html('<p> Что-то пошло не так (:</p>    ');
        // }




    },


};

// регистрация и вход грузим из бека
$(function () {
    // $(document).on("click", "#openMadaInner", function(e) {
    //         console.log('sssss');
    // });

    $('[data-toggle="modal-reg"]').on('click',function () {

        var modal_block = $(this).attr('data-target');
        $(modal_block).fadeIn(500).addClass('active');
        console.log('modal block is load2');
        var evt = $.Event('loadeModale');
        evt.th = this;
        evt.modal_block = modal_block;
        $(window).trigger(evt);
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


        UserReg.loadFormReg();
        UserReg.loadFormLogin();
        return false;
    });


    $('[data-toggle="edit_subscriber"], [data-toggle="edit_bet"] ').on('click',function () {

        var modal_block = $(this).attr('data-target');
        $(modal_block).fadeIn(500).addClass('active');
        console.log('modal block is load2');
        var evt = $.Event('loadeModale');
        evt.th = this;
        evt.modal_block = modal_block;
        $(window).trigger(evt);
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





    // $(document).on('beforeSubmit', 'form#registration-form', function () {
    //     var form = $(this);
    //     // return false if form still have some validation errors
    //     if (form.find('.has-error').length)
    //     {
    //         return false;
    //     }
    //     // submit form
    //     $.ajax({
    //         url    : form.attr('action'),
    //         type   : 'post',
    //         data   : form.serialize(),
    //         success: function (response)
    //         {
    //             console.log('HEREE2');
    //             console.log(response);
    //             if(response.status){
    //                 console.log('HEREE');
    //                 $('#formWrapperRegister').html(response.data);
    //             }
    //             // var getupdatedata = $(response).find('#filter_id_test');
    //             // $.pjax.reload('#note_update_id'); for pjax update
    //
    //             // inputFocusUpdate();
    //
    //         },
    //         error  : function ()
    //         {
    //             console.log('internal server error');
    //         }
    //     });
    //     return false;
    // });


});



function loadForgotForm() {
    UserReg.loadForgotForm();
    console.log('loadForgotForm')
    return false;
}




function inputFocusUpdate() {
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
}


//
// var obj = {
//     test:function() {
//         console.log('obj.test');
//     }
// }
//
// $(obj).bind('loadeModale', function(){
//     console.log('obj.someEvent');
//     this.test();
// });






