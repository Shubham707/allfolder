<script>
    !function(r,n){"function"==typeof define&&define.amd?define(["jquery"],n):"object"==typeof exports?module.exports=n(require("jquery")):n(r.jQuery)}(this,function(r,n){function t(r,n,t){var e=f[n.type]||{};return null==r?t||!n.def?null:n.def:(r=e.floor?~~r:parseFloat(r),e.mod?(r+e.mod)%e.mod:Math.min(e.max,Math.max(0,r)))}function e(n){var t=u(),e=t._rgba=[];return n=n.toLowerCase(),c(s,function(r,o){var a,i=o.re.exec(n),s=i&&o.parse(i),u=o.space||"rgba";if(s)return a=t[u](s),t[l[u].cache]=a[l[u].cache],e=t._rgba=a._rgba,!1}),e.length?("0,0,0,0"===e.join()&&r.extend(e,a.transparent),t):a[n]}function o(r,n,t){return t=(t+1)%1,6*t<1?r+(n-r)*t*6:2*t<1?n:3*t<2?r+(n-r)*(2/3-t)*6:r}var a,i=/^([\-+])=\s*(\d+\.?\d*)/,s=[{re:/rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,parse:function(r){return[r[1],r[2],r[3],r[4]]}},{re:/rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,parse:function(r){return[2.55*r[1],2.55*r[2],2.55*r[3],r[4]]}},{re:/#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,parse:function(r){return[parseInt(r[1],16),parseInt(r[2],16),parseInt(r[3],16)]}},{re:/#([a-f0-9])([a-f0-9])([a-f0-9])/,parse:function(r){return[parseInt(r[1]+r[1],16),parseInt(r[2]+r[2],16),parseInt(r[3]+r[3],16)]}},{re:/hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,space:"hsla",parse:function(r){return[r[1],r[2]/100,r[3]/100,r[4]]}}],u=r.Color=function(n,t,e,o){return new r.Color.fn.parse(n,t,e,o)},l={rgba:{props:{red:{idx:0,type:"byte"},green:{idx:1,type:"byte"},blue:{idx:2,type:"byte"}}},hsla:{props:{hue:{idx:0,type:"degrees"},saturation:{idx:1,type:"percent"},lightness:{idx:2,type:"percent"}}}},f={byte:{floor:!0,max:255},percent:{max:1},degrees:{mod:360,floor:!0}},c=r.each;c(l,function(r,n){n.cache="_"+r,n.props.alpha={idx:3,type:"percent",def:1}}),u.fn=r.extend(u.prototype,{parse:function(o,i,s,f){if(o===n)return this._rgba=[null,null,null,null],this;(o.jquery||o.nodeType)&&(o=r(o).css(i),i=n);var p=this,d=r.type(o),h=this._rgba=[];return i!==n&&(o=[o,i,s,f],d="array"),"string"===d?this.parse(e(o)||a._default):"array"===d?(c(l.rgba.props,function(r,n){h[n.idx]=t(o[n.idx],n)}),this):"object"===d?(o instanceof u?c(l,function(r,n){o[n.cache]&&(p[n.cache]=o[n.cache].slice())}):c(l,function(n,e){var a=e.cache;c(e.props,function(r,n){if(!p[a]&&e.to){if("alpha"===r||null==o[r])return;p[a]=e.to(p._rgba)}p[a][n.idx]=t(o[r],n,!0)}),p[a]&&r.inArray(null,p[a].slice(0,3))<0&&(p[a][3]=1,e.from&&(p._rgba=e.from(p[a])))}),this):void 0},is:function(r){var n=u(r),t=!0,e=this;return c(l,function(r,o){var a,i=n[o.cache];return i&&(a=e[o.cache]||o.to&&o.to(e._rgba)||[],c(o.props,function(r,n){if(null!=i[n.idx])return t=i[n.idx]===a[n.idx]})),t}),t},_space:function(){var r=[],n=this;return c(l,function(t,e){n[e.cache]&&r.push(t)}),r.pop()},transition:function(r,n){var e=u(r),o=e._space(),a=l[o],i=0===this.alpha()?u("transparent"):this,s=i[a.cache]||a.to(i._rgba),p=s.slice();return e=e[a.cache],c(a.props,function(r,o){var a=o.idx,i=s[a],u=e[a],l=f[o.type]||{};null!==u&&(null===i?p[a]=u:(l.mod&&(u-i>l.mod/2?i+=l.mod:i-u>l.mod/2&&(i-=l.mod)),p[a]=t((u-i)*n+i,o)))}),this[o](p)},blend:function(n){if(1===this._rgba[3])return this;var t=this._rgba.slice(),e=t.pop(),o=u(n)._rgba;return u(r.map(t,function(r,n){return(1-e)*o[n]+e*r}))},toRgbaString:function(){var n="rgba(",t=r.map(this._rgba,function(r,n){return null!=r?r:n>2?1:0});return 1===t[3]&&(t.pop(),n="rgb("),n+t.join()+")"},toHslaString:function(){var n="hsla(",t=r.map(this.hsla(),function(r,n){return null==r&&(r=n>2?1:0),n&&n<3&&(r=Math.round(100*r)+"%"),r});return 1===t[3]&&(t.pop(),n="hsl("),n+t.join()+")"},toHexString:function(n){var t=this._rgba.slice(),e=t.pop();return n&&t.push(~~(255*e)),"#"+r.map(t,function(r){return("0"+(r||0).toString(16)).substr(-2)}).join("")},toString:function(){return 0===this._rgba[3]?"transparent":this.toRgbaString()}}),u.fn.parse.prototype=u.fn,l.hsla.to=function(r){if(null==r[0]||null==r[1]||null==r[2])return[null,null,null,r[3]];var n,t,e=r[0]/255,o=r[1]/255,a=r[2]/255,i=r[3],s=Math.max(e,o,a),u=Math.min(e,o,a),l=s-u,f=s+u,c=.5*f;return n=u===s?0:e===s?60*(o-a)/l+360:o===s?60*(a-e)/l+120:60*(e-o)/l+240,t=0===l?0:c<=.5?l/f:l/(2-f),[Math.round(n)%360,t,c,null==i?1:i]},l.hsla.from=function(r){if(null==r[0]||null==r[1]||null==r[2])return[null,null,null,r[3]];var n=r[0]/360,t=r[1],e=r[2],a=r[3],i=e<=.5?e*(1+t):e+t-e*t,s=2*e-i;return[Math.round(255*o(s,i,n+1/3)),Math.round(255*o(s,i,n)),Math.round(255*o(s,i,n-1/3)),a]},c(l,function(e,o){var a=o.props,s=o.cache,l=o.to,f=o.from;u.fn[e]=function(e){if(l&&!this[s]&&(this[s]=l(this._rgba)),e===n)return this[s].slice();var o,i=r.type(e),p="array"===i||"object"===i?e:arguments,d=this[s].slice();return c(a,function(r,n){var e=p["object"===i?r:n.idx];null==e&&(e=d[n.idx]),d[n.idx]=t(e,n)}),f?(o=u(f(d)),o[s]=d,o):u(d)},c(a,function(n,t){u.fn[n]||(u.fn[n]=function(o){var a,s,u,l,f=r.type(o);return l="alpha"===n?this._hsla?"hsla":"rgba":e,a=this[l](),s=a[t.idx],"undefined"===f?s:("function"===f&&(o=o.call(this,s),f=r.type(o)),null==o&&t.empty?this:("string"===f&&(u=i.exec(o))&&(o=s+parseFloat(u[2])*("+"===u[1]?1:-1)),a[t.idx]=o,this[l](a)))})})}),u.hook=function(n){var t=n.split(" ");c(t,function(n,t){r.cssHooks[t]={set:function(n,o){var a;"transparent"===o||"string"===r.type(o)&&!(a=e(o))||(o=(o=u(a||o)).toRgbaString()),n.style[t]=o}},r.fx.step[t]=function(n){n.colorInit||(n.start=u(n.elem,t),n.end=u(n.end),n.colorInit=!0),r.cssHooks[t].set(n.elem,n.start.transition(n.end,n.pos))}})},u.hook("backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor"),r.cssHooks.borderColor={expand:function(r){var n={};return c(["Top","Right","Bottom","Left"],function(t,e){n["border"+e+"Color"]=r}),n}},a=r.Color.names={aqua:"#00ffff",black:"#000000",blue:"#0000ff",fuchsia:"#ff00ff",gray:"#808080",green:"#008000",lime:"#00ff00",maroon:"#800000",navy:"#000080",olive:"#808000",purple:"#800080",red:"#ff0000",silver:"#c0c0c0",teal:"#008080",white:"#ffffff",yellow:"#ffff00",transparent:[null,null,null,0],_default:"#ffffff"}});
    //slides
    var slideList=$('#slides').find('li');
    var bannerPro=$("#bannerProgress");
    var numpic = slideList.size() - 1;
    var nownow = 0;
    var inout = 0;
    var TT = 0;
    var SPEED = 5000;
    $("#full-screen-slider").css('background-color', slideList.eq(0).attr("data-id"));
    slideList.eq(0).find(".txt-banner").css("color", slideList.eq(0).attr("data-txt"));
    slideList.eq(0).siblings('li').css('display', 'none');
    var ulstart = '<div id="sCon"><ul id="pagination">',
        ulcontent = '',
        ulend = '</ul></div>';
    ADDLI();
    var pn=$('#pagination'), pagination = pn.find('li');

    pagination.eq(0).addClass('current');

    function ADDLI() {
        for (var i = 0; i <= numpic; i++) {
            ulcontent += '<li>' + '<a href="javascript:;">' + (i + 1) + '</a>' + '</li>'
        }
        $('#slides').after(ulstart + ulcontent + ulend)
    }
    pagination.on('click', DOTCHANGE);
    function DOTCHANGE() {
        var changenow = $(this).index();
        slideList.eq(nownow).css('z-index', '900');
        slideList.eq(changenow).css({
            'z-index': '800'
        }).show();
        pagination.eq(changenow).addClass('current').siblings('li').removeClass('current');
        slideList.eq(nownow).css("display","none").find(".txt-banner").css("color",slideList.eq(changenow).attr("data-txt"));
        slideList.eq(changenow).fadeIn(1000);
        nownow = changenow;
        $('#full-screen-slider').animate({"background-color": slideList.eq(changenow).attr("data-id")}, 1000);
        slideList.eq(changenow).find(".txt-banner").animate({"color": slideList.eq(changenow).attr("data-txt")}, 1000);
        bannerPro.find("div").css("width","0")
    }

    $('#pagination li,#slides li').hover(function () {
        inout = 1;
        clearTimeout(TT);
        bannerPro.find("div").stop()
    },function () {
        inout = 0;
        TT = setTimeout(GOGO, 5000);
        progr()
    });

    function progr() {
        bannerPro.find("div").animate({"width": bannerPro.width()}, SPEED,function () {
            $(this).attr("style","")
        });
    } progr();
    function GOGO() {
        var NN = nownow + 1;
        if (inout == 1) {} else {
            if (nownow < numpic) {
                slideList.eq(nownow).css('z-index', '900');
                slideList.eq(NN).css({
                    'z-index': '800'
                }).show();
                pagination.eq(NN).addClass('current').siblings('li').removeClass('current');
                slideList.eq(nownow).css("display","none").find(".txt-banner").css("color",slideList.eq(NN).attr("data-txt"));
                slideList.eq(NN).fadeIn(1000);
                $('#full-screen-slider').animate({"background-color": slideList.eq(NN).attr("data-id")}, 1000);
                slideList.eq(NN).find(".txt-banner").animate({"color": slideList.eq(NN).attr("data-txt")}, 1000);
                nownow += 1
            } else {
                NN = 0;
                slideList.eq(nownow).css('z-index', '900');
                slideList.eq(NN).stop(true, true).css({
                    'z-index': '800'
                }).show();
                slideList.eq(nownow).css("display","none").find(".txt-banner").css("color",slideList.eq(NN).attr("data-txt"));
                slideList.eq(0).fadeIn(1000);
                $('#full-screen-slider').animate({"background-color": slideList.eq(0).attr("data-id")}, 1000);
                slideList.eq(0).find(".txt-banner").animate({"color": slideList.eq(0).attr("data-txt")}, 1000);
                pagination.eq(NN).addClass('current').siblings('li').removeClass('current');
                nownow = 0
            }
            progr();
            TT = setTimeout(GOGO, SPEED)
        }

    }

    TT = setTimeout(GOGO, 5000);

    var tFundCo=$.cookie('total_fund');
    if(tFundCo == 0){
        $("#showHideBtn").addClass("view-hide").removeClass("view-show");
        $(".total-num").hide();
        $(".hide-num").text("******").show();
    }

    if(parseFloat($("#assetBTC").text()) == 0){
        $(".z-hide").hide()
    }
    $("#showHideBtn").toggle(
            function () {
                $(this).addClass("view-hide").removeClass("view-show");
                $(".total-num").hide();
                $(".hide-num").text("******").show();
                $.cookie('total_fund', 0, { expires: 365, path: '/' });
            },function () {
                $(this).addClass("view-show").removeClass("view-hide");
                if($(".z-hide").is(':visible')){
                    $(".total-num").show();
                } else {
                    $(".usd-num").show();
                }
                $(".hide-num").hide();
                $.cookie('total_fund', 1, { expires: 365, path: '/' });
            }
    )
</script>
<div  class="left_con">
    <div class="tline_btns clearfix" id="marketlist_controller" >
        <button value="USDT" id="usdtBtn" class="tline_btn button button-flat-action">
            USDT Markets
            <div class="load8"><div class="loader">Loading</div></div>
            <span class="caret"></span>
        </button>
        <button value="BTC" id="btcBtn" class="tline_btn button button-flat-action">
            BTC Markets
            <div class="load8"><div class="loader">Loading</div></div>
            <span class="caret"></span>
        </button>
        <button value="ETH" id="ethBtn" class="tline_btn button button-flat-action">
            ETH Markets
            <div class="load8"><div class="loader">Loading</div></div>
            <span class="caret"></span>
        </button>
        <button value="NEW" id="newBtn" class="tline_btn button button-flat-action">
            New Markets
            <div class="load8"><div class="loader">Loading</div></div>
            <span class="caret"></span>
        </button>
        <button value="custom" id="customBtn" class="custom_btn tline_btn button button-flat-action">
            My Markets
            <div class="load8"><div class="loader">Loading</div></div>
            <span class="caret"></span>
        </button>
    </div>

    <div class="custom-trade-area">
        <div class="custom-ctrl">
            <div class="hide-show-con clearfix">
                <input type="checkbox" id="hideCustom2" class="hide-show-mark" name="hideCustom2" style="width: 20px;"><label for="hideCustom2" class="vr-btn"></label><label for="hideCustom2" class="hide-custom">Edit Custom</label>
            </div>
        </div>
        <div id="custom_box" class="list-box">
            <table class="marketlist dataTable" id="customlist" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th class="sortable sorting bizhong" align="left">
                        Name
                    </th>
                    <th class="no-wrap sortable alignRight sorting market-price" align="right">
                        Price
                    </th>
                    <th class="no-wrap sortable alignRight sorting" align="right">
                        <b>
                            Volume
                        </b>
                    </th>
                    <th class="no-wrap sortable alignRight sorting" align="right">
                        <b>
                            Supply
                        </b>
                    </th>
        <th class="no-wrap sortable alignRight sorting" align="right">
                        <b>
                            Market Cap
                        </b>
                    </th>
                    <th class="no-wrap sortable alignRight sorting day-updn" align="right">
                        <b>
                            24h Change
                        </b>
                    </th>
                    <th class="no-wrap sorting_disabled price-flot" align="right">
                        <b>
                            Price Trend(3d)
                        </b>
                    </th>
                    <th class="no-wrap sorting_disabled go-trade" align="right"></th>
                </tr>
                </thead>
                <tbody id="custom_tbody"></tbody>
            </table>
        </div>
        <b class='fail-tip'></b>
    </div>
    <div class="normal-trade-area">
        <div class="custom-ctrl">
            <div class="hide-show-con clearfix">
                <input type="checkbox" id="hideCustom" class="hide-show-mark" name="hideCustom" style="width: 20px;"><label for="hideCustom" class="vr-btn"></label><label for="hideCustom" class="hide-custom">Edit Custom</label>
            </div>
        </div>
        <div id="marketlist_box" class="list-box uncustom">
            <table class="marketlist dataTable" id="marketlist" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th class="sortable sorting bizhong" align="left">Name</th>
                    <th class="no-wrap sortable alignRight sorting market-price" align="right">Price(BTC)</th>
                    <th class="no-wrap sortable alignRight sorting" align="right"><b>Volume(BTC)</b></th>
                    <th class="no-wrap sortable alignRight sorting" align="right"><b>Supply</b></th>
                    <th class="no-wrap sortable alignRight sorting" align="right"><b>Market Cap</b></th>
                    <th class="no-wrap sortable alignRight sorting day-updn" align="right"><b>24h Change</b></th>
                    <th class="no-wrap sorting_disabled price-flot" align="right"><b>Price Trend(3d)</b></th>
                    <th class="no-wrap sorting_disabled go-trade" align="right"></th>
                </tr>
                </thead>
                </table>
        </div>
    </div>
    <div class="bottom-notice">
        <ul>
                                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="18" viewBox="0 -2.914 13 18"><path fill="#666" d="M9.126 5.273l-.88.782v.057c.73.795 1.178 1.884 1.178 3.083 0 1.2-.45 2.29-1.178 3.085v.06l.88.78c.915-1.02 1.476-2.4 1.476-3.925 0-1.523-.56-2.904-1.476-3.922zM0 6.84v4.712h2.356l3.534 3.534V3.306L2.356 6.84"/><path fill="#666" d="M10.98 3.625l-.883.782C11.15 5.725 11.78 7.387 11.78 9.2c0 1.814-.63 3.476-1.683 4.784l.882.782c1.234-1.52 1.977-3.457 1.977-5.57 0-2.112-.742-4.054-1.98-5.573v.002z"/></svg>
                    <a href="article/16305.html" target=_blank>Notice: BCX is listed on <?php echo PROJECT_TITLE?></a><a href="articlelist/ann.html" style="margin-left: 20px;color: #de5959">More...</a>
                </li>
                        </ul>
    </div>
</div>
