//Apycom.com DHTML-Tuner StyleNames
//ItemStyles
//Purchase Style
//Separator Style
//Style Three
//End of ItemStyles
//SmStyles
//Submenu Style 2
//End of SmStyles
//End of StyleNames

var blankImage="img/blank.gif";
var isHorizontal=1;
var menuWidth="400";
var absolutePos=1;
var posX=650;
var posY=200;
var floatable=1;
var floatIterations=0;
var movable=0;
var moveCursor="default";
var moveImage="";
var moveWidth=0;
var moveHeight=0;
var fontStyle="normal 8pt Verdana";
var fontColor=["#FFFFFF","#FFFFFF"];
var fontDecoration=["none","none"];
var itemBackColor=["#Ffffff","#ffffff"];
var itemBorderWidth=2;
var itemAlign="left";
var itemBorderColor=["#4C7CC1","#4C7CC1"];
var itemBorderStyle=["solid","solid"];
var itemBackImage=["",""];
var itemSpacing=0;
var itemPadding=2;
var itemCursor="hand";
var itemTarget="_self";
var iconTopWidth=0;
var iconTopHeight=0;
var iconWidth=0;
var iconHeight=0;
var menuBackImage="";
var menuBackColor="#4C7CC1";
var menuBorderColor="#FFffff #4C7CC1 #4C7CC1 #4C7CC1 ";
var menuBorderStyle=["outset"];
var menuBorderWidth=3;
var subMenuAlign="";
var transparency=100;
var transition=5;
var transDuration=400;
var shadowColor="#4C7CC1";
var shadowLen=3;
var arrowImageMain=["",""];
var arrowImageSub=["img/arrow1_o.gif","img/arrow1_o.gif"];
var arrowWidth=6;
var arrowHeight=5;
var separatorImage="img/sep.gif";
var separatorWidth="100%";
var separatorHeight="1";
var separatorAlignment="";
var separatorVImage="";
var separatorVWidth="0";
var separatorVHeight="100%";
var statusString="link";
var pressedItem=1;


var itemStyles = [
   ["fontStyle=bold 8pt Tahoma","itemBackColor=#FF7777,#A40000","itemBorderColor=#FF7777,#A40000",],
   ["itemBackColor=#FF2C06,#FF2C06",],
   ["fontColor=#000000,#FFFFFF","itemBackColor=#FFE737,#B76900","itemBorderColor=#FFE737,#B76900",],
];

var menuStyles = [
   ["menuBorderColor=#B76900",],
];

var menuItems = [
   ["Home","index.php"],
   ["Search","index.php"],
  // ["|Home","http://dhtml-menu.com","","","",,,],
  // ["||Examples","http://dhtml-menu.com/examples/dhtml-menu-ex1.html","","","",,,],
   //["||How to Setup","http://dhtml-menu.com/indexex.html#set","","","",,,],
   //["||Parameters","http://dhtml-menu.com/params.html","","","",,,],
   //["|Purchase","http://dhtml-menu.com/order.html","","","",,"0",],
  // ["|Download","http://www.apycom.com/download.html","","","",,,],
   ["Add new","add.php"],
   //["Our Products","","","","",,,],
   //["|Java menus","","","","",,,],
   //["||Drop Down Menus","http://www.apycom.com/xp-drop-down-menu/","","","",,,],
   //["||Animated Menus","http://www.apycom.com/animated-buttons/","","","",,,],
   //["||Website Buttons","http://www.apycom.com/website-buttons/","","","",,,],
   //["||Navigation Tabs","http://www.apycom.com/navigation-bar-tabs/","","","",,,],
   //["||Live Examples","http://www.apycom.com/indexex.html","","","",,,],
   //["||Sreenshots","http://www.apycom.com/shots/xpdd.html","","","",,,],
   //["||-","","","","",,"1",],
   //["||Purchase","http://www.apycom.com/order.html","","","",,"0",],
   //["||Download","http://www.apycom.com/download.html","","","",,,],
   //["|Web buttons","http://www.xp-web-buttons.com","","","",,,],
   //["|DBF Viewer/Editor","http://www.dbfview.com","","","",,,],
   //["|-","","","","",,"1",],
   //["|More Products","","","","",,"2",],
   //["||Product 1","testlink.html","","","",,"2","0"],
   //["|||Documentation","testlink.html","","","",,"2",],
   //["|||How to Setup","testlink.html","","","",,"2",],
   //["||Product 2","testlink.html","","","",,"2",],
   //["||Product 3","testlink.html","","","",,"2",],
   //["|||Documentation","testlink.html","","","",,"2",],
   //["|||How to Setup","testlink.html","","","",,"2",],
   //["||Product 4","testlink.html","","","",,"2",],
   ["Logout","logout.php"],
];

apy_init();
/*original above
var menuItems = [
   ["Home","http://www.apycom.com","","","",,,],
   ["Search","","","","",,,],
   ["|Home","http://dhtml-menu.com","","","",,,],
   ["||Examples","http://dhtml-menu.com/examples/dhtml-menu-ex1.html","","","",,,],
   ["||How to Setup","http://dhtml-menu.com/indexex.html#set","","","",,,],
   ["||Parameters","http://dhtml-menu.com/params.html","","","",,,],
   //["|Purchase","http://dhtml-menu.com/order.html","","","",,"0",],
  // ["|Download","http://www.apycom.com/download.html","","","",,,],
   ["Administrator","","","","",,,],
   //["Our Products","","","","",,,],
   ["|Java menus","","","","",,,],
   ["||Drop Down Menus","http://www.apycom.com/xp-drop-down-menu/","","","",,,],
   ["||Animated Menus","http://www.apycom.com/animated-buttons/","","","",,,],
   ["||Website Buttons","http://www.apycom.com/website-buttons/","","","",,,],
   ["||Navigation Tabs","http://www.apycom.com/navigation-bar-tabs/","","","",,,],
   ["||Live Examples","http://www.apycom.com/indexex.html","","","",,,],
   ["||Sreenshots","http://www.apycom.com/shots/xpdd.html","","","",,,],
   ["||-","","","","",,"1",],
   ["||Purchase","http://www.apycom.com/order.html","","","",,"0",],
   ["||Download","http://www.apycom.com/download.html","","","",,,],
   ["|Web buttons","http://www.xp-web-buttons.com","","","",,,],
   ["|DBF Viewer/Editor","http://www.dbfview.com","","","",,,],
   ["|-","","","","",,"1",],
   ["|More Products","","","","",,"2",],
   ["||Product 1","testlink.html","","","",,"2","0"],
   ["|||Documentation","testlink.html","","","",,"2",],
   ["|||How to Setup","testlink.html","","","",,"2",],
   ["||Product 2","testlink.html","","","",,"2",],
   ["||Product 3","testlink.html","","","",,"2",],
   ["|||Documentation","testlink.html","","","",,"2",],
   ["|||How to Setup","testlink.html","","","",,"2",],
   ["||Product 4","testlink.html","","","",,"2",],
   ["Contacts","http://www.apycom.com/contact.html","","","",,,],
];

apy_init();

*/