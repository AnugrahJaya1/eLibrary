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
    <link rel="stylesheet" href="../../lib/w3.css">
    <link rel="stylesheet" href="../../lib/w3-theme-riverside.css">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../lib/font-awesome.min.css">
    <link rel="stylesheet" href="../../lib/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../style/member.css">
</head>
	<body>
        <!-- CONTENT --><?php include("../temp/headerAdmin.php"); ?>
        <!---->

        <div id="midItem">
            <!--SIDE NAVBAR--><?php include("../temp/sideNavAdmin.php");?>
            <!--SEARCH BAR-->
            <div id="title">
                <h1>Book List</h1>
                <form id="searchBar" name="searchBar" method="post" action="">
                    <input type="search" name="bookSearch" id="search" placeholder="Search member.." />
                    by
                    <select name="select">
                        <option value="ID">ID</option>
                        <option value="Name">Author</option>
                        <option value="Phone">Phone</option>
                        <option value="Address">Address</option>
                    </select>
                    <input type="submit" value="SEARCH" name="searchButt" class="formButt" />
                </form>
                <!--BOOK TABLE-->
                <div id="tableCont">
                    <table cellspacing="0" >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <!--FOOTER--><?php include("../temp/footer.php");?>
    </body>
</html>