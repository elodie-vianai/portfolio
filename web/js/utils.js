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
    $('.page-link').on('click', function (e) {
        e.preventDefault();

        var category = $(e.target).data('category');

        $('#skills-zone div').hide();

        if(category !== 'all') {
            $('#skills-zone div.' + category).show();
        }
        else {
            $('#skills-zone div').show();
        }
    });


    /********** SKILLS (crud) **********/
    /**
     * Pictures become transparent when its button is clicked
     */

    $('.page-link').on('click', function (e) {
        e.preventDefault();

        var category = $(e.target).data('category');

        $('#skills-table tbody tr').hide();

        if(category !== 'tout') {
            $('#skills-table tbody tr.' + category).show();
        }
        else {
            $('#skills-table tbody tr').show();
        }
    });
});
