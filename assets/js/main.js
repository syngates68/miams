$(document).on('click', '.dropdown-utilisateur', function(e)
{
    e.preventDefault();
    if ($('.bloc-dropdown-utilisateur').hasClass('is-active'))
        $('.bloc-dropdown-utilisateur').removeClass('is-active');
    else
        $('.bloc-dropdown-utilisateur').addClass('is-active');
});

$(document).on('click', '.bloc-notifications .material-icons', function()
{
    var top = $('.bloc-notifications').offset().top + $('.bloc-notifications').innerHeight() + 5;
    var right = $(window).width() - $('.bloc-notifications').offset().left - $('.bloc-notifications').innerWidth();

    if ($('.mes-notifications').hasClass('is-active'))
        $('.mes-notifications').removeClass('is-active');
    else
    {
        $('.mes-notifications').addClass('is-active');
        $('.mes-notifications').css('right', right + 'px');
        $('.mes-notifications').css('top', top + 'px');

        //On retire la petite pillule de notifications
        $('.bloc-notifications .notification').css('display', 'none');

        //On marque toutes les notifications comme ayant été lues
        $.post(baseurl + 'inc/traitement/notifications_lues.php');
    }
});

$(document).on('click', '.bloc-messages .material-icons', function()
{
    var top = $('.bloc-messages').offset().top + $('.bloc-messages').innerHeight() + 5;
    var right = $(window).width() - $('.bloc-messages').offset().left - $('.bloc-messages').innerWidth();

    if ($('.mes-messages').hasClass('is-active'))
        $('.mes-messages').removeClass('is-active');
    else
    {
        $('.mes-messages').addClass('is-active');
        $('.mes-messages').css('right', right + 'px');
        $('.mes-messages').css('top', top + 'px');

        //On retire la petite pillule de notifications
        $('.bloc-messages .notification').css('display', 'none');
    }
});

$(document).on('keyup', 'input[name="quantite"]', function()
{
    var quantite = parseInt($(this).val());

    if (quantite != '' && Number.isInteger(quantite))
        $('.montant').text(quantite * $('input[name="prix"]').val());
    else
        $('.montant').text('0');
});

$('#form_reservation').submit(function()
{
    var id_plat = $('input[name="id_plat"]').val();
    var quantite = $('input[name="quantite"]').val();
    var heure = $('select[name="heure"]').val();

    $.post(baseurl + 'inc/traitement/valider_reservation.php',
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
            window.location.href = baseurl + 'reservation_valide.html';
        }
    });

    return false;
});

$(document).on('click', '.btn-annuler-reservation', function()
{
    if (confirm("Souhaitez-vous réellement annuler votre réservation ? Cette action est irréversible."))
    {
        var id_commande = $(this).attr('data-id');

        $.post(baseurl + 'inc/traitement/annuler_reservation.php',
        {
            id_commande : id_commande
        },
        function()
        {
            alert('La réservation a bien été annulée.');
            location.reload();
        });
    }
});

$(document).on('change', '#photo_plat', function()
{
    readURL(this);
});

function readURL(input){
    if (input.files && input.files[0]) {

        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

        if (ext == "png" || ext == "jpeg" || ext == "jpg")
        { 
            var reader = new FileReader();
          
            reader.onload = function(e) {
                $.post(baseurl + 'inc/apercu_image.php',
                {
                    src : e.target.result
                },
                function(data)
                {
                    $('.bloc-photo-plat').html(data).addClass('has_image');
                });
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        else
        {
            alert('Vous devez choisir une image au format .jpg, .png ou .jpeg');
        }
    }
}