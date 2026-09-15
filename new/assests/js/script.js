$(document).ready(function () {
    $('.counter-num').each(function () {
        var $this = $(this);
        var target = $this.attr('data-target');

        // Ensure we handle the animation properly
        $({ countNum: 0 }).animate({
            countNum: target
        },
            {
                duration: 2500, // Duration in milliseconds
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.countNum) + "+");
                },
                complete: function () {
                    $this.text(target + "+");
                }
            });
    });
});
