$(document).on('click', '.messages-container .messages-container__body .message-block', function()
{
    $('.messages-container .messages-container__body .messages-discussion').show();
    $('.messages-container .messages-container__body').addClass('is-grid');
});