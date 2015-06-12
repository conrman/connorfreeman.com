<?php 
/** 
 * Custom Fields
 * 
 */

$isCarousel = get_field('carousel');

function isActive($pos) {
	if ($pos === 0) return "active";
	else return "";
}

if ($isCarousel) {

	$carouselFormat = get_field('carousel_format');
	$carouselData = get_field('carousel_data');
	$carouselImages = get_field('carousel_images');
	$carouselAnimation = get_field('carousel_animation');
	$carouselPosts = get_field('carousel_posts');

	$carousel = '<div id="carousel-' . get_the_ID() . '" class="carousel ' . $carouselAnimation . ' ' . $carouselFormat .'" >';

	if ($carouselFormat) {
		$carouselIndicators = '<ol class="carousel-indicators">';
		$carouselInner = '<!-- Wrapper for slides --><div class="carousel-inner" role="listbox">';
		for ($i=0; $i < sizeof($carouselImages); $i++) { 
			$carouselInner .= '
			<div class="item ' . isActive($i) . '">
				<img src="' . $carouselImages[$i]['url'] . '">';
				if (!empty($carouselImages[$i]['caption'])) {
					$carouselInner .= '<div class="carousel-caption">' . $carouselImages[$i]["caption"] . '</div>';
				}
				$carouselInner .= '
			</div> <!--/ .item -->';

			$carouselIndicators .= '<li class="' .isActive($i) . '" data-target="#carousel-' . get_the_ID() . '" data-slide-to="' . $i . '"></li>';
		}
		$carouselIndicators .= '</ol>';
		$carouselInner .= '</div>';
		$carouselControls = '
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-' . get_the_ID() . '" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-' . get_the_ID() . '" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>';

		$carousel .= $carouselIndicators . $carouselInner . $carouselControls . '</div>';
		echo $carousel;
	}
}
?>
