<?php

// check if user coming from request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // create array for errors
    $formErrors = array();
    if (strlen($user) <= 3) {
        $formErrors[] = 'username must be larger than this number';
    }

    if (strlen($msg) < 10) {
        $formErrors[] = 'message can \'t be less than <strong>10</strong> character';
    }
    if (strlen($cell) != 11) {
        $formErrors[] = 'phone can \'t less than 11 number';
    }
    if ($cell[0] != 0) {
        $formErrors[] = 'phone can \'t be acorrect number';
    }

    // if not erorrs send the email[mail (To, Subject, Message, Header, Paramter)]

    $headers = 'From:' . $email . '\r\n';

    if (empty($formErrors)) {

        mail('salahtaha741@gmail.com', 'contact form', $msg, $headers);

        $user = '';
        $email = '';
        $msg = '';
        $cell = '';
        $success = '<div class="alert alert-success">We Have recieve your Message</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/fontawesome.min.css">
    <link rel="stylesheet" href="css/call.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <title>contact form</title>
</head>

<body>

    <!--satrt form-->
    <div class="container">
        <h2 class="text-center">Contact Me</h2>
        <form id="myForm" class="call-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <?php if (!empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php
                    foreach ($formErrors as $errors) {
                        echo $errors . '<br>';
                    }

                    ?>
                </div>

            <?php } ?>
            <?php if (isset($success)) {
                echo $success;
            } ?>

            <div class="form-group">
                <input id="username" class="username form-control" type="text" name="username" placeholder="Type Username" value="<?php if (isset($user)) {
                                                                                                                                        echo $user;
                                                                                                                                    } ?>" />
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    username must be larger than this number
                </div>
            </div>
            <div class="form-group">
                <input id="email" class="email form-control" type="email" name="email" placeholder="Type Email Valid" value="<?php if (isset($email)) {
                                                                                                                                    echo $email;
                                                                                                                                } ?>" />
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    email can\ 't be empty
                </div>
            </div>
            <div class="form-group">
                <input id="phone" class="form-control" type="text" name="cellphone" placeholder="Phone" value="<?php if (isset($cell)) {
                                                                                                                    echo $cell;
                                                                                                                } ?>" />
                <div class="alert alert-danger custom-alert">
                    phone can \'t be less than <strong>11</strong> character
                </div>
            </div>
            <textarea id="message" class="message form-control" placeholder="Your Message" name="message"> <?php if (isset($msg)) {
                                                                                                                echo $msg;
                                                                                                            } ?> </textarea>
            <input class="btn btn-success btn-block" type="submit" value="send an email" onclick="sendEmail()" />
            <div class="alert alert-danger custom-alert">
                message can \'t be less than <strong>10</strong> character
            </div>
        </form>
    </div>
    <!--end form-->

    <!--javascript code-->
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js">

    </script>
    <!--javascript code-->

</body>

</html>