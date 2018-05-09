<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>eLibrary</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- OPTIONAL -->
		<link rel="stylesheet" href="../../lib/w3.css">
		<link rel="stylesheet" href="../../lib/w3-theme-riverside.css">
		<link rel="stylesheet" href="../../style/style.css">
		<link rel="stylesheet" href="../../lib/font-awesome.min.css">
		<link rel="stylesheet" href="../../lib/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../../style/usr.css" />
        <style>
            body {
                background-color: darkgray;
            }
           
            /*top nav*/
        </style>
	</head>
	<body>
		<!-- CONTENT -->
        <!--TOP ITEM-->
        <div id="topItem">
            <!--TOP NAV AND BANNER-->
            <?php include("../temp/headerUser.php"); ?>

            
        </div>
       <!--MIDDLE ITEM-->
        <div id="midItem">
            <!--SIDE NAV BAR-->
            <?php include("../temp/sideNavUser.php"); ?>
            <!--Main Content-->
            <div id="content">
                <h1>Weclome to eLibrary! </h1>

                <div id="parag">
                    <h2>About Us</h2>
                    <p>
                        eLibrary is a simple Library web where you can download journals for free and search
                    </p>
                </div>
            </div>
        </div>
        <!--FOOTER-->
        <?php include("../temp/footer.php");?>
	</body>
</html>