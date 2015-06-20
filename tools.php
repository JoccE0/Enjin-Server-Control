<html>

<?php include 'head.php' ?>

<body>

<?php include 'navbar.php'; ?>
<?php
function nameChange() {
if(isset($_POST['submit'])) {

$name = $_POST['name'];

$user = file("https://api.mojang.com/users/profiles/minecraft/$name");

$id = json_decode($user[0]);
$id2 =  $id->{"id"};

$namechange = file("https://api.mojang.com/user/profiles/$id2/names");
$newname = json_decode($namechange[0], true);
$nr = sizeof($newname);
$uuid = $id->{"id"};

echo "<br>";
echo "<b>All the names of User (</b>";
echo $name;
echo "<b>): <br></b>";

echo "UUID: ";
echo $uuid;
echo "<br> <br>";

for ($i = 0; $i <= $nr; $i++) {

    $mil = $newname[$i]["changedToAt"];
    $timestamp = $mil / 1000;
    echo $newname[$i]["name"];

    if ($timestamp != 0) {
    echo " Time: ";
    echo date('Y-m-d H:i',$timestamp);
    }
    echo "<br>";
}

}

}

?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">

            	<br><br>
                <h1>Control Panel - Server Tools</h1>
<?php
    nameChange();
?>

<h3>Check what Usernames a player had:</h3>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" name="name">
   <input type="submit" name="submit" value="Submit"><br>
</form>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>