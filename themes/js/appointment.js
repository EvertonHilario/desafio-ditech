//realiza o submit e retorna o elemento antes configurado
function sendSearch()
{

    // ajax
    $.ajax({
        type    : 'POST',
        dataType: "json",
        url     : $('#search-hour').attr('action'),
        data    : $("#search-hour").serialize(),
        success : function(data){

            //adiciona o resultado da busca no box de resultado
            $("#result-search").html(data['html']);

        },
     

    });

    return false;

}

//renderiza a tela de reserva da sala
function renderReservationPage(url)
{
    // ajax
    $.ajax({
        type    : 'GET',
        url     : url,
        success : function(html){

            //adiciona a tela de reserva de sala
            $("#result-search").html(html);

        },
     

    });

    return false;

}