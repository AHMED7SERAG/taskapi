
 $(document).on('click', '.btn-jinja-delete', function (e) {
     e.preventDefault();
     var that = $(this);
       swal({
         title: sure,
         text: recover,
         icon: "warning",
         buttons: [cancelText,deleteText],
         dangerMode: true,
     }).then((result) => {
         if (result) {
             this.form.submit();
         }

     });
 }); //end of submit

// success message auto hide

window.setTimeout(function() {
    $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 20000);



// print barcode window
// $(document).on('click', '.btn-print', function (e) {
//     e.preventDefault();
//   var image = new Image();
//   image.src = $('#idimage').attr('src');
//   var code = document.getElementById("code").value ;
//   var myWindow=window.open('','','width=1000,height=600');
//   myWindow.document.write(image.outerHTML+'<br>'+code);
//   myWindow.document.close();
//   myWindow.focus();
//   myWindow.print();
//   myWindow.close();
// });


// confirm sweet alert message
$(document).on('click', '.confirm', function (e) {
    e.preventDefault();
    var that = $(this);
      swal({
        title: sure,
        text: confirm,
        icon: "info",
        buttons: [cancelText,ConfirmText],
        successMode: true,
    }).then((result) => {
        if (result) {
            this.form.submit();
        }
    });
});






