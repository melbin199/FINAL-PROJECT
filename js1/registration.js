  function myname()
  {
  var n=document.getElementById("name");
  var letter=/[A-Za-z]+$/;
  if(n.value == "")
  {
    document.getElementById("consid").innerHTML = "<span class='error'>It should be filled</span>";
        txt1.focus();
        return false;
}
else if(!n.value.match(letter))
  {
    document.getElementById("consid").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
        txt1.focus();
        return false;
  }
  else if(n.value.match(letter))
  {
      document.getElementById("consid").innerHTML = "<span class='error'></span>";
      return false;
  }
}
  function mymail()
   {
     var n=document.getElementById("mail");
     var e=/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if(n.value == "")
     {
       document.getElementById("consid3").innerHTML = "<span class='error'>It should be filled</span>";
       inputEmail.focus();
           return false;
   }
   else if(!n.value.match(e))
     {
       document.getElementById("consid3").innerHTML = "<span class='error'>This is not a valid email address. Please try again</span>";
       inputEmail.focus();
           return false;
     }
   else if(n.value.match(e))
       {
         document.getElementById("consid3").innerHTML = "<span class='error'></span>";
             return false;
       }
   }
   function myphone()
  {
  var n=document.getElementById("phone");
  var p=/^([[6-9]{1})+([0-9]{9})$/;
  if(n.value == "")
  {
    document.getElementById("consid2").innerHTML = "<span class='error'> It should be filled</span>";
        txt1.focus();
        return false;
}
else if(!n.value.match(p))
  {
    document.getElementById("consid2").innerHTML = "<span class='error'>This is not a valid number. Please try again</span>";
        txt1.focus();
        return false;
  }
  else if(n.value.match(p))
  {
      document.getElementById("consid2").innerHTML = "<span class='error'></span>";
      return false;
  }
}
  function username()
  {
  var n=document.getElementById("user");
  var letter=/[A-Za-z]+$/;
  if(n.value == "")
  {
    document.getElementById("consid6").innerHTML = "<span class='error'> It should be filled</span>";
        txt1.focus();
        return false;
}
else if(!n.value.match(letter))
  {
    document.getElementById("consid6").innerHTML = "<span class='error'>This is not a valid username. Please try again</span>";
        txt1.focus();
        return false;
  }
  else if(n.value.match(letter))
  {
      document.getElementById("consid6").innerHTML = "<span class='error'></span>";
      return false;
  }
}


