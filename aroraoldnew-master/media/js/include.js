//  $(document).ready(function(){
//     $("#demoForm").validate();
//   });
// prepare the form when the DOM is ready
$(document).ready(function() {
  var options = {
    target: "#output1", // target element(s) to be updated with server response
    beforeSubmit: showRequest, // pre-submit callback
    success: showResponse, // post-submit callback

    // other available options:
    //url:       url         // override for form's 'action' attribute
    type: "post", // 'get' or 'post', override for form's 'method' attribute
    //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
    //clearForm: true        // clear all form fields after successful submit
    resetForm: true // reset the form after successful submit

    // $.ajax options can be used here too, for example:
    //timeout:   3000
  };

  // bind form using 'ajaxForm'
  $("#demoForm").ajaxForm(options);
});

// pre-submit callback
function showRequest(formData, jqForm, options) {
  // formData is an array; here we use $.param to convert it to a string to display it
  // but the form plugin does this for you automatically when it submits the data
  var queryString = $.param(formData);

  // jqForm is a jQuery object encapsulating the form element.  To access the
  // DOM element for the form do this:
  // var formElement = jqForm[0];

  //alert('About to submit: \n\n' + queryString);

  // here we could return false to prevent the form from being submitted;
  // returning anything other than false will allow the form submit to continue
  return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form) {
  // for normal html responses, the first argument to the success callback
  // is the XMLHttpRequest object's responseText property

  // if the ajaxForm method was passed an Options Object with the dataType
  // property set to 'xml' then the first argument to the success callback
  // is the XMLHttpRequest object's responseXML property

  // if the ajaxForm method was passed an Options Object with the dataType
  // property set to 'json' then the first argument to the success callback
  // is the json data object returned by the server

  //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
  //'\n\nThe output div should have already been updated with the responseText.');
  setTimeout(function() {
    window.close();
  }, 2000);
}

function chg() {
  f1 = document.getElementById("rent").value;
  q1 = document.getElementById("area").value;
  v1 = document.getElementById("return").value;
  if (f1 != "" && q1 != "" && v1 != "") {
    //does math on the values of field 1 and 2
    tot = f1 * q1;
    val = (tot * 12 * 100) / v1;
    val = Math.round(val);
    //alert(tot);
    //makes the value of outputfield = field1 + field2
    document.getElementById("output").value = tot;
    document.getElementById("outputval").value = val;
  }
}

// $(document).ready(function() {
// $('#sector').change(function() {

// $("#plotno").autocomplete("autocomplot.php?table=maplocation",

// {
// width: 260,
// matchContains: true,
// mustMatch: true,
// //minChars: 0,
// //multiple: true,
// //highlight: false,
// //multipleSeparator: ",",
// selectFirst: false,
// cacheLength:1,
// extraParams: {
// sectorno: function() { return $("#sector").val(); }
// ,
// plotno: function() { return $("#plotno").val();
// }
// }
// }
// );
// });

// });

$(document).ready(function() {
  $("#sectorno").autocomplete(
    "autocomplot.php?table=maplocation",

    {
      width: 260,
      matchContains: true,
      //mustMatch: true,
      //minChars: 0,
      //multiple: true,
      //highlight: false,
      //multipleSeparator: ",",
      cacheLength: 1,
      selectFirst: false,
      extraParams: {
        sectorno: function() {
          return $("#sectorno").val();
        }
      }
    }
  );
});
$(document).ready(function() {
  $("#plotno").autocomplete(
    "autocomplot.php?table=maplocation",

    {
      width: 260,
      matchContains: true,
      //mustMatch: true,
      //minChars: 0,
      //multiple: true,
      //highlight: false,
      //multipleSeparator: ",",
      selectFirst: false,
      cacheLength: 1,
      extraParams: {
        sectorno: function() {
          return $("#sectorno").val();
        },
        plotno: function() {
          return $("#plotno").val();
        }
      }
    }
  );
});
// $(document).ready(function() {
// $('#plotno').change(function() {

// $("#road").autocomplete("autocomplot.php?table=maplocation",

// {
// width: 260,
// matchContains: true,
// mustMatch: true,
// //minChars: 0,
// //multiple: true,
// //highlight: false,
// //multipleSeparator: ",",
// selectFirst: false,
// cacheLength:1,
// extraParams: {
// sectorno: function() { return $("#sectorno").val();
// },
// plotno: function() { return $("#plotno").val();
// }
// }
// }
// );
// });

// });
// $(document).ready(function() {

// $('#sectorno').change(function() {
// var hexvarval = '';

// $('#plotno').val(hexvarval);
// });
// });

function showUser(str, sec) {
  if (str == "") {
    document.getElementById("road").innerHTML = "";
    return;
  }

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      //alert (xmlhttp.responseText);
      document.getElementById("road").innerHTML = xmlhttp.responseText;
    }
  };

  xmlhttp.open(
    "GET",
    "autocomplot.php?finplotno=" +
      str +
      "&finsectorno=" +
      sec +
      "&q=1&table=maplocation",
    true
  );
  xmlhttp.send();
}

// Popup window code
function newPopup(url) {
  popupWindow = window.open(
    url,
    "popUpWindow",
    "height=900,width=900,left=10,top=10,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes"
  );
  if (window.focus) {
    popupWindow.focus();
  }
}

//var whosChanged = null;
// 	var count=0;
// 	function changeMe(el)
// 	{
// 		el.class ="fa fa-sync";
// 		el.style.color = "#333";

// 	if (whosChanged != null)
// 	{
// 	whosChanged.style.backgroundColor = ""
// 	whosChanged.style.color = ""
// 	}
// 	whosChanged = el;
//  alert(whosChanged);
// 	}

$(document).ready(function() {
  $("a").on("click", "#changeMe", function() {
    $(this).attr("class", "fa fa-flag text-danger");
  });
  $("#find_id_submit").click(function() {
    if ($("#find_id_input").val() == "") {
      return false;
    }

    var input = $("#find_id_input").val();
    var table = input.split(":")[0];
    var id = input.split(":")[1];
    //$("#output_find").dialog();

    $.ajax({
      type: "POST",
      url: "find_id_ajax.php",
      dataType: "html",
      data: { table: table, id: id }
    }).done(function(data) {
      $("#output_find").html(data);
      $("#prop-modal").modal("show");

      //$("#output_find").dialog();
      //$('div.ui-dialog-titlebar').css('height', '2em');
      // $(".ui-dialog-titlebar").hide();
    });
  });
  //	$("a[rel*=leanModal]").leanModal();
});
$(document).ready(function() {
  $("#own").on("click", "#requestAccess", function(e) {
    var table = $(this).data("table");
    var rid = $(this).data("rid");
    var operation = $(this).data("operation");

    Swal.fire({
      title: "Request access?",
      text: "Are you sure you want to request access",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirm"
    }).then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "access.php",
          dataType: "text",
          data: { table: table, rid: rid, operation: operation }
        }).done(function(data) {
          Swal.fire(
            "Request sent!",
            "The request for access has been sent",
            "success"
          );
        });
      }
    });
  });
  $("#deal").on("click", "#requestAccess", function(e) {
    //alert ("do you want to request access ?");
    var table = $(this).data("table");
    var rid = $(this).data("rid");
    var operation = $(this).data("operation");

    Swal.fire({
      title: "Request access?",
      text: "Are you sure you want to request access",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirm"
    }).then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "access.php",
          dataType: "text",
          data: { table: table, rid: rid, operation: operation }
        }).done(function(data) {
          Swal.fire(
            "Request sent!",
            "The request for access has been sent",
            "success"
          );
        });
      }
    });
  });
  $("#accessTable").on("click", "#approveRequest", function(e) {
    // alert ("Do you want to Approve the access ?");

    var rid = $(this).data("rid");
    var operation = $(this).data("operation");

    Swal.fire({
      title: "Approve Access?",
      text: "Are you sure you want to approve access",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirm"
    }).then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "access.php",
          dataType: "text",
          data: { rid: rid, operation: operation }
        }).done(function(data) {
          Swal.fire({
            title: "Approved",
            text: "The request for access has been approved",
            type: "success"
          }).then(result => {
            location.reload();
          });
        });
      }
    });
  });
  $("#accessTable").on("click", "#declineRequest", function(e) {
    //	alert ("Do you want to decline the access request ?");

    var rid = $(this).data("rid");
    var operation = $(this).data("operation");
    Swal.fire({
      title: "Decline request ?",
      text: "Do you want to decline the access request ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirm"
    }).then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "access.php",
          dataType: "text",
          data: { rid: rid, operation: operation }
        }).done(function(data) {
          Swal.fire({
            title: "Declined",
            text: "The request for has been declined",
            type: "success"
          }).then(result => {
            location.reload();
          });
        });
      }
    });
  });
  $("#approvedTable").on("click", "#declineRequest", function(e) {
    //	alert ("Do you want to revoke access request ?");

    var rid = $(this).data("rid");
    var operation = $(this).data("operation");

    Swal.fire({
      title: "Revoke access ?",
      text: "Do you want to revoke access request ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirm"
    }).then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "access.php",
          dataType: "text",
          data: { rid: rid, operation: operation }
        }).done(function(data) {
          Swal.fire({
            title: "Revoked",
            text: "The access has been revoked now",
            type: "success"
          }).then(result => {
            location.reload();
          });
        });
      }
    });
  });
});
$(document).ready(function() {
  $("#sectorno").typeahead({
    minLength: 2,
    loadingAnimation: true,
    source: function(query, result) {
      $.ajax({
        url: "autocomplot.php?table=maplocation&sectorno=sectorno",
        data: "q=" + query,
        dataType: "json",
        type: "POST",
        success: function(data) {
          result(
            $.map(data, function(item) {
              return item;
            })
          );
        }
      });
    }
  });
  $("#sectorno1").typeahead({
    minLength: 2,
    source: function(query, result) {
      $.ajax({
        url: "autocomplot.php?table=maplocation&sectorno=sectorno",
        data: "q=" + query,
        dataType: "json",
        type: "POST",
        success: function(data) {
          result(
            $.map(data, function(item) {
              return item;
            })
          );
        }
      });
    }
  });
  $("#sectorno2").typeahead({
    minLength: 2,
    source: function(query, result) {
      $.ajax({
        url: "autocomplot.php?table=maplocation&sectorno=sectorno",
        data: "q=" + query,
        dataType: "json",
        type: "POST",
        success: function(data) {
          result(
            $.map(data, function(item) {
              return item;
            })
          );
        }
      });
    }
  });
  $("#sectorno3").typeahead({
    minLength: 2,
    source: function(query, result) {
      $.ajax({
        url: "autocomplot.php?table=maplocation&sectorno=sectorno",
        data: "q=" + query,
        dataType: "json",
        type: "POST",
        success: function(data) {
          result(
            $.map(data, function(item) {
              return item;
            })
          );
        }
      });
    }
  });

  $("#plotno").typeahead({
    minLength: 2,
    source: function(query, result) {
      var sectorno = $("#sectorno").val();

      $.ajax({
        url:
          "autocomplot.php?table=maplocation&plotno=plotno&sectorno=" +
          sectorno,
        data: "q=" + query,
        dataType: "json",
        type: "POST",
        success: function(data) {
          result(
            $.map(data, function(item) {
              return item;
            })
          );
        }
      });
    }
  });
});

$(document).ready(function() {
  var val = $("select#sector").val();
  $(".sector_fetch").val(val);
  $("select#sector").change(function() {
    var value = $(this).val();
    $(".sector_fetch").val(value);
  });
});

$(document).ready(function() {
  $("#areaselectbtn").click(function() {
    if ($("#sectorno").val() == "") {
      return false;
    }
    var sector = $("#sectorno").val();
    if ($("#sectorno1").val() != "") {
      sector += "," + $("#sectorno1").val();
    }
    if ($("#sectorno2").val() != "") {
      sector += "," + $("#sectorno2").val();
    }
    if ($("#sectorno3").val() != "") {
      sector += "," + $("#sectorno3").val();
    }

    $.ajax({
      url: "areaselector.php",
      data: "sector=" + sector,
      dataType: "html",
      type: "POST",
      success: function(data) {
        // result($.map(data, function (item) {
        // 		return item;
        // }));
        $("#areaselect").html(data);
      }
    });
  });
  $("#sectorno,#sectorno1,#sectorno2,#sectorno3").on("change", function() {
    $("#areaselect").html("<option value>Refresh the data</option>");
  });
});

$(document).ready(function() {
  var table = $("#table").val();
  $("#locality").typeahead({
    minLength: 2,
    source: function(query, result) {
      $.ajax({
        url: "autocomp.php?table=" + table + "& fld=locality",
        data: "q=" + query,
        dataType: "json",
        type: "POST",
        success: function(data) {
          result(
            $.map(data, function(item) {
              return item;
            })
          );
        }
      });
    }
  });
  $("input").each(function() {
    if ($(this).hasClass("required")) {
      $(this).prop("required", true);
    }
  });
  //
});
