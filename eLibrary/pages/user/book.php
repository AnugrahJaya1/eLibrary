<?php
    include("../../connection/connection.php");
    $sql="SELECT *,NamaKategori FROM
        buku INNER JOIN kategori_buku ON buku.CodeBuku=kategori_buku.CodeBuku
        INNER JOIN kategori ON kategori.CodeKategori=kategori_buku.CodeKategori";

    if(isset($_POST["searchButt"])){
        $search=$_POST["bookSearch"];
        $select=$_POST["select"];

        if(isset($search) && $search!=""){
            if($select=="Tittle"){
                $sql .=" WHERE Tittle LIKE '%$search%' ORDER BY Tittle ASC";
            }else if($select=="Author"){
                $sql .=" WHERE Author LIKE '%$search%' ORDER BY Author ASC";
            }else if($select=="Publish Year"){
                $sql .=" WHERE Publication Year LIKE '%$search%' ORDER BY Publis Year ASC";
            }else if($select=="Publisher"){
                $sql .=" WHERE Publisher LIKE '%$search%' ORDER BY Publisher ASC";
            }else if($select=="Category"){
                $sql .=" WHERE Kategori LIKE '%$search%' ORDER BY Kategori ASC";
            }
        }
        
        
        // $sql="SELECT *,NamaKategori FROM
        // buku INNER JOIN kategori_buku ON buku.CodeBuku=kategori_buku.CodeBuku
        // INNER JOIN kategori ON kategori.CodeKategori=kategori_buku.CodeBuku";

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
        <style>
            #bookList{
                background-color:dimgrey;
            }
            #bookList a{
                color:white;
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
                width: 20%;
                padding-left: 6px;

            }
            #searchBar {
                margin-top: 10px;
                height: 54px;
                background-color: dimgrey;
                color: white;
                width: 80%;
                padding-top: 1%;
                padding-left: 40%
            }
            .formButt {
                
                height: 30px;
                width: 100px;
                background-color: #333;
                color: white;
                font-size: 14px;
                margin-left: 4px;
            }
            /*TABLE CSS*/
            #tableCont{
               flex-direction:column;
               width : 90%;
               margin-top: 0px;
               border:outset 2px;
            }
            th{
                background-color: dimgray;
                color:white;
                font-size: 18px;
                border: none ;
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
                <form id="searchBar" name="searchBar" method="post" action="">
                    <input type="search" name="bookSearch" id="search" placeholder="Search books.." />
                    by
                    <select name="select">
                        <option value="Title">Title</option>
                        <option value="Author">Author</option>
                        <option value="Publish Year">Publish Year</option>
                        <option value="Publisher">Publisher</option>
                        <option value="Category">Category</option>
                    </select>
                    <input type="submit" value="SEARCH" name="searchButt" class="formButt" />
                </form>
                <!--BOOK TABLE-->
                <div id="tableCont">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Code</th>
                            <th>Title</th>
                            <th> Author </th>
                            <th>Publish Year</th>
                            <th>Publisher</th>
                            <th>Category</th>
                            <th>Stock</th>
                        </tr>
                        <?php 
                            // echo $sql;
                            $res=$mysqli->query($sql);
                            while($row=$res->fetch_array()){
                                echo "<tr>";
                                    echo "<td>".$row["CodeBuku"]."</td>";
                                    echo "<td>".$row["Tittle"]."</td>";
                                    echo "<td>".$row["Author"]."</td>";
                                    echo "<td>".$row["Publication Year"]."</td>";
                                    echo "<td>".$row["Publisher"]."</td>";
                                    echo "<td>".$row["NamaKategori"]."</td>";
                                    echo "<td>".$row["Stock"]."</td>";
                                echo "</tr>";
                            }
                            $sql="SELECT *,NamaKategori FROM
                                    buku INNER JOIN kategori_buku ON buku.CodeBuku=kategori_buku.CodeBuku
                                    INNER JOIN kategori ON kategori.CodeKategori=kategori_buku.CodeKategori";

                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!--FOOTER--><?php include("../temp/footer.php");?>
    </body>
</html>