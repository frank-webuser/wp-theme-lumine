jQuery(document).ready(function( $ ){

    let root_dir = wordpress_data.dir
    let is_mobile = 0;
    let carousel_current = 0;
    let carousel_items = $(".carousel-item")
    let carousel_indicators = $(".carousel-indicator")
    let carousel_max = $(".carousel-item").length
    let start = Date.now();
    carousel_items.eq( carousel_current ).show()

    let last_width = $(window).width()

    if ( last_width <= 775 ) { is_mobile = 1 }

    // $('.sticky').children('.post-data').children('.post-title').eq(0).prepend('<span class="post-sticky-icon"><object title="Sticky logo" data="' + root_dir + '/assets/sticky.svg" width="10" height="10"></object></span>')
    $(".sub-menu").before('<button class="sub-menu-toggle"><object title="Toggle dropdown sub menu" data="' + root_dir + '/assets/down.svg" width="10" height="10"></object></button>')
    $('.current-menu-item').parents('.sub-menu').show();

    function prev(){
        carousel_items.eq(carousel_current).fadeOut();
        if( carousel_current == 0 ) {
            carousel_current = carousel_max - 1
        } else {
            carousel_current -= 1
        }
        start = Date.now();
        carousel_indicators.css({
            'border-left-width': '0px',
            'width': '50px'
        })
        carousel_items.eq(carousel_current).fadeIn()
    }
    $('#carousel-prev').click(prev)

    function next(){
        carousel_items.eq(carousel_current).fadeOut();
        if( carousel_current == carousel_max - 1 ) {
            carousel_current = 0
        } else {
            carousel_current += 1
        }
        start = Date.now();
        carousel_indicators.css({
            'border-left-width': '0px'
        })
        carousel_items.eq(carousel_current).fadeIn()
    }
    $('#carousel-next').click(next)

    $('.carousel-indicator').click(function(){
        carousel_items.eq(carousel_current).fadeOut();
        console.log($(this).data('position'))
        carousel_current = parseInt($(this).data('position'))
        start = Date.now();
        carousel_indicators.css({
            'border-left-width': '0px'
        })
        carousel_items.eq(carousel_current).fadeIn()
    })

    $(document).ready(function(){    

        $("#menu-toggle").click(function(){
            $('#menu-nav').show()
            $(".nav-bg").show()
            // $('.current-menu-item').parents('.sub-menu').show();
        })
    
        $('.nav-bg').click(function(){
            // $('.sub-menu').hide()
            $('#menu-nav').hide()
            $(this).hide()
        })

        /* $('.container').click(function(){
            $('.sub-menu').hide()
            $('.current-menu-item').parents('.sub-menu').show();
        }) */

        $('.sub-menu-toggle').click(function(){
            $(this).next().toggle()
            $(this).next().find('.sub-menu').hide()
        })
    

        $(window).on('resize', function(){
            var win = $(this);
            if(win.width() != last_width) {
                if (win.width() < 775) {
                    $('#menu-nav').hide()
                    $('.nav-bg').hide()
                }
                if (win.width() >= 775) {
                    $('#menu-nav').show()
                    $('.nav-bg').hide()
                }
                last_width = win.width()
            }
        })
    })

    if ( carousel_max ) {
        setInterval(function() {
            let delta = Date.now() - start;
            let secs = Math.floor(delta / 50) / 20;
            carousel_indicators.eq(carousel_current).css({
                'border-left-width': String(secs * 10) + 'px'
            })
            if(secs >= 5) {
                next();
                start = Date.now();
                carousel_indicators.css({
                    'border-left-width': '0px'
                })
            }
        }, 50)
    }
})