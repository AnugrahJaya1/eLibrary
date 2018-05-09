<?php
if(!isset($_SESSION))
{
    session_start();
}
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
        <link rel="stylesheet" type="text/css" href="../../style/book.css" />
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
                    <table cellspacing="0" >
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
                            if($res=$mysqli->query($sql)){
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