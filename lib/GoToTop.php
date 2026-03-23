<?php
namespace QueenNailsStudio;

class GoToTop {
	public function __construct() {
		add_action( 'wp_footer', [ $this, 'output' ] );
	}

	public function output() {
		?>
<a id="back-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
        <path d="m6.293 13.293 1.414 1.414L12 10.414l4.293 4.293 1.414-1.414L12 7.586z"></path>
    </svg>
</a>
<style>
#back-to-top {
    padding: 12px;
    border-radius: 99px;
    background: rgba(0, 0, 0, .2);
    position: fixed;
    right: 12px;
    bottom: 12px;
    transition: all 0.25s;
    color: #fff;
    opacity: 0;
    visibility: hidden;
}

#back-to-top.show {
    opacity: 1;
    cursor: pointer;
    visibility: visible;
}

#back-to-top:hover {
    background: rgba(0, 0, 0, .3);
}

#back-to-top svg {
    width: 24px;
    height: 24px;
    display: block;
}
</style>

<script>
var btn = jQuery('#back-to-top');
var lastScrollTop = 0,
    delta = 5;
jQuery(window).scroll(function() {
    var nowScrollTop = jQuery(this).scrollTop();
    if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
        if (nowScrollTop > lastScrollTop) {
            btn.removeClass('show');
        } else {
            if (jQuery(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        }
        lastScrollTop = nowScrollTop;
    }
});
btn.on('click', function(e) {
    e.preventDefault();
    jQuery('html, body').animate({
        scrollTop: 0
    }, 300);
});
</script>

<?php
	}
}