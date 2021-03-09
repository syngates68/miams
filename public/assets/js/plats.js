$(document).on('keyup', '#form_reservation input[name="quantite"]', function()
{
    var quantite = parseInt($(this).val());

    if (quantite != '' && Number.isInteger(quantite))
        $('.montant').text(quantite * $('#form_reservation input[name="prix"]').val());
    else
        $('.montant').text('0');
});

$('#form_reservation').submit(function()
{
    var id_plat = $('#form_reservation input[name="id_plat"]').val();
    var prix = $('#form_reservation input[name="prix"]').val();
    var quantite = $('#form_reservation input[name="quantite"]').val();
    var heure = $('#form_reservation select[name="heure"]').val();

    $.post(baseurl + 'plats/valider_reservation',
    {
        id_plat : id_plat,
        quantite : quantite,
        heure : heure,
        prix : prix
    },
    function(data)
    {
        if (data != '')
        {
            $('#alert_commande').css('display', '');
            $('#alert_commande .message').html(data);
        }
        else
        {
            alert('nickel')
            //window.location.href = baseurl + 'reservation_valide.html';
        }
    });

    return false;
});

$('#form_envoi_message').submit(function()
{
    var message = $('#form_envoi_message textarea[name="message"]').val();

    $.post(baseurl + 'messages/envoi_message',
    {
        message : message
    },
    function(data)
    {
        if (data.substr(0, 1) == '0')
        {
            $('#alert_message').css('display', '');
            $('#alert_message .message').html(data.substr(1, data.length));
            $('#success_message').css('display', 'none');
        }
        else
        {
            $('#success_message').css('display', '');
            $('#success_message .message').html(data.substr(1, data.length));
            $('#alert_message').css('display', 'none');
            $('#form_envoi_message textarea[name="message"]').val('');
            $('.count #chars').html('0');
        }
    });

    return false;
});

$(document).on('keyup', '#form_envoi_message textarea[name="message"]', function()
{
    var message = $(this).val()
    while (message.indexOf('\n') != '-1')
    {
        message = message.replace('\n', '')
    }
    var nb_chars = message.length
    $('.count #chars').html(nb_chars);

    if (nb_chars >= 100)
        $('button[name="submit_message"]').removeAttr('disabled');
    else
        $('button[name="submit_message"]').attr('disabled', true);
});