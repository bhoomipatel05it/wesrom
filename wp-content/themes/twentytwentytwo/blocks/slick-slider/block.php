<div class="gcb-slick-slider <?php block_field('className'); ?>">
<?php
$totalSlides = block_field('total-slides-to-show');
for($i=0; $i<$totalSlides; $i++){
    echo '<h3>'.block_field('slider-heading-'. $i).'</h3>'.
    '<p>'.block_field('slider-description-'.$i).'</p>';
}
?>
</div>