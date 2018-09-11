<html>
<head> 
  <script>
  var numLinesAdded = 1;
  
  function focusNext(tBox){
    var name = tBox.name;
    var index = name.substring(name.indexOf('_')+1);
    var brother = eval("document.all.txt2_" + index);    
    var l = tBox.value.length;    
    if (l >= tBox.maxLength){
      brother.focus();
    }
  }
  
	function generateRow() {
	var d=document.getElementById("div");
	
		if(numLinesAdded<=10){
	d.innerHTML+=""+ numLinesAdded +"<input type='text' maxlength='5' name='other_author" + numLinesAdded + "' onkeypress='focusNext(this)' ><br>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
		}
	numLinesAdded++;
	} 
</script>  
</head>
 
<body>
<form>
<div id="div"></div>
<input type="button" value="Add" onClick="generateRow()"/>
<input type="submit">



<input name="" type="text"><input name="" type="text">
</form>
</body>
</html>