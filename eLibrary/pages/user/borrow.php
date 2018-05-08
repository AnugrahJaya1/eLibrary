<?php
    include("../../connection/connection.php");
    $sql="SELECT buku.CodeBuku,Tittle,Author,Borrow_Date,Return_Date,Overdue,Fine 
    FROM buku INNER JOIN peminjaman ON peminjaman.CodeBuku=buku.CodeBuku 
    INNER JOIN anggota ON anggota.username=peminjaman.username";
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
    <style>
        #bookHist {
            background-color: dimgrey;
        }

            #bookHist a {
                color: white;
            }

        #midItem {
            height: 100%;
            width: 100%;
            display: flex;
        }
        /*content css*/
        #title {
            height: 20%;
            width: 79%;
            display: flex;
            margin-top: 6px;
            margin-left: 6px;
            flex-flow: wrap;
        }

        h1 {
            background-color: dimgrey;
            color: white;
            width: 100%;
            padding-left: 6px;
        }

        /*TABLE CSS*/
        #tableCont {
            flex-direction: column;
            width: 90%;
            margin-top: 0px;
            border: outset 2px;
        }

        th {
            background-color: dimgray;
            color: white;
            font-size: 18px;
            border: none;
            padding-left: 4px;
            padding-right: 10px;
        }
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