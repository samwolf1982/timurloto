$(function () {
   // console.log(shonModalAfterLoad);
    if (typeof shonModalAfterLoad !== 'undefined'){
            console.log('show mee afterMODALE');
            console.log(shonModalAfterLoad);
        showModaleAfterLoad(shonModalAfterLoad)
        if(shonModalAfterLoad==='#modal-auth'){ //если нужно вызвать форму главную
            UserReg.loadFormReg();
            UserReg.loadFormLogin();
        }
        console.log('show mee afterMODALE');
   }

});


// открыть окно модальное по селектору из конфига
function showModaleAfterLoad(selector_id) {
   //if($(selector_id)){
        $(selector_id).fadeIn(500).addClass('active');
        $('body').addClass('noScroll');
        $('.circle-wrapper-modal').each(function () {
            var circle = $(selector_id).find('.circle');
            var data_ptc = $(selector_id).attr('data-ptc');
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
    //}

}