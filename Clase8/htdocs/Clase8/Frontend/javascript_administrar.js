function Ejemplo1(){
    var textBox=$("#textBox1").val();
    $("#div1").html("Hola Mundo -"+textBox);
}

function Ejemplo2(){
    $.ajax({
        type: "POST",
        //type: "GET",
        url: "backend.php",
        data: "nombre=Jose",
        //data: "edad='100'",
        dataType: "JSON",
        async: true
    }
    )
    .done(function(resultado){
        $("#div1").html(resultado.nombre+" - "+resultado.edad);
    })
    .fail(function(b1,b2,b3){

        console.log(b1+"\n"+b2+"\n"+b3+"\n");
    })
    .always(function(){
        alert("ALWAYS");
    });
}

function Ejemplo3()
{
    var persona={"miPersona":{"nombre":$("#textBox1").val(),"edad":32}};
    $.ajax({
        type: "GET",
        url: "backend.php",
        data: persona,
        dataType: "text",
        async: true
    })
    .done(function(resultado){
        $("#div1").html(resultado);
    })
    .fail(function(b1,b2,b3){
        console.log(b1+"\n"+b2+"\n"+b3+"\n");
    })
}

function EjemploApiRest1()
{
    var persona={"nombre":$("#textBox1").val(),"perfil":$("#textBox2").val()};
    //var persona="nombre=pepe&perfil=admin";
    $.ajax({
        type: "POST",
        url: "Backend/Credenciales",
        data: persona,
        dataType: "text",
        async: true
    })
    .done(function(resultado){
        $("#div1").html(resultado);
    })
    .fail(function(b1,b2,b3){
        console.log(b1+"\n"+b2+"\n"+b3+"\n");
    })


}