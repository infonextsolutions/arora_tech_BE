/* Highlight row in list view based on value in a Yes/No-column
 * ---------------------------------------------
 * Created by Alexander Bautz
 * alexander.bautz@gmail.com
 * http://sharepointjavascript.wordpress.com
 * v1.1
 * LastMod: 22.04.2010
 * ---------------------------------------------
 * Include reference to jquery - http://jquery.com
 * ---------------------------------------------
 * Call from a CEWP below the list view with this code:
	<script type="text/javascript" src="/test/English/Javascript/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="/test/English/Javascript/HighlightRowByYesNoColumn.js"></script>
	<script type="text/javascript">
		highlightRowByYesNoField('Yes','YesNo','#FFD700','Highlighted rows awaiting action...');
	</script>
*/

function highlightRowByYesNoField(valToTriggerHighlighting,FieldInternalName,highlightColor,mouseOverOnRow){
	if(typeof(valToTriggerHighlighting)!='undefined'){
		valToFind = valToTriggerHighlighting;
	}
	if(typeof(FieldInternalName)!='undefined'){
		fin = FieldInternalName;
	}
	if(typeof(highlightColor)!='undefined'){
		bgColor = highlightColor;
	}
	if(typeof(mouseOverOnRow)!='undefined'){
		mouseOver = mouseOverOnRow;
	}
	
	$("table.ms-listviewtable").each(function(){
		var thisListView = $(this);
		// Find colindex of YesNo-field
		thisListView.find(".ms-viewheadertr th").each(function(){
			if($(this).text()==fin){
				colIndex = $(this).attr('cellIndex');		
			}
		});
		
		// Loop trough all rows and highlight matched rows
		thisListView.find("tbody:not([id^='aggr']) tr:has(td.ms-vb2)[highlighted!='1']").each(function(){			
			var rowVal = $(this).find("td[cellIndex='"+colIndex+"']").text();
			if(rowVal==valToFind){
				$(this).attr({'highlighted':'1','title':mouseOver}).css({'background-color':bgColor});		
			}		
		});
	});
}

// Attaches a call to the function to the "expand grouped elements function" for it to function in grouped listview's
function ExpGroupRenderData(htmlToRender, groupName, isLoaded){
	var tbody=document.getElementById("tbod"+groupName+"_");
	var wrapDiv=document.createElement("DIV");
	wrapDiv.innerHTML="<table><TBODY id=\"tbod"+groupName+"_\" isLoaded=\""+isLoaded+"\">"+htmlToRender+"</TBODY></TABLE>";
	tbody.parentNode.replaceChild(wrapDiv.firstChild.firstChild,tbody);
highlightRowByYesNoField();
}
