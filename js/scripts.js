jQuery(document).ready(function( $ ){

    let wordList = $('#wp-ws-wrapper .wl-container').html();
    
    $('#wp-ws-wrapper input[name="wp-ws-search"]').on('keyup', function() {
        let searchValue = $(this).val().toLowerCase();
        let cards = $('#wp-ws-wrapper .wl-container .wl-card');

        console.log(searchValue);

        if (searchValue === '') {
            $('#wp-ws-wrapper .wl-container').html(wordList);
        }
    
        cards.each(function(index) {
            let card = $(this);
            let cardTitle = card.find('.wl-content').text().toLowerCase();

            if (cardTitle.indexOf(searchValue) > -1) {
                card.parent().prepend(card);
                card.removeClass('opaque');
            } else {
                $('#wp-ws-wrapper .wl-container').append(card);
                card.addClass('opaque');
            }           
        });
    });
});