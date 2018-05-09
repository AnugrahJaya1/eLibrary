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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- OPTIONAL -->
    <link rel="stylesheet" href="../../lib/w3.css" />
    <link rel="stylesheet" href="../../lib/w3-theme-riverside.css" />
    <link rel="stylesheet" href="../../style/style.css" />
    <link rel="stylesheet" href="../../lib/font-awesome.min.css" />
    <link rel="stylesheet" href="../../lib/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="../../style/journal.css" />
    <style>
       
    </style>
</head>
<body>
    <!-- CONTENT -->
    <!--TOP ITEM-->
    <div id="topItem">
        <!--TOP NAV AND BANNER-->
        <?php include("../temp/headerAdmin.php"); ?>


    </div>
    <!--MIDDLE ITEM-->
    <div id="midItem">
        <!--SIDE NAV BAR-->
        <?php include("../temp/sideNavAdmin.php"); ?>
        <!--Main Content-->
        <div id="content">
            <h1>Free Journals </h1>

            <div id="parag">
                <ul>
                    <li class="journals"> <a href="../../files/JOURNAL1.pdf" target="_blank"> 
                        <h3 class="journTitle">Journal 1</h3>
                        <h4 class="writer">Writer 1</h4>
                        <p> Documen Text   </p> </a>
                    </li>

                    <li class="journals">
                        <a href="../../files/JOURNAL2.pdf" target="_blank">
                            <h3 class="journTitle">Journal 2</h3>
                            <h4 class="writer">Writer 2</h4>
                            <p> Documen Text   </p>
                        </a>
                    </li>

                    <li class="journals" style="border-bottom:none;">
                        <a href="../../files/JOURNAL3.pdf" target="_blank">
                            <h3 class="journTitle">Journal 3</h3>
                            <h4 class="writer">Writer 3</h4>
                            <p> Documen Text   </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <?php include("../temp/footer.php");?>
</body>
</html>