<?php
if(!isset($_SESSION))
{
    session_start();
}
$adm=$_SESSION["isadmin"];
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
        <link rel="stylesheet" type="text/css" href="../../style/news.css" />
		<style>
           
		</style>
        <title>News Page</title>
	</head>
    <body>
        <!-- CONTENT -->
        <!--TOP NAVBAR--><?php
                         if($adm == 0){
                             include("../temp/headerUser.php");
                         }
                         else{
                             include("../temp/headerAdmin.php");
                         }
                         ?>

        <div id="midItem">
            <!--SIDE NAVBAR--><?php
                              if($adm == 0){
                                  include("../temp/sideNavUser.php");
                              }else{
                                  include("../temp/sideNavAdmin.php");
                              }
                              ?>
            <!---->
           
            <div id="newsContent">
                <h1>
                    Today's News
                </h1>
                <h2>Trump election: Priebus and Bannon given key roles</h2>
                <p>
                    US President-elect Donald Trump has awarded key roles in his incoming team to a top Republican party official and a right-wing media chief.
                    Reince Priebus, chairman of the Republican National Committee (RNC), will be his chief of staff.
                    In this role, he will set the tone for the new White House and act as a conduit to Congress and the government.
                    Stephen Bannon, from the Breitbart News Network, will serve as Mr Trump's chief strategist.
                    Mr Bannon stepped aside as executive chairman of Breitbart - a combative conservative site with an
                    anti-establishment agenda - to act as Mr Trump's campaign chief.
                    Meanwhile, in the president-elect's first interview, with US broadcaster CBS, Mr Trump said:
                    <ul id="newsList">
                        <li class="listItem">He would deport or jail up to three million illegal migrants with criminal links</li>
                        <li class="listItem">
                            Future Supreme Court nominees would be "pro-life" - meaning they oppose abortion - and defend the
                            constitutional right to bear arms
                        </li>
                        <li class="listItem">He will not seek to overturn the legalisation of same-sex marriage</li>
                        <li class="listItem">He will forgo the president's $400,000 salary, taking $1 a year instead</li>
                    </ul>
                </p>
                <p>
                    In a statement released by his campaign, Mr Trump described Mr Priebus and Mr Bannon as "highly qualified
                    leaders who worked well together on our campaign and led us to a historic victory".
                    Mr Priebus, 44, acted as a bridge between Mr Trump and the Republican party establishment during the campaign.
                    He is close to House Speaker Paul Ryan, a fellow Wisconsinite who could be instrumental in steering the new
                    administration's legislative agenda.
                </p>
            </div>
        </div>
        <!--FOOTER--><?php include("../temp/footer.php");?>

    </body>
</html>