<?php
if(!isset($_SESSION))
{
    session_start();
    $nama=$_SESSION["nama"];
}
    include("../../connection/connection.php");
    $sql="SELECT buku.CodeBuku,Tittle,Author,Borrow_Date,Return_Date,Overdue,Fine
    FROM buku INNER JOIN peminjaman ON peminjaman.CodeBuku=buku.CodeBuku
    INNER JOIN anggota ON anggota.IdAnggota=peminjaman.IdAnggota";
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
    <link rel="stylesheet" type="text/css" href="../../style/borrow.css" />
    <style>
       
    </style>
</head>
<body>
    <!-- CONTENT --><?php include("../temp/headerUser.php"); ?>
    <!---->

    <div id="midItem">
        <!--SIDE NAVBAR--><?php include("../temp/sideNavUser.php");?>
        <!--SEARCH BAR-->
        <div id="title">
            <h1>Book List</h1>
            
            <!--BOOK TABLE-->
            <div id="tableCont">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Code</th>
                        <th>Title</th>
                        <th> Author </th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Overdue</th>
                        <th>Fine</th>
                    </tr>
                    <?php
                        $sql .=" WHERE anggota.username='$nama'";
                        // echo $sql;
                        // echo $sql;
                         if($res=$mysqli->query($sql)){
                            while($row=$res->fetch_array()){
                                echo "<tr>";
                                    echo "<td>".$row["CodeBuku"]."</td>";
                                    echo "<td>".$row["Tittle"]."</td>";
                                    echo "<td>".$row["Author"]."</td>";
                                    echo "<td>".$row["Borrow_Date"]."</td>";
                                    echo "<td>".$row["Return_Date"]."</td>";
                                    echo "<td>".$row["Overdue"]."</td>";
                                    echo "<td>".$row["Fine"]."</td>";
                                echo "</tr>";
                            }
                         }
                         
                    ?>
                </table>
            </div>
        </div>

    </div>
    <!--FOOTER-->
    <?php include("../temp/footer.php");?>
</body>
</html>
