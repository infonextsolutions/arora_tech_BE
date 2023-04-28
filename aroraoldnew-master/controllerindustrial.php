<?php
include_once "headeralt.php";
include_once "model.php";
?>
 
<script type="text/javascript" >

/* 
 * Example init
 */
 $(document).ready(function(){
	 	var oTable=$('#own').dataTable({
	 		
	 	
	"sScrollY": "185px",
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
	                                 "sExtends": "xls",
	                                 "sFileName": "industrials-Owner.xls",
	                                 "bFooter": false
	                                 
	                                 
	                             },
	                             {
	                                 "sExtends": "pdf",
	                                 "sPdfMessage": "Results based on the industrial-Owner Search",
	                                 "sFileName": "industrials-Owner.pdf"
	                                 
	                             },
	                             
	                             
	                             {
	                                 "sExtends":    "ajax",
	                                 "sButtonText": "Delete",
	                                 "sAjaxUrl" : "Deleteflooralt.php",
	                                
	                          		"fnAjaxComplete": function() {
	                             	try {
	                                     var table = document.getElementById("own");
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
	                             	var oTable = $('#own').dataTable();
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
	                                              "table": "industrialown"
	                                              
	                                             
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
	                         
	         "aaSorting": [[ 9, "desc" ]],
	 		"aoColumnDefs": [ 
	             { "bSortable": false, "aTargets": [0,10 ] }
	         ] } );	
	 	setTimeout(function ()
				  {
				    oTable.fnAdjustColumnSizing();
				  }, 10 );		
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
	     		$('#deal').dataTable({
	     			
	     		
	     	"sScrollY": "185px",
	     			"bScrollCollapse": true	,
	     			"bPaginate": false,
	     	"sDom": 'Tlfr<"clear">tipL',
	     	"oSelectable": {
	     		'iColNumber':'1',
	     		 'sIdColumnName': '0',
	     		 'bSelectAllCheckbox': true
	     	},
	     	"oTableTools": {
	     	                        
	     	                        "aButtons": [ "print",
	     	                            {
	     	                                "sExtends": "xls",
	     	                                "sFileName": "industrials-Dealer.xls",
	     	                                "bFooter": false
	     	                                
	     	                                
	     	                            },
	     	                            {
	     	                                "sExtends": "pdf",
	     	                                "sPdfMessage": "Results based on the industrial-Dealer Search",
	     	                                "sFileName": "industrials-Dealer.pdf",
	     	                                
	     	                            },
	     	                            {
	     	                                "sExtends":    "ajax",
	     	                                "sButtonText": "Delete",
	     	                                "sAjaxUrl" : "Deleteflooralt.php",
	     	                               
	     	                         		"fnAjaxComplete": function() {
	     	                            	try {
	     	                                    var table = document.getElementById("deal");
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
	     	                            	var oTable = $('#deal').dataTable();
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
	     	                                             "table": "industrialdeal"
	     	                                             
	     	                                            
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
	     	                        
	     	        "aaSorting": [[ 9, "desc" ]],
	     			"aoColumnDefs": [ 
	     	            { "bSortable": false, "aTargets": [0,10 ] }
	     	        ] } );		
	     			});
	     	  
	     	      

	   $(document).ready(function(){
	                       $('#own tr td').each(function(){
	                       	
	                      
	                       		
	                               if($.trim($(this).html()) == 'Yes'|| $.trim($(this).html()) == 'Y')  {
	                                                           		
	                                                           
	                                                                $(this).closest('tr').css('background-color','#FEE7DE');
	                                                               }
	                         
	                                                       
	                                                               
	                                                               }); 
	                       });

	$(document).ready(function(){
	                       $('#deal tr td').each(function(){
	                       		
	                               if($.trim($(this).html()) == 'Yes'|| $.trim($(this).html()) == 'Y')  {
	                                                           		
	                                                           
	                                                                $(this).closest('tr').css('background-color','#FEE7DE');
	                                                               }
	                                                               }); 
	                       });
	                      

	</script>

<?php

list ($bet,$que) = querybuild('industrialown','industrialdeal');
tablebuildalt('industrialown',$bet);
tablebuildalt('industrialdeal',$que);
 
   
   ?>
   
   
