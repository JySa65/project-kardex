  function solonumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar y espacio, siempre las permite
    if (tecla==8){
        return true;
    }
    if (tecla==32) {
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
  function sololetras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar y espacio, siempre las permite
    if (tecla==8){
        return true;
    }
    if (tecla==32) {
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta letras
    patron =/[a-zA-Z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}