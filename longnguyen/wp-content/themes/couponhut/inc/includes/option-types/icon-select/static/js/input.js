jQuery(document).ready(function ($) {
    var optionTypeClass = '.fw-option-type-icon-select';

    /**
     * Listen to special event that is triggered for uninitialized elements
     */
    fwEvents.on('fw:options:init', function (data) {
        /**
         * data.$elements are jQuery selected elements
         * that contains options html that needs to be initialized
         *
         * Find uninitialized options by main class
         */
        var $options = data.$elements.find(optionTypeClass +':not(.initialized)').each(function(){
			$(this).find('.fonticonpicker').fontIconPicker({
				iconsPerPage: 20
			});
        });

        /**
         * Listen for button click and clear input value
         */
        $options.on('click', 'button', function(){
            $(this).closest(optionTypeClass).find('input').val('');
        });

        /**
         * After everything has done, mark options as initialized
         */
        $options.addClass('initialized');
    });
});



