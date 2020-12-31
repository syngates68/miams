$(document).on('click', '.dropdown-utilisateur', function(e)
{
    e.preventDefault();
    if ($('.bloc-dropdown-utilisateur').hasClass('is-active'))
        $('.bloc-dropdown-utilisateur').removeClass('is-active');
    else
        $('.bloc-dropdown-utilisateur').addClass('is-active')
});

$('#form_commande').submit(function()
{
    var id_plat = $('input[name="id_plat"]').val();
    var quantite = $('input[name="quantite"]').val();
    var heure = $('select[name="heure"]').val();

    $.post(baseurl + 'inc/traitement/valider_commande.php',
    {
        id_plat : id_plat,
        quantite : quantite,
        heure : heure
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
            window.location.href = baseurl + 'commande_valide.html';
        }
    });

    return false;
});