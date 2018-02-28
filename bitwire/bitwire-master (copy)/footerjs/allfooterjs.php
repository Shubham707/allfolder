<?php

echo "<script>
$(document).ready(function(){
   $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
});
</script>";

echo '<script>';
"use strict";
echo 'function openMarketNav() {
    document.getElementById("marketSidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

}';

echo 'function closeMarketNav() {
    document.getElementById("marketSidenav").style.width = "0";
    document.body.style.backgroundColor = "white";
}';
echo '$(document).on("scroll", function () {
    if ($(document).scrollTop() > 30) {
        $(".ln-navbar").addClass("ln-nav-collapse");
        $("#logoWhite").addClass("hide");
        $("#logoDark").removeClass("hide");
    }
    else {
        $(".ln-navbar").removeClass("ln-nav-collapse");
        $("#logoDark").addClass("hide");
        $("#logoWhite").removeClass("hide");
    }
});';


echo '$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});';
echo '</script>';
