var level=1;
var gameField = document.getElementById("gameField");

function rand(min, max){
    return Math.floor(Math.random() * (max - min)) + min;
}
function create()
{
	
}
var rgbToHex = function (rgb) { 
  var hex = Number(rgb).toString(16);
  if (hex.length < 2) {
       hex = "0" + hex;
  }
  return hex;
};
var fullColorHex = function(r,g,b) {   
  var red = rgbToHex(r);
  var green = rgbToHex(g);
  var blue = rgbToHex(b);
  return red+green+blue;
};

function createField(level){ 
	document.getElementById("level").innerHTML = level;
	
	gField=new Array(level+1); 
	var x=rand(0,level);
	var y=rand(0,level);
	for (i=0;i<level+1;i++) gField[i]=new Array(level+1); 
	var nextlevel=level+1;
	var r=Math.random(0,255);
	var g=Math.random(0,255);
	var b=Math.random(0,100);
	var color='#' + fullColorHex(r,g,b);
	var color2='#' + fullColorHex(r,g,b+Math.random(1,2));
	var hT="<table border=1px  >"; 
	for (i=0;i<level+1;i++) {
		hT+="<tr  >"; 
		for (j=0;j<level+1;j++) { 
			if(i==x && j==y)
				hT+="<td  onclick='createField("+nextlevel+")' bgColor='"+color2+"'></td>";
			else 
				hT+="<td  bgColor='"+color+"' onclick='createField(1)'></td>";			
		}
		hT+="</tr>";
	}
	document.getElementById('gameField').innerHTML = hT+"</table>";
	
}
function startGame(){
    level=1;
	document.getElementById("level").innerHTML = level;
	createField(level); 
}
