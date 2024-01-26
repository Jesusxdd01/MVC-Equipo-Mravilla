function notificacion(mensaje, tipo){
    if(tipo=='')tipo='alert-succes';
    $("#myAlert-bottom").toggleClass("alertas "+tipo);
    pieError=document.querySelector("#mensaje");
    pieError.textContent=mensaje;

    $(".myAlert-buttom").show();
    setTimeout(function() {
        $("#myAlert-buttom").toggleClass(tipo+ " alertas ");
        $(".myAlert-buttom").hide();
    }, 5000);

}