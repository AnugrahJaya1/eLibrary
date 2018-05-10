<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("../../connection/connection.php");
    $sql="SELECT *,NamaKategori FROM
            buku INNER JOIN kategori_buku ON buku.CodeBuku=kategori_buku.CodeBuku
            INNER JOIN kategori ON kategori.CodeKategori=kategori_buku.CodeKategori";

    //handle search book
    if(isset($_POST["searchButt"])){
        $search=$_POST["bookSearch"];
        $select=$_POST["select"];

        if(isset($search) && $search!=""){
            if($select=="Title"){
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

    }
    //handle add book
    $statusAddBook=false;
    if(isset($_POST["iAdd"])){
        $title=$_POST["title"];
        $author=$_POST["author"];
        $pusblish_year=$_POST["publishyear"];
        $publish=$_POST["publish"];
        $stock=$_POST["stock"];

        $kategori=array();
        $sql0="SELECT NamaKategori FROM kategori";

        if($res=$mysqli->query($sql0)){
            while($row=$res->fetch_array()){
                $namaKategori=$row['NamaKategori'];

                if(isset($_POST[$namaKategori])){
                    array_push($kategori,$namaKategori);
                }
            }
        }
        
        
        $codeBuku="";
        $codeKategori="";
        if(isset($title) && isset($author) && isset($pusblish_year) && isset($publish) && isset($stock)){
            if($title!="" && $author!="" && $pusblish_year!="" && $publish!="" && $kategori!="" && $stock!=""){
                $codeBuku = generateCode(4);
                $sql1="SELECT CodeBuku FROM buku WHERE CodeBuku='$codeBuku'";
                $res=$mysqli->query($sql1);
                //handling jika ada duplica code
                if($res->num_rows!=0){
                    while($res->num_rows!=0){
                        $codeBuku=generateCode(4);
                        $$sql1="SELECT CokeBuku FROM buku WHERE CodeBuku='$codeBuku'";
                        $res=$mysqli->query($sql1);
                    }
                }

                //insert to buku
                $sql2="INSERT INTO `buku`(`CodeBuku`, `Tittle`, `Author`, `Publication Year`, `Publisher`, `Stock`) 
                    VALUES ('$codeBuku','$title','$author','$pusblish_year','$publish','$stock')";
                    $mysqli->query($sql2);

                // inser to kategori_buku
                for($i=0;$i<sizeof($kategori);$i++){
                    $namaKategori=$kategori[$i];

                    $sql2="SELECT CodeKategori FROM kategori WHERE NamaKategori='$namaKategori'";
                    if($res=$mysqli->query($sql2)){
                        $row=$res->fetch_array();
                        $codeKategori=$row['CodeKategori'];
                        // echo $codeBuku." ".$codeKategori;
                        $sql2="INSERT INTO kategori_buku (CodeBuku,CodeKategori) VALUES ('$codeBuku','$codeKategori')";
                        $mysqli->query($sql2);
                    }
                }


                $statusAddBook=true;
                
            }
        }
    }

    function generateCode($length){
        // $l=$length;
        $char="0123456789ABCDEFGHIJKLMNOPQRSTUPWXYZ";
        $charLength=strlen($char);
        $randomCode="";
        for($i=0;$i<$length;$i++){
            $randomCode .=$char[rand(0,$charLength-1)];
        }
        return $randomCode;
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
        <link rel="stylesheet" type="text/css" href="../../style/books.css" />
        <style>
          
        </style>
	</head>
    <body>
        <!-- CONTENT --><?php include("../temp/headerAdmin.php"); ?>
        <!---->
        
        <div id="midItem">
            <!--SIDE NAVBAR--><?php include("../temp/sideNavAdmin.php");?>
            <!--SEARCH BAR-->
            <div id="title">
                <h1>Book List</h1>
                <div id="formCont">
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
                    <button id="modalButt" onclick="openModal()">ADD BOOK</button>
                </div>
                <?php 
                    if($statusAddBook==true){
                        echo "<p>".'Book Added'."</p>";
                        $status=false;
                    }
                ?>
                
                <!--BOOK TABLE-->
                <div id="tableCont">
                    <table cellspacing="0">
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
                            include("../../controller/getBookList.php");
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
                        <h3>Book Data</h3>
                        <form method="post" action="">
                            <input class="modalForm" type="text" placeholder="Title" name="title" />
                            <br />
                            <input class="modalForm" type="text" placeholder="Author" name="author" />
                            <br />
                            <input class="modalForm" type="text" pattern="^[ ]*[+]?[0-9]{4,}[ ]*$" placeholder="Publish Year" name="publishyear" />
                            <br />
                            <input class="modalForm" type="text" placeholder="Publisher" name="publish" />
                            <br />
                            <input class="modalForm" type="text" pattern="^[ ]*[+]?[0-9]{1,}[ ]*$" placeholder="Stock" name="stock" />
                            <br>
                            <div data-role="controlgroup">
                                <?php 
                                     $sql="SELECT NamaKategori FROM kategori";
                                    if($result=$mysqli->query($sql)){
                                        while($row=$result->fetch_array()){
                                            $name=$row['NamaKategori'];
                                            //echo $name." ";
                                            echo "<label for='$name'>".$name."</label>";
                                            echo "<input type='checkbox' name='$name' value='$name' />";
                                        }
                                    }
                                ?>
                            </div>
                            <br />
                            <input class="modalForm" type="submit" id="upBott" name="iAdd" value="ADD">
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