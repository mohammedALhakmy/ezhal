<?php
/*


define('DB_SERVER','localhost:3306');
define('DB_USER','onlinepa_onlinepa');
define('DB_PASS' ,'hsome370');
define('DB_NAME', 'onlinepa_hayaakumsit');

*/


define('DB_SERVER','localhost:3306');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'ezhal1');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>