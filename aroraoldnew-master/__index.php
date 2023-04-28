<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >

<?php
include_once"dbconnect.php";

?>

<head>
    <title>Arora Realtech Pvt Ltd</title>
    <style type="text/css">
      
        .desc { color:#6b6b6b;}
        .desc a {color:#0092dd;}
        .dropdown dd, .dropdown dt, .dropdown ul { margin:0px; padding:0px; }
        .dropdown dd { position:relative; }
        .dropdown a, .dropdown a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown a:hover { color:#5d4617;}
        .dropdown dt a:hover, .dropdown dt a:focus { color:#5d4617; border: 1px solid #5d4617;}
        .dropdown dt a {background:#dfeff9  no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:150px;}
        .dropdown dt a span {cursor:pointer; display:block; padding:5px;text-align: center;}
        .dropdown dd ul { background:#DDF0F0 none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; 	
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown span.value { display:none;}
        .dropdown dd ul li a { padding:5px; display:block;border-bottom: 1px solid #bfe3f6;}
        .dropdown dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown img.flag {border:none; vertical-align:middle; margin-left:10px; }
        .dropdown1 dd, .dropdown1 dt, .dropdown1 ul { margin:0px; padding:0px; }
        .dropdown1 dd { position:relative; }
        .dropdown1 a, .dropdown1 a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown1 a:hover { color:#5d4617;}
        .dropdown1 dt a:hover, .dropdown1 dt a:focus { color:#5d4617; border: 1px solid #5d4617;}
        .dropdown1 dt a {background:#dfeff9 url(arrow.png) no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:150px;}
        .dropdown1 dt a span {cursor:pointer; display:block; padding:5px;text-align: center;}
        .dropdown1 dd ul { background:#DDF0F0 none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown1 span.value { display:none;}
        .dropdown1 dd ul li a { padding:5px; display:block;}
        .dropdown1 dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown1 img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .dropdown2 dd, .dropdown2 dt, .dropdown2 ul { margin:0px; padding:0px; }
        .dropdown2 dd { position:relative; }
        .dropdown2 a, .dropdown2 a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown2 a:hover { color:#5d4617;}
        .dropdown2 dt a:hover, .dropdown2 dt a:focus { color:#5d4617; border: 1px solid #5d4617;}
        .dropdown2 dt a {background:#dfeff9 url(arrow.png) no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:150px;}
        .dropdown2 dt a span {cursor:pointer; display:block; padding:5px;text-align: center;}
        .dropdown2 dd ul { background:#DDF0F0 none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown2 span.value { display:none;}
        .dropdown2 dd ul li a { padding:5px; display:block;}
        .dropdown2 dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown2 img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .dropdown3 dd, .dropdown3 dt, .dropdown3 ul { margin:0px; padding:0px; }
        .dropdown3 dd { position:relative; }
        .dropdown3 a, .dropdown3 a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown3 a:hover { color:#5d4617;}
        .dropdown3 dt a:hover, .dropdown3 dt a:focus { color:#5d4617; border: 1px solid #5d4617;}
        .dropdown3 dt a {background:#dfeff9 url(arrow.png) no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:150px;}
        .dropdown3 dt a span {cursor:pointer; display:block; padding:5px;text-align: center;}
        .dropdown3 dd ul { background:#DDF0F0 none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown3 span.value { display:none;}
        .dropdown3 dd ul li a { padding:5px; display:block;}
        .dropdown3 dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown3 img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .dropdown4 dd, .dropdown4 dt, .dropdown4 ul { margin:0px; padding:0px; }
        .dropdown4 dd { position:relative; }
        .dropdown4 a, .dropdown4 a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown4 a:hover { color:#5d4617;}
        .dropdown4 dt a:hover, .dropdown4 dt a:focus { color:#5d4617; border: 1px solid #5d4617;}
        .dropdown4 dt a {background:#dfeff9 url(arrow.png) no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:150px;}
        .dropdown4 dt a span {cursor:pointer; display:block; padding:5px;text-align: center;}
        .dropdown4 dd ul { background:#DDF0F0 none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown4 span.value { display:none;}
        .dropdown4 dd ul li a { padding:5px; display:block;}
        .dropdown4 dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown4 img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .dropdown5 dd, .dropdown5 dt, .dropdown5 ul { margin:0px; padding:0px; }
        .dropdown5 dd { position:relative; }
        .dropdown5 a, .dropdown5 a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown5 a:hover { color:#5d4617;}
        .dropdown5 dt a:hover, .dropdown5 dt a:focus { color:#5d4617; border: 1px solid #5d4617;}
        .dropdown5 dt a {background:#dfeff9 url(arrow.png) no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:150px;}
        .dropdown5 dt a span {cursor:pointer; display:block; padding:5px;text-align: center;}
        .dropdown5 dd ul { background:#DDF0F0 none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown5 span.value { display:none;}
        .dropdown5 dd ul li a { padding:5px; display:block;border-bottom: 1px solid #bfe3f6;}
        .dropdown5 dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown5 img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .flagvisibility { display:none;}
        .bigflag{
        	background-color: #dfeff9;
			padding-left: 20px;
			padding-right: 20px;       	
        	}
        	.center
        	{	
        		}
        td
        { padding-left: 30px;
        }
        ul.sub-level {
    display: none;
}
li:hover .sub-level {
   color: inherit;
    
    border-width: 1px;
    display: block;
    position: absolute;
    left: 160px;
    top: 5px;
}
ul.sub-level li {
    border: none;
    
}
        
    </style>
 <script type="text/javascript">
 
function submitform()
{
    document.forms["myform"].submit();
}


        $(document).ready(function() {
            $(".dropdown5 img.flag").addClass("flagvisibility");

            $(".dropdown5 dt a").click(function() {
                $(".dropdown5 dd ul").toggle();
            });
                        
            $(".dropdown5 dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown5 dt a span").html(text);
                $(".dropdown5 dd ul").hide();
                
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown5"))
                    $(".dropdown5 dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown5 img.flag").toggleClass("flagvisibility");
            });
        });
           
            $(document).ready(function() {
            $(".dropdown4 img.flag").addClass("flagvisibility");

            $(".dropdown4 dt a").click(function() {
                $(".dropdown4 dd ul").toggle();
            });
                        
            $(".dropdown4 dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown4 dt a span").html(text);
                $(".dropdown4 dd ul").hide();
                
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown4"))
                    $(".dropdown4 dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown4 img.flag").toggleClass("flagvisibility");
            });
        });
    </script>
    
</head>
<body>





    
    
    <div id="header"> 
    
	
    <a href="index.php" name="index.php">
    <img alt="" style="position:absolute;top:0;" src="media/images/logo.gif">	<h3 style="font-size :36px;">Arora RealTech </h3></a> 
    
    
     Welcome <?php if(empty($getuser[0]['first_name']) || empty($getuser[0]['last_name']))
	{echo $getuser[0]['username'];} else {echo $getuser[0]['first_name']." ".$getuser[0]['last_name'];} 
	
	
	?>
	
	<a class="btn btn-outline-primary"
href="/auth/admin/log_off.php?action=logoff" style="position:relative;float:right;top:-40px;">Sign out</a>  
  </div>
 
    <div id="rightcolumn">
    <input type="text" id="find_id_input" placeholder="Search Property id" name="search" style="width:150px;margin-left:5px;padding-bottom:10px;padding-top:10px;"  >
	<a  href="#output_find" rel="leanModal" name="output_find" id="find_id_submit" class="button" style="height:15px;margin-left:5px;margin-top:5px;">Find</a> 
    
	<div id="output_find"  class="lean">
<p>Please input the Property Id in the search Box to search</p>

	
	</div>
	</div>
    <table summary="indexview" class="table" >
    <tr>
  <td>
    <dl id="sample" class="dropdown">
    <dt><a href="/index.php"><img class="bigflag" src="media/images/residential.png" alt="" />
        <span>Residential</span></a></dt>
        <!-- <dd>
            <ul> -->
                <!-- <li><a href="#">Plots<img class="flag" src="media/images/plot.png" alt="" /> -->
               
                <!-- <span class="value">BR</span></a> -->
                
                <!-- <ul class="sub-level"> -->
                
                
                
 <?php
	
  
    // $query="Select *  from links " ;
    // //echo $query;
    // $result= mysqli_query($GLOBALS['db'],$query);
    //     while ($row = mysqli_fetch_assoc($result)) {
        //print_r ($row);
        	?>
        <!-- <li><a href="index.php?q=<?php //echo $row['name'];?> " ><?php //echo $row['name'];?> </a></li> -->
        <?php
    // }
    // if(isset($_SESSION['form'])){
    // unset($_SESSION['form']);
    // }
    ?>                
   <!-- </ul>                 -->
                
                
<!--                 
                <li><a href="society.php">Society Flats<img class="flag" src="media/images/flat.png" alt="" /><span class="value">FR</span></a></li>
                <li><a href="apartment.php">Apartments<img class="flag" src="media/images/apartment.png" alt="" /><span class="value">DE</span></a></li>
                <li><a href="floor.php">Floors<img class="flag" src="media/images/floor.png" alt="" /><span class="value">IN</span></a></li>
                <li><a href="build.php">Buildup<img class="flag" src="media/images/buildup.png" alt="" /><span class="value">JP</span></a></li>
           </ul> -->
        <!-- </dd>
       
    </dl>
    </td> -->
    <!-- <td>
    <dl id="sample" class="dropdown1">
        <dt><a href="industrial.php"><img class="bigflag" src="media/images/industry.png" alt="" /><span>Industrial</span></a></dt>
       
    </dl>
    </td> -->
    <!-- <td>
    
    <dl id="sample" class="dropdown2">
        <dt><a href="commercial.php"><img class="bigflag" src="media/images/commercial.png" alt="" /><span>Commercial</span></a></dt>
        <dd>
            
        </dd>
    </dl>
     </td>
     <td>
    <dl id="sample" class="dropdown3">
        <dt><a href="institutional.php"><img class="bigflag" src="media/images/institutional.png" alt="" /><span>Institutional</span></a></dt>
        
    </dl>
     </td> -->
      <!-- <td>
    <dl id="sample" class="dropdown3">
        <dt><a href="agricultural.php"><img class="bigflag" src="media/images/agricultural.png" alt="" /><span>Agricultural</span></a></dt>
        
    </dl>
     </td>
      <td>
    <dl id="sample" class="dropdown3">
        <dt><a href="rented.php"><img class="bigflag" src="media/images/rent.png" HEIGHT="130" WIDTH="130" alt="" /><span>Rented Property</span></a></dt>
    
    </dl>
     </td> -->
    <span id="result"></span>
    </tr>
    <?php
    if($getuser[0]['username']=='admin') {
    	?>
    <tr>
<td></td>
<!-- <td><dl id="sample" class="dropdown3">
        <dt><a href="http://email19.asia.secureserver.net"><img class="bigflag" src="media/images/mail.png" HEIGHT="50" WIDTH="50" alt="" /><span>My MailBox</span></a></dt>
    
    </dl></td> -->
    <td>
    <dl id="sample" class="dropdown5" >
        <dt><a href="#"><img class="bigflag" src="media/images/user.png" HEIGHT="50" WIDTH="50" alt="" />
        <span>Manage Users</span></a></dt>
    <dd> <ul >
     <li> <a href="/auth/admin/change_pass.php">Change password</a> </li> 
	<li><a href="/auth/admin/edit_profile.php">Edit Profile</a> </li> 
	<li><a href="/auth/admin/manage_users.php">Manage Users</a> </li>
	 <li><a href="/auth/admin/register.php">Register Users </a></li> 
	<!-- <li><a href="/auth/admin/site_settings.php">Manage Site Settings</a></li> -->
	 
	 </ul>
	 </dd>
    </dl>
     </td>  
     <!-- <td>
    <dl id="sample" class="dropdown4" >
        <dt><a href="#"><img class="bigflag" src="media/images/data.png" HEIGHT="50" WIDTH="50" alt="" /><span>Manage Data</span></a></dt>
        <dd> <ul >
     <li> <a href="/dbconvert.php">Upload Map Location</a> </li> 
		<li><a href="/dbhuda.php">Upload Huda Maps</a></li>
	 
	 </ul>
	 </dd>
    </dl>
     </td>      -->
    </tr>
  <?php
  }
  else {
  ?>

  	 <tr>
<td></td>
<!-- <td><dl id="sample" class="dropdown3">
        <dt><a href="http://email19.asia.secureserver.net"><img class="bigflag" src="media/images/mail.png" HEIGHT="50" WIDTH="50" alt="" /><span>My MailBox</span></a></dt>
    
    </dl></td> -->
    <td>
    <dl id="sample" class="dropdown5" >
        <dt><a href="#"><img class="bigflag" src="media/images/profile.png" HEIGHT="50" WIDTH="50" alt="" /><span>My Profile</span></a></dt>
      <dd> <ul >
     <li> <a href="/auth/users/change_pass.php">Change password</a> </li> 
	<li><a href="/auth/users/edit_profile.php">Edit Profile</a> </li>
	<li><a href="/auth/users/index.php">Manage My Photo</a> </li>  
	
	 
	 </ul>
	 </dd>  
    </dl>
     </td>  
        
    </tr>
  	
  	<?php
  	}
  ?>
    </table>
    
 
    
</body>
</html>
