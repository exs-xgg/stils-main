var btn = document.getElementById('btn');
var stt = document.getElementById('prjx');
btn.addEventListener("click", function(){
  var ask = prompt("Enter the day of your birthday");

  switch (ask) {
    case "1": alert("I wanna be the very best lke no one ever was...");
    prjx.innerHTML= "wassup nigga";  break;
    case "4": alert("Hello...it's me....");break;
    case "9": alert("Allahu Akbar");break;
    case "12": alert("WAAAAAAAAAAAA");break;
    case "26": alert("Expeliarmus!"); break;
    case "": alert("lol.");break;
    default: alert("too lazy to write a switch case for this number.");break;
  }
});
// window.print();
