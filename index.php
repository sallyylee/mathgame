<?php 
    session_start();
    if (!isset($_SESSION["authenticated"])) {
        header("Location: login.php");
    }

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
        } else if ($signs == 1) {
            $math_answer = $first_number + $second_number;
            if ($math_answer == $user_answer) {
                $blurb = "You're correct";
                $score++;
            } else {
                $blurb = "You're so wrong, $first_number + $second_number is $math_answer.";
            }
            $total++;
            } else {
                 $math_answer = $first_number - $second_number;
                if ($math_answer == $user_answer) {
                    $blurb = "You're correct";
                    $score++;   
                } else {
                    $blurb = "You're so wrong, $first_number - $second_number is $math_answer.";
                }
                $total++;   
                }
            }
    $number1 = rand(0,20);
    $number2 = rand(0,20);
    $signs = rand(1,2);
    $signs_string = "";
    
    if ($signs == "1") {
        $signs_string = "+";
    } else {
        $signs_string = "-";
    }
?>

<form action="index.php" method="post" class="form-horizontal">
    <div class="container">
        <div id="equation">
            <p><?php echo $number1 ?>&nbsp;<?php echo $signs_string ?>&nbsp;<?php echo $number2 ?></p>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" name="user_answer" placeholder="Your answer?" size="10">
            </div>
        </div>

        <input type="hidden" name="first_number" value="<?php echo $number1 ?>" />
        <input type="hidden" name="second_number" value="<?php echo $number2 ?>" />
        <input type="hidden" name="signs" value="<?php echo $signs ?>" />
        <input type="hidden" name="total" value="<?php echo $total ?>" />
        <input type="hidden" name="score" value="<?php echo $score ?>" />

        <div class="row">
            <div class="col-xs-3 col-xs-offset-2 col-sm-5">
                <input type="submit" name="submit" class="btn btn-primary" />
            </div>
            <div class="col-xs-3 col-xs-offset-2">
                <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-sm-4 col-sm-offset-5 col-xs-5 col-xs-offset-4">
        <?php echo $blurb ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-5 col-xs-5 col-xs-offset-4">Score: <?php echo "$score / $total" ?></div>
</div>
<?php include("include/footer.php"); ?>