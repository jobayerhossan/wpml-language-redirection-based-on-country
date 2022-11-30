<?php 
function redirect_wpml_languages_based_on_user_country(){
    
    if ( ! current_user_can( 'manage_options' ) ) {

        $geo_instance  = new WC_Geolocation();
        $user_geodata = $geo_instance->geolocate_ip();
        $country = $user_geodata['country'];

        $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );
  

        if($country == 'NL'){
            if($languages['nl']['active'] == 0){
                wp_safe_redirect( $languages['nl']['url'] );
                exit;
            }
        }elseif($country == 'RU'){
            if($languages['ru']['active'] == 0){
                wp_safe_redirect( $languages['ru']['url'] );
                exit;
            }
        }elseif($country == 'ES'){
            if($languages['es']['active'] == 0){
                wp_safe_redirect( $languages['es']['url'] );
                exit;
            }
        }elseif($country == 'PT'){
            if($languages['pt-pt']['active'] == 0){
                wp_safe_redirect( $languages['pt-pt']['url'] );
                exit;
            }
        }elseif($country === 'KW' || $country === 'EG' || $country === 'JO' || $country === 'LB' || $country === 'LY' || $country === 'MR' || $country === 'OM' || $country === 'QA' || $country === 'SA' || $country === 'SY' || $country === 'TN' || $country === 'AE' || $country === 'YE'){
            if($languages['ar']['active'] == 0){
                wp_safe_redirect( $languages['ar']['url'] );
                exit;
            }
        }else{
            if($languages['en']['active'] == 0){

                wp_safe_redirect( $languages['en']['url'] );
                exit;
            }

        }
    }

}
add_action('init', 'redirect_wpml_languages_based_on_user_country');
