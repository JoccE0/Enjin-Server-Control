<script type="text/javascript">

//Displayname of users with access. (Case Sensative)
var users = ["JoccE", "User2", "User3"];

    $.ajax({
        type:     "GET",
        url:      "http://island-quest.nu/api/get-current-user", // <-- Here
        dataType: "jsonp",
        success: function(data){
            //alert(data["displayname"]); //debug
            console.log(data);
                var user = data["displayname"];

                if(!!~jQuery.inArray(user, users)) {
                    $('#message').html(data["displayname"]);
                } else {
                    window.location = "http://google.com"; //Just redirect to your Enjin Page here.
                }

        }       
        
    });



</script>

<?php
session_start();

if ($_SESSION['status'] = 'online') {

$onstatus = '<b><font color="green">online</font></b>';

}
elseif ($_SESSION['status'] = 'offline') {

$onstatus = '<b><font color="red">offline</font></b>';

}

?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Enjin Admin Panel</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Startpage</a>
                    </li>
                    <li>
                        <a href="server1.php">Mindcrack</a>
                    </li>
                    <li>
                        <a href="server2.php">Unleashed</a>
                    </li>
                    <li>
                        <a href="server3.php">Infinty</a>
                    </li>
                    <li>
                        <a href="tools.php">Server Tools</a>
                    </li>
                </ul>
                    <p class="navbar-text navbar-right">Signed in as <b id="rank"> </b> <b id="message"></b></p>
                    <p class="navbar-text navbar-right"><b>Server Status: <?php echo $onstatus ?></b></p>
            </div>

        </div>
        
    </nav>