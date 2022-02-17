console.log('jpt');

$(window).on('load', function () {
  if ($('#preloader').length) {
    $('#preloader').delay(1000).fadeOut('slow', function () {
      $(this).remove();
    });
  }
});




$('.msg-send').click(function(){
    let fName = $('.fname').val();
    let lName = $('.lname').val();
    let email = $('#email').val();
    let message = $('#message').val();
    console.log(fName.length)
    console.log(lName.length)
    console.log(email.search('@'))
    
    console.log(message.length)
    if((fName.length > 0) && (lName.length > 0) && (email.search('@') > 0)  && (message.length > 0)){
        $.ajax({
            url: 'php/phpmailing.php',
            method: 'POST',
            data:{
                'fName' : fName,
                'lName' : lName,
                'email' : email,
                'message' : message
            },
            success: function(item){
                if(item == 'Message has been sent'){
                    $('.fname').val('');
                    $('.lname').val('');
                    $('#email').val('');
                    $('#message').val('');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your message has been sent',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: `Oops`,
                        showConfirmButton: false,
                        timer: 5000
                    })
                }
                
            }
        })
    }else{
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Enter all fields',
            showConfirmButton: false,
            timer: 2000
        })
    }


})