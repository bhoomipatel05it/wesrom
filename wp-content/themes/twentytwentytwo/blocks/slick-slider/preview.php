<div data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
    <?php
    $totalSlides = block_field('total-slides-to-show');
    for ($i = 0; $i < $totalSlides; $i++) {
        echo '<h3>' . block_field('slider-heading-' . $i) . '</h3>' .
            '<p>' . block_field('slider-description-' . $i) . '</p>';
    }
    ?>
</div>
    <script>
        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>