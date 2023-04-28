<!DOCTYPE html>
<html>
<?php
include_once"header.php";
include_once"model.php";

?>

<head>
<meta charset="utf-8" />
<title></title>



			
          
			
<div id="demoWrapper" style="margin-left:300px;width:40%;margin-bottom:20px;">
			<div id="output1" class="info"></div>
			
			
			<hr />
			<h5 id="status"></h5>
			<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
				<div id="fieldWrapper">
				
								
					
					
<div class="highlighth1">Insert a New Plot Record</div>
<input type="hidden" name="table" id="name" value="links" class="required"  />
<table >

<tr>
<th>
<label >*Sector Name </label>
</th>
<td>
<input class="input_field_15em required  " type="text" name="name" value="" />
</td><td><i>eg HUDA,DLF etc</i>
</td>

</tr>
<tr><th><label >*Sector </label>
</th><td><input class="input_field_15em required " type="text" name="sector" id="filter_sector" value="" />

</td>
<td><i>eg Phase1,Phase2,etc NOTE : This cannot be just number like 34,23 it should be like 'SECTOR34' or 'PHASE34' etc</i></td>
</tr>
<tr>
<th>
<label  >*Sizes </label>
</th>
<td>
<input class="input_field_15em required" type="text" name="filter"   id="filter_sizes" value="" />
</td>
<td><i>eg 4M,6M,8M etc</i>
</td>


</tr>
</table>





				
				
				<div id="demoNavigation"> 							
					<input  id="next" value="Save" type="submit" class="btn btn-outline-primary"/>					
					<input  id="back" value="Reset" type="reset" class="btn btn-outline-danger"/>
				</div>
				</div>
			</form>
			<hr />
			
			<p id="data"></p>
		</div>
		<script>
		
		$(document).ready(function(){
		 	$('#links').dataTable({
		 		
		 	
		 "sScrollY": "150px",
		 "bScrollCollapse": true	,
		 "bPaginate": false,
		 "sDom": 'Tlfr<"clear">tipL',
		 "oSelectable": {
		 	'iColNumber':'1',
		 	 'sIdColumnName': '0',
		 	 'bSelectAllCheckbox': true
		 },
		 "oTableTools": {
		                         
		                         "aButtons": [ 
		                                      "print",
		                             		                             
		                             
		                             {
		                                 "sExtends":    "ajax",
		                                 "sButtonText": "Delete",
		                                 "sAjaxUrl" : "Deleteflooralt.php",
		                                
		                          		"fnAjaxComplete": function() {
		                             	try {
		                                     var table = document.getElementById("links");
		                                     var rowCount = table.rows.length;
		                          
		                                     for(var i=0; i<rowCount; i++) {
		                                         var row = table.rows[i];
		                                         var chkbox = row.cells[0].childNodes[0];
		                                         if(null != chkbox && true == chkbox.checked) {
		                                             table.deleteRow(i);
		                                             rowCount--;
		                                             i--;
		                                         }
		                          
		                          
		                                     }
		                                     }catch(e) {
		                                         alert(e);
		                                     }
		                          		},
		                                 "fnClick": function( nButton, oConfig ) {
		                             	var oTable = $('#links').dataTable();
		                                  var sData =fnGetSelected(oTable);
		                                  	
		                                  if (sData!='')
		                                  {
		                                      if (confirm ('Do you really want to delete?')){
		                                      $.ajax( {
		                                          
		                                          "url": oConfig.sAjaxUrl,
		                                          "data": 
		                                          {
		                                              "field": "rid",
		                                              "value": sData,
		                                              "table": "links"
		                                              
		                                             
		                                          }
		                                          ,
		                                         
		                                          "success": oConfig.fnAjaxComplete,
		                                          "dataType": "json",
		                                          "type": "POST",
		                                          "cache": false,
		                                          "error": function () {
		                                              alert( "Error detected when sending table data to server" );
		                                          }
		                                      } );
		                                      
		                              		}
		                                       
		                                   oTable.fnDraw();
		                                   
		                                   
		                                  }
		                                  else
		                                  alert ('Select a row to Delete');
		                                  
		                               
		                                 
		                                  
		                             

		                             }
		                             },
		                             {
		                                 "sExtends": "text",
		                                 "sButtonText": "Refresh",
		                                 "sButtonClass": "DTTT_button_refresh",
		                                 "sButtonClassHover": "DTTT_button_refresh_hover",
		                                 "fnClick": function ( nButton, oConfig, oFlash ) {
		                             	
		                             	document.location.reload(true);
		                             	    
		                                 }
		                                 
		                             }
		                             
		                             
		                         ]
		                         },
		                         
		         "aaSorting": [[ 2, "desc" ]],
		 		"aoColumnDefs": [ 
		             { "bSortable": false, "aTargets": [0,4 ] }
		         ] } );		
		 		});
		   
		   function fnGetSelected( oTableLocal )
		   {
		       var aReturn = new Array();
		       var aTrs = oTableLocal.fnGetNodes();
		      
		       for ( var i=0 ; i<aTrs.length ; i++ )
		       {
		           if ( $(aTrs[i]).hasClass('selected') )
		           {
		               aReturn.push( aTrs[i].id );
		              }
		       }
		       return aReturn;
		       };
		       

		$(document).ready(function(){
		
		
			$("input#next").click(function(){
		
				if(!isNaN($("#filter_sector").val()))
				{
					alert ('The Sector field cannot be pure number, like 24 please make it sector24 or phase24');
					$("#filter_sector").val('');
					$("#filter_sector").focus();
					return false;
				}
				else
				{
					return true;
				}
		
			});
			
		
		});
		       
				
		
		
		</script>
	</head>
	</html>
	
	<?php


$bet= 'select * from links';
tablebuildalt('links',$bet);
  
   
   
   ?>	
           
