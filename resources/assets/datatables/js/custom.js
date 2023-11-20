
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
             swal(successText, {
                 icon: "success",
               });
         }

     });
 }); //end of submit
