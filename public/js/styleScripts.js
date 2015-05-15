/**
 * Created by jhtan on 12/2/14.
 */
/**
 * Edited by Cechus on 13/04/2015
 */
(function ($) {
    $(document).ready( function () {


    /**
     * Implementing the Isotope plugin in the home page.
     */

    //Implementation of the library.
    var $isotopeContainer = $('#missingPeopleContainer');
    $isotopeContainer.isotope({
        itemSelector: '.missingPeopleItem',
        layaoutMode: 'fitRows',
        getSortData: {
            name: '[data-name]',
            lastName: '[data-lastName]',
            date: '[data-date]'
        }
    });

    // Order buttons.
    $('#missingPeopleOderButtons').on('click', 'a', function () {
        var sortByValue = $(this).attr('data-sort-by');
        $isotopeContainer.isotope({ sortBy: sortByValue});
    });

    });
})(jQuery);
