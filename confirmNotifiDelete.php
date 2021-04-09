<?php
$id = $_POST['delButton'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
    <title>Notify and Delete</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: { allowEmpty: true }
          },
          email: {
              presence: { allowEmpty: false },
              email: true
          },
          message: {
              presence: { allowEmpty: false }
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>
  <style>
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
  </head>
  <body>
    <div class="inner">
        <nav class="nav">
            <a href="/" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="/" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
        </nav>
        <div style="margin-bottom:60px;">
            <a href="reportsHome.html" style="float: left; margin: 4%">BACK</a>
            <a href="logout.php" style="float: right; margin: 4%">LOGOUT</a>
        </div>
        <div class="register-content" style="text-align: center">
            
        <?php

          $errors = [];
          $errorMessage = '';

          if (!empty($_POST)) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $message = $_POST['message'];

              if (empty($name)) {
                  $errors[] = 'Name is empty';
              }

              if (empty($email)) {
                  $errors[] = 'Email is empty';
              } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errors[] = 'Email is invalid';
              }

              if (empty($message)) {
                  $errors[] = 'Message is empty';
              }


              if (empty($errors)) {
                  $toEmail = 'example@example.com';
                  $emailSubject = 'New email from your contant form';
                  $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

                  $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
                  $body = join(PHP_EOL, $bodyParagraphs);

                  if (mail($toEmail, $emailSubject, $body, $headers)) {
                      header('Location: thank-you.html');
                  } else {
                      $errorMessage = 'Oops, something went wrong. Please try again later';
                  }
              } else {
                  $allErrors = join('<br/>', $errors);
                  $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
              }
          }

          ?>
          <form action="/mail_form.php" method="post" id="contact-form" style="margin-top:90px;">
              <h2>Send Notification Email and Complete/Delete report</h2>

            <div class="row">
              <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
              <div class="column">
                <p>
                    <label>City Official Name:</label>
                    <input name="name" type="text" value="Name"/>
                </p>
              </div>
              <div class="column">
                <p>
                    <label>Email Address:</label>
                    <input style="cursor: pointer;" name="email" value="Name@Email.com" type="text" style="width:20%"/>
                </p>
            </div>
              <p>
                <label>Message:</label><br> 
                <textarea name="message" style="width:70%;border-radius: 10px;padding:30px;margin-top:15px;">Explain the resolution...</textarea>
              </p>

              <form class="" action="deleteReport.php" method="post" style="margin: 2%">
                <button type="submit" name="delete" id="delete" value=<?php echo "$id"; ?>>Notify & Delete</button>
              </form>
            </form>
        </div>

    </div>

  </body>
</html>
