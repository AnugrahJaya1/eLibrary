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
    <link rel="stylesheet" type="text/css" href="../../style/admList.css">
</head>
<body>
    <!-- CONTENT --><?php include("../temp/headerAdmin.php"); ?>
    <!---->

    <div id="midItem">
        <!--SIDE NAVBAR--><?php include("../temp/sideNavAdmin.php");?>
        <!--SEARCH BAR-->
        <div id="title">
            <div id="searchTab">
                <h1>Admin List</h1>
                <div id="formCont">
                    <form id="searchBar" name="searchBar" method="post" action="">
                        <input type="search" name="bookSearch" id="search" placeholder="Search admin.." />
                        by
                        <select name="select">
                            <option value="ID">ID</option>
                            <option value="Name">Author</option>
                            <option value="Phone">Phone</option>
                            <option value="Address">Address</option>
                        </select>
                        <input type="submit" value="SEARCH" name="searchButt" class="formButt" />

                    </form>
                    <button id="modalButt" onclick="openModal()">ADD ADMIN</button>
                </div>
            </div>
            <!--ADMIN TABLE-->
            <div id="tableCont">
                <table cellspacing="0">
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

    <!-- MODAL -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="close">&times;</button>
                <!-- Modal body -->
                <div class="modal-body">
                    <h3>New Administrator</h3>
                    <form method="post" action="">
                        <input class="modalForm" type="text" placeholder="Username" name="username" />
                        <br />
                        <input class="modalForm" type="text" placeholder="Name" name="nama" />
                        <br />
                        <input class="modalForm" type="text" placeholder="Phone" name="phone" />
                        <br />
                        <input class="modalForm" type="text" placeholder="Adress" name="address" />
                        <br />
                        <input class="modalForm" type="button" id="upBott" value="ADD">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT MODAL HANDLE -->
    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('modalButt');
        var close = document.getElementsByClassName("close")[0];
        function openModal() {
            modal.style.display = "block";
        }
        close.onclick = function () {
            modal.style.display = "none";
        }
    </script>
    <!--FOOTER--><?php include("../temp/footer.php");?>
</body>
</html>