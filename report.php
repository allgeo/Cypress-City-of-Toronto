<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
    <title>Report a Problem</title>
  </head>
  <body>
    <div class="inner-reg">
      <nav class="nav">
            <a href="/" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="/" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
        </nav>

        <div class="register-content">
          <br>
          <a href="logout.php" style="float: right; margin-right: 4%">LOGOUT</a>

          <form class="report" id="report" name="report" action="submitReport.php" method="post">

            <div class="register-address">
              Address: <input type="text" id="address" name="address" size="100">
            </div>

            <div class="register-info">
              <p>Select the problems at the site:</p>
              <hr>
              <div class="register-info-block-1" >
                <div class="register-info-r1">
                  <input type="checkbox" id="utility" name="problem[]" value="Utility Failures" >
                  <label for="utility">Utility Failures</label>
                </div>
                <div class="register-info-r2">
                  <input type="checkbox" id="potholes" name="problem[]" value="Potholes" >
                  <label for="potholes">Potholes</label>
                </div>
                <div class="register-info-r3">
                  <input type="checkbox" id="vandalism" name="problem[]" value="City Property Vandalism" >
                  <label for="vandalism">City Property Vandalism</label>
                </div>
                <div class="register-info-r4">
                  <input type="checkbox" id="errodedstreets" name="problem[]" value="Erroded Streets" >
                  <label for="errodedstreets">Erroded Streets</label>
                </div>
                <div class="register-info-r4">
                  <input type="checkbox" id="none" name="problem[]" value="">
                  <label for="none">Other: <input type="text" name="other" id="other" size="25"></label>
                </div>

              </div>

              <div class="register-info-block-2">
                <div class="register-info-r5">
                  <input type="checkbox" id="treecollapse" name="problem[]" value="Tree Collapse" >
                  <label for="treecollapse">Tree Collapse</label>
                </div>
                <div class="register-info-r6">
                  <input type="checkbox" id="flood" name="problem[]" value="Flooded Streets">
                  <label for="flood">Flooded Streets</label>
                </div>
                <div class="register-info-r7">
                  <input type="checkbox" id="mould" name="problem[]" value="Mould and Spore Growth" >
                  <label for="mould">Mould and Spore Growth</label>
                </div>
                <div class="register-info-r8">
                  <input type="checkbox" id="garbage" name="problem[]" value="Garbage/Road Blocking Objects" >
                  <label for="garbage">Garbage/Road Blocking Objects</label>
                </div>

              </div>
            </div>
            <br><br><br><br><br><br><br><br>

            <div class="register-address">
              <p>Description:</p>
              <textarea rows="5" cols="75" name="description" id="description" form="report"></textarea>
            </div>

            <?php
            $subValue = "Report";
            $id = "";
            if (isset($_POST['editButton'])) {
              $subValue = "Edit";
              $id = $_POST['editButton'];
            } ?>
            <input type="hidden" name="id" value=<?php echo "$id"; ?>>
            <input type="submit" name="button" onclick="return checkboxes()" value=<?php echo "$subValue"; ?> style="margin-right: 2%">
            <input type="submit" name="button" value="Cancel">

          </form>

        </div>
        <a href="faq.html" style="float: right; margin: 4%">FAQ</a>
    </div>

      <script type="text/javascript">
      var inputs = document.getElementsByName('problem[]');
      function checkboxes() {
        var add = document.forms["report"]["address"].value;
        if (add == "") {
          alert("Please enter an address");
          return false;
        }
        var isAtLeastOneCheckboxSelected = false;

        inputs.forEach((item) => {
          if (item.checked) {
            isAtLeastOneCheckboxSelected = true;
          }
        });
        if (isAtLeastOneCheckboxSelected == false) {
          alert("You must select an issue ");
        } else {
          survey();
        }
        return isAtLeastOneCheckboxSelected;
      }

      function survey() {
        if (confirm("Your Complaint has been Submitted!\n\nWould you like to take our survey?")) {
          window.open("survey.html");
        }
      }
      </script>
  </body>
</html>
