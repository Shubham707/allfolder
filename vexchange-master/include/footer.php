<div class="footer">
    <div class="fkicon">
        <ul class="clearfix">
            <li><a href="#"><div class="fico fc5"></div>
                <div class="fkcont">
                    <div class="ftel">Ticket</div>
                    <div class="ftelnum">Submit a request</div>
                </div></a>
            </li>
            <li><a href="#"><div class="fico fc-twi"></div>
                <div class="fkcont">
                    <div class="ftel">Tweets</div>
                    <div class="ftelnum">twitter.com/gate_io</div>
                </div></a>
            </li>
            <li><a href="#"><div class="fico fc3"></div></a>
            </li>
			<li><a href="#"><div class="fico fc6"></div>
                <div class="fkcont">
                    <div class="ftel">Email</div>
                    <div class="ftelnum">Email us</div>
                </div></a>
            </li>

        </ul>
        <div class="fxts">
            <p style="text-align: center"><i>!</i>Please be aware of the high risks in the crypto-currency trading markets due to the price fluctuation and other factors.</p>
        </div>
    </div>

    <div class="fnav">
        <div class="fnavcon">
            <ul>
                <li class="fnav_list">

                    <ul class="clearfix" style="text-align: center">
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Fee</a></li>
                        <li><a href="#">API Documents</a></li>
                        <li><a href="#">User Agreement</a></li>
			                  <li><a href="#">Announcements</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <div class="tail">
            <span><a href="#"><?php echo PROJECT_TITLE?></a>&nbsp;&nbsp;Copyright © 2017&nbsp;&nbsp; </span>
			<!-- <div class="vol-all">
                <span>Volume:</span>
				<span> USDT : $<span id="usdtAll">14872167</span> </span>
                <span> BTC : ฿<span id="btcAll">476</span> </span>
                <span> LTC : Ł<span id="ltcAll">9732</span> </span>
                <span> ETH : E<span id="ethAll">13904</span> </span>
            </div> -->
              </div>
    </div>
</div>
<script>

(function() {
    var $backToTopTxt = "^", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
            .text($backToTopTxt).click(function() {
                $("html, body").animate({ scrollTop: 0 }, 500);
            }), $backToTopFun = function() {
        var st = $(document).scrollTop(), winh = $(window).height();
        (st > 0)? $backToTopEle.show(): $backToTopEle.hide();

        if (!window.XMLHttpRequest) {
            $backToTopEle.css("top", st + winh - 166);
        }
    };
    $(window).bind("scroll", $backToTopFun);
    $(function() { $backToTopFun(); });
})();

$("#theme").find("li").click(function(){
    var theme = $(this).attr("id");
    if(theme == 'light') {
        $("#darkStyle").attr("disabled","disabled");
        $('#lightChart').click();
        $("#tradelist").removeClass("dark-tradelist");
        $("body").removeClass("dark-body");
    } else {
        $("#darkStyle").removeAttr("disabled");
        $('#darkChart').click();
        $("#tradelist").addClass("dark-tradelist");
        $("body").addClass("dark-body");
    }

    $.cookie("mystyle",theme,{expires:30, path: '/' });
    $(this).addClass("cur-theme").siblings().removeClass("cur-theme");
});
var cookie_style = $.cookie("mystyle");
if(cookie_style == 'light' || typeof(cookie_style) == 'undefined'){
    $("#light").addClass("cur-theme");
} else {
    $("#dark").addClass("cur-theme");
    $("#tradelist").addClass("dark-tradelist");
}

</script>
