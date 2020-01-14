<?php
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; } 
    // this is where you should check to see if the interest_rate and $years are set
    if (!isset($interest_rate)) { $interest_rate = ''; }
    if (!isset($years)) { $years = '';}
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
            <?php
            //This code checks to see if we got an error message from the display_result.php page
            if (!empty($error_message)) { ?>
                <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
            <?php } ?>
            <form action="display_results.php" method="post">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                    value="<?php echo htmlspecialchars($investment); ?>">
            <br>
            <label>Yearly Interest Rate:</label>
            <input type="number" step="any" name="interest" 
                    value="<?php echo htmlspecialchars($interest_rate); ?>">
            <!-- This is where you should put the Interest Rate -->
            <br>
            <label>Number of Years:</label>
            <input type="number" name="years" 
                    value="<?php echo htmlspecialchars($years); ?>">
            <!-- This is where you should put the Years input -->
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"><br>
        </div>
    </form>
    </main>
</body>
</html>