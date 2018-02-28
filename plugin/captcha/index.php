
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Demos: 99Points : reCaptcha Style Captcha with PHP and JQuery and CSS </title>

<script type="text/javascript" src="captcha.js"></script>
<link href="captcha.css" rel="stylesheet" type="text/css">

<script>
$(document).ready(function() { 

 // refresh captcha
 $('img#captcha-refresh').click(function() {  
		
		change_captcha();
 });
 
 function change_captcha()
 {
	document.getElementById('captcha').src="get_captcha.php?rnd=" + Math.random();
 }
 
});
 	
</script>		 

</head>

<body>


</div>
<!-- BuySellAds.com Ad Code -->

<script type="text/javascript">

(function(){

  var bsa = document.createElement('script');

     bsa.type = 'text/javascript';

     bsa.async = true;

     bsa.src = '//s3.buysellads.com/ac/bsa.js';

  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);

})();

</script>

<!-- END BuySellAds.com Ad Code -->

<!-- BuySellAds.com Zone Code -->
<!-- <div id="bsap_1251176" class="bsarocks bsap_f4f4f7f1ca0607a63969fdea922a0a34"></div>-->
<!-- END BuySellAds.com Zone Code -->


<!--<a href="http://www.kqzyfj.com/click-4071657-10536129" target="_top" style="margin-left:8px; float:left">
<img src="http://www.ftjcfx.com/image-4071657-10536129" width="125" height="125" alt="Build a website fast with GoDaddy.com! - 125x125  " border="0"/></a>
-->


<style>
h2{text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
font-family:"Courier New", Courier, monospace; margin:0px;}
a.tuts,span.tuts{
color:#ff0000; font-size:13px; float:left; margin-right:15px; margin-left:15px;
text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
filter: dropshadow(color=#e5e5ee,offX=0,offY=1);
margin-top:4px;
font-family:"Courier New", Courier, monospace;
}
.delicious {
	background:url("http://demos.99points.info/assets/delici.jpg") no-repeat scroll 10px bottom transparent;
	border-left:1px solid #DEDEDE;
	float:left;
	margin-top:3px;
	padding-left:30px;
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
}
.delicious a{font-size:13px;
	line-height:18px;}
.title{ background:#D2ECFB; padding-left:10px; padding:4px;}
.shareButtons{ background:#FFF5DF; margin:0px; padding:8px;}

.tweetThis {
	background:url("http://demos.99points.info/assets/twit.png") no-repeat scroll 8px top transparent;
	border-left:1px solid #DEDEDE;
	float:left;
	font-size:12px;
	margin-left:8px;
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
	line-height:18px;
	margin-top:3px;
	padding-left:30px;float:left;
}

.digg{
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
	padding:4px; color:#000000; font-size:12px;
	margin-top:2px; float:left
}
#bookmarks{	margin-top:3px; float:left}
#bookmarks a{
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
	color:#000000; font-size:14px; font-weight:bold;
	padding-left:20px; 
}
</style>


	<h2 class="title" align="left">reCaptcha Style Captcha with PHP and JQuery</h2>
	<div class="shareButtons">
		<a style="color:#000000; font-size:14px; float:left; margin-top:3px;" href="http://www.99points.info/2011/01/recaptcha-style-captcha-with-jquery-and-php/">Back To Tutorial</a>
		<!-- share  DO uper float left-->
		<div style="float: left; margin-left: 25px;">
		<iframe scrolling="no" frameborder="0" style="border: medium none; margin-top:2px; overflow: hidden; width: 80px; height: 21px;" src="http://www.facebook.com/plugins/like.php?href=http://www.99points.info/2011/01/recaptcha-style-captcha-with-jquery-and-php/&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" allowtransparency="true"></iframe>
		</div>
		<div class="delicious">
		<a target="_blank" style="color: rgb(85, 85, 85);" href="http://del.icio.us/post?url=http://www.99points.info/2011/01/recaptcha-style-captcha-with-jquery-and-php/&amp;title=reCaptcha Style Captcha with PHP and JQuery">Delicious</a>
		</div>
		
		<div class="tweetThis">
		<a title="Twitter" target="_blank" style="color: rgb(85, 85, 85);" href=" http://twitter.com/home?status=reCaptcha Style Captcha with PHP and JQuery http://www.99points.info/2011/01/recaptcha-style-captcha-with-jquery-and-php/">Tweet</a>
		</div>
		
		<img border="0" src="http://demos.99points.info/assets/digg.png" style="margin-left:15px; margin-top:3px; float:left;" height="18" alt="Digg This Tutorial">
		<a title="Digg This Tutorial" class="digg" href="http://digg.com/submit?phase=2&amp;url=http://www.99points.info/2011/01/recaptcha-style-captcha-with-jquery-and-php/&amp;title=reCaptcha Style Captcha with PHP and JQuery " target="_blank">Digg This</a>
	  	
		<a  href="http://demos.99points.info" target="_blank" style="margin-left:40px;" class="tuts"><b>Most Popular Tutorials</b></a>
		<!--<a  href="http://www.99points.info/feed/" class="tuts"><b>Subscribe Now</b></a>-->
		
		
		<!--<div  id="bookmarks">
			<a href="javascript:bookmark()" >Save 99Points to Browser</a>
		</div>-->
		
		
		<br clear="all" />
	</div>
	
<br clear="all" />
<!-- share -->
<div align="center" style=" height:550px; margin-top:150px;">
	
	
	
	<!-- Captcha HTML Code -->
	
	<div id="captcha-wrap">
		<div class="captcha-box">
			<img src="get_captcha.php" alt="" id="captcha" />
		</div>
		<div class="text-box">
			<label>Type the two words:</label>
			<input name="captcha-code" type="text" id="captcha-code">
		</div>
		<div class="captcha-action">
			<img src="refresh.jpg"  alt="" id="captcha-refresh" />
		</div>
	</div>
	
	<!--  Copy and Paste above html in any form and include CSS, get_captcha.php files to show the captcha  -->
	
	
</div>

<br clear="all" /><br clear="all" />			  
<style>
#heading
{
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:56px;
	color:#CC0000;				
}
#footerAds{ position:fixed; bottom:0px; right:0px;}
</style>
<div align="center">
<a id="heading" href="http://www.99points.info/">99Points.info</a>
</div>
<p style="border:solid #000000 1px; background:#CC3333; color:#FFFFFF" align="center">
        <a style=" text-decoration:none; font-size:18px;color:#FFFFFF" href="http://99Points.info"> Codeigniter , JQuery PHP Helping Demos on 99Points.info</a>
      </p>
	  
	  <div id="footerAds">
	  <!-- BuySellAds.com Zone Code -->
<div id="bsap_1251176" class="bsarocks bsap_f4f4f7f1ca0607a63969fdea922a0a34"></div>
<!-- End BuySellAds.com Zone Code -->

	  
	  </div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16292925-1");
pageTracker._trackPageview();
} catch(err) {}</script>



		  
</body>
</html>