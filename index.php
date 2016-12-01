<?php 
    session_start();
    #if (!isset($_SESSION["authenticated"])) {
    #    header("Location: login.php");
    #

    include("include/header.php");

    if (!isset($total)) {
            $total = 0;
        }
        if (!isset($score)) {
            $score = 0;
        }
        extract($_POST);
        if ( isset($first_number) 
            && isset($second_number) 
            && isset($signs) 
            && isset($user_answer) 
        ) {
            $blurb = "";
            if ( !is_numeric($user_answer) ) {
                $blurb = "Please enter a valid number.";
            } else 
            switch ($signs) {
                case "+":
                    $math_answer = $first_number + $second_number;
                    if ($math_answer == $user_answer) {
                        $blurb = "You're correct";
                        $score++;
                    } else {
                        $blurb = "You're so wrong, $first_number + $second_number is $math_answer.";
                    }
                    $total++;
                    break;
                case "-":
                    $math_answer = $first_number - $second_number;
                    if ($math_answer == $user_answer) {
                        $blurb = "You're correct";
                        $score++;                    
                    } else {
                        $blurb = "You're so wrong, $first_number - $second_number is $math_answer.";
                    }
                    $total++;
                    break;
            }
        }
    $number1 = rand(0,20);
    $number2 = rand(0,20);
    $signs2 = rand(1,2);
    $signs2_string = "";
    
    switch ($signs2) {
        case 1:
            $signs2_string = "+";
            break;
        case 2:
            $signs2_string = "-";
            break;
    }
?>

<form action="index.php" method="post" class="form-horizontal">
    <div class="container">
        <div id="equation">
            <p><?php echo $number1 ?>&nbsp;<?php echo $signs2_string ?>&nbsp;<?php echo $number2 ?></p>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" name="input" placeholder="Your answer?" size="10">
            </div>
        </div>

        <input type="hidden" name="first_number" value="<?php echo $number1 ?>" />
        <input type="hidden" name="second_number" value="<?php echo $number2 ?>" />
        <input type="hidden" name="signs" value="<?php echo $signs2 ?>" />
        <input type="hidden" name="total" value="<?php echo $total; ?>" />
        <input type="hidden" name="score" value="<?php echo $score; ?>" />

        <div class="row">
            <div class="col-xs-3 col-xs-offset-2 col-sm-5">
                <input type="submit" name="submit" class="btn btn-primary" />
            </div>
            <div class="col-xs-3 col-xs-offset-2">
                <form action="logout.php">
                    <a><button type="submit" class="btn btn-primary">Logout</button></a>
                </form>
            </div>
        </div>
    </div>
</form>

<div id="string" >
    <div class="col-sm-4 col-sm-offset-4">
        <?php echo $blurb; ?>
    </div>
    <div class="col-sm-4"></div>
</div>
<div id="score" >
    <div class="col-sm-4 col-sm-offset-4">Score: <?php echo "$score / $total" ?></div>
    <div class="col-sm-4"></div>
</div>
<?php include("include/footer.php"); ?>