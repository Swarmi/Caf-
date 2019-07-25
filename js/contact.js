$(function () {
    $('#contact-form').validator();
    $('#contact-form').on('submit', function (e) {
    if (!e.isDefaultPrevented()) {
    var url = "contact.php";
    $.ajax({
    type: "POST",
    url: url,
    data: $(this).serialize(),
    success: function (data)
    {
    var messageAlert = 'alert-' + data.type;
    var messageText = data.message;
    var alertBox = '<div class="alert ' + messageAlert + ' alertdismissable"><button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>' + messageText + '</div>';

    if (messageAlert && messageText) {
        $('#contact-form').find('.messages').html(alertBox);
        $('#contact-form')[0].reset();
        }
        }
        });
        return false;
        }
        })
       });





// $(document).ready(function(){
    
//     (function($) {
//         "use strict";

    
//     jQuery.validator.addMethod('answercheck', function (value, element) {
//         return this.optional(element) || /^\bcat\b$/.test(value)
//     }, "type the correct answer -_-");

//     // validate contactForm form
//     $(function() {
//         $('#contactForm').validate({
//             rules: {
//                 name: {
//                     required: true,
//                 },
//                 subject: {
//                     required: true,
//                 },
//                 number: {
//                     required: true,
//                 },
//                 email: {
//                     required: true,
//                     email: true
//                 },
//                 message: {
//                     required: true,
//                     minlength: 20
//                 }
//             },
//             messages: {
//                 name: {
                   
//                 },
//                 subject: {
                    
//                 },
//                 number: {
               
//                 },
//                 email: {
//                     required: "Email manquant"
//                 },
//                 message: {
//                     required: "Un bug ? Appelez-nous",
//                     minlength: "C'est tout ?"
//                 }
//             },
//             submitHandler: function(form) {
//                 $(form).ajaxSubmit({
//                     type:"POST",
//                     data: $(form).serialize(),
//                     url:"contact_process.php",
//                     success: function() {
//                         $('#contactForm :input').attr('disabled', 'disabled');
//                         $('#contactForm').fadeTo( "slow", 1, function() {
//                             $(this).find(':input').attr('disabled', 'disabled');
//                             $(this).find('label').css('cursor','default');
//                             $('#success').fadeIn()
//                             $('.modal').modal('hide');
// 		                	$('#success').modal('show');
//                         })
//                     },
//                     error: function() {
//                         $('#contactForm').fadeTo( "slow", 1, function() {
//                             $('#error').fadeIn()
//                             $('.modal').modal('hide');
// 		                	$('#error').modal('show');
//                         })
//                     }
//                 })
//             }
//         })
//     })
        
//  })(jQuery)
// })