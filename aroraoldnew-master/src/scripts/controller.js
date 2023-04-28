$(document).ready(function() {
    var oTable = $('#own').dataTable({
        
      
        select: {
    style: 'multi'
        },
          "scrollY": "30vh",
          "order": [],
        "bScrollCollapse": true,
        "paging": false,
        "scrollX": true,
        
        "autoWidth": false,
        //  dom: "<'row'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'p>>" +         "<'row'<'col-sm-12'rit>>" ,
        dom: "<'row my-2'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
        "<'row'<'col-sm-12'rit>>" ,
       
        
        // 'iTlfr<"clear">tpL'
        buttons: [
            'selectAll',
            'selectNone',
            // 'csv',
            // 'print',
            {
        text: 'Delete',
        action: function () {
                            var sData = new Array();
                            var table = null;
                            this.rows('.selected').every( function ( rowIdx, tableLoop, rowLoop ) {
                                var data = this.data();
                                var split = data[0].split(':');
                                table = split[1];
                                sData.push (split[0]);
                        
                           
    
            } );

            if (sData != '') {
                                                Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.value) {
                                                
                                $.ajax({

                                    "url": "Deleteflooralt.php",
                                    "data": {
                                        "field": "rid",
                                        "value": sData,
                                        "table": table

                                    },

                                    "success":  function (data) {
                                    if(data=='true')
                                         {
                                          
                                             Swal.fire(
                                                        'Deleted!',
                                                        'The records have been deleted.',
                                                        'success');
                                                              //	oTable.fnDraw();
                                
                                         }
                                         else
                                         {
                                            Swal.fire(
                                                        'Error!',
                                                        'Either you are not authorised to delete this or something is broken.',
                                                        'error');

                                         }

                                                        },
                                
                                    "type": "POST",
                                    "cache": false,
                                    "error": function(data) {
                                       // alert('An error is found');
                                    }
                                });

                                this .rows( '.selected' ).remove().draw();
                                                }
                                            
                                            });
                        } else
                            alert('Select a row to Delete');

        }
    
    },
            
                
        ],
    
    });

    
    
});




$(document).ready(function() {
    var oTable = $('#deal').dataTable({

        select: {
    style: 'multi'
},
        "sScrollY": "30vh",
        "order": [],
        "scrollX": true,
        "bScrollCollapse": true,
        "paging": false,
        "bAutoWidth": false,
         dom: "<'row my-2'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'p>>" +         "<'row'<'col-sm-12'rit>>" ,
        
        // 'iTlfr<"clear">tpL'
        buttons: [
            'selectAll',
            'selectNone',
            // 'csv',
            // 'print',
            {
        text: 'Delete',
        action: function () {
            var sData = new Array();
                            var table = null;
                            this.rows('.selected').every( function ( rowIdx, tableLoop, rowLoop ) {
                                var data = this.data();
                                var split = data[0].split(':');
                                table = split[1];
                                sData.push (split[0]);
    
            } );

            if (sData != '') {
                                                Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.value) {
                                                
                                $.ajax({

                                    "url": "Deleteflooralt.php",
                                    "data": {
                                        "field": "rid",
                                        "value": sData,
                                        "table": table

                                    },

                                    "success":  function (data) {
                                    if(data=='true')
                                         {
                                             Swal.fire(
                                                        'Deleted!',
                                                        'The records have been deleted.',
                                                        'success');
                                                             //	oTable.fnDraw();
                       
                                         }
                                         else
                                         {
                                            Swal.fire(
                                                        'Error!',
                                                        'Either you are not authorised to delete this or something is broken.',
                                                        'error');

                                         }

                                                        },
                                
                                    "type": "POST",
                                    "cache": false,
                                    "error": function(data) {
                                        alert('An error is found');
                                    }
                                });
                                this .rows( '.selected' ).remove().draw();

                       
                                                }
                                            
                                            });
                        } else
                            alert('Select a row to Delete');

        }
    
    },
            
                
        ],
    
    });

    
    
});
$(document).ready(function() {
    var oTable = $('#map').dataTable({

        select: {
    style: 'multi'
},
        "sScrollY": "30vh",
        "bScrollCollapse": true,
       // "bPaginate": true,
       "paging": false,
        "bAutoWidth": false,
         dom: "<'row my-2'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'p>>" +         "<'row'<'col-sm-12'rit>>" ,
        
        // 'iTlfr<"clear">tpL'
        buttons: [
            'selectAll',
            'selectNone',
            // 'csv',
            // 'print',
            {
        text: 'Delete',
        action: function () {
         
                            var sData = new Array();
                            this.rows('.selected').every( function ( rowIdx, tableLoop, rowLoop ) {
                                var data = this.data();
                            sData.push (data[0]);
    
            } );

            if (sData != '') {
                                                Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.value) {
                                                
                                $.ajax({

                                    "url": "Deleteflooralt.php",
                                    "data": {
                                        "field": "rid",
                                        "value": sData,
                                        "table": "maplocation"

                                    },

                                    "success":  function (data) {
                                    if(data=='true')
                                         {
                                             Swal.fire(
                                                        'Deleted!',
                                                        'The records have been deleted.',
                                                        'success');
                                                         //	oTable.fnDraw();
                      
                                         }
                                         else
                                         {
                                            Swal.fire(
                                                        'Error!',
                                                        'An error is encountered.',
                                                        'error');

                                         }

                                                        },
                                
                                    "type": "POST",
                                    "cache": false,
                                    "error": function(data) {
                                        alert('An error is found');
                                    }
                                });
                                this .rows( '.selected' ).remove().draw();

                           
                                                }
                                            
                                            });
                        } else
                            alert('Select a row to Delete');

        }
    
    },
            
                
        ],
    
    });

    
    
});
$(document).ready(function() {
    var oTable = $('#huda').dataTable({

        select: {
    style: 'multi'
},
        "sScrollY": "30vh",
        "bScrollCollapse": true,
       //"bPaginate": true,
       "paging": false,
        "bAutoWidth": false,
         dom: "<'row my-2'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'p>>" +         "<'row'<'col-sm-12'rit>>" ,
        
        // 'iTlfr<"clear">tpL'
        buttons: [
            'selectAll',
            'selectNone',
            // 'csv',
            // 'print',
            {
        text: 'Delete',
        action: function () {
            var table = null;
                            var sData = new Array();
                            this.rows('.selected').every( function ( rowIdx, tableLoop, rowLoop ) {
                                var data = this.data();
                            sData.push (data[0]);
    
            } );

            if (sData != '') {
                                                Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.value) {
                                                
                                $.ajax({

                                    "url": "Deleteflooralt.php",
                                    "data": {
                                        "field": "rid",
                                        "value": sData,
                                        "table": "hudalist"

                                    },

                                    "success":  function (data) {
                                    if(data=='true')
                                         {
                                             Swal.fire(
                                                        'Deleted!',
                                                        'The records have been deleted.',
                                                        'success');
                                                           //	oTable.fnDraw();
                    
                                         }
                                         else
                                         {
                                            Swal.fire(
                                                        'Error!',
                                                        'An error is encountered.',
                                                        'error');

                                         }

                                                        },
                                
                                    "type": "POST",
                                    "cache": false,
                                    "error": function(data) {
                                        alert('An error is found');
                                    }
                                });
                                this .rows( '.selected' ).remove().draw();

                         
                                                }
                                            
                                            });
                        } else
                            alert('Select a row to Delete');

        }
    
    },
            
                
        ],
    
    });

	// Dropdown Slide Animation
	// $('.dropdown').on('show.bs.dropdown', function(e){
	// 	$(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
	// });
	// $('.dropdown').on('hide.bs.dropdown', function(e){
	// 	$(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
	// });

	// sidebar menu icon
	$('div.menu-icon').on('click', function(){
       
            $(this).toggleClass('open');
            $('.left-side-bar').toggleClass('open');
        });
    
        var w = $(window).width();
        $(document).on('touchstart click', function(e){
            if($(e.target).parents('.left-side-bar').length == 0 && !$(e.target).is('.menu-icon, .menu-icon span'))
            {
                $('.left-side-bar').removeClass('open');
                $('.menu-icon').removeClass('open');
            };
        });
        $(window).on('resize', function() {
            var w = $(window).width();
            if ($(window).width() > 1200) {
                $('.left-side-bar').removeClass('open');
                $('.menu-icon').removeClass('open');
            }
        });
    
    
        // sidebar menu Active Class
        $('#accordion-menu').each(function(){
            var vars = window.location.href.split("/").pop();
            $(this).find('a[href="'+vars+'"]').addClass('active');
        });

        
    
    
    
    
});
// $(document).ready(function() {
//     $('#own tr td').each(function() {



//         if ($.trim($(this).html()) == 'Yes' || $.trim($(this).html()) == 'Y') {


//             $(this).closest('tr').addClass('table-success');
//         }



//     });
// });

// $(document).ready(function() {
//     $('#deal tr td').each(function() {

//         if ($.trim($(this).html()) == 'Yes' || $.trim($(this).html()) == 'Y') {


//             $(this).closest('tr').addClass('table-success');
//         }
//     });
// });
