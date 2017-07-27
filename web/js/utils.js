/**
 * Created by Elodie Vianai on 30/05/2017.
 */

/********** GENERAL **********/
$(document).ready(function () {

    $('#goBack').on('click', function (e) {
        window.history.go(-1);
    });

/********** SKILLS (public pages) **********/
    /**
     * Pictures become transparent when its button is clicked
     */
    $('#tout').on('click', function(e) {
        $('.bureautique').css('opacity', '1');
        $('.database').css('opacity', '1');
        $('.graphisme').css('opacity', '1');
        $('.humain').css('opacity', '1');
        $('.langues').css('opacity', '1');
        $('.logiciels').css('opacity', '1');
        $('.navigateurs').css('opacity', '1');
        $('.serveurs').css('opacity', '1');
        $('.os').css('opacity', '1');
        $('.technologies').css('opacity', '1');
        $('.autres').css('opacity', '1');
    });

    $('#bureautique').on('click', function(e) {
        $('.bureautique').css('opacity', '1');
        $('.database').css('opacity', '0.1');
        $('.graphisme').css('opacity', '0.1');
        $('.humain').css('opacity', '0.1');
        $('.langues').css('opacity', '0.1');
        $('.logiciels').css('opacity', '0.1');
        $('.navigateurs').css('opacity', '0.1');
        $('.serveurs').css('opacity', '0.1');
        $('.os').css('opacity', '0.1');
        $('.technologies').css('opacity', '0.1');
        $('.autres').css('opacity', '0.1');
    });

    $('#developpement').on('click', function(e) {
        $('.bureautique').css('opacity', '0.1');
        $('.database').css('opacity', '1');
        $('.graphisme').css('opacity', '0.1');
        $('.humain').css('opacity', '0.1');
        $('.langues').css('opacity', '0.1');
        $('.logiciels').css('opacity', '1');
        $('.navigateurs').css('opacity', '1');
        $('.serveurs').css('opacity', '1');
        $('.os').css('opacity', '1');
        $('.technologies').css('opacity', '1');
        $('.autres').css('opacity', '0.1');
    });

    $('#graphisme').on('click', function(e) {
        $('.bureautique').css('opacity', '0.1');
        $('.database').css('opacity', '0.1');
        $('.graphisme').css('opacity', '1');
        $('.humain').css('opacity', '0.1');
        $('.langues').css('opacity', '0.1');
        $('.logiciels').css('opacity', '0.1');
        $('.navigateurs').css('opacity', '0.1');
        $('.serveurs').css('opacity', '0.1');
        $('.os').css('opacity', '0.1');
        $('.technologies').css('opacity', '0.1');
        $('.autres').css('opacity', '0.1');
    });

    $('#langues').on('click', function(e) {
        $('.bureautique').css('opacity', '0.1');
        $('.database').css('opacity', '0.1');
        $('.graphisme').css('opacity', '0.1');
        $('.humain').css('opacity', '0.1');
        $('.langues').css('opacity', '1');
        $('.logiciels').css('opacity', '0.1');
        $('.navigateurs').css('opacity', '0.1');
        $('.serveurs').css('opacity', '0.1');
        $('.os').css('opacity', '0.1');
        $('.technologies').css('opacity', '0.1');
        $('.autres').css('opacity', '0.1');
    });

    /********** SKILLS (crud) **********/
    /**
     * Pictures become transparent when its button is clicked
     */
    $('#crud-tout').on('click', function(e) {
        $('.bureautique').show();
        $('.database').show();
        $('.graphisme').show();
        $('.humain').show();
        $('.langues').show();
        $('.logiciels').show();
        $('.navigateurs').show();
        $('.serveurs').show();
        $('.os').show();
        $('.technologies').show();
        $('.autres').show();
    });

    $('#crud-bureautique').on('click', function(e) {
        $('.bureautique').show();;
        $('.database').hide();
        $('.graphisme').hide();
        $('.humain').hide();
        $('.langues').hide();
        $('.logiciels').hide();
        $('.navigateurs').hide();
        $('.serveurs').hide();
        $('.os').hide();
        $('.technologies').hide();
        $('.autres').hide();
    });

    $('#crud-developpement').on('click', function(e) {
        $('.bureautique').hide();
        $('.database').show();
        $('.graphisme').hide()
        $('.humain').hide()
        $('.langues').hide()
        $('.logiciels').show();
        $('.navigateurs').show();
        $('.serveurs').show();
        $('.os').show();
        $('.technologies').show();
        $('.autres').hide();
    });

    $('#crud-graphisme').on('click', function(e) {
        $('.bureautique').hide();
        $('.database').hide();
        $('.graphisme').show();
        $('.humain').hide();
        $('.langues').hide();
        $('.logiciels').hide();
        $('.navigateurs').hide();
        $('.serveurs').hide();
        $('.os').hide();
        $('.technologies').hide();
        $('.autres').hide();
    });

    $('#crud-langues').on('click', function(e) {
        $('.bureautique').hide();
        $('.database').hide();
        $('.graphisme').hide();
        $('.humain').hide();
        $('.langues').show();
        $('.logiciels').hide();
        $('.navigateurs').hide();
        $('.serveurs').hide();
        $('.os').hide();
        $('.technologies').hide();
        $('.autres').hide();
    });
});