<style>
    .navBarMenu {
        width: 20%;
        height: 450px;
        background-color: lightgrey;
    }
    #navMenu {
        
        width: 100%;
        height: 100%;
    }
    h3 {
        padding-left: 60px;
        background-color: dimgrey;
        color: white;
        margin-bottom: 0px;
        border-bottom: 2px solid white;
    }
    .menu {
        background-color: lightgrey;
        width: 100%;
        height: 10%;
        text-align: left;
        float: left;
        border-bottom: 2px solid white;
    }
    .menu a{
        color:black;
    }
</style>

<div class="navBarMenu">
    <h3>MENU</h3>
    <ul id="navMenu">
        <li class="menu" id="bookList"><a href="../user/book.php">Book List</a></li>
        <li class="menu" id="bookHist"><a href="../user/borrow.php">Borrow History</a></li>
        <li class="menu" style="border-bottom:none;"><a href="">Download Journals</a></li>
    </ul>
</div>