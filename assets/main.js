// function deleteRecord(event) {
//     // console.log(event);
//     // event.preventDefault();
//    var check = confirm("Are you sure you want to delete?");
// //    console.log(check);
// // return check;
//    if (check === true) {
//     //   return true;
//    } else {
//     event.preventDefault();
//     //   return false;
//    }
// }

function myPopup() {
  var check = confirm("Are you sure you want to delet?");
  if (check) {
  return true;
  } else {
  return false;
  }
}



function myFunction() {
    var check = confirm("Are you sure you want to delet?");
    if (check) {
    return true;
    } else {
    return false;
    }
}

var y = document.getElementById("showButton");
   y.onclick = function(){
   var getPasword = document.getElementById("showPassword");  
   if (getPasword.type === "password") { 
     getPasword.type = "text";  
   } else {  
     getPasword.type = "password";  
   }  
 }  


