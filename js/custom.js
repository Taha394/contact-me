$(function () {
    'use strict';

    var userError = true,
        emailError = true,
        msgError = true;


    $('.username').blur(function () {

        if ($(this).val().length < 3) {
            $(this).css('border', 'solid 1px red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            userError = true;
        } else {
            $(this).css('border', 'solid 1px green');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            userError = false;
        }

    });



    $('.email').blur(function () {

        if ($(this).val() === '') {
            $(this).css('border', 'solid 1px red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            emailError = true;
        } else {
            $(this).css('border', 'solid 1px green');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            emailError = false;

        }

    });



    $('.message').blur(function () {

        if ($(this).val() === '') {
            $(this).css('border', 'solid 1px red');
            $(this).parent().find('.custom-alert').fadeIn(200);

            msgError = true;
        } else {
            $(this).css('border', 'solid 1px green');
            $(this).parent().find('.custom-alert').fadeOut(200);

            msgError = false;

        }

    });


    $('.call-form').submit(function () {

        if (userError === true || emailError === true || msgError === true) {

            e.preventDefault();
            $('.username, .email, .message').blur();
        }

    });
});