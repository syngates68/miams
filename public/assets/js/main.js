$(document).on('click', '.dropdown-utilisateur', function(e)
{
    e.preventDefault();
    if ($('.bloc-dropdown-utilisateur').hasClass('is-active'))
        $('.bloc-dropdown-utilisateur').removeClass('is-active');
    else
        $('.bloc-dropdown-utilisateur').addClass('is-active');
});