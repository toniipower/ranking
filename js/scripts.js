function borrar_usuario(id) 
{
   console.log(id)
    let objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                if(objXMLHttpRequest.responseText == "1") {
                    alert("El usuario ha sido borrado con éxito");
                    location.reload();
                } else {
                    alert("Ha habido un problema al borrar el usuario");
                }
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }
    objXMLHttpRequest.open('GET', `borrar_usuario.php?id=${id}`); 
    objXMLHttpRequest.send();
}
   
   
    
 