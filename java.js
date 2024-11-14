var anh=[];
var a=0;
function loadanh(){
    for(var i=0;i<4;i++){
        anh[i]=new Image;//khai báo đối tượng
        anh[i].src= "img/"+i+".jpg"
    }
}
function start(){
    loadanh();
   document.getElementById("img1").src=anh[a].src
   a++;
   if(a==anh.length){
    a=0;
   }
  t=setTimeout("start()",2000);
}
function pause(){
    clearTimeout(t);}