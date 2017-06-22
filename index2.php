<html>
<head>
<title>Validar Contraseña</title>
<!-- La Web del proramador - http://www.lawebdelprogramador.com -->
 
<script type="text/javascript">
<!--
function validate_password()
{
  //Cogemos los valores actuales del formulario
  pasActual=document.formName.passwordActual;
  pasNew1=document.formName.passwordNew1;
  pasNew2=document.formName.passwordNew2;
  //Cogemos los id's para mostrar los posibles errores
  id_epassActual=document.getElementById("epasswordActual");
  id_epassNew=document.getElementById("epasswordNew1");

  //Patron para los numeros
  var patron1=new RegExp("[0-9]+");
  //Patron para las letras
  var patron2=new RegExp("[a-zA-Z]+");

  if(pasNew1.value==pasNew2.value && pasNew1.value.length>=6 && pasActual.value!="" && pasNew1.value.search(patron1)>=0 && pasNew1.value.search(patron2)>=0){
    //Todo correcto!!!
    return true;
  }else{
    if(pasNew1.value.length<6)
      id_epassNew.innerHTML="La longitud mínima tiene que ser de 6 caracteres";
    else if(pasNew1.value!=pasNew2.value)
      id_epassNew.innerHTML="La copia de la nueva contraseña con coincide";
    else if(pasNew1.value.search(patron1)<0 || pasNew1.value.search(patron2)<0)
      id_epassNew.innerHTML="La contraseña tiene que tener numeros y letras";
    else
      id_epassNew.innerHTML="";
    if(pasActual.value=="")
      id_epassActual.innerHTML="Indicar tu contraseña actual";
    else
      id_epassActual.innerHTML="";
    return false;
  }
}
-->
</script>
 
</head>
 
<body>
<!-- formulario -->
<form name="formName" action="" method="POST" onsubmit='return validate_password()'>
  <div id="epasswordActual" style="color:#f00;"></div>
  <div>Password Actual: <input type="password" name="passwordActual"/></div>
  <div id="epasswordNew1" style="color:#f00;"></div>
  <div>Nuevo Passowrd: <input type="password" name="passwordNew1"/></div>
  <div>Repite Passowrd: <input type="password" name="passwordNew2"/></div>
  <div><input type="submit" value="enviar"/></div>
</form>
</body>
</html>