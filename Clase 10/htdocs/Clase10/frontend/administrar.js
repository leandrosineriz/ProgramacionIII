
function MostrarCds(){

    $.ajax({
        //type: "POST",
        type: "GET",
        url: "./backend/traerCd",
        //data: "queHacer=traerCd",
        dataType: "text",
        async: true
    }
    )
    .done(function(resultado){
        $("#div_tabla_cd").html(resultado);
    })
    .fail(function(b1,b2,b3){

        console.log(b1+"\n"+b2+"\n"+b3+"\n");
    });
}

function MandarMail()
{
    $.ajax({
        //type: "POST",
        type: "GET",
        url: "./backend/MandarMail",
        //data: "queHacer=traerCd",
        dataType: "text",
        async: true
    }
    )
    .done(function(resultado){
        $("#div_tabla_cd").html(resultado);
    })
    .fail(function(b1,b2,b3){

        console.log(b1+"\n"+b2+"\n"+b3+"\n");
    });
}