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