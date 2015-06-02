/**
 * Created by jhtan on 12/2/14.
 */
/**
 * Edited by Cechus on 17/05/2015
 */
(function ($) {
    $(document).ready( function () {
    /**
     * Implementing the Isotope plugin in the home page.
     */
    //Implementation of the library.

    var $container = $('.grid_Thum').isotope({
        itemSelector: '.grid__item',
        layoutMode:'fitRows',
        getSortData: {
            name: '.name',
            last_name: '.last_name',
            height: '.height',
            weight: '.weight',
            date: '.date'
        }
    });
        var filterFns = {
            bpm128: function () {
                var number = $(this).find('.bpm').text();
                return parseInt(number, 10)>128;
            },
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt(number, 10) > 50;
            },
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match(/ium$/);
            }
        };
    // Order buttons.
        $('#sorts').on('click', 'a', function() {
            var sortValue = $(this).attr('data-sort-value');
            $container.isotope({
                sortBy: sortValue
            });
        });
        //filter-radio
        $('#filters-radio').on('click', 'input', function() {
            var filterValue = this.value;
            filterValue = filterFns[filterValue] || filterValue;
            $container.isotope({
                filter: filterValue
            });
        });

        //filter select
        $('#filters-select').on('change', function() {
            var filterValue = this.value;
            filterValue = filterFns[filterValue] || filterValue;
            $container.isotope({
                filter: filterValue
            });
        });
        //for input filter search input
        var $quicksearch = $('#quicksearch').keyup(debounce(function() {
            qsRegex = new RegExp($quicksearch.val(), 'gi');
            $container.isotope();
        }, 200));

        //for fliter
        $('#filters').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            filterValue = filterFns[filterValue] || filterValue;
            $container.isotope({
                filter: filterValue
            });
        });



    });
    function debounce(fn, threshold) {
        var timeout;
        return function debounced() {
            if (timeout) {
                clearTimeout(timeout);
            }

            function delayed() {
                fn();
                timeout = null;
            }
            timeout = setTimeout(delayed, threshold || 100);
        };
    };

    //for styles of buttons
    $('.cd-filters').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'li a', function() {
            $buttonGroup.find('.selected').removeClass('selected');
            $(this).addClass('selected');
        });
    });
})(jQuery);
