<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("../../connection/connection.php");
    $sql="SELECT IdAnggota,Nama,Phone,Alamat FROM anggota WHERE IsAdmin='0'";
    
    if(isset($_POST['searchButt'])){
        $search=$_POST['memberSearch'];
        $select=$_POST['select'];

        if($select=='ID'){
            $sql .=" AND  IdAnggota LIKE '%$search%'";
        }else if($select=='Name'){
            $sql .=" AND  Nama LIKE '%$search%'";
        }else if($select=='Phone'){
            $sql .=" AND  Phone LIKE '%$search%'";
        }else{
            $sql .=" AND  Alamat LIKE '%$search%'";
        }
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
                    <input type="search" name="memberSearch" id="search" placeholder="Search member.." />
                    by
                    <select name="select">
                        <option value="ID">ID</option>
                        <option value="Name">Name</option>
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
                        <?php
                            // echo $sql;
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
                            $sql="SELECT IdAnggota,Nama,Phone,Alamat FROM anggota WHERE IsAdmin='0'";
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!--FOOTER--><?php include("../temp/footer.php");?>
    </body>
</html>