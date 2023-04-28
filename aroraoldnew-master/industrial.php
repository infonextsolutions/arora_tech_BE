<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
if(isset($_SESSION['header']))
{
    unset($_SESSION['header']);
    
    
}
	$_SESSION['header']='industrial';
include_once "headeralt.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <script type="text/javascript" >
 
$(document).ready(function() {
        $("#locality").autocomplete("autocomp.php?table=industrialloc&fld=locality", {
                width: 260,
                matchContains: true,
                mustMatch: true,
                 //minChars: 0,
                //multiple: true,
                //highlight: false,
                //multipleSeparator: ",",
                selectFirst: false
        });
});
</script>
<body>
<br />
<br />
<h2 class="imp" style="margin-left: 240px;
text-align: left;
width: 670px;
margin-top: 60px;
margin-bottom: 20px;">Welcome to The Industrial Properties Portal</h2>
<div id="form_container">

<table class="table">
<form name"searchform" action="controllerindustrial.php" method="get"  class="appnitro"  >


<tr>
<th>
<span class="description">Select Area Range</span>
</th><td>
<INPUT TYPE="text" class="small" NAME="rangeminarea1" VALUE=""/>Min

<INPUT TYPE="text" class="small" NAME="rangemaxarea1" VALUE=""/>Max
</td>
</tr>
<tr>
<th>
<span class="description">Select Price Range</span>
</th><td>
<INPUT TYPE="text" class="small" NAME="rangemin" VALUE=""/>Min

<INPUT TYPE="text" class="small" NAME="rangemax" VALUE=""/>Max
</td>
</tr>



 <tr><td></td>
 <td>
<input type="submit" name="submit" value="search"  class="button blue"/></td></tr>
</form>
</table>
</div>

</body>
</html>



