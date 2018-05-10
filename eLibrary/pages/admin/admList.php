<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("../../connection/connection.php");
    $sql="SELECT IdAnggota,Nama,Phone,Alamat FROM anggota WHERE IsAdmin='1'";

    // handle search
    if(isset($_POST['searchButt'])){
        $search=$_POST['adminSearch'];
        $select=$_POST['select'];

        if(isset($search) && $search!=""){
            if($select=="ID"){
                $sql .=" AND IdAnggota LIKE '%$search%'";
            }else if($select=="Name"){
                $sql .=" AND Nama LIKE '%$search%'";
            }else if($select=="Phone"){
                $sql .=" AND Phone LIKE '%$search%'";
            }else{
                $sql .=" AND AlamatLIKE '%$search%'";
            }
        }
    }

    // handle add Admin
    $statusAddAdmin=false;
    $message="";
    if(isset($_POST['iAdd'])){
        $username=$_POST['username'];
        $nama=$_POST['nama'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];

        $sql1="SELECT username FROM anggota WHERE username='$username'";
        if($res=$mysqli->query($sql1)){
            if($res->num_rows ==0){
                $password=generatePass(8);
                $sql1="INSERT INTO anggota (username,Password,Nama,Phone,Alamat,IsAdmin) VALUES ('$username','$password','$nama','$phone','$address','1')";
                $mysqli->query($sql1);
                $statusAddAdmin=true;
                $message="Administrator add,temporary password : $password. Please change it immediately";
            }else{
                $message="Username not available, please try again";
                $statusAddAdmin=false;
            }
            // echo $message;
        }
    }

    function generatePass($length){
        $char="0123456789abcdefghijklmnopqrstupwxyzABCDEFGHIJKLMNOPQRSTUPWXYZ";
        $charLength=strlen($char);
        $randomPass="";
        for($i=0;$i<$length;$i++){
            $randomPass .=$char[rand(0,$charLength-1)];
        }
        return $randomPass;
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
                        <input type="search" name="adminSearch" id="search" placeholder="Search admin.." />
                        by
                        <select name="select">
                            <option value="ID">ID</option>
                            <option value="Name">Name</option>
                            <option value="Phone">Phone</option>
                            <option value="Address">Address</option>
                        </select>
                        <input type="submit" value="SEARCH" name="searchButt" class="formButt" />

                    </form>
                    <button id="modalButt" onclick="openModal()">ADD ADMIN</button>
                </div>
                
            </div>

            <?php
                if(($statusAddAdmin==false || $statusAddAdmin==true) && $message!=""){
                    echo $message;
                }
            ?>

            <!--ADMIN TABLE-->
            <div id="tableCont">
                <table cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                    <?php 
                        // $sql="SELECT IdAnggota,Nama,Phone,Alamat FROM anggota WHERE IsAdmin='1'";
                        if($res=$mysqli->query($sql)){
                            while($row=$res->fetch_array()){
                                echo "<tr>";
                                    echo "<td>".$row['IdAnggota']."</td>";
                                    echo "<td>".$row['Nama']."</td>";
                                    echo "<td>".$row['Phone']."</td>";
                                    echo "<td>".$row['Alamat']."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
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
                        <input class="modalForm" type="submit" name="iAdd" id="upBott" value="ADD">
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