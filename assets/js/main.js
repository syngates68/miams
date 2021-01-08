$(document).on('click', '.dropdown-utilisateur', function(e)
{
    e.preventDefault();
    if ($('.bloc-dropdown-utilisateur').hasClass('is-active'))
        $('.bloc-dropdown-utilisateur').removeClass('is-active');
    else
        $('.bloc-dropdown-utilisateur').addClass('is-active')
});

$(document).on('keyup', 'input[name="quantite"]', function()
{
    var quantite = parseInt($(this).val());

    if (quantite != '' && Number.isInteger(quantite))
        $('.montant').text(quantite * $('input[name="prix"]').val());
    else
        $('.montant').text('0');
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

$(document).on('click', '.btn-annuler-commande', function()
{
    if (confirm("Souhaitez-vous réellement annuler votre commande ? Cette action est irréversible."))
    {
        var id_commande = $(this).attr('data-id');

        $.post(baseurl + 'inc/traitement/annuler_commande.php',
        {
            id_commande : id_commande
        },
        function()
        {
            alert('La commande a bien été annulée.');
            location.reload();
        });
    }
});