function validateForm(){
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

function validateFormLogin(){
    var band = false;
    var array = ["nombre","password"];
    for(var i=0;i<2;i++){
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

    if(cont==2){
        band==true;
    }
    return band;
}