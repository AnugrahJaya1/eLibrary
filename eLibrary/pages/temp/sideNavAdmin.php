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

        .menu a {
            color: black;
        }
</style>

<div class="navBarMenu">
    <h3>MENU</h3>
    <ul id="navMenu">
        <li class="menu" id="bookList"><a href="../admin/books.php">Book List</a></li>
        <li class="menu" id="memList"><a href="../admin/member.php">Member List</a></li>
        <li class="menu" id="admList"><a href="../admin/admList.php">Administrator List</a></li>
        <li class="menu" id="journal" style ="border-bottom:none;"><a href="../general/journal.php">Download Journals</a></li>
    </ul>
</div>