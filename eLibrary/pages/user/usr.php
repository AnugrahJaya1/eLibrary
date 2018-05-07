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

        <style>
            body {
                background-color: darkgray;
            }
            /*Content CSS*/
            #midItem{
                height:100%;
                width:100%;
                display: flex;
            }
            #content{
                width:100%;
                height:100%;
                margin-left: 6px;
            }

            h1 {
                background-color: dimgrey;
                color: white;
                padding-left: 5px;
                margin-bottom:0px;
            }
            #parag{
                height:100%;
                background-color:lightgrey;
            }
            h2{
                padding-left : 6px;
            }
            p{
                padding-left: 6px;
            }
            /*NavBar CSS*/
            #user{
                background-color: #c1ccdd;
            }
            #user:hover{
                opacity:1;
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