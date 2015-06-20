<html>
<?php include 'head.php' ?>
<script src="./js/jquery.logviewer.js"></script>
<script src="./js/server3/log.js"></script>
</head>
<body>

<?php 
error_reporting(0);
include 'navbar.php';
require('MulticraftAPI.php');

//Connection to Multicraft API:
$api = new MulticraftAPI('http://multicraft.jocce.nu/api.php', 'admin', '58497892824527b0d01f');
$serverid = 1; //Be sure to have the correct serverID here.

//Get server status
$_SESSION['status'] = $api->getServerStatus($serverid, true)['data']['status'];

if ($_SESSION['status'] == 'online') {

    $vari = 'disabled="disabled"';

}
elseif ($_SESSION['status'] == 'offline') {

    $vari = NULL;

}

//If button is pressed, send jail command
if (isset($_POST['submit'])){jailPlayer($api, $serverid);}

//Start/Stop/Restart Button functions. 
if (isset($_POST['start'])){startServer($api, $serverid);}
if (isset($_POST['stop'])){stopServer($api, $serverid);}
if (isset($_POST['restart'])){restartServer($api, $serverid);}

//Random funciton to get playername
function getName($api, $serverid) {
    $username = $_POST['playername'];

    return $username;

}

//Function to start the jail command
function jailPlayer($api, $serverid) {

    $username = $_POST['playername'];
    
    $api->sendConsoleCommand($serverid, "tell ".$username." jail");
    
    return $username;

}

function startServer($api, $serverid) {

    $api->startServer($serverid);

}

function stopServer($api, $serverid) {

    $api->stopServer($serverid);

}

function restartServer($api, $serverid) {

    $api->restartServer($serverid);

}

?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">

            	<br /><br />

                <h1>Server 3:</h1>
                <p class="lead">Controll:</p>

                <div class="btn-group" role="group" aria-label="...">

                    <form class="input-group" action="server1.php" method="POST">

                        <button <?php echo $vari; ?> type="start" name="start" class="btn btn-default">Start Server</button>
                        <button type="stop" name="stop" class="btn btn-default">Stop Server</button>
                        <button type="restart" name="restart" class="btn btn-default">Restart Server</button>
                    
                    </form>   

                </div>

                <br><br>
                <p></p>

                <p class="lead">Jail Player:</p>
                <?php

                $username = getName($api, $serverid);

                    if ($username != NULL) {

                        echo "<b>";
                        echo $username;
                        echo "</b>";
                        echo " has been jailed";
                        echo "<br>";

                    }
                ?>

                <div class="col-md-4 col-md-offset-4">

                    <div >
                        <form class="input-group" action="server1.php" method="POST">

                            <input type="text" class="form-control" name="playername" placeholder="Player Name...">
                            <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" name="submit">
                            </span>

                        </form>
    
                    </div>
                </div>

                <br /><br /><br />

                <p class="lead">Console:</p>

                <div class="btn-group" role="group" aria-label="...">

                    <button type="button" id="hideshow" class="btn btn-default" value="show">Toggle Console</button>

                </div>

                <br /><br />
 
                <div id="console">

                    <pre  style="text-align: left; height: 500;" id="thePlace"></pre>

                </div>
 
            </div>
        </div>

    </div>

</body>
</html>