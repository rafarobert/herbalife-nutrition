<?php

if(isset($ngIndex) && $ngIndex != ''){
    include_once $ngIndex;
} else if(isset($subLayout) && $subLayout != ''){
    $this->load->view($subLayout);
} else {
    if(isset($subview) && $subview != '') {
        $this->load->view($subview);
    }
}

?>
