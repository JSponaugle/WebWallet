/**
 * Created by yoshi on 5/4/2017.
 */
function dashboard() {
    $('.menubar > div').removeClass('active');
    $.post( "/dashboard", function( data ) {
        $( "#content" ).html( data );
        $('.menubar > .menubar-dashboard').addClass('active');
    });
}
function receive() {
    $('.menubar > div').removeClass('active');
    $.post( "/receive", function( data ) {
        $( "#content" ).html( data );
        $('.menubar > .menubar-receive').addClass('active');
    });
}
function send() {
    $('.menubar > div').removeClass('active');
    $.post( "/send", function( data ) {
        $( "#content" ).html( data );
        $('.menubar > .menubar-send').addClass('active');
    });
}
function transactions() {
    $('.menubar > div').removeClass('active');
    $.post( "/transactions", function( data ) {
        $( "#content" ).html( data );
        $('.menubar > .menubar-transactions').addClass('active');
    });
}
function addresses() {
    $('.menubar > div').removeClass('active');
    $.post( "/addresses", function( data ) {
        $( "#content" ).html( data );
        $('.menubar > .menubar-addresses').addClass('active');
    });
}
function masternodes() {
    $('.menubar > div').removeClass('active');
    $.post( "/masternodes", function( data ) {
        $( "#content" ).html( data );
        $('.menubar > .menubar-masternodes').addClass('active');
    });
}