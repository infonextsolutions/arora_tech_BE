<?php
include_once "headeralt.php";
include_once "model.php";
include('include/header.php');
include_once('include/head.php');

?>
<script src="src/scripts/controller.js"></script>
<script type="text/javascript">
	/* 
	 * Example init
	 */

	//    $(document).ready(function(){
	//  	var oTable=$('#own').dataTable({


	//  "sScrollY": "185px",
	//  "bScrollCollapse": true	,
	//  "bPaginate": false,
	//  "sDom": 'Tlfr<"clear">tipL',
	//  "oSelectable": {
	//  	'iColNumber':'1',
	//  	 'sIdColumnName': '0',
	//  	 'bSelectAllCheckbox': true
	//  },
	//  "oTableTools": {

	//                          "aButtons": [ 
	//                                       "print",
	//                              {
	//                                  "sExtends": "xls",
	//                                  "sFileName": "renteds-Owner.xls",
	//                                  "bFooter": false


	//                              },
	//                              {
	//                                  "sExtends": "pdf",
	//                                  "sPdfMessage": "Results based on the rented-Owner Search",
	//                                  "sFileName": "renteds-Owner.pdf"

	//                              },


	//                              {
	//                                  "sExtends":    "ajax",
	//                                  "sButtonText": "Delete",
	//                                  "sAjaxUrl" : "Deleteflooralt.php",

	//                           		"fnAjaxComplete": function() {
	//                              	try {
	//                                      var table = document.getElementById("own");
	//                                      var rowCount = table.rows.length;

	//                                      for(var i=0; i<rowCount; i++) {
	//                                          var row = table.rows[i];
	//                                          var chkbox = row.cells[0].childNodes[0];
	//                                          if(null != chkbox && true == chkbox.checked) {
	//                                              table.deleteRow(i);
	//                                              rowCount--;
	//                                              i--;
	//                                          }


	//                                      }
	//                                      }catch(e) {
	//                                          alert(e);
	//                                      }
	//                           		},
	//                                  "fnClick": function( nButton, oConfig ) {
	//                              	var oTable = $('#own').dataTable();
	//                                   var sData =fnGetSelected(oTable);

	//                                   if (sData!='')
	//                                   {
	//                                       if (confirm ('Do you really want to delete?')){
	//                                       $.ajax( {

	//                                           "url": oConfig.sAjaxUrl,
	//                                           "data": 
	//                                           {
	//                                               "field": "rid",
	//                                               "value": sData,
	//                                               "table": "rentedown"


	//                                           }
	//                                           ,

	//                                           "success": oConfig.fnAjaxComplete,
	//                                           "dataType": "json",
	//                                           "type": "POST",
	//                                           "cache": false,
	//                                           "error": function () {
	//                                               alert( "Error detected when sending table data to server" );
	//                                           }
	//                                       } );

	//                               		}

	//                                    oTable.fnDraw();


	//                                   }
	//                                   else
	//                                   alert ('Select a row to Delete');






	//                              }
	//                              },
	//                              {
	//                                  "sExtends": "text",
	//                                  "sButtonText": "Refresh",
	//                                  "sButtonClass": "DTTT_button_refresh",
	//                                  "sButtonClassHover": "DTTT_button_refresh_hover",
	//                                  "fnClick": function ( nButton, oConfig, oFlash ) {

	//                              	document.location.reload(true);

	//                                  }

	//                              }


	//                          ]
	//                          },

	//          "aaSorting": [[ 12, "desc" ]],
	//  		"aoColumnDefs": [ 
	//              { "bSortable": false, "aTargets": [0,13 ] }
	//          ] } );		
	//  	setTimeout(function ()
	// 			  {
	// 			    oTable.fnAdjustColumnSizing();
	// 			  }, 10 );	
	//  		});

	//    function fnGetSelected( oTableLocal )
	//    {
	//        var aReturn = new Array();
	//        var aTrs = oTableLocal.fnGetNodes();

	//        for ( var i=0 ; i<aTrs.length ; i++ )
	//        {
	//            if ( $(aTrs[i]).hasClass('selected') )
	//            {
	//                aReturn.push( aTrs[i].id );
	//               }
	//        }
	//        return aReturn;
	//        };




	//        $(document).ready(function(){
	//      		$('#deal').dataTable({


	//      	 "sScrollY": "185px",
	//      			"bScrollCollapse": true	,
	//      			"bPaginate": false,
	//      	"sDom": 'Tlfr<"clear">tipL',
	//      	"oSelectable": {
	//      		'iColNumber':'1',
	//      		 'sIdColumnName': '0',
	//      		 'bSelectAllCheckbox': true
	//      	},
	//      	"oTableTools": {

	//      	                        "aButtons": [ "print",
	//      	                            {
	//      	                                "sExtends": "xls",
	//      	                                "sFileName": "renteds-Dealer.xls",
	//      	                                "bFooter": false


	//      	                            },
	//      	                            {
	//      	                                "sExtends": "pdf",
	//      	                                "sPdfMessage": "Results based on the rented-Dealer Search",
	//      	                                "sFileName": "renteds-Dealer.pdf",

	//      	                            },
	//      	                            {
	//      	                                "sExtends":    "ajax",
	//      	                                "sButtonText": "Delete",
	//      	                                "sAjaxUrl" : "Deleteflooralt.php",

	//      	                         		"fnAjaxComplete": function() {
	//      	                            	try {
	//      	                                    var table = document.getElementById("deal");
	//      	                                    var rowCount = table.rows.length;

	//      	                                    for(var i=0; i<rowCount; i++) {
	//      	                                        var row = table.rows[i];
	//      	                                        var chkbox = row.cells[0].childNodes[0];
	//      	                                        if(null != chkbox && true == chkbox.checked) {
	//      	                                            table.deleteRow(i);
	//      	                                            rowCount--;
	//      	                                            i--;
	//      	                                        }


	//      	                                    }
	//      	                                    }catch(e) {
	//      	                                        alert(e);
	//      	                                    }
	//      	                         		},
	//      	                                "fnClick": function( nButton, oConfig ) {
	//      	                            	var oTable = $('#deal').dataTable();
	//      	                                 var sData =fnGetSelected(oTable);

	//      	                                 if (sData!='')
	//      	                                 {
	//      	                                     if (confirm ('Do you really want to delete?')){
	//      	                                     $.ajax( {

	//      	                                         "url": oConfig.sAjaxUrl,
	//      	                                         "data": 
	//      	                                         {
	//      	                                             "field": "rid",
	//      	                                             "value": sData,
	//      	                                             "table": "renteddeal"


	//      	                                         }
	//      	                                         ,

	//      	                                         "success": oConfig.fnAjaxComplete,
	//      	                                         "dataType": "json",
	//      	                                         "type": "POST",
	//      	                                         "cache": false,
	//      	                                         "error": function () {
	//      	                                             alert( "Error detected when sending table data to server" );
	//      	                                         }
	//      	                                     } );

	//      	                             		}

	//      	                                  oTable.fnDraw();


	//      	                                 }
	//      	                                 else
	//      	                                 alert ('Select a row to Delete');






	//      	                            }
	//      	                            },
	//      	                            {
	//      	                                "sExtends": "text",
	//      	                                "sButtonText": "Refresh",
	//      	                                "sButtonClass": "DTTT_button_refresh",
	//      	                                "sButtonClassHover": "DTTT_button_refresh_hover",
	//      	                                "fnClick": function ( nButton, oConfig, oFlash ) {

	//      	                            	document.location.reload(true);

	//      	                                }

	//      	                            }


	//      	                        ]
	//      	                        },

	//      	        "aaSorting": [[ 12, "desc" ]],
	//      			"aoColumnDefs": [ 
	//      	            { "bSortable": false, "aTargets": [0,13 ] }
	//      	        ] } );		
	//      			});



	//    $(document).ready(function(){
	//                        $('#own tr td').each(function(){



	//                                if($.trim($(this).html()) == 'Yes'|| $.trim($(this).html()) == 'Y')  {


	//                                                                 $(this).closest('tr').css('background-color','#FEE7DE');
	//                                                                }



	//                                                                }); 
	//                        });

	// $(document).ready(function(){
	//                        $('#deal tr td').each(function(){

	//                                if($.trim($(this).html()) == 'Yes'|| $.trim($(this).html()) == 'Y')  {


	//                                                                 $(this).closest('tr').css('background-color','#FEE7DE');
	//                                                                }
	//                                                                }); 
	//                        });
</script>
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<?php

				list($bet, $que) = querybuild('rentedown', 'renteddeal');

				tablebuildalt('rentedown', $bet);
				tablebuildalt('renteddeal', $que);


				?>
			</div>
		</div>
	</div>
</div>