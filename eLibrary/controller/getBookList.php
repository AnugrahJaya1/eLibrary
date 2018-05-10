<?php
    $temp="";
    $codeBuku="";
    $title="";
    $author="";
    $publish_year="";
    $publisher="";
    $kategori="";
    $stock="";
        if($res=$mysqli->query($sql)){
            while($row=$res->fetch_array()){
                if($codeBuku==""){
                    $codeBuku=$row['CodeBuku'];
                    $title=$row['Tittle'];
                    $author=$row['Author'];
                    $publish_year=$row['Publication Year'];
                    $publisher=$row['Publisher'];
                    $kategori=$row['NamaKategori'];
                    $stock=$row['Stock'];    
                }else{
                    if($codeBuku==$row["CodeBuku"]){
                        $kategori .=",".$row['NamaKategori'];  
                    }else{     
                        echo "<tr>";
                        echo "<td>".$codeBuku."</td>";
                        echo "<td>".$title."</td>";
                        echo "<td>".$author."</td>";
                        echo "<td>".$publish_year."</td>";
                        echo "<td>".$publisher."</td>";
                        echo "<td>".$kategori."</td>";
                        echo "<td>".$stock."</td>";
                        echo "</tr>";    
                        $codeBuku=$row['CodeBuku'];
                        $title=$row['Tittle'];
                        $author=$row['Author'];
                        $publish_year=$row['Publication Year'];
                        $publisher=$row['Publisher'];
                        $kategori=$row['NamaKategori'];
                        $stock=$row['Stock'];    
                    }
                }
            }
    
            echo "<tr>";
            echo "<td>".$codeBuku."</td>";
            echo "<td>".$title."</td>";
            echo "<td>".$author."</td>";
            echo "<td>".$publish_year."</td>";
            echo "<td>".$publisher."</td>";
            echo "<td>".$kategori."</td>";
            echo "<td>".$stock."</td>";          
        }
?>