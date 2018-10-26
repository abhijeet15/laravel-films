<?php

if ( ! function_exists( 'show_star_rating' ) ) {
    /**
     * Generate star rating html.
     *
     * @param integer star rating out of 5
     *
     * @return html
     *
     * */
    function show_star_rating( $rating )
    {
        $return = "";
        $active = " star-checked";
        for( $i = 1; $i <= 5; $i++ )
        {
            if( $i > $rating ) $active = "";

            $return .= '<span class="fa fa-star '. $active .'"></span>';
        }
        
        return $return; 
    }
}