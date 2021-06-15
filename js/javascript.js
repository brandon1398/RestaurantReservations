function validateForm(){
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var telefono = document.getElementById("telefono").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value; 
    
    var band = false;
    var cont = 0;
    var array = ['nombre','apellido','telefono','email','password'];

    for(var i=0;i<array.length;i++){
        if(document.getElementById(array[i]).value==""){
            document.getElementById('asterisco'+(i+1)+'').classList.remove('nor');
            document.getElementById('asterisco'+(i+1)+'').classList.add('asteriscoR');
            band=false;
        }else{
            document.getElementById('asterisco'+(i+1)+'').classList.remove('asteriscoR');
            document.getElementById('asterisco'+(i+1)+'').classList.add('nor');
            cont++;
        }
    }

    if(cont==5){
        band=true;
    }   
    return band;
}