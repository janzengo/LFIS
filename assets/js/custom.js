$(document).ready(function () {
    $('.navbar-toggler').on('click', function () {
        var target = $(this).data('bs-target');
        var $target = $(target);
        var $backdrop = $('.navbar-backdrop');

        if ($target.hasClass('show')) {
            // Slide out
            $target.css('transform', 'translateX(100%)');
            $backdrop.removeClass('show');

            // Delay removing the "show" class to allow animation to complete
            setTimeout(function () {
                $target.removeClass('show');
            }, 300); // Match the CSS transition duration
        } else {
            // Slide in
            $target.addClass('show');
            $target.css('transform', 'translateX(0)');
            $backdrop.addClass('show');
        }
    });

    $('.navbar-backdrop').on('click', function () {
        var target = $('.navbar-collapse');
        var $backdrop = $(this);

        // Slide out
        target.css('transform', 'translateX(100%)');
        $backdrop.removeClass('show');

        // Delay removing the "show" class to allow animation to complete
        setTimeout(function () {
            target.removeClass('show');
        }, 300); // Match the CSS transition duration
    });
});
