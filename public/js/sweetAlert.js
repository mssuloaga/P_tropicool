<script>
$("#logout-form").on("click", function() {
    swal({
    title: 'Logga ut?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: true,
    closeOnCancel: true
   }).then((result) => { 
      if (result.value===true) { 
         $('#logout-form').submit() // this submits the form 
      } 
   }) 
})   

</script>