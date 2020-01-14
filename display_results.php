<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT); 
    //This should be replaced with a proper filter_input method call
    $interest_rate = filter_input(INPUT_POST, 'interest', FILTER_VALIDATE_FLOAT);
    //Here is where you should create the add the interest_rate variable and get it via the filter_input method
   

    // validate investment
    if ($investment == FALSE  || $interest_rate == FALSE || $years == FALSE) {
        $error_message = 'Must enter a valid number.';
    } else if ( $investment <= 0 || $interest_rate <= 0 || $years <= 0 || $years >= 50) {
        $error_message = 'All inputs must be greater than 0 and years cannot be over 50.';
    } 

    // set error message to empty string if no invalid entries
     else {
        $error_message = '';
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        //This redirects us to the index.php page again and displays the error_message
        include('index.php');
        exit();
    }

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value += $future_value * $interest_rate * .01;
    }

    // Here is where you should set the correct currency and percent formatting
    $investment_f = number_format($_POST['investment'], 2); //replace this empty string with the correct number_format call
    $yearly_rate_f = number_format($_POST['interest'], 2); //replace this empty string with the correct number_format call
    $future_value_f = number_format($future_value, 2); //replace this empty string with the correct number_format call
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <main>
        <div id="box" class="mx-auto d-block">
            <h1>Future Value Calculator</h1>

            <label>Investment Amount: $</label>
            <span><?php echo $investment_f; ?></span><br>

            <label>Yearly Interest Rate: %</label>
            <span><?php echo $yearly_rate_f; ?></span><br>

            <label>Number of Years:</label>
            <span><?php echo $years; ?></span><br>

            <label>Future Value: $</label>
            <span><?php echo $future_value_f; ?></span><br>

            <label>&nbsp;</label>
            <form action="index.php" method="post">
            <input type="submit" value="Try Again"><br>

            <!-- can also use onclick="history.back();" -->

        </div>
    </main>
</body>
</html>
