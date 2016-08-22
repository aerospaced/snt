<link rel="stylesheet" type="text/css" href="include/flyout.css" />	
<link rel="stylesheet" type="text/css" href="include/style.css" />
<link rel="stylesheet" type="text/css" href="include/navStyle.css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js?ver=1.4.4'></script>

<script type='text/javascript' >
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

	$(document).ready(function($) {
		//Menu animation						
		$('#navList ul').css({display: "none"}); //Fix Opera
  		
		$('#navList li').hover(function() {  
		$(this).find('a').stop().animate({'width' : "250"});
   		$(this).find('ul:first').css({visibility : "visible", display : "none"}).show(600);
    
  		}, function() {
    		$(this).find('ul:first').css({visibility : "hidden"}).hide(600);
   			$(this).find('a').stop().animate({'width' : "200"});
			});
		
	});
</script>		
			
			
<div id="container">
  <div id="nav">
    <ul id="navList">
	    <li><a href="./" >Home</a>
		<li><a href="parsePlaceXML.php">Parse XML File<br />
			<span class="byline">Grab Listings from XML file</span></a> 
		<li><a href="logs.txt">View Errors<br />
			<span class="byline">See what went wrong</span></a>
    </ul>
  </div>
</div>