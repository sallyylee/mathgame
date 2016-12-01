<link rel="stylesheet" href="style/math.css" type="text/css" />
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
<div class="container">
    <form action="authentication.php" method="post" role="form" class="form-horizontal">
        <div class="form-group">
            <h2>Please login to enjoy a math game</h2>
            <label class="control-label col-xs-3">email: </label>
            <div class="col-xs-6">
                <input type="text" class="form-control" id="email" name="email" size="10" placeholder="Please eneter email"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3">password: </label>
            <div class="col-xs-6">
                <input type="text" class="form-control" id="password" name="password" size="10" placeholder="Please enter password"/>
            </div>
        </div>
    </form>
    <div class="col-xs-3 col-xs-offset-2">
        <form action="authentication.php">
            <a><button type="submit" class="btn btn-primary">Enter</button></a>
        </form>
    </div>
</div>
<div class="container">
    <?php
    if (isset($_GET["msg"])) {
        echo "<p class='col-xs-3 col-xs-offset-2 text-danger'>" . $_GET["msg"] . "</p>";
    }
    ?>
</div>