<?php
include_once "header.php";
include_once "model.php";
include_once "config.php";
include_once "dbconnect.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="media/css/jquery-ui-1.8.17.custom.css" />
	<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css" />
	<style type="text/css">
		* {
			font-family: Cambria;
			font-size: 15px;

		}

		#demoWrapper {
			padding: 1em;
			width: 500px;
			border: 2px solid #ABBEBE;

		}

		#fieldWrapper {}

		#demoNavigation {
			margin-top: 0.5em;
			margin-right: 1em;
			text-align: right;
		}

		#data {
			font-size: 0.7em;

		}

		input {
			margin-right: 0.1em;
			margin-bottom: 0.5em;

		}

		.input_field_25em {
			width: 2.5em;
		}

		.form-control {

			width: 3em;
		}

		.input_field_35em {
			width: 3.5em;
		}

		.form-control {
			width: 12em;
		}

		.highlight {

			border: 1px solid #aed0ea;
			background-color: #d7ebf9;
			width: 12em;
			margin-left: 5.1em;
			padding-top: 0.8em;
		}

		.highlighth1 {

			border: 1px solid #aed0ea;
			background-color: #d7ebf9;
			width: 12em;
			margin-right: 5.1em;
			padding-top: 0.8em;
			padding-bottom: 0.8em;
			padding-right: 0.8em;
			padding-left: 0.8em;
		}

		.info {
			color: #00529B;
			background-color: #EEEE00;
			text-align: center;
			border: 1px dotted #aed0ea;


		}

		label {
			margin-bottom: 0.2em;
			font-weight: normal;
			font-size: 0.9em;
			font-family: Cambria;


		}

		label.error {
			color: red;
			font-size: 0.8em;
			margin-left: 0.5em;
		}

		.step span {
			float: right;
			font-weight: bold;
			padding-right: 0.8em;
			margin-right: 10em;
		}

		.navigation_button {
			width: 70px;
		}

		#data {
			overflow: auto;
		}
	</style>
</head>

<body>
	<script type="text/javascript" language="javascript" src="media/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.validate.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/bbq.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery-ui-1.8.17.custom.min.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.form.js"></script>
	<script type='text/javascript' src='jquery-autocomplete/jquery.autocomplete.js'></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#demoForm").validate();
		});
		// prepare the form when the DOM is ready 
		$(document).ready(function() {
			var options = {
				target: '#output1', // target element(s) to be updated with server response 
				beforeSubmit: showRequest, // pre-submit callback 
				success: showResponse, // post-submit callback 

				// other available options: 
				//url:       url         // override for form's 'action' attribute 
				type: 'post', // 'get' or 'post', override for form's 'method' attribute 
				//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
				//clearForm: true        // clear all form fields after successful submit 
				resetForm: true // reset the form after successful submit 

				// $.ajax options can be used here too, for example: 
				//timeout:   3000 
			};

			// bind form using 'ajaxForm' 
			$('#demoForm').ajaxForm(options);
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
		}
	</script>


	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
			<div id="fieldWrapper">
				<span class="step" id="first">



					<span class="highlighth1">Insert a New Plot Sector Record</span><br />
					<input type="hidden" name="table" id="name" value="links" class="required" rel="0" /><br /><br /><br />
					<label for="Sector">*Sector(seperated by comma eg PHASE1,PHASE2,PHASE3)</label><br />
					<input class="form-control   sector required" type="text" name="sector" id="sector" value="" /><br />
					<label for="size">*Name</label><br />
					<input class="form-control   name required" type="text" name="name" value="" /><br />
					<label for="build">*Plot Sizes (seperated by comma eg 30M,40M,50M)</label><br />
					<input class="form-control   filter required" type="text" name="filter" value="" /><br />



				</span>

				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />
				</div>
		</form>
		<hr />

		<p id="data"></p>
	</div>

	</div>