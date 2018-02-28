//HEAD 
(function(app) {
try { app = angular.module("blocktrail.templates"); }
catch(err) { app = angular.module("blocktrail.templates", []); }
app.run(["$templateCache", function($templateCache) {
"use strict";

$templateCache.put("js/modules/core/controllers/dialog-alert-modal/dialog-alert-modal.tpl.html","<div on-swipe-down=\"dismiss()\">\n" +
    "    <div class=\"modal-header\" ng-class=\"message.header_class\">\n" +
    "        <h3 class=\"modal-title\">{{ message.title | translate }}</h3>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-body\" ng-class=\"message.body_class\">\n" +
    "        <p ng-if=\"message.body\">{{ message.body | translate }}</p>\n" +
    "        <p ng-if=\"message.bodyHtml\" ng-bind-html=\"message.bodyHtml\"></p>\n" +
    "\n" +
    "        <p ng-if=\"message.showSpinner\">\n" +
    "            <loading-spinner></loading-spinner>\n" +
    "        </p>\n" +
    "\n" +
    "        <p ng-if=\"message.qr\" class=\"text-center\">\n" +
    "            <qr text=\"message.qr.text\"\n" +
    "                type-number=\"message.qr.typeNumber\"\n" +
    "                correction-level=\"message.qr.correctionLevel\"\n" +
    "                size=\"message.qr.SIZE\"\n" +
    "                input-mode=\"message.qr.inputMode\"\n" +
    "                image=\"message.qr.image\"></qr>\n" +
    "        </p>\n" +
    "\n" +
    "        <p ng-if=\"message.bodyExtra\">{{ message.bodyExtra | translate }}</p>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-footer\" ng-class=\"message.footer_class\">\n" +
    "        <a ng-if=\"message.cancel\" class=\"btn btn-alt btn-danger\" ng-click=\"dismiss()\">\n" +
    "            {{ (message.cancel === true ? 'CANCEL' : message.cancel) | translate }}\n" +
    "        </a>\n" +
    "        <a ng-if=\"message.ok\" class=\"btn btn-alt btn-success\" ng-click=\"close()\">\n" +
    "            {{ (message.ok === true ? 'OK' : message.ok) | translate }}\n" +
    "        </a>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/core/controllers/dialog-prompt-modal/dialog-prompt-modal.tpl.html","<form class=\"form\" name=\"sendInputForm\" novalidate ng-submit=\"submit()\">\n" +
    "    <div class=\"modal-header\" ng-class=\"message.header_class\">\n" +
    "        <h3 class=\"modal-title\">{{ message.title | translate }}</h3>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-body\" ng-class=\"message.body_class\">\n" +
    "        <p ng-if=\"message.body\">{{ message.body | translate }}</p>\n" +
    "        <p ng-if=\"message.bodyHtml\" ng-bind-html=\"message.bodyHtml\"></p>\n" +
    "\n" +
    "        <p ng-if=\"message.qr\" class=\"text-center\">\n" +
    "            <qr text=\"message.qr.text\"\n" +
    "                type-number=\"message.qr.typeNumber\"\n" +
    "                correction-level=\"message.qr.correctionLevel\"\n" +
    "                size=\"message.qr.SIZE\"\n" +
    "                input-mode=\"message.qr.inputMode\"\n" +
    "                image=\"message.qr.image\"></qr>\n" +
    "        </p>\n" +
    "\n" +
    "        <p ng-if=\"message.bodyExtra\">{{ message.bodyExtra | translate }}</p>\n" +
    "\n" +
    "        <div class=\"form-group form-group-lg\" ng-if=\"message.prompt\">\n" +
    "            <label ng-if=\"message.label\" class=\"control-label\" for=\"prompt\">{{ message.label | translate }}</label>\n" +
    "\n" +
    "            <div ng-if=\"message.icon\" class=\"input-group\">\n" +
    "                <input autocomplete=\"{{ message.autocomplete || 'off' }}\" autofocus\n" +
    "                       type=\"{{ message.input_type || 'text' }}\" ng-model=\"form.prompt\" id=\"prompt\"\n" +
    "                       class=\"form-control\"/>\n" +
    "                <span class=\"input-group-addon\">\n" +
    "                    <i class=\"bticon bticon-{{ message.icon }}\"></i>\n" +
    "                </span>\n" +
    "            </div>\n" +
    "            <div ng-if=\"!message.icon\">\n" +
    "                <input autocomplete=\"{{ message.autocomplete || 'off' }}\" autofocus\n" +
    "                       type=\"{{ message.input_type || 'text' }}\" ng-model=\"form.prompt\" id=\"prompt\"\n" +
    "                       class=\"form-control\"/>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-footer\" ng-class=\"message.footer_class\">\n" +
    "        <a ng-if=\"message.cancel\" class=\"btn btn-alt btn-danger btn-lg\" ng-click=\"dismiss()\">{{\n" +
    "            (message.cancel === true ? 'CANCEL' : message.cancel) | translate }}</a>\n" +
    "        <input type=\"submit\" ng-if=\"message.ok\" class=\"btn btn-alt btn-success btn-lg\"\n" +
    "               value=\"{{ (message.ok === true ? 'OK' : message.ok) | translate }}\"/>\n" +
    "    </div>\n" +
    "</form>\n" +
    "")

$templateCache.put("js/modules/core/controllers/dialog-spinner-modal/dialog-spinner-modal.tpl.html","<div class=\"modal-header\" ng-class=\"message.header_class\">\n" +
    "    <h3 class=\"modal-title\">{{ message.title | translate }}</h3>\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"modal-body\" ng-class=\"message.body_class\">\n" +
    "    <p ng-if=\"message.body\">{{ message.body | translate }}</p>\n" +
    "    <p ng-if=\"message.bodyHtml\" ng-bind-html=\"message.bodyHtml\"></p>\n" +
    "\n" +
    "    <p ng-if=\"message.bodyExtra\">{{ message.bodyExtra | translate }}</p>\n" +
    "\n" +
    "    <div class=\"text-center\">\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/core/directives/app-wrapper/app-wrapper.tpl.html","<div class=\"container\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "            <div class=\"appWrapper\">\n" +
    "                <h1 class=\"pageTitle\">{{ title | translate }}</h1>\n" +
    "\n" +
    "                <ng-transclude></ng-transclude>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/core/directives/btn-file-data/btn-file-data.tpl.html","<div class=\"btn-file-data\">\n" +
    "    <button\n" +
    "            type=\"button\"\n" +
    "            class=\"btn btn-block\"\n" +
    "            ng-click=\"triggerClickOnInputFile()\"\n" +
    "            ng-transclude\n" +
    "    ></button>\n" +
    "    <input type=\"file\"/>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/core/directives/navbar/navbar.tpl.html","<nav class=\"navbar\">\n" +
    "    <div class=\"container\">\n" +
    "        <div class=\"navbar-header\">\n" +
    "            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\"\n" +
    "                    data-target=\"#blocktrail-webwallet-nav\">\n" +
    "                <i class=\"bticon  bticon-arrow-down-circle-o\"></i>\n" +
    "            </button>\n" +
    "            <a class=\"navbar-brand\" ng-href=\"{{ CONFIG.HOMEPAGE_URL }}\" target=\"_self\"><img src=\"{{ CONFIG.STATICSURL }}/img/logo-btc-reverse.png\"/></a>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"collapse navbar-collapse\" id=\"blocktrail-webwallet-nav\">\n" +
    "            <ul class=\"nav navbar-nav pull-right\" ng-if=\"mode == 'loggedout'\">\n" +
    "                <li ng-class=\"{'active':$state.is('app.setup.register')}\">\n" +
    "                    <a ui-sref=\"app.setup.register\">{{ 'NAVBAR_SIGNUP' | translate }}</a>\n" +
    "                </li>\n" +
    "                <li ng-class=\"{'active':$state.is('app.setup.login')}\">\n" +
    "                    <a ui-sref=\"app.setup.login\">{{ 'NAVBAR_LOGIN' | translate }}</a>\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "\n" +
    "            <ul class=\"nav navbar-nav\" ng-if=\"mode == 'explorer'\">\n" +
    "                <li>\n" +
    "                    <a href=\"/\">{{ 'NAVBAR_HOME' | translate }}</a>\n" +
    "                </li>\n" +
    "                <li>\n" +
    "                    <a href=\"/blocks\">{{ 'NAVBAR_BLOCKS' | translate }}</a>\n" +
    "                </li>\n" +
    "                <li>\n" +
    "                    <a href=\"/stats\">{{ 'NAVBAR_STATS' | translate }}</a>\n" +
    "                </li>\n" +
    "                <li>\n" +
    "                    <a href=\"/tools\">{{ 'NAVBAR_TOOLS' | translate }}</a>\n" +
    "                </li>\n" +
    "                <li>\n" +
    "                    <a href=\"/applications\">{{ 'NAVBAR_APPLICATIONS' | translate }}</a>\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "\n" +
    "            <div class=\"searchbar\"  ng-if=\"mode == 'explorer'\">\n" +
    "                <div class=\"searchbar-inner\">\n" +
    "                    <form action=\"https://www.btc.com/search/\" method=\"GET\" class=\"searchbar-form clearfix\" onsubmit=\"this.q.value = this.q.value.trim()\">\n" +
    "                        <button class=\"searchbar-submit\" type=\"submit\">\n" +
    "                            <span class=\"glyphicon glyphicon-search\"></span>\n" +
    "                        </button>\n" +
    "                        <div class=\"searchbar-input-container\">\n" +
    "                            <input type=\"search\" class=\"searchbar-input\" name=\"q\"\n" +
    "                                   placeholder=\"{{ 'NAVBAR_SEARCH_PLACEHOLDER' | translate }}\"\n" +
    "                                   autocomplete=\"off\"\n" +
    "                                   onfocus=\"$(this).addClass('active')\"\n" +
    "                                   onblur=\"this.value.length > 1 || $(this).removeClass('active')\" />\n" +
    "                        </div>\n" +
    "                    </form>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "\n" +
    "            <ul class=\"nav navbar-nav navbar-right\" ng-if=\"mode == 'loggedin'\">\n" +
    "                <li>\n" +
    "                    <a ui-sref=\"app.logout\">{{ 'LOGOUT' | translate }}</a>\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "\n" +
    "\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</nav>\n" +
    "\n" +
    "\n" +
    "")

$templateCache.put("js/modules/core/directives/network-custom-select/network-custom-select.tpl.html","<div class=\"custom-select\" ng-init=\"customSelect={showselect: false}\">\n" +
    "    <div class=\"custom-select-choice\" ng-click=\"customSelect.showselect=true\">\n" +
    "        <span class=\"custom-select-arrow\">\n" +
    "            <i class=\"bticon bticon-down-open\" ng-click=\"\"></i>\n" +
    "        </span>\n" +
    "        <div class=\"custom-option\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-9\">\n" +
    "                    <span class=\"custom-option-title\">\n" +
    "                        {{ CONFIG.NETWORKS[form.networkType].NETWORK_LONG }} ({{ CONFIG.NETWORKS[form.networkType].NETWORK }})\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"custom-select-menu\"\n" +
    "         ng-show=\"customSelect.showselect\"\n" +
    "         click-anywhere-but-here=\"customSelect.showselect = false\"\n" +
    "         is-active=\"customSelect.showselect == true\"\n" +
    "    >\n" +
    "        <div class=\"custom-option\"\n" +
    "             ng-repeat=\"networkOption in networkTypes | orderBy:'index'\"\n" +
    "             ng-click=\"form.networkType = networkOption.value; customSelect.showselect=false\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-9\">\n" +
    "                    <span class=\"custom-option-title sentence-case\">\n" +
    "                        {{ networkOption.label }}\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/core/directives/top-header/top-header.tpl.html","<header class=\"top-header\">\n" +
    "    <div class=\"container\">\n" +
    "        <div class=\"logo pull-left\">\n" +
    "            <a ng-href=\"{{ CONFIG.HOMEPAGE_URL }}\" target=\"_self\"><img src=\"{{ CONFIG.STATICSURL }}/img/logo-btc-reverse.png\"/></a>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"pull-right\">\n" +
    "            <ul class=\"nav navbar-nav\" ng-if=\"mode == 'loggedout'\">\n" +
    "                <li ng-class=\"{'active':$state.is('app.setup.register')}\">\n" +
    "                    <a ui-sref=\"app.setup.register\">{{ 'NAVBAR_SIGNUP' | translate }}</a>\n" +
    "                </li>\n" +
    "                <li ng-class=\"{'active':$state.is('app.setup.login')}\">\n" +
    "                    <a ui-sref=\"app.setup.login\">{{ 'NAVBAR_LOGIN' | translate }}</a>\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "\n" +
    "            <ul class=\"nav navbar-nav\" ng-if=\"mode == 'loggedin'\">\n" +
    "                <li>\n" +
    "                    <a ui-sref=\"app.logout\">{{ 'LOGOUT' | translate }}</a>\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "\n" +
    "            <div ng-if=\"mode == 'explorer'\">\n" +
    "                <ul class=\"nav navbar-nav\">\n" +
    "                    <li>\n" +
    "                        <a href=\"/\">{{ 'NAVBAR_HOME' | translate }}</a>\n" +
    "                    </li>\n" +
    "                    <li>\n" +
    "                        <a href=\"/blocks\">{{ 'NAVBAR_BLOCKS' | translate }}</a>\n" +
    "                    </li>\n" +
    "                    <li>\n" +
    "                        <a href=\"/stats\">{{ 'NAVBAR_STATS' | translate }}</a>\n" +
    "                    </li>\n" +
    "                    <li>\n" +
    "                        <a href=\"/tools\">{{ 'NAVBAR_TOOLS' | translate }}</a>\n" +
    "                    </li>\n" +
    "                    <li>\n" +
    "                        <a href=\"/applications\">{{ 'NAVBAR_APPLICATIONS' | translate }}</a>\n" +
    "                    </li>\n" +
    "                </ul>\n" +
    "\n" +
    "                <div class=\"searchbar\"  ng-if=\"mode == 'explorer'\">\n" +
    "                    <div class=\"searchbar-inner\">\n" +
    "                        <form action=\"https://www.btc.com/search/\" method=\"GET\" class=\"searchbar-form clearfix\" onsubmit=\"this.q.value = this.q.value.trim()\">\n" +
    "                            <button class=\"searchbar-submit\" type=\"submit\">\n" +
    "                                <span class=\"glyphicon glyphicon-search\"></span>\n" +
    "                            </button>\n" +
    "                            <div class=\"searchbar-input-container\">\n" +
    "                                <input type=\"search\" class=\"searchbar-input\" name=\"q\"\n" +
    "                                       placeholder=\"{{ 'NAVBAR_SEARCH_PLACEHOLDER' | translate }}\"\n" +
    "                                       autocomplete=\"off\"\n" +
    "                                       onfocus=\"$(this).addClass('active')\"\n" +
    "                                       onblur=\"this.value.length > 1 || $(this).removeClass('active')\" />\n" +
    "                            </div>\n" +
    "                        </form>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</header>\n" +
    "\n" +
    "\n" +
    "")

$templateCache.put("js/modules/setup/controllers/banned-ip/banned-ip.tpl.html","<div>\n" +
    "    <top-header mode=\"'loggedout'\"></top-header>\n" +
    "\n" +
    "    <div class=\"container\">\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "                <div class=\"appWrapper\">\n" +
    "                    <h1 class=\"pageTitle text-center\">{{ 'BANNED_IP_TITLE' | translate }}</h1>\n" +
    "                    <div class=\"formContainer text-center\" style=\"padding: 20px;font-size:16px;\">\n" +
    "                        <div ng-bind-html=\"'BANNED_IP_BODY' | translate:{bannedIp: bannedIp} | nl2br\"></div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div ng-include=\"'templates/common/footer.html'\"></div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/change-password/change-password.tpl.html","<div class=\"container\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "            <div class=\"appWrapper\">\n" +
    "                <h1 class=\"pageTitle\">{{ 'SETUP_FORGOT_PASSWORD' | translate }}</h1>\n" +
    "\n" +
    "                <div class=\"formContainer\"\n" +
    "                     ng-if=\"stepCount === 0\">\n" +
    "                    <!-- Step 1 of password change -->\n" +
    "                    <form class=\"form\"\n" +
    "                          novalidate>\n" +
    "                        <div ng-if=\"error\" class=\"has-error\">\n" +
    "                            <div class=\"help-block\">\n" +
    "                                {{ error | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"help-block\">\n" +
    "                            {{ 'SETUP_FORGOT_PASS_STEP2' | translate }}\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg\">\n" +
    "                            <label class=\"control-label\">{{ 'ERS' | translate }}</label>\n" +
    "                            <textarea class=\"form-control\"\n" +
    "                                      style=\"resize: vertical; margin-bottom: 5px;\"\n" +
    "                                      placeholder=\"{{ 'ERS' | translate }}\"\n" +
    "                                      rows=\"4\"\n" +
    "                                      cols=\"50\"\n" +
    "                                      name=\"inputERS\"\n" +
    "                                      ng-model=\"form.ERS\"\n" +
    "                                      typeahead=\"word for word in bip39EN | filterERS : $viewValue | limitTo:4\">\n" +
    "                            </textarea>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                            <button class=\"form-control btn btn-alt btn-primary\" ng-disabled=\"working\" ng-click=\"decryptERS()\">{{ 'CONTINUE' | translate }}</button>\n" +
    "                            <div ng-if=\"working\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'PLEASE_WAIT' | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"smallButtons\">\n" +
    "                            <a class=\"sentence-case\" ui-sref=\"app.setup.login\">{{ 'BACK' | translate }}</a>\n" +
    "                        </div>\n" +
    "                    </form>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"formContainer\"\n" +
    "                     ng-if=\"stepCount === 1\">\n" +
    "                    <!-- Step 2 of password change -->\n" +
    "                    <form name=\"forgotPassForm2\"\n" +
    "                          class=\"form\"\n" +
    "                          novalidate>\n" +
    "                        <div ng-if=\"error\" class=\"has-error\">\n" +
    "                            <div class=\"help-block\">\n" +
    "                                {{ error | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"help-block\">\n" +
    "                            {{ 'SETUP_FORGOT_PASS_NEW_PASS' | translate }}\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg\">\n" +
    "                            <div class=\"password-input\">\n" +
    "                                <div class=\"form-group form-group-lg\">\n" +
    "                                    <input class=\"form-control\" type=\"password\" placeholder=\"{{ 'NEW_PASSWORD_PLACEHOLDER' | translate }}\"\n" +
    "                                           name=\"newPassword\"\n" +
    "                                           ng-model=\"form.newPassword\"\n" +
    "                                           ng-change=\"checkPassword()\"\n" +
    "                                           required=\"true\"\n" +
    "                                           required\n" +
    "                                    />\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg\">\n" +
    "                            <div class=\"password-input\">\n" +
    "                                <input class=\"form-control\" type=\"password\" placeholder=\"{{ 'NEW_PASSWORD_REPEAT_PLACEHOLDER' | translate }}\"\n" +
    "                                       name=\"newPasswordRepeat\"\n" +
    "                                       ng-model=\"form.newPasswordRepeat\"\n" +
    "                                       ng-change=\"checkPassword()\"\n" +
    "                                       required\n" +
    "                                />\n" +
    "                                <div class=\"password-check text-right\">\n" +
    "                                    <i class=\"bticon bticon-cancel-circled text-bad\" ng-if=\"form.passwordCheck && form.passwordCheck.score < 2\"></i>\n" +
    "                                    <i class=\"bticon bticon-cancel-circled text-warning\" ng-if=\"form.passwordCheck && form.passwordCheck.score == 2\"></i>\n" +
    "                                    <i class=\"bticon bticon-ok-circled text-good\" ng-if=\"form.passwordCheck && form.passwordCheck.score >= 3\"></i>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"password-checker password-checker-score-{{ form.passwordCheck.score }}\" ng-if=\"form.passwordCheck.score >= 0\">\n" +
    "                                <span ng-if=\"form.passwordCheck.score == 0\">{{ 'PASSWORD_SUPER_WEAK' | translate }} </span>\n" +
    "                                <span ng-if=\"form.passwordCheck.score == 1\">{{ 'PASSWORD_WEAK' | translate }} </span>\n" +
    "                                <span ng-if=\"form.passwordCheck.score == 2\">{{ 'PASSWORD_MEDIOCRE' | translate }} </span>\n" +
    "                                <span ng-if=\"form.passwordCheck.score == 3\">{{ 'PASSWORD_STRONG' | translate }} </span>\n" +
    "                                <span ng-if=\"form.passwordCheck.score >= 4\">{{ 'PASSWORD_SUPER_STRONG' | translate }} </span>\n" +
    "                                <span translate=\"PASSWORD_TIME_TO_CRACK\" translate-values=\"form.passwordCheck\"></span>\n" +
    "                            </div>\n" +
    "                            <div class=\"password-checker password-checker-score-0\" ng-if=\"form.passwordCheck.score == -1\">\n" +
    "                                <span>{{ 'MSG_BAD_PASSWORD_REPEAT' | translate }}</span>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                            <button class=\"form-control btn btn-alt btn-primary\" ng-disabled=\"working\" ng-click=\"encryptNewERS()\">{{ 'CONTINUE' | translate }}</button>\n" +
    "                            <div ng-if=\"working\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'PLEASE_WAIT' | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </form>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"formContainer\" ng-if=\"stepCount === 2\">\n" +
    "                    <div class=\"text-center\">\n" +
    "                        <h3>You've changed your password successfully.</h3>\n" +
    "\n" +
    "                        <p>You can now login with your new password.</p>\n" +
    "\n" +
    "                        <button class=\"btn btn-lg btn-primary\" ui-sref=\"app.setup.login\">Back to login</button>\n" +
    "                    </div>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/download-mobile-modal/download-mobile-modal.tpl.html","<button type=\"button\" class=\"close\" ng-click=\"dismiss();\" aria-label=\"Close\">\n" +
    "    <span aria-hidden=\"true\">&times;</span>\n" +
    "</button>\n" +
    "\n" +
    "<div class=\"row\">\n" +
    "    <div class=\"col-xs-10 col-xs-offset-1 text-center\">\n" +
    "        <h3 ng-if=\"mobileOS !== 'both'\"\n" +
    "            style=\"margin-top:40px;\"\n" +
    "            translate=\"SETUP_DOWNLOAD_MOBILE_TITLE\"\n" +
    "            translate-value-platform=\"{{ ( mobileOs == 'android' ? 'ANDROID' : 'IOS' ) | translate }}\"\n" +
    "        ></h3>\n" +
    "\n" +
    "        <h3 ng-if=\"mobileOS == 'both'\"\n" +
    "            style=\"margin-top:40px;\"\n" +
    "            translate=\"SETUP_DOWNLOAD_MOBILE_TITLE\"\n" +
    "            translate-value-platform=\"{{ 'ANDROID' | translate }} / {{ 'IOS' | translate }}\">\n" +
    "        </h3>\n" +
    "\n" +
    "        <h4 style=\"margin-top:20px;\">\n" +
    "            {{'SETUP_DOWNLOAD_MOBILE_TEXT' | translate }}\n" +
    "        </h4>\n" +
    "\n" +
    "        <div style=\"padding: 20px 0px;\">\n" +
    "            <a href=\"https://itunes.apple.com/us/app/btc.com-wallet-bitcoin-wallet/id1019614423?mt=8\" target=\"_new\" ng-if=\"mobileOs == 'ios' || mobileOs == 'both'\">\n" +
    "                <img ng-src=\"{{ CONFIG.STATICSURL }}/img/ios.png\" />\n" +
    "            </a>\n" +
    "            <a href=\"https://play.google.com/store/apps/details?id=com.blocktrail.mywallet&hl=en\" target=\"_new\" ng-if=\"mobileOs == 'android' || mobileOs == 'both'\">\n" +
    "                <img ng-src=\"{{ CONFIG.STATICSURL }}/img/android.png\" />\n" +
    "            </a>\n" +
    "        </div>\n" +
    "\n" +
    "        <div style=\"padding: 0 0 40px 0;\">\n" +
    "            Or, continue to <a ng-href=\"#\" ng-click=\"dismiss();\">web version</a>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/forgot-password/forgot-password.tpl.html","<div class=\"container\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "            <div class=\"appWrapper\">\n" +
    "                <h1 class=\"pageTitle\">{{ 'SETUP_FORGOT_PASSWORD' | translate }}</h1>\n" +
    "                <div class=\"formContainer\"\n" +
    "                     ng-if=\"stepCount === 0\">\n" +
    "                    <!-- Step 1 of password change -->\n" +
    "                    <form name=\"forgotPassForm\"\n" +
    "                          class=\"form\"\n" +
    "                          novalidate>\n" +
    "                        <div ng-if=\"error\" class=\"has-error\">\n" +
    "                            <div class=\"help-block\">\n" +
    "                                {{ error | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"help-block\">\n" +
    "                            {{ 'SETUP_FORGOT_PASS_INFO' | translate }}\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg\" ng-class=\"{'has-error': forgotPassForm.email.$dirty && forgotPassForm.email.$invalid}\">\n" +
    "                            <input class=\"form-control\" type=\"email\" placeholder=\"{{ 'SETUP_FORGOT_PASS_PLACEHOLDER' | translate }}\"\n" +
    "                                   name=\"email\"\n" +
    "                                   ng-model=\"form.email\"\n" +
    "                                   required=\"true\"\n" +
    "                                   required\n" +
    "                            />\n" +
    "\n" +
    "                            <div class=\"help help-block text-danger\" ng-if=\"forgotPassForm.email.$dirty && forgotPassForm.email.$invalid\">\n" +
    "                                <div ng-if=\"forgotPassForm.email.$error.required\">{{ 'MSG_BAD_EMAIL' | translate }}</div>\n" +
    "                                <div ng-if=\"!forgotPassForm.email.$error.required && forgotPassForm.email.$error.email\">\n" +
    "                                    {{ 'MSG_BAD_EMAIL' | translate }}\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                            <button class=\"form-control btn btn-alt btn-primary\" ng-disabled=\"working\" ng-click=\"doForgotPass(forgotPassForm)\">{{ 'CONTINUE' | translate }}</button>\n" +
    "                            <div ng-if=\"working\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'PLEASE_WAIT' | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"smallButtons extraMarginBottom\">\n" +
    "                            <p>\n" +
    "                                <a style=\"float: left\" class=\"sentence-case\" ui-sref=\"app.setup.login\">{{ 'BACK' | translate }}</a>\n" +
    "                            </p>\n" +
    "                        </div>\n" +
    "                    </form>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"formContainer\" ng-if=\"stepCount === 1\">\n" +
    "                    <h3>Please check your e-mail inbox.</h3>\n" +
    "\n" +
    "                    <p>If your e-mail is registered with us, then we've sent you a password recovery link.</p>\n" +
    "\n" +
    "                    <div class=\"smallButtons extraMarginBottom\">\n" +
    "                        <p>\n" +
    "                            <a style=\"float: left\" class=\"sentence-case\" ui-sref=\"app.setup.login\">{{ 'BACK' | translate }}</a>\n" +
    "                        </p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/loggedout/loggedout.tpl.html","<div>\n" +
    "    <top-header mode=\"'loggedout'\"></top-header>\n" +
    "\n" +
    "    <div class=\"container\">\n" +
    "        <div class=\"loggedoutWrapper\">\n" +
    "            <div class=\"alert alert-success\">\n" +
    "                <h2>{{'LOGGED_OUT_CONFIRMATION_TITLE' | translate }}</h2>\n" +
    "            </div>\n" +
    "\n" +
    "            <p>{{'LOGGED_OUT_CONFIRMATION_TEXT' | translate }}</p>\n" +
    "            <div class=\"appstoreimages\">\n" +
    "                <a href=\"https://itunes.apple.com/us/app/btc.com-wallet-bitcoin-wallet/id1019614423?mt=8\" target=\"_new\">\n" +
    "                    <img ng-src=\"{{ CONFIG.STATICSURL }}/img/ios.png\" />\n" +
    "                </a>\n" +
    "                <a href=\"https://play.google.com/store/apps/details?id=com.blocktrail.mywallet&hl=en\" target=\"_new\" >\n" +
    "                    <img ng-src=\"{{ CONFIG.STATICSURL }}/img/android.png\" />\n" +
    "                </a>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div ng-include=\"'templates/common/footer.html'\"></div>\n" +
    "</div>\n" +
    "\n" +
    "")

$templateCache.put("js/modules/setup/controllers/login/login.tpl.html","<app-wrapper title=\"'SETUP_LOGIN'\">\n" +
    "    <div class=\"formContainer\">\n" +
    "        <form\n" +
    "            name=\"loginForm\"\n" +
    "            class=\"form page-blur\"\n" +
    "            ng-class=\"{'page-blur-active': isLoading}\"\n" +
    "            novalidate\n" +
    "        >\n" +
    "\n" +
    "            <div ng-if=\"error\" class=\"alert alert-danger\">\n" +
    "                {{ error | translate }}\n" +
    "                <div ng-if=\"errorDetailed\">\n" +
    "                    {{ errorDetailed }}\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <!-- User name/email -->\n" +
    "            <div\n" +
    "                class=\"form-group form-group-lg\"\n" +
    "                ng-class=\"{'has-error': loginForm.username.$dirty && loginForm.username.$invalid}\"\n" +
    "            >\n" +
    "\n" +
    "                <label class=\"control-label\">{{ 'SETUP_LOGIN_PLACEHOLDER' | translate }}</label>\n" +
    "\n" +
    "                <input class=\"form-control\"\n" +
    "                       type=\"text\"\n" +
    "                       placeholder=\"{{ 'SETUP_LOGIN_PLACEHOLDER' | translate }}\"\n" +
    "                       name=\"username\"\n" +
    "                       ng-model=\"form.username\"\n" +
    "        <!-- Password -->\n" +
    "            <div class=\"form-group form-group-lg\" ng-class=\"{'has-error': loginForm.password.$dirty && loginForm.password.$invalid}\">\n" +
    "                <label class=\"control-label\">{{ 'SETUP_PASSWORD_PLACEHOLDER' | translate }}</label>\n" +
    "                <input class=\"form-control\" type=\"password\" placeholder=\"{{ 'SETUP_PASSWORD_PLACEHOLDER' | translate }}\"\n" +
    "                       name=\"password\"\n" +
    "                       ng-model=\"form.password\"\n" +
    "                       required=\"true\"\n" +
    "                       required\n" +
    "                />\n" +
    "                <div class=\"help-block\"\n" +
    "                     ng-if=\"loginForm.password.$dirty && loginForm.password.$invalid\">\n" +
    "                    <div ng-if=\"loginForm.password.$error.required\">{{ 'MSG_MISSING_PASSWORD' | translate }}</div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <!-- Debug mode -->\n" +
    "            <div ng-if=\"isDebugMode\" class=\"form-group form-group-lg\">\n" +
    "                <div class=\"checkbox\">\n" +
    "                    <label>\n" +
    "                        <input\n" +
    "                            type=\"checkbox\"\n" +
    "                            ng-model=\"form.forceNewWallet\">\n" +
    "                        {{ 'SETUP_FORCE_NEW_WALLET' | translate }}\n" +
    "                    </label>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                <button class=\"form-control btn btn-primary\" ng-click=\"onSubmitFormLogin(loginForm)\">{{ 'SETUP_LOGIN' | translate }}</button>\n" +
    "            </div>\n" +
    "\n" +
    "            <!-- Loader overlay -->\n" +
    "            <div\n" +
    "                class=\"page-loader\"\n" +
    "                ng-class=\"{'active': isLoading}\"\n" +
    "            >\n" +
    "                <loading-spinner></loading-spinner>\n" +
    "            </div>\n" +
    "        </form>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-xs-12 iit-15 text-center\">\n" +
    "            <a class=\"sentence-case\" ui-sref=\"app.setup.register\">{{ 'LAUNCH_NEW_ACCOUNT' | translate }}</a> <br />\n" +
    "            <a ui-sref=\"app.setup.forgotPassword\">{{ 'SETUP_FORGOT_PASSWORD_Q' | translate }}</a>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</app-wrapper>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/lost-lock/lost-lock.tpl.html","<div>\n" +
    "    <top-header mode=\"'loggedout'\"></top-header>\n" +
    "\n" +
    "    <div class=\"container\">\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "                <div class=\"appWrapper\">\n" +
    "                    <h1 class=\"pageTitle text-center\">{{ 'LOST_LOCK' | translate }}</h1>\n" +
    "                    <div class=\"formContainer text-center\" style=\"padding: 20px;font-size:16px;\">\n" +
    "                        <div ng-bind-html=\"'LOST_LOCK_BODY' | translate | nl2br\"></div>\n" +
    "                        <div class=\"btns\">\n" +
    "                            <button ui-sref=\"app.wallet.summary\" class=\"btn btn-primary btn-lg\">\n" +
    "                                {{ 'LOST_LOCK_OPEN_HERE' | translate }}\n" +
    "                            </button>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div ng-include=\"'templates/common/footer.html'\"></div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/new-account/new-account.tpl.html","<landing-page>\n" +
    "    <div class=\"formContainer\">\n" +
    "        <form\n" +
    "            class=\"form page-blur\"\n" +
    "            name=\"registerForm\"\n" +
    "            ng-class=\"{'page-blur-active': isLoading}\"\n" +
    "            novalidate\n" +
    "        >\n" +
    "            <div ng-if=\"errMsg\" class=\"alert alert-danger\">{{ errMsg | translate }}</div>\n" +
    "\n" +
    "            <!--<pre>registerForm.email = {{ registerForm.email | json }}</pre>-->\n" +
    "\n" +
    "            <div\n" +
    "                class=\"form-group form-group-lg\"\n" +
    "                ng-class=\"{'has-error': registerForm.email.$dirty && registerForm.email.$touched && registerForm.email.$invalid}\"\n" +
    "            >\n" +
    "                <label class=\"control-label\">\n" +
    "                    {{ 'SETUP_EMAIL_PLACEHOLDER' | translate }}\n" +
    "                </label>\n" +
    "\n" +
    "                <input\n" +
    "                    class=\"form-control\"\n" +
    "                    type=\"email\"\n" +
    "                    placeholder=\"{{ 'SETUP_EMAIL_PLACEHOLDER' | translate }}\"\n" +
    "                    name=\"email\"\n" +
    "                    ng-model=\"form.email\"\n" +
    "                    required\n" +
    "                >\n" +
    "\n" +
    "                <div class=\"help-block\" ng-if=\"registerForm.email.$dirty && registerForm.email.$touched && registerForm.email.$invalid\">\n" +
    "                    <div ng-if=\"registerForm.email.$error.required\">{{ 'MSG_MISSING_LOGIN' | translate }}</div>\n" +
    "                    <div ng-if=\"!registerForm.email.$error.required && registerForm.email.$error.email\">\n" +
    "                        {{ 'MSG_BAD_EMAIL' | translate }}\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div\n" +
    "                class=\"form-group form-group-lg\"\n" +
    "                ng-class=\"{'has-error': registerForm.password.$dirty && registerForm.password.$touched && registerForm.password.$invalid}\"\n" +
    "            >\n" +
    "                <label class=\"control-label\">{{ 'SETUP_PASSWORD_PLACEHOLDER' | translate }}</label>\n" +
    "\n" +
    "                <div class=\"password-input\">\n" +
    "                    <input\n" +
    "                        class=\"form-control\"\n" +
    "                        type=\"password\"\n" +
    "                        placeholder=\"{{ 'SETUP_PASSWORD_PLACEHOLDER' | translate }}\"\n" +
    "                        name=\"password\"\n" +
    "                        ng-model=\"form.password\"\n" +
    "                        required\n" +
    "                    >\n" +
    "                    <div class=\"password-check text-right\">\n" +
    "                        <i class=\"bticon bticon-cancel-circled text-bad\" ng-if=\"form.passwordCheck && form.passwordCheck.score < 2\"></i>\n" +
    "                        <i class=\"bticon bticon-cancel-circled text-warning\" ng-if=\"form.passwordCheck && form.passwordCheck.score == 2\"></i>\n" +
    "                        <i class=\"bticon bticon-ok-circled text-good\" ng-if=\"form.passwordCheck && form.passwordCheck.score >= 3\"></i>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"password-checker password-checker-score-{{ form.passwordCheck.score }}\" ng-if=\"form.passwordCheck\">\n" +
    "                    <span ng-if=\"form.passwordCheck.score == 0\">{{ 'PASSWORD_SUPER_WEAK' | translate }} </span>\n" +
    "                    <span ng-if=\"form.passwordCheck.score == 1\">{{ 'PASSWORD_WEAK' | translate }} </span>\n" +
    "                    <span ng-if=\"form.passwordCheck.score == 2\">{{ 'PASSWORD_MEDIOCRE' | translate }} </span>\n" +
    "                    <span ng-if=\"form.passwordCheck.score == 3\">{{ 'PASSWORD_STRONG' | translate }} </span>\n" +
    "                    <span ng-if=\"form.passwordCheck.score >= 4\">{{ 'PASSWORD_SUPER_STRONG' | translate }} </span>\n" +
    "                    <span translate=\"PASSWORD_TIME_TO_CRACK\" translate-values=\"form.passwordCheck\"></span>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"help-block\" ng-if=\"registerForm.password.$dirty && registerForm.password.$touched && registerForm.password.$invalid\">\n" +
    "                    <div ng-if=\"registerForm.password.$error.required\">{{ 'MSG_MISSING_PASSWORD' | translate }}</div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"form-group form-group-lg\">\n" +
    "                <div class=\"checkbox\">\n" +
    "                    <label>\n" +
    "                        <input type=\"checkbox\" ng-model=\"form.termsOfService\">\n" +
    "                        <p translate=\"SETUP_TERMS_OF_SERVICE_TEXT\"></p>\n" +
    "                    </label>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"form-group form-group-lg form-group-buttons text-center\">\n" +
    "                <button class=\"btn btn-primary form-control\" ng-click=\"onSubmitFormRegister(registerForm)\">{{ 'SETUP_REGISTER' | translate }}</button>\n" +
    "            </div>\n" +
    "\n" +
    "            <!-- Loader overlay -->\n" +
    "            <div\n" +
    "                class=\"page-loader\"\n" +
    "                ng-class=\"{'active': isLoading}\"\n" +
    "            >\n" +
    "                <loading-spinner></loading-spinner>\n" +
    "            </div>\n" +
    "        </form>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"smallButtons text-center\">\n" +
    "        <a class=\"sentence-case\" ui-sref=\"app.setup.login\">{{ 'LAUNCH_EXISTING_ACCOUNT' | translate }}</a>\n" +
    "    </div>\n" +
    "</landing-page>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/rebrand/rebrand.tpl.html","<div class=\"container\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "            <div class=\"appWrapper\">\n" +
    "                <h1 class=\"pageTitle text-center\">{{ 'PSA_REBRAND_TITLE' | translate }}</h1>\n" +
    "                <div class=\"formContainer text-center\" style=\"padding: 20px;font-size:16px;\">\n" +
    "                    <div ng-bind-html=\"'PSA_REBRAND_BODY' | translate | nl2br\"></div>\n" +
    "\n" +
    "                    <span>{{ 'PSA_REBRAND_BLOG_HREF_PRE' | translate }}</span>\n" +
    "                    <a href=\"https://blog.blocktrail.com/2016/07/blocktrail-is-now-a-part-of-the-bitmain-family/\" browse-to>{{ 'PSA_REBRAND_BLOG_HREF' | translate }}</a>\n" +
    "\n" +
    "                    <br />\n" +
    "                    <br />\n" +
    "\n" +
    "                    <button class=\"btn-block btn btn-primary\" ui-sref=\"{{ goto || 'app.setup.register' }}\">{{ 'PSA_REBRAND_OK' | translate }}</button>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/wallet-backup/wallet-backup.tpl.html","<div class=\"container\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-md-6 col-md-offset-3 col-xs-12\">\n" +
    "            <div class=\"appWrapper\">\n" +
    "                <div class=\"backupWrapper\">\n" +
    "\n" +
    "                    <h1 class=\"sentence-case\">{{ 'SETUP_WALLET_BACKUP' | translate }}</h1>\n" +
    "\n" +
    "                    <div class=\"sentence-case\">\n" +
    "                        <p class=\"sentence-case\">\n" +
    "                            {{ 'SETUP_WALLET_BACKUP_TEXT' | translate }}\n" +
    "                            <b>{{ 'SETUP_WALLET_BACKUP_TEXT_BOLD' | translate }}</b><br/><br/>\n" +
    "                            {{ 'SETUP_WALLET_BACKUP_TEXT_APPEND' | translate }}\n" +
    "                        </p>\n" +
    "                        <button ng-class=\"{ 'btn-success':!backupSaved }\" class=\"btn btn-lg btn-default downloadBackupBtn\" ng-click=\"export()\">{{ 'BACKUP_CREATE_PDF' | translate }}</button>\n" +
    "                    </div>\n" +
    "\n" +
    "                    <form class=\"form\">\n" +
    "                        <div ng-show=\"backupSaved\" class=\"form-group form-group-lg\" ng-class=\"{'has-error':backupPageError}\">\n" +
    "                            <div class=\"checkbox\">\n" +
    "                                <label>\n" +
    "                                    <input id=\"backupSavedCheck\" type=\"checkbox\" ng-model=\"backupSavedCheck\">\n" +
    "                                    {{ 'BACKUP_CHECKBOX' | translate }}\n" +
    "                                </label>\n" +
    "                            </div>\n" +
    "\n" +
    "                            <span class=\"text-danger sentence-case\" ng-if=\"backupPageError\">\n" +
    "                                {{ backupPageError }}\n" +
    "                            </span>\n" +
    "                        </div>\n" +
    "                        <div class=\"form-group form-group-lg\">\n" +
    "                            <button class=\"btn btn-alt form-control\"\n" +
    "                                    ng-class=\"{'btn-default': !backupSaved || !backupSavedCheck, 'btn-success': backupSaved && backupSavedCheck}\"\n" +
    "                                    ng-disabled=\"!backupSaved || !backupSavedCheck || working\"\n" +
    "                                    ng-click=\"continue()\">{{ 'CONTINUE' | translate }}\n" +
    "                            </button>\n" +
    "                        </div>\n" +
    "                    </form>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/wallet-init/wallet-init.tpl.html","<div class=\"container\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-md-6 col-md-offset-3 col-sm-12 col-xs-12\">\n" +
    "            <div class=\"appWrapper text-center\">\n" +
    "                <h1>{{progressStatus.title | translate }}</h1>\n" +
    "\n" +
    "                <div class=\"progress\">\n" +
    "                    <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{progressWidth}}%;\"></div>\n" +
    "                </div>\n" +
    "                <h4>{{ progressStatus.body | translate }}</h4>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/controllers/wrapper/wrapper.tpl.html","<div>\n" +
    "    <top-header mode=\"'loggedout'\"></top-header>\n" +
    "\n" +
    "    <div ui-view></div>\n" +
    "\n" +
    "    <div ng-include=\"'templates/common/footer.html'\"></div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/setup/directives/landing-page/landing-page.tpl.html","<div class=\"appWrapper landing-page\">\n" +
    "    <div class=\"login-block\">\n" +
    "        <div class=\"container\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-md-7\">\n" +
    "                    <div class=\"login-block-description text-center\">\n" +
    "                        <h1>{{ 'LANDING_POWERFUL' | translate }}</h1>\n" +
    "                        <p>{{ 'LANDING_SEND_RECEIVE' | translate }}</p>\n" +
    "                        <p>\n" +
    "                            <a\n" +
    "                                    class=\"btn login-btn-appstore\"\n" +
    "                                    href=\"https://play.google.com/store/apps/details?id=com.blocktrail.mywallet\"\n" +
    "                                    target=\"_blank\"\n" +
    "                            >\n" +
    "                                <i class=\"bticon bticon-android\"></i>\n" +
    "                                <span class=\"test\">\n" +
    "                                    <span>{{ 'APP_DOWNLOAD_ON' | translate }}</span>\n" +
    "                                    <span class=\"brand\">Android</span>\n" +
    "                                </span>\n" +
    "                            </a>\n" +
    "                            <a\n" +
    "                                    class=\"btn login-btn-appstore\"\n" +
    "                                    href=\"https://itunes.apple.com/us/app/blocktrail-bitcoin-wallet/id1019614423\"\n" +
    "                                    target=\"_blank\"\n" +
    "                            >\n" +
    "                                <i class=\"bticon bticon-apple\"></i>\n" +
    "                                <span class=\"test\">\n" +
    "                                    <span>{{ 'APP_DOWNLOAD_ON' | translate }}</span>\n" +
    "                                    <span class=\"brand\">IOS</span>\n" +
    "                                </span>\n" +
    "                            </a>\n" +
    "                        </p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"col-md-5\">\n" +
    "                    <ng-transclude></ng-transclude>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"login-block login-block-highlighted\">\n" +
    "        <div class=\"container\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-sm-6 col-xs-12\">\n" +
    "                    <img ng-src=\"{{ CONFIG.STATICSURL }}/img/btc-showcase-devices.png\" class=\"img-responsive\">\n" +
    "                </div>\n" +
    "                <div class=\"col-sm-6 col-xs-12\">\n" +
    "                    <div class=\"block-content\">\n" +
    "                        <h2>{{ 'LANDING_STAY_IN_CONTROL' | translate }}</h2>\n" +
    "                        <p>{{ 'LANDING_EMPOWERS' | translate }}</p>\n" +
    "                        <p>{{ 'LANDING_NEVER_ACCESS' | translate }}</p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"login-block-parallax\">\n" +
    "        <div class=\"container\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12\">\n" +
    "                    <div class=\"block-content text-center\">\n" +
    "                        <p>{{ 'LANDING_YOUR_BTC' | translate }}</p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"login-block\">\n" +
    "        <div class=\"container\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-sm-offset-2 col-sm-8\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"col-xs-12\">\n" +
    "                            <div class=\"block-content text-center\">\n" +
    "                                <h2>{{ 'LANDING_ONE_WALLET' | translate }}</h2>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row iit-15\">\n" +
    "                        <div class=\"col-sm-4 col-xs-12 text-center text-center\">\n" +
    "                            <img class=\"login-icon\" ng-src=\"{{ CONFIG.STATICSURL }}/img/home-bitcoin-icon.png\" />\n" +
    "                            <p>{{ 'LANDING_SEND_RECEIVE_EASILY' | translate }}</p>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-sm-4 col-xs-12 text-center text-center\">\n" +
    "                            <img class=\"login-icon\" ng-src=\"{{ CONFIG.STATICSURL }}/img/home-key-icon.png\" />\n" +
    "                            <p>{{ 'LANDING_FULL_CONTROL' | translate }}</p>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-sm-4 col-xs-12 text-center text-center\">\n" +
    "                            <img class=\"login-icon\" ng-src=\"{{ CONFIG.STATICSURL }}/img/home-qr-icon.png\" />\n" +
    "                            <p>{{ 'LANDING_PAY_QR' | translate }}</p>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12\">\n" +
    "                    <img ng-src=\"{{ CONFIG.STATICSURL }}/img/btc-perspective-screen-transparent.png\" class=\"img-responsive\">\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12 text-center\">\n" +
    "                    <a\n" +
    "                            class=\"btn login-btn-appstore\"\n" +
    "                            href=\"https://play.google.com/store/apps/details?id=com.blocktrail.mywallet\"\n" +
    "                            target=\"_blank\"\n" +
    "                    >\n" +
    "                        <i class=\"bticon bticon-android\"></i>\n" +
    "                        <span class=\"test\">\n" +
    "                            <span>{{ 'APP_DOWNLOAD_ON' | translate }}</span>\n" +
    "                            <span class=\"brand\">Android</span>\n" +
    "                        </span>\n" +
    "                    </a>\n" +
    "                    <a\n" +
    "                            class=\"btn login-btn-appstore\"\n" +
    "                            href=\"https://itunes.apple.com/us/app/blocktrail-bitcoin-wallet/id1019614423\"\n" +
    "                            target=\"_blank\"\n" +
    "                    >\n" +
    "                        <i class=\"bticon bticon-apple\"></i>\n" +
    "                        <span class=\"test\">\n" +
    "                            <span>{{ 'APP_DOWNLOAD_ON' | translate }}</span>\n" +
    "                            <span class=\"brand\">IOS</span>\n" +
    "                        </span>\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"login-block login-block-highlighted\">\n" +
    "        <div class=\"container\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12 text-center\">\n" +
    "                    <h2>{{ 'LANDING_CREATE_WALLET' | translate }}</h2>\n" +
    "                    <p>\n" +
    "                        <a ui-sref=\"app.setup.register\" class=\"btn btn-primary btn-lg\">{{ 'LAUNCH_NEW_ACCOUNT' | translate }}</a>\n" +
    "                    </p>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/buy-btc-broker/buy-btc-broker.tpl.html","<div class=\"appPage\">\n" +
    "    <form name=\"buyInputForm\" class=\"form\" novalidate>\n" +
    "        <div class=\"text-center\" style=\"margin-top: 50px;\" ng-show=\"initializing\">\n" +
    "            <loading-spinner></loading-spinner>\n" +
    "        </div>\n" +
    "\n" +
    "        <div ng-if=\"brokerNotExistent\">\n" +
    "            <h2 style=\"text-align: center\">The selected broker does not exist</h2>\n" +
    "        </div>\n" +
    "\n" +
    "        <div ng-show=\"!initializing\" class=\"broker-{{ broker }}\" ng-if=\"!brokerNotExistent\">\n" +
    "\n" +
    "            <h2 class=\"broker-title\">\n" +
    "                <img ng-if=\"broker === 'glidera'\"\n" +
    "                     ng-src=\"{{ CONFIG.STATICSURL }}/img/glidera-bright.png\" alt=\"Glidera\" title=\"Glidera\" />\n" +
    "            </h2>\n" +
    "\n" +
    "            <section class=\"buybtc-currentprice\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <div class=\"currentprice-label\">\n" +
    "                            {{ 'CURRENT_PRICE' | translate }} ({{ ('APPROXIMATE' | translate).toLowerCase() }})\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <div ng-if=\"fetchingMainPrice\">\n" +
    "                            <loading-spinner></loading-spinner>\n" +
    "                        </div>\n" +
    "                        <div ng-if=\"!fetchingMainPrice\" class=\"currentprice-value\">\n" +
    "                            <b>{{ buyInput.fiatCurrency | toCurrencySymbol }}{{ priceBTC | number:2 }}</b>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </section>\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12\">\n" +
    "                    <div class=\"form-group form-group-lg\">\n" +
    "                        <label class=\"control-label\" for=\"amount\">{{ 'AMOUNT' | translate }}</label>\n" +
    "                        <div class=\"input-group input-group-lg\">\n" +
    "                            <input ng-model=\"buyInput.amount\" ng-change=\"triggerUpdate()\" type=\"text\" class=\"form-control\"\n" +
    "                                   id=\"amount\" name=\"amount\" placeholder=\"0.00000000\" autocomplete=\"off\" type=\"number\" min=\"0\" required />\n" +
    "                            <span class=\"input-group-addon currency\" style=\"min-width: 120px;\">\n" +
    "                                <span class=\"altCurrency\">\n" +
    "                                    {{ altCurrency.code | toCurrencySymbol }} {{ altCurrency.amount }}\n" +
    "                                </span>\n" +
    "                            </span>\n" +
    "                            <span class=\"input-group-btn\">\n" +
    "                                <div class=\"btn-group\" dropdown>\n" +
    "                                    <button type=\"button\" class=\"btn btn-alt btn-default btn-lg\" dropdown-toggle ng-model=\"buyInput.currencyType\">\n" +
    "                                        {{ buyInput.currencyType }}\n" +
    "                                        <span class=\"caret\"></span>\n" +
    "                                    </button>\n" +
    "                                    <ul class=\"dropdown-menu\">\n" +
    "                                        <li ng-repeat=\"currency in currencies\"><a ng-click=\"updateCurrentType(currency.code)\">{{ currency.code }}</a></li>\n" +
    "                                    </ul>\n" +
    "                                </div>\n" +
    "                            </span>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-if=\"CONFIG.DEBUG && (buyInput.btcValue || buyInput.fiatValue)\">\n" +
    "                <div class=\"pull-right\">\n" +
    "                    {{ 'BUYBTC_INCL_FEE' | translate }} ({{ buyInput.feePercentage | number:1 }}%): {{ buyInput.fiatCurrency | toCurrencySymbol }}{{ buyInput.feeValue | number: 2 }}\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12\">\n" +
    "                    <button class=\"btn btn-lg btn-default btn-primary\" ng-click=\"buyBTC()\">{{ 'BUYBTC_BUY' | translate }}</button>\n" +
    "                    <p class=\"buybtc-via\">\n" +
    "                        <span class=\"sentence-case\"\n" +
    "                              translate=\"BUYBTC_VIA\"\n" +
    "                              translate-value-broker=\"{{ broker }}\">\n" +
    "                        </span>\n" +
    "                        <a class=\"btn btn-sm btn-default\" href=\"#\" ng-click=\"$state.go('app.wallet.buybtc.choose')\">{{ 'CHANGE' | translate }}</a>\n" +
    "                    </p>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/address-lookup/address-lookup.tpl.html","<div\n" +
    "    class=\"appPage page-blur\"\n" +
    "    ng-class=\"{'page-blur-active': isLoading}\"\n" +
    ">\n" +
    "    <div class=\"searchBox\">\n" +
    "        <input type=\"text\" ng-model=\"searchText\" maxlength=\"100\" placeholder=\"{{ 'ADDRESS_LOOKUP_SEARCH_PLACEHOLDER' | translate }}\">\n" +
    "        <div>\n" +
    "            <label for=\"checkOnlyUsed\">\n" +
    "                <input id=\"checkOnlyUsed\" class=\"searchCheckbox\" type=\"checkbox\" ng-model=\"checkOnlyUsed\"> {{ 'ADDRESS_LOOKUP_CHECKONLY_USAGE' | translate }}\n" +
    "            </label>\n" +
    "            <label for=\"checkOnlyLabeled\">\n" +
    "                <input id=\"checkOnlyLabeled\" class=\"searchCheckbox\" type=\"checkbox\" ng-model=\"checkOnlyLabeled\"> {{ 'ADDRESS_LOOKUP_CHECKONLY_LABELED' | translate }}\n" +
    "            </label>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div\n" +
    "        class=\"page-blur\"\n" +
    "        ng-class=\"{'page-blur-active': isPageLoading}\"\n" +
    "    >\n" +
    "        <table class=\"table table-striped table-condensed table-hover\">\n" +
    "            <thead>\n" +
    "            <tr>\n" +
    "                <th>#</th>\n" +
    "                <th>{{ 'ADDRESS' | translate }}</th>\n" +
    "                <th>{{ 'ADDRESS_LABEL' | translate }}</th>\n" +
    "                <th><!--{{ 'EDIT_LABEL' | translate }}--></th>\n" +
    "                <th class=\"text-center\">{{ 'USAGES' | translate }}</th>\n" +
    "                <th class=\"text-center\">{{ 'BALANCE' | translate }}</th>\n" +
    "            </tr>\n" +
    "            </thead>\n" +
    "            <tbody>\n" +
    "            <tr ng-repeat=\"item in items\">\n" +
    "                <td class=\"colCounter\"> {{ (currentPage - 1) * itemsPerPage + items.indexOf(item) + 1 }}</td>\n" +
    "                <td class=\"colAddress\">\n" +
    "                    <a title=\"{{ 'CHECKOUT_AT_BTCCOM' | translate }}\"\n" +
    "                       href=\"{{ CONFIG.NETWORKS[walletData.networkType].EXPLORER_ADDRESS_URL + '/' + item.address }}\"\n" +
    "                       target=\"_blank\">\n" +
    "                        {{ item.address }}\n" +
    "                    </a>\n" +
    "                </td>\n" +
    "                <td class=\"colCurrLabel\">{{ item.label ? item.label : \"\" }}</td>\n" +
    "                <td class=\"colEditLabel\">\n" +
    "                    <span style=\"float: right;\">\n" +
    "                        <a class=\"pointer-clickable\"\n" +
    "                           ng-click=\"addLabel(items.indexOf(item));\"\n" +
    "                           title=\"{{ 'EDIT_LABEL' | translate }}\">\n" +
    "                            <i class=\"bticon bticon-edit\"></i></a>\n" +
    "                        <a class=\"pointer-clickable\"\n" +
    "                           ng-if=\"item.label\"\n" +
    "                           ng-click=\"removeLabel(items.indexOf(item))\"\n" +
    "                           title=\"{{ 'DELETE_LABEL' | translate }}\">\n" +
    "                            <i class=\"bticon bticon-trash\"></i></a>\n" +
    "                        <a ng-if=\"!item.label\">\n" +
    "                            <i class=\"bticon bticon-trash bticon-hide\"></i></a>\n" +
    "                    </span>\n" +
    "                </td>\n" +
    "                <td class=\"colTxCount text-center\">{{ item.tx_cnt }}</td>\n" +
    "                <td class=\"colBalance text-center\"\n" +
    "                    ng-class=\"{ 'positive-balance' : item.balance > 0 }\">\n" +
    "                    {{ (item.balance + item.unc_balance) | satoshiToCoin : walletData.networkType : 8 }}\n" +
    "                </td>\n" +
    "            </tr>\n" +
    "            </tbody>\n" +
    "        </table>\n" +
    "\n" +
    "        <!-- Loader overlay -->\n" +
    "        <div\n" +
    "            class=\"page-loader\"\n" +
    "            ng-class=\"{'active': isPageLoading}\"\n" +
    "        >\n" +
    "            <loading-spinner></loading-spinner>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"pagination-centered\">\n" +
    "        <ul uib-pagination\n" +
    "            total-items=\"totalItems\"\n" +
    "            items-per-page=\"itemsPerPage\"\n" +
    "            max-size=\"8\"\n" +
    "            boundary-links=\"true\"\n" +
    "            rotate=\"true\"\n" +
    "            next-text=\"&gt;\" previous-text=\"&lt;\" first-text=\"&lt;&lt;\" last-text=\"&gt;&gt;\"\n" +
    "            ng-model=\"currentPage\"\n" +
    "            ></ul>\n" +
    "    </div>\n" +
    "\n" +
    "    <!-- Loader overlay -->\n" +
    "    <div\n" +
    "        class=\"page-loader\"\n" +
    "        ng-class=\"{'active': isLoading}\"\n" +
    "    >\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/buy-btc-choose/buy-btc-choose.tpl.html","<div class=\"appPage\">\n" +
    "    <div class=\"text-center\" style=\"margin-top: 50px;\" ng-show=\"!chooseRegion\">\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "    <button class=\"btn btn-alt btn-hidden\" style=\"float: right;\" ng-click=\"resetBuyBTC()\"></button>\n" +
    "\n" +
    "    <div ng-if=\"chooseRegion\" class=\"row\">\n" +
    "        <!-- CHOOSE REGION -->\n" +
    "        <div ng-if=\"!chooseRegion.code\" ng-controller=\"BuyBTCChooseRegionCtrl\">\n" +
    "            <h2>{{ 'BUYBTC_CHOOSE_REGION_TITLE' | translate }}</h2>\n" +
    "            <p ng-bind-html=\"'BUYBTC_CHOOSE_REGION_BODY' | translate | nl2br\"></p>\n" +
    "\n" +
    "            <div ng-if=\"!usSelected\">\n" +
    "                <h3>{{ 'BUYBTC_REGIONS' | translate }}</h3>\n" +
    "                <ul class=\"buybtc-list list-group\">\n" +
    "                    <li class=\"list-group-item\"\n" +
    "                        ng-click=\"selectUS()\">\n" +
    "                        <span class=\"sentence-case\"><i class=\"bticon bticon-right-open\"></i> USA</span>\n" +
    "                    </li>\n" +
    "                    <li ng-repeat=\"region in regions\"\n" +
    "                        ng-click=\"selectRegion(region.code, region.name)\"\n" +
    "                        class=\"list-group-item\">\n" +
    "                        <span class=\"sentence-case\"><i class=\"bticon bticon-right-open\"></i> {{ region.name | translate }}</span>\n" +
    "                    </li>\n" +
    "                    <li class=\"list-group-item\"\n" +
    "                        ng-click=\"selectRegion('OTHER_REGIONS', 'OTHER_REGIONS')\">\n" +
    "                        <span class=\"sentence-case\"><i class=\"bticon bticon-right-open\"></i> {{ 'OTHER_REGIONS' | translate }}</span>\n" +
    "                    </li>\n" +
    "                </ul>\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-if=\"usSelected\">\n" +
    "                <h3>{{ 'BUYBTC_REGIONS' | translate }}</h3>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <ul class=\"buybtc-list list-group\">\n" +
    "                            <li ng-repeat=\"usState in usStates\"\n" +
    "                                ng-if=\"$even\"\n" +
    "                                ng-click=\"selectRegion(usState.code, usState.name)\"\n" +
    "                                class=\"list-group-item\">\n" +
    "                                <span class=\"sentence-case\"><i class=\"bticon bticon-right-open\"></i> {{ usState.name }} ({{ usState.code.replace('US-', '') }})</span>\n" +
    "                            </li>\n" +
    "                        </ul>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <ul class=\"buybtc-list list-group\">\n" +
    "                            <li ng-repeat=\"usState in usStates\"\n" +
    "                                ng-if=\"$odd\"\n" +
    "                                ng-click=\"selectRegion(usState.code, usState.name)\"\n" +
    "                                class=\"list-group-item\">\n" +
    "                                <span class=\"sentence-case\"><i class=\"bticon bticon-right-open\"></i> {{ usState.name }} ({{ usState.code.replace('US-', '') }})</span>\n" +
    "                            </li>\n" +
    "                            <li ng-click=\"selectRegion('OTHER_REGIONS', 'OTHER_REGIONS')\"\n" +
    "                                class=\"list-group-item\">\n" +
    "                                <span class=\"sentence-case\"><i class=\"bticon bticon-right-open\"></i> Other</span>\n" +
    "                            </li>\n" +
    "                        </ul>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <!-- REGION NOT OK -->\n" +
    "        <div ng-if=\"chooseRegion.code && !chooseRegion.regionOk\">\n" +
    "            <div>\n" +
    "                <h2>{{ 'BUYBTC_REGION_NOTOK_TITLE' | translate }}: <span class=\"\">{{ chooseRegion.name | translate }}</span></h2>\n" +
    "                <p ng-bind-html=\"'BUYBTC_REGION_NOTOK_BODY' | translate | nl2br\"></p>\n" +
    "            </div>\n" +
    "\n" +
    "            <div>\n" +
    "                <button class=\"btn btn-primary\" ng-click=\"selectRegion(null, null)\">\n" +
    "                    {{ 'BUYBTC_CHANGE_REGION' | translate }}\n" +
    "                </button>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <!-- REGION OK -->\n" +
    "        <div ng-if=\"chooseRegion.code && chooseRegion.regionOk\">\n" +
    "            <div>\n" +
    "                <h2>{{ 'BUYBTC_CHOOSE_TITLE' | translate }}</h2>\n" +
    "                <p translate=\"BUYBTC_CHOOSE_SUBTITLE\"\n" +
    "                   translate-compile\n" +
    "                   translate-value-region=\"{{ chooseRegion.name | translate }}\"\n" +
    "                   translate-value-href=\"href ng-click='selectRegion(null, null)'\"></p>\n" +
    "            </div>\n" +
    "\n" +
    "            <hr />\n" +
    "\n" +
    "            <div class=\"buybtc-list list-group\"\n" +
    "                 ng-if=\"brokers.indexOf('glidera') !== -1\">\n" +
    "                 <div class=\"partner-btn btn btn-lg btn-default\" ng-click=\"goGlideraBrowser()\">\n" +
    "                     <i class=\"bticon bticon-right-open\"></i>\n" +
    "                     <img ng-src=\"{{ CONFIG.STATICSURL }}/img/glidera-bright.png\" alt=\"Glidera\" title=\"Glidera\" />\n" +
    "                 </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/buy-btc-glidera-oauth-callback/buy-btc-glidera-oauth-callback.tpl.html","<div ng-if=\"errorMsg\">\n" +
    "    <h1 class=\"\">{{ errorMsg | translate}}</h1>\n" +
    "    <div>\n" +
    "        {{ errorDetails }}\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/modal-crop-image/modal-crop-image.tpl.html","<div class=\"modal-header\">\n" +
    "    <h3 class=\"modal-title\">{{ 'SETTINGS_CROP_PROFILE_PIC' | translate }}</h3>\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"modal-body\">\n" +
    "    <div class=\"height-100\" style=\"height: 400px\">\n" +
    "        <img-crop image=\"image\"\n" +
    "                  result-image=\"croppedImage\"\n" +
    "                  area-type=\"circle\"\n" +
    "                  area-min-size=\"100\"\n" +
    "                  result-image-size=\"500\"\n" +
    "                  result-image-format=\"image/jpeg\"\n" +
    "                  result-image-quality=\"0.8\">\n" +
    "        </img-crop>\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button\n" +
    "            class=\"btn btn-lg btn-danger\"\n" +
    "            ng-click=\"dismiss()\"\n" +
    "    >{{ 'CANCEL' | translate }}</button>\n" +
    "    <button\n" +
    "            ng-click=\"ok()\"\n" +
    "            class=\"btn btn-lg btn-success\"\n" +
    "    >{{ 'OK' | translate }}</button>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/payment-uri/payment-uri.tpl.html","<div>\n" +
    "    <!-- No template needed, Controller redirects no matter what -->\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/receive/receive.tpl.html","<div\n" +
    "    class=\"appPage page-blur\"\n" +
    "    ng-class=\"{'page-blur-active': isLoading}\"\n" +
    ">\n" +
    "    <form class=\"form\" name=\"sendInputForm\" novalidate ng-init=\"showQR=false\">\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-md-12 col-sm-12 col-xs-12\">\n" +
    "                <div class=\"form-group form-group-lg\">\n" +
    "                    <label class=\"control-label\">{{ 'BITCOIN_ADDRESS' | translate : {network:\n" +
    "                        CONFIG.NETWORKS[walletData.networkType].NETWORK_LONG} }}</label>\n" +
    "\n" +
    "                    <p class=\"address\">{{ newRequest.address || '...' }}</p>\n" +
    "                    <span class=\"help-block\">\n" +
    "                        {{ 'BITCOIN_ADDRESS_RECEIVE_HELP' | translate : {network: CONFIG.NETWORKS[walletData.networkType].NETWORK_LONG} }}\n" +
    "\n" +
    "                        <button class=\"btn btn-primary ng-binding btn-address-lookup\" ui-sref=\".address-lookup\">\n" +
    "                            {{ 'MY_ADDRESSES' | translate }}\n" +
    "                        </button>\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"col-md-12 col-sm-12 col-xs-12\">\n" +
    "                <div class=\"form-group form-group-lg\">\n" +
    "                    <label class=\"control-label\" for=\"amount\">{{ 'AMOUNT' | translate }}</label>\n" +
    "                    <div class=\"input-group input-group-lg\">\n" +
    "                        <input\n" +
    "                            id=\"amount\"\n" +
    "                            name=\"amount\"\n" +
    "                            class=\"form-control\"\n" +
    "                            type=\"number\"\n" +
    "                            min=\"0\"\n" +
    "                            placeholder=\"0.00000000\"\n" +
    "                            autocomplete=\"off\"\n" +
    "                            required\n" +
    "                            ng-model=\"newRequest.btcValue\"\n" +
    "                            ng-change=\"setAltCurrency()\"\n" +
    "                        />\n" +
    "\n" +
    "                        <span class=\"input-group-addon currency\">\n" +
    "                            <span class=\"altCurrency\">\n" +
    "                                {{ altCurrency.code | toCurrencySymbol }} {{ altCurrency.amount }}\n" +
    "                            </span>\n" +
    "                        </span>\n" +
    "\n" +
    "                        <span class=\"input-group-btn\">\n" +
    "                            <div class=\"btn-group\" dropdown>\n" +
    "                                <button type=\"button\" class=\"btn btn-alt btn-default btn-lg\" dropdown-toggle>\n" +
    "                                    {{ currencyType | toCurrencyTicker }} <span class=\"caret\"></span>\n" +
    "                                </button>\n" +
    "                                <ul class=\"dropdown-menu\">\n" +
    "                                    <li ng-repeat=\"currency in currencies\"><a\n" +
    "                                        ng-click=\"updateCurrentType(currency.code)\">{{ currency.code }} ({{ currency.symbol }})</a></li>\n" +
    "                                </ul>\n" +
    "                            </div>\n" +
    "                        </span>\n" +
    "                    </div>\n" +
    "\n" +
    "                    <span class=\"help help-block text-danger\">\n" +
    "                        <span class=\"sentence-case\" ng-if=\"errors.amount\">\n" +
    "                            {{ errors.amount | translate }}\n" +
    "                        </span>\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"col-md-12 col-sm-12 col-xs-12\">\n" +
    "                <div class=\"qr-code-display-section\">\n" +
    "                    <div class=\"qr-code-holder\">\n" +
    "                        <div ng-if=\"newRequest.bitcoinUri\">\n" +
    "                            <a ng-href=\"{{ newRequest.bitcoinUri }}\">\n" +
    "                                <qr text=\"newRequest.bitcoinUri\" type-number=\"qrSettings.typeNumber\"\n" +
    "                                    correction-level=\"qrSettings.correctionLevel\" size=\"qrSettings.SIZE\"\n" +
    "                                    input-mode=\"qrSettings.inputMode\" image=\"qrSettings.image\"></qr>\n" +
    "                            </a>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "\n" +
    "    <!-- Loader overlay -->\n" +
    "    <div\n" +
    "        class=\"page-loader\"\n" +
    "        ng-class=\"{'active': isLoading}\"\n" +
    "    >\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/send/send.tpl.html","<div\n" +
    "    class=\"appPage page-blur\"\n" +
    "    ng-class=\"{'page-blur-active': isLoading}\"\n" +
    ">\n" +
    "    <form\n" +
    "        class=\"form\"\n" +
    "        name=\"formSend\"\n" +
    "        novalidate\n" +
    "    >\n" +
    "        <div class=\"row\">\n" +
    "            <!-- Recipient -->\n" +
    "            <div class=\"col-xs-12\">\n" +
    "                <div\n" +
    "                    class=\"form-group form-group-lg\"\n" +
    "                    ng-class=\"{'has-error': errors.recipient}\"\n" +
    "                >\n" +
    "                    <label class=\"control-label\" for=\"recipient\">\n" +
    "                        <span class=\"sentence-case\">{{ 'SEND_TO' | translate }}</span>\n" +
    "                    </label>\n" +
    "                    <input\n" +
    "                        id=\"recipient\"\n" +
    "                        name=\"recipient\"\n" +
    "                        class=\"form-control\"\n" +
    "                        type=\"text\"\n" +
    "                        placeholder=\"{{ 'BITCOIN_ADDRESS' | translate : {network: CONFIG.NETWORKS[walletData.networkType].NETWORK_LONG} }}\"\n" +
    "                        autocomplete=\"off\"\n" +
    "                        required\n" +
    "                        ng-model=\"sendInput.recipientAddress\"\n" +
    "                        ng-focus=\"resetError('recipient')\"\n" +
    "                    />\n" +
    "\n" +
    "                    <span class=\"text-danger sentence-case\" ng-if=\"errors.recipient\">\n" +
    "                        {{ errors.recipient | translate }}\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-xs-12\">\n" +
    "                <!-- Amount -->\n" +
    "                <div class=\"form-group form-group-lg\" ng-class=\"{'has-error':errors.amount}\">\n" +
    "\n" +
    "                    <label class=\"control-label\" for=\"amount\">{{ 'AMOUNT' | translate }}</label>\n" +
    "\n" +
    "                    <div class=\"input-group input-group-lg\">\n" +
    "                        <input\n" +
    "                            id=\"amount\"\n" +
    "                            name=\"amount\"\n" +
    "                            class=\"form-control\"\n" +
    "                            type=\"number\"\n" +
    "                            min=\"0\"\n" +
    "                            placeholder=\"0.00000000\"\n" +
    "                            autocomplete=\"off\"\n" +
    "                            required\n" +
    "                            ng-model=\"sendInput.amount\"\n" +
    "                            ng-change=\"setAltCurrency(); fetchFee();\"\n" +
    "                            ng-focus=\"resetError('amount')\"\n" +
    "                        />\n" +
    "                        <span class=\"input-group-addon currency\">\n" +
    "                            <span class=\"altCurrency\">\n" +
    "                                {{ altCurrency.code | toCurrencySymbol }} {{ altCurrency.amount }}\n" +
    "                            </span>\n" +
    "                        </span>\n" +
    "                        <span class=\"input-group-btn\">\n" +
    "                            <div class=\"btn-group\" dropdown>\n" +
    "                                <button type=\"button\" class=\"btn btn-alt btn-default btn-lg\" dropdown-toggle>\n" +
    "                                    {{ currencyType | toCurrencyTicker }} <span class=\"caret\"></span>\n" +
    "                                </button>\n" +
    "                                <ul class=\"dropdown-menu\">\n" +
    "                                    <li ng-repeat=\"currency in currencies\"><a\n" +
    "                                        ng-click=\"updateCurrentType(currency.code)\">{{ currency.code }} ({{ currency.symbol }})</a></li>\n" +
    "                                </ul>\n" +
    "                            </div>\n" +
    "                        </span>\n" +
    "                    </div>\n" +
    "                    <span class=\"help help-block text-danger\">\n" +
    "                        <span class=\"sentence-case\" ng-if=\"errors.amount\">\n" +
    "                            {{ errors.amount | translate }}\n" +
    "                        </span>\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-xs-12\">\n" +
    "                <div class=\"form-group form-group-lg form-slim\">\n" +
    "                    <label class=\"control-label\">{{ 'TRANSACTION_FEES' | translate }}</label>\n" +
    "                    <div class=\"custom-select\" ng-init=\"showselect=false\">\n" +
    "                        <div class=\"custom-select-choice\" ng-click=\"showselect=true\">\n" +
    "                            <span class=\"custom-select-arrow\">\n" +
    "                                <i class=\"bticon bticon-down-open\" ng-click=\"\"></i>\n" +
    "                            </span>\n" +
    "                            <div class=\"custom-option\" ng-show=\"sendInput.feeChoice == OPTIMAL_FEE\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-xs-9\">\n" +
    "                                        <span class=\"custom-option-title\">\n" +
    "                                            {{ 'OPTIMAL_FEE' | translate }}\n" +
    "                                        </span>\n" +
    "                                        <span class=\"help help-block custom-option-subtitle\">\n" +
    "                                            {{ 'OPTIMAL_PRIORITY_NOTICE' | translate }}\n" +
    "                                        </span>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-3\">\n" +
    "                                        <span class=\"custom-option-fee\" ng-if=\"fees.optimal\">{{ fees.optimal | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"custom-option\" ng-show=\"sendInput.feeChoice == LOW_PRIORITY_FEE\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-xs-9\">\n" +
    "                                        <span class=\"custom-option-title\">\n" +
    "                                            {{ 'LOW_PRIORITY_FEE' | translate }}\n" +
    "                                        </span>\n" +
    "                                        <span class=\"help help-block custom-option-subtitle\">\n" +
    "                                            {{ 'LOW_PRIORITY_NOTICE' | translate }}\n" +
    "                                        </span>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-3\">\n" +
    "                                        <span class=\"custom-option-fee\" ng-if=\"fees.lowPriority\">{{ fees.lowPriority | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"custom-option\"\n" +
    "                                 ng-show=\"sendInput.feeChoice == PRIOBOOST\"\n" +
    "                                 ng-class=\"{error: !prioboost.possible}\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-xs-9\">\n" +
    "                                        <span class=\"custom-option-title\">\n" +
    "                                            {{ 'PRIOBOOST' | translate }}\n" +
    "                                        </span>\n" +
    "                                        <span class=\"help help-block custom-option-subtitle\">\n" +
    "                                            {{ 'PRIOBOOST_NOTICE' | translate }}\n" +
    "                                            {{ 'PRIOBOOST_CREDITS' | translate: {credits: prioboost.credits || 0} }}\n" +
    "                                        </span>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-3\">\n" +
    "                                        <span class=\"custom-option-fee extra-top\"\n" +
    "                                              ng-if=\"fees.minRelayFee && (prioboost.possible)\">{{ fees.minRelayFee | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                                        <span class=\"error custom-option-fee extra-top\"\n" +
    "                                              ng-if=\"prioboost.credits > 0 && (prioboost.tooLarge || prioboost.zeroConf)\">{{ 'PRIOBOOST_NOT_POSSIBLE' | translate }}</span>\n" +
    "                                        <span class=\"error custom-option-fee extra-top\" ng-if=\"prioboost.credits <= 0\">{{ 'PRIOBOOST_NO_CREDITS_SHORT' | translate }}</span>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"custom-select-menu\"\n" +
    "                             ng-show=\"showselect\"\n" +
    "                             click-anywhere-but-here=\"showselect = false\" is-active=\"showselect == true\">\n" +
    "                            <div class=\"custom-option\"\n" +
    "                                 ng-class=\"{selected: sendInput.feeChoice == OPTIMAL_FEE}\"\n" +
    "                                 ng-click=\"sendInput.feeChoice = OPTIMAL_FEE; showselect = false;\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-xs-9\">\n" +
    "                                        <span class=\"custom-option-title sentence-case\">\n" +
    "                                            {{ 'OPTIMAL_FEE' | translate }}\n" +
    "                                        </span>\n" +
    "                                        <span class=\"help help-block custom-option-subtitle\">\n" +
    "                                            {{ 'OPTIMAL_PRIORITY_NOTICE' | translate }}\n" +
    "                                        </span>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-3\">\n" +
    "                                        <span class=\"custom-option-fee\" ng-if=\"fees.optimal\">{{ fees.optimal | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <hr style=\"margin: 0px;\"/>\n" +
    "                            <div class=\"custom-option\"\n" +
    "                                 ng-class=\"{selected: sendInput.feeChoice == LOW_PRIORITY_FEE}\"\n" +
    "                                 ng-click=\"sendInput.feeChoice = LOW_PRIORITY_FEE; showselect = false;\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-xs-9\">\n" +
    "                                        <span class=\"custom-option-title sentence-case\">\n" +
    "                                            {{ 'LOW_PRIORITY_FEE' | translate }}\n" +
    "                                        </span>\n" +
    "                                        <span class=\"help help-block custom-option-subtitle\">\n" +
    "                                            {{ 'LOW_PRIORITY_NOTICE' | translate }}\n" +
    "                                        </span>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-3\">\n" +
    "                                        <span class=\"custom-option-fee\" ng-if=\"fees.lowPriority\">{{ fees.lowPriority | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <hr style=\"margin :0px;\"/>\n" +
    "                            <div class=\"custom-option\"\n" +
    "                                 ng-if=\"CONFIG.NETWORKS[walletData.networkType].PRIOBOOST\"\n" +
    "                                 ng-class=\"{selected: sendInput.feeChoice == PRIOBOOST, error: !prioboost.possible}\"\n" +
    "                                 ng-click=\"sendInput.feeChoice = PRIOBOOST; showselect = false;\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-xs-9\">\n" +
    "                                        <span class=\"custom-option-title sentence-case\">\n" +
    "                                            <span class=\"custom-option-title sentence-case\">\n" +
    "                                                {{ 'PRIOBOOST' | translate }}\n" +
    "                                            </span>\n" +
    "                                        </span>\n" +
    "                                        <span class=\"help help-block custom-option-subtitle\">\n" +
    "                                            {{ 'PRIOBOOST_NOTICE' | translate }}\n" +
    "                                            {{ 'PRIOBOOST_CREDITS' | translate: {credits: prioboost.credits || 0} }}\n" +
    "                                        </span>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-3\">\n" +
    "                                        <span class=\"custom-option-fee extra-top\"\n" +
    "                                              ng-if=\"fees.minRelayFee && (prioboost.possible)\">{{ fees.minRelayFee | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                                        <span class=\"error custom-option-fee extra-top\"\n" +
    "                                              ng-if=\"prioboost.credits > 0 && (prioboost.tooLarge || prioboost.zeroConf)\">{{ 'PRIOBOOST_NOT_POSSIBLE' | translate }}</span>\n" +
    "                                        <span class=\"error custom-option-fee extra-top\" ng-if=\"prioboost.credits <= 0\">{{ 'PRIOBOOST_NO_CREDITS_SHORT' | translate }}</span>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-xs-12\">\n" +
    "                <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                    <button class=\"btn btn-lg btn-primary\" ng-click=\"onSubmitFormSend()\">\n" +
    "                        <span>&nbsp;&nbsp; {{ 'SEND' | translate }} &nbsp;&nbsp;</span>\n" +
    "                    </button>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "\n" +
    "    <!-- Loader overlay -->\n" +
    "    <div\n" +
    "        class=\"page-loader\"\n" +
    "        ng-class=\"{'active': isLoading}\"\n" +
    "    >\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/send-confirm-modal/send-confirm-modal.tpl.html","<form class=\"form\" name=\"sendInputForm\" novalidate ng-submit=\"submit(sendInputForm)\">\n" +
    "    <div class=\"modal-header\">\n" +
    "        <h3 class=\"modal-title\">{{ 'SENDING_CONFIRM_TITLE' | translate }}</h3>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-body\">\n" +
    "        <div class=\"alert alert-default\">\n" +
    "            <div class=\"sentence-case\">\n" +
    "                <span translate=\"SENDING_CONFIRM_MSG\"\n" +
    "                      translate-value-amount=\"{{ sendData.amount }}\"\n" +
    "                      translate-value-recipient-address=\"{{ sendData.recipientAddress }}\"\n" +
    "                      translate-value-network=\"{{ CONFIG.NETWORKS[walletData.networkType].NETWORK }}\">\n" +
    "                </span>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"alert alert-warning\" ng-if=\"sendData.feeChoice == 'low_priority'\">\n" +
    "            <div class=\"sentence-case\">\n" +
    "                <b class=\"uppercase\">{{ 'WARNING' | translate }}!</b> <span class=\"sentence-case\">{{ 'LOW_PRIORITY_SEND_WARNING' | translate }}</span>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div ng-if=\"error\" class=\"has-error\" style=\"padding-left: 5px;\">\n" +
    "            <div class=\"help-block sentence-case\">\n" +
    "                {{ error | translate }}\n" +
    "            </div>\n" +
    "            <div ng-if=\"detailedError\" class=\"help-block sentence-case\">\n" +
    "                {{ detailedError | translate }}\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"iit-10\" ng-show=\"!working && !complete\">\n" +
    "\n" +
    "            <div class=\"form-group form-group-lg\" ng-class=\"{'has-error': sendInputForm.password.$dirty && sendInputForm.password.$invalid}\">\n" +
    "                <input class=\"form-control\" type=\"password\" placeholder=\"{{ 'WALLET_PASSWORD' | translate }}\"\n" +
    "                       name=\"password\"\n" +
    "                       ng-model=\"form.password\"\n" +
    "                       required=\"true\"\n" +
    "                       caps-on=\"passwordCapsLockOn\"\n" +
    "                       autocomplete=\"off\"\n" +
    "                />\n" +
    "                <div class=\"help-block\"\n" +
    "                     ng-if=\"sendInputForm.password.$dirty && sendInputForm.password.$invalid\">\n" +
    "                    <div ng-if=\"sendInputForm.password.$error.required\">{{ 'MSG_MISSING_PASSWORD' | translate }}</div>\n" +
    "                    <div ng-if=\"sendInputForm.password.$error.invalid\">\n" +
    "                        {{ 'MSG_BAD_PASSWORD' | translate }}<span ng-if=\"passwordCapsLockOn\">. {{ 'MSG_INCORRECT_PASSWORD_CAPS_ON' | translate }}</span>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"help-block\" ng-if=\"!sendInputForm.password.$dirty && !sendInputForm.password.$invalid\">\n" +
    "                    {{ 'WALLET_PASSWORD' | translate }}\n" +
    "                </div>\n" +
    "\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-show=\"sendData.requires2FA\" class=\"form-group form-group-lg\" ng-class=\"{'has-error': sendInputForm.two_factor_token.$dirty && sendInputForm.two_factor_token.$invalid}\">\n" +
    "                <label class=\"control-label\">{{ 'TWO_FACTOR_TOKEN' | translate }}</label>\n" +
    "                <input class=\"form-control\" type=\"text\" placeholder=\"{{ 'TWO_FACTOR_TOKEN' | translate }}\"\n" +
    "                       name=\"two_factor_token\"\n" +
    "                       ng-model=\"form.two_factor_token\"\n" +
    "                       ng-required=\"sendData.requires2FA\"\n" +
    "                       autocomplete=\"off\"\n" +
    "                />\n" +
    "                <div class=\"help-block\"\n" +
    "                     ng-if=\"sendInputForm.two_factor_token.$dirty && sendInputForm.two_factor_token.$invalid\">\n" +
    "                    <div ng-if=\"sendInputForm.two_factor_token.$error.required\">{{ 'MSG_MISSING_TWO_FACTOR_TOKEN' | translate }}</div>\n" +
    "                    <div ng-if=\"sendInputForm.two_factor_token.$error.invalid\">{{ 'MSG_INCORRECT_TWO_FACTOR_TOKEN' | translate }}</div>\n" +
    "                </div>\n" +
    "                <div class=\"help-block\"\n" +
    "                     ng-if=\"!sendInputForm.two_factor_token.$dirty || !sendInputForm.two_factor_token.$invalid\">\n" +
    "                    {{ 'TWO_FACTOR_TOKEN_DESC' | translate }}\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div ng-if=\"working && !complete\">\n" +
    "            <div class=\"progress\">\n" +
    "                <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{progressWidth}}%;\"></div>\n" +
    "            </div>\n" +
    "            <h4 class=\"text-center\">{{ 'MSG_SENDING' | translate }}</h4>\n" +
    "        </div>\n" +
    "\n" +
    "        <div ng-if=\"!working && complete\">\n" +
    "            <div class=\"text-center\">\n" +
    "                <span class=\"bticon bticon-ok transaction-ok\"></span>\n" +
    "            </div>\n" +
    "            <div>\n" +
    "                <h4 class=\"text-center text-success\"> {{ 'TRANSACTION_SEND_SUCCESS' | translate }}.</h4>\n" +
    "                <p class=\"text-center text-success\">{{ 'TX_INFO_HASH' | translate }}:\n" +
    "                    <a href=\"https://www.btc.com/{{txHash}}\" target=\"_blank\" class=\"text-ellipsis\">{{ txHash | characters:8 }}\n" +
    "                    </a>\n" +
    "                </p>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"modal-footer\">\n" +
    "\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-xs-5 text-left\">\n" +
    "                <div class=\"sentence-case help-block\" ng-if=\"fee !== false\" style=\"margin-top:10px;margin-bottom:0px;\">\n" +
    "                    {{ 'ESITIMATED_FEE' | translate }}\n" +
    "                    <span ng-if=\"!fee\">\n" +
    "                        <loading-spinner style=\"display: inline-block;\" ng-if=\"!fee\"></loading-spinner>\n" +
    "                    </span>\n" +
    "                    <span ng-if=\"fee\">{{ fee | satoshiToCoin : walletData.networkType }}</span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-7\">\n" +
    "                <a ng-if=\"!complete && !working\" class=\"btn btn-alt btn-danger\" ng-click=\"dismiss()\" ng-href>{{ 'CANCEL' | translate }}</a>\n" +
    "                <input type=\"submit\" class=\"btn btn-alt\" ng-class=\"{'btn-success': !complete && !working, 'btn-default': !working && complete}\" value=\"{{ 'OK' | translate }}\" />\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</form>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/settings/settings.tpl.html","<div\n" +
    "        class=\"appPage page-blur\"\n" +
    "        ng-class=\"{'page-blur-active': isLoading}\"\n" +
    ">\n" +
    "    <form class=\"form form-settings\">\n" +
    "        <div ng-if=\"error\" class=\"alert\" ng-class=\"{'alert-success': error.type=='success', 'alert-danger' : error.type=='danger'}\">\n" +
    "            {{ errMsg }}\n" +
    "        </div>\n" +
    "\n" +
    "        <h3 class=\"section-title\">Profile</h3>\n" +
    "\n" +
    "        <!-- Profile -->\n" +
    "        <div class=\"border-bottom\">\n" +
    "            <div class=\"row\">\n" +
    "                <!-- User name -->\n" +
    "                <div class=\"col-xs-12 col-md-6\">\n" +
    "                    <div\n" +
    "                            class=\"form-group form-group-lg\"\n" +
    "                            ng-class=\"{'has-error': errors.name }\"\n" +
    "                    >\n" +
    "                        <label for=\"name\" class=\"control-label\">{{ 'SETTING_USERNAME' | translate }}</label>\n" +
    "                        <input\n" +
    "                                ng-model=\"formSettings.username\"\n" +
    "                                ng-focus=\"onResetError('name')\"\n" +
    "                                placeholder=\"Enter username\"\n" +
    "                                type=\"text\"\n" +
    "                                class=\"form-control\"\n" +
    "                                id=\"name\"\n" +
    "                        >\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <!-- User email -->\n" +
    "                <div class=\"col-xs-12 col-md-6\">\n" +
    "                    <div\n" +
    "                            class=\"form-group form-group-lg\"\n" +
    "                            ng-class=\"{'has-error': errors.email }\"\n" +
    "                    >\n" +
    "                        <label for=\"email\" class=\"control-label\">{{ 'SETTING_EMAIL' | translate }}</label>\n" +
    "                        <input\n" +
    "                                ng-model=\"formSettings.email\"\n" +
    "                                ng-focus=\"onResetError('email')\"\n" +
    "                                placeholder=\"Enter email\"\n" +
    "                                type=\"text\"\n" +
    "                                class=\"form-control\"\n" +
    "                                id=\"email\"\n" +
    "                        >\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"row\">\n" +
    "                <!-- Icon -->\n" +
    "                <div class=\"col-xs-12 col-md-6\">\n" +
    "                    <div class=\"form-group form-group-lg\">\n" +
    "                        <label class=\"control-label dsb\">\n" +
    "                            {{ 'SETTINGS_PROFILE_PICTURE' | translate }}\n" +
    "                        </label>\n" +
    "                        <div class=\"row\">\n" +
    "                            <div class=\"col-xs-12\">\n" +
    "                                <div class=\"display-token pull-left\">\n" +
    "                                    <span\n" +
    "                                            class=\"avatar\"\n" +
    "                                            style=\"background-image: url('{{ formSettings.profilePic }}');\"\n" +
    "                                    ></span>\n" +
    "                                </div>\n" +
    "\n" +
    "                                <div class=\"btn-file-data-holder iit-10\">\n" +
    "                                    <btn-file-data\n" +
    "                                            btn-file-data-name=\"'profileIcon'\"\n" +
    "                                            btn-file-data-update=\"onFileDataUpdate(name, data)\"\n" +
    "                                    >\n" +
    "                                        {{ 'SETTINGS_CHOOSE_PHOTO' | translate }}\n" +
    "                                    </btn-file-data>\n" +
    "\n" +
    "                                    <div class=\"small help-block\">\n" +
    "                                        <b class=\"sentence-case\">{{ 'SETTINGS_CROP_ALLOWED_FILE_TYPES' | translate }}:</b> pdf, jpg, jpeg, bmp, gif, tif, tiff, png.\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <!-- Currency -->\n" +
    "                <div class=\"col-xs-6 col-md-3\">\n" +
    "                    <div class=\"form-group form-group-lg\">\n" +
    "                        <label class=\"control-label dsb\">{{ 'SETTINGS_CURRENCY' | translate }}</label>\n" +
    "                        <div\n" +
    "                                class=\"iit-10\"\n" +
    "                                uib-dropdown\n" +
    "                        >\n" +
    "                            <button\n" +
    "                                    type=\"button\"\n" +
    "                                    class=\"btn btn-block\"\n" +
    "                                    uib-dropdown-toggle\n" +
    "                            >\n" +
    "                                {{ formSettings.localCurrency }} ({{ formSettings.localCurrency | currencySymbol }}) <span class=\"caret\"></span>\n" +
    "                            </button>\n" +
    "                            <ul\n" +
    "                                    role=\"menu\"\n" +
    "                                    class=\"dropdown-menu no-padding dropdown-scrollable\"\n" +
    "                                    uib-dropdown-menu\n" +
    "                            >\n" +
    "                                <li\n" +
    "                                        role=\"menuitem\"\n" +
    "                                        ng-repeat=\"currency in currencies\"\n" +
    "                                        ng-class=\"{ active: currency.code == formSettings.localCurrency }\"\n" +
    "\n" +
    "                                >\n" +
    "                                    <a\n" +
    "                                            href=\"#\"\n" +
    "                                            ng-click=\"onChangeCurrency($event, currency.code)\"\n" +
    "                                    >{{ currency.code }} ({{ currency.symbol }})</a>\n" +
    "                                </li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <!-- Language -->\n" +
    "                <div class=\"col-xs-6 col-md-3\">\n" +
    "                    <div class=\"form-group form-group-lg\">\n" +
    "                        <label class=\"control-label dsb\">{{ 'SETTINGS_LANGUAGE' | translate }}</label>\n" +
    "                        <div\n" +
    "                                class=\"iit-10\"\n" +
    "                                uib-dropdown\n" +
    "                        >\n" +
    "                            <button\n" +
    "                                    type=\"button\"\n" +
    "                                    class=\"btn btn-block\"\n" +
    "                                    uib-dropdown-toggle\n" +
    "                            >\n" +
    "                                {{ formSettings.language | languageName | translate }} <span class=\"caret\"></span>\n" +
    "                            </button>\n" +
    "                            <ul\n" +
    "                                    role=\"menu\"\n" +
    "                                    class=\"dropdown-menu no-padding\"\n" +
    "                                    uib-dropdown-menu\n" +
    "                            >\n" +
    "                                <li\n" +
    "                                        role=\"menuitem\"\n" +
    "                                        ng-repeat=\"language in languages\"\n" +
    "                                        ng-class=\"{ active: language.code == formSettings.language }\"\n" +
    "                                >\n" +
    "                                    <a\n" +
    "                                            href=\"#\"\n" +
    "                                            ng-click=\"onChangeLanguage($event, language.code)\"\n" +
    "                                    >{{ language.name | translate }}</a>\n" +
    "                                </li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"row iib-15\">\n" +
    "                <div class=\"col-md-12\">\n" +
    "                    <toggle-switch\n" +
    "                            class=\"switch-success pull-left\"\n" +
    "                            ng-model=\"formSettings.receiveNewsletter\"\n" +
    "                    >\n" +
    "                    </toggle-switch>\n" +
    "\n" +
    "                    <div class=\"iil-15 iit-5 oh\">\n" +
    "                        <span>{{ 'SETTINGS_NEWSLETTER' | translate }}</span>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        \n" +
    "        <div class=\"row iit-15 iib-15\">\n" +
    "            <div class=\"col-md-4 col-md-offset-8\">\n" +
    "                <button\n" +
    "                        class=\"btn btn-lg btn-primary btn-block\"\n" +
    "                        ng-click=\"onSubmitFormSettings()\"\n" +
    "                        ng-disabled=\"isSubmitFormSettingsBtnDisabled\"\n" +
    "                >\n" +
    "                    {{ 'SETTINGS_SAVE' | translate }}\n" +
    "                </button>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <h3 class=\"section-title\">{{ 'SETTINGS_SECURITY' | translate }}</h3>\n" +
    "\n" +
    "        <!-- Security -->\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-md-4\">\n" +
    "                <div class=\"form-group\">\n" +
    "                    <button class=\"btn btn-lg btn-primary btn-block\" ng-click=\"onChangePassword()\">\n" +
    "                        {{ 'SETTINGS_CHANGE_PASSWORD' | translate }}\n" +
    "                    </button>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"col-md-8 iit-7\">\n" +
    "                <div class=\"form-group\">\n" +
    "                    <toggle-switch\n" +
    "                            ng-model=\"isEnabled2faToggle\"\n" +
    "                            class=\"switch-success pull-left\"\n" +
    "                    ></toggle-switch>\n" +
    "\n" +
    "                    <div class=\"iil-15 iit-5 oh\">\n" +
    "                        <span>{{ 'SETTINGS_2FA_HELP' | translate }}</span>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "\n" +
    "        <h3 class=\"section-title\">{{ 'SETTINGS_TOOLS' | translate }}</h3>\n" +
    "\n" +
    "        <!-- Tools -->\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-md-4\">\n" +
    "                <div class=\"form-group\">\n" +
    "                    <button class=\"btn btn-lg btn-primary btn-block\" ng-click=\"sweepCoins()\">\n" +
    "                        {{ 'SWEEP_TITLE' | translate }}\n" +
    "                    </button>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"col-md-4\" ng-if=\"network == 'BTC'\">\n" +
    "                <div class=\"form-group\">\n" +
    "                    <button class=\"btn btn-lg btn-primary btn-block\" ng-click=\"addProtocolHandler()\">\n" +
    "                        {{ 'SET_BROWSER_DEFAULT_WALLET' | translate }}\n" +
    "                    </button>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "\n" +
    "    <!-- Loader overlay -->\n" +
    "    <div\n" +
    "            class=\"page-loader\"\n" +
    "            ng-class=\"{'active': isLoading}\"\n" +
    "    >\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/wallet-summary/wallet-summary.tpl.html","<div\n" +
    "        class=\"tx-list page-blur\"\n" +
    "        ng-class=\"{'page-blur-active': isLoading}\"\n" +
    ">\n" +
    "\n" +
    "    <div class=\"wallet-alerts\">\n" +
    "        <app-two-factor-warning ng-show=\"isTwoFactorWarning\"></app-two-factor-warning>\n" +
    "        <app-bcc-sweep-warning ng-show=\"showBCCSweepWarning\"></app-bcc-sweep-warning>\n" +
    "    </div>\n" +
    "\n" +
    "    <!-- Transactions with an infinite scroll -->\n" +
    "    <div infinite-scroll=\"onShowMoreTransactions()\" infinite-scroll-container=\"'#app-body'\" infinite-scroll-distance=\"0.15\">\n" +
    "        <div ng-if=\"buybtcPendingOrders.length > 0\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12\">\n" +
    "                    <div class=\"item-divider isFirst\">\n" +
    "                        <div class=\"date-group\">\n" +
    "                            {{ 'BUYBTC_PENDING_ORDERS' | translate }}\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-repeat=\"buybtcPendingOrder in buybtcPendingOrders track by $index\">\n" +
    "                <div class=\"item-transaction item-buybtc-pending-order\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"col-xs-6\">\n" +
    "                            <div class=\"transaction-info\">\n" +
    "                                <div class=\"media\">\n" +
    "                                    <div class=\"media-left media-media\">\n" +
    "                                        <div class=\"display-token received\">\n" +
    "                                            <!-- Display avatar -->\n" +
    "                                            <span\n" +
    "                                                    class=\"avatar\"\n" +
    "                                                    ng-style=\"{'background-image':'url(data:image/jpeg;base64,{{ buybtcPendingOrder.avatarUrl }})'}\"\n" +
    "                                            ></span>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"media-body media-top\">\n" +
    "                                        <div class=\"tx-type\">\n" +
    "                                            <span>{{ 'BUYBTC_PENDING_ORDER_FROM' | translate: {order: buybtcPendingOrder} }}</span>\n" +
    "                                        </div>\n" +
    "                                        <div class=\"timestamp\">\n" +
    "                                            {{ buybtcPendingOrder.time | amDateFormat: 'h:mm a' : 'unix' }} |\n" +
    "                                            <span>{{ 'BUYBTC_PENDING_ORDER_SUBTITLE' | translate: {order: buybtcPendingOrder} }}</span>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-2 text-center\">\n" +
    "                            <div class=\"pending\">\n" +
    "                                <i class=\"bticon bticon-clock\"></i><br/><em>{{ 'TX_INFO_PENDING' | translate}}</em>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-4 text-right\">\n" +
    "                            <div class=\"value received\">\n" +
    "                                {{ buybtcPendingOrder.qty | satoshiToCoin : walletData.networkType }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <!-- Transactions -->\n" +
    "        <div ng-repeat=\"transaction in walletData.transactions | limitTo : transactionsListLimit : 0 track by transaction.hash\">\n" +
    "            <!-- Show date header -->\n" +
    "            <div\n" +
    "                    ng-if=\"isHeader(transaction)\"\n" +
    "                    ng-class=\"{ 'isFirst': $first }\"\n" +
    "            >\n" +
    "                <div class=\"item-divider\">\n" +
    "                    <div class=\"date-group\">\n" +
    "                        {{ getTransactionHeader() | amCalendar }}\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <!-- Wallet transaction -->\n" +
    "            <wallet-transaction\n" +
    "                    wallet-data=\"walletData\"\n" +
    "                    transaction=\"transaction\"\n" +
    "                    on-show-transaction=\"onShowTransaction(transaction)\"\n" +
    "            ></wallet-transaction>\n" +
    "        </div>\n" +
    "        <!-- Wallet no transactions message -->\n" +
    "        <wallet-no-transactions ng-show=\"!isLoading && !walletData.transactions.length\"></wallet-no-transactions>\n" +
    "        <!-- Wallet no more transaction message -->\n" +
    "        <wallet-no-more-transactions ng-class=\"{ active: isShowNoMoreTransactions }\"></wallet-no-more-transactions>\n" +
    "    </div>\n" +
    "    <!-- Loader overlay -->\n" +
    "    <div\n" +
    "            class=\"page-loader\"\n" +
    "            ng-class=\"{'active': isLoading}\"\n" +
    "    >\n" +
    "        <loading-spinner></loading-spinner>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/sweep-coins-modal/sweep-coins-modal.tpl.html","<button type=\"button\" class=\"close\" ng-click=\"dismiss();\" aria-label=\"Close\">\n" +
    "    <span aria-hidden=\"true\">&times;</span>\n" +
    "</button>\n" +
    "\n" +
    "<div class=\"row\">\n" +
    "    <div class=\"col-xs-10 col-xs-offset-1 text-center\">\n" +
    "        <div style=\"margin-top: 25px; margin-bottom: 25px;\">\n" +
    "            <h2>{{ 'SWEEP_TITLE' | translate }}</h2>\n" +
    "            <div ng-if=\"form.step === STEPS.WELCOME\">\n" +
    "                <p>\n" +
    "                    {{ 'SWEEP_INFO' | translate : { network: CONFIG.NETWORKS[walletData.networkType].NETWORK } }}\n" +
    "                </p>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <p class=\"help-block\">\n" +
    "                            {{ 'SWEEP_SUPPORTED' | translate }}: Blockchain.info, Mycelium, Jaxx\n" +
    "                        </p>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <p class=\"help-block\">\n" +
    "                            {{ 'SWEEP_WIF_SUBTITLE' | translate }}\n" +
    "                        </p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <button class=\"form-control btn btn-alt btn-primary\" ng-click=\"form.step = STEPS.BIP44\">\n" +
    "                            {{ 'SWEEP_BIP44' | translate }}\n" +
    "                        </button>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6\">\n" +
    "                        <button class=\"form-control btn btn-alt btn-primary\" ng-click=\"form.step = STEPS.WIF\">\n" +
    "                            {{ 'SWEEP_WIF' | translate }}\n" +
    "                        </button>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div ng-if=\"form.step === STEPS.BIP44\">\n" +
    "                <p>\n" +
    "                    {{ 'SWEEP_INFO' | translate : { network: CONFIG.NETWORKS[walletData.networkType].NETWORK } }}\n" +
    "                </p>\n" +
    "                <p class=\"help-block\">\n" +
    "                    {{ 'SWEEP_SUPPORTED' | translate }}: Blockchain.info, Mycelium, Jaxx\n" +
    "                </p>\n" +
    "                <form class=\"form\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"form-group form-group-lg\">\n" +
    "                            <label class=\"control-label\">\n" +
    "                                {{ 'BACKUP_MNEMONIC' | translate }}\n" +
    "                            </label>\n" +
    "                            <textarea class=\"form-control\"\n" +
    "                                      style=\"resize: vertical; margin-bottom: 5px;\"\n" +
    "                                      placeholder=\"fetch cash winner system welcome ...\"\n" +
    "                                      rows=\"2\"\n" +
    "                                      cols=\"50\"\n" +
    "                                      name=\"inputMnemonic\"\n" +
    "                                      ng-model=\"form.mnemonic\"\n" +
    "                                      typeahead=\"word for word in bip39EN | filterERS : $viewValue | limitTo:4\">\n" +
    "                            </textarea>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                            <button class=\"form-control btn btn-alt btn-primary\" ng-disabled=\"working\" ng-click=\"startSweeping()\">{{ 'NEXT' | translate }}</button>\n" +
    "                            <div ng-if=\"working && !discovering\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'PLEASE_WAIT' | translate }}\n" +
    "                            </div>\n" +
    "                            <div ng-if=\"working && discovering\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'DISCOVERING_COINS' | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </form>\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-if=\"form.step === STEPS.WIF\">\n" +
    "                <p>\n" +
    "                    {{ 'SWEEP_INFO' | translate : { network: CONFIG.NETWORKS[walletData.networkType].NETWORK } }}\n" +
    "                </p>\n" +
    "                <form class=\"form\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"form-group form-group-lg\">\n" +
    "                            <label class=\"control-label\">\n" +
    "                                {{ 'SWEEP_WIF_INPUT' | translate }}\n" +
    "                            </label>\n" +
    "                            <textarea class=\"form-control\"\n" +
    "                                      style=\"resize: vertical; margin-bottom: 5px;\"\n" +
    "                                      placeholder=\"{{ 'SWEEP_WIF_PLACEHOLDER' | translate }}\"\n" +
    "                                      rows=\"8\"\n" +
    "                                      cols=\"80\"\n" +
    "                                      name=\"inputWIF\"\n" +
    "                                      ng-model=\"form.inputWIF\">\n" +
    "                            </textarea>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                            <button class=\"form-control btn btn-alt btn-primary\" ng-disabled=\"working\" ng-click=\"startSweeping()\">{{ 'NEXT' | translate }}</button>\n" +
    "                            <div ng-if=\"working && !discovering\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'PLEASE_WAIT' | translate }}\n" +
    "                            </div>\n" +
    "                            <div ng-if=\"working && discovering\">\n" +
    "                                <loading-spinner></loading-spinner>\n" +
    "                                {{ 'DISCOVERING_COINS' | translate }}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </form>\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-if=\"form.step === STEPS.SWEEP\">\n" +
    "\n" +
    "                 <span translate=\"SWEEPING_CONFIRM_MSG\"\n" +
    "                       translate-value-amount=\"{{ displaySweepData.totalValue | satoshiToCoin : walletData.networkType : 8 : false : 'hide' }}\"\n" +
    "                       translate-value-fee=\"{{ displaySweepData.totalFeePaid | satoshiToCoin : walletData.networkType : 8 : false : 'hide' }}\"\n" +
    "                       translate-value-network=\"{{ CONFIG.NETWORKS[walletData.networkType].NETWORK }}\">\n" +
    "                </span>\n" +
    "\n" +
    "                <form class=\"form\">\n" +
    "                    <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                        <button class=\"form-control btn btn-alt btn-primary\" ng-disabled=\"working\" ng-click=\"publishRawTransaction()\">{{ 'SEND' | translate }}</button>\n" +
    "                        <div ng-if=\"working\">\n" +
    "                            <loading-spinner></loading-spinner>\n" +
    "                            {{ 'PLEASE_WAIT' | translate }}\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </form>\n" +
    "            </div>\n" +
    "\n" +
    "            <div ng-if=\"form.step === STEPS.PUBLISH\">\n" +
    "                <h4>{{ 'DONE' | translate }}!</h4>\n" +
    "                <p>\n" +
    "                    {{ 'SWEEP_COMPLETED' | translate : { ticker: CONFIG.NETWORKS[walletData.networkType].TICKER_LONG } }}\n" +
    "                </p>\n" +
    "                <p class=\"help-block\">\n" +
    "                    <a href=\"{{ CONFIG.NETWORKS[walletData.networkType].EXPLORER_TX_URL }}/{{ sweepData.txId }}\" target=\"_blank\">{{ 'TX_INFO_MORE_LINK' | translate }}</a>\n" +
    "                </p>\n" +
    "\n" +
    "                <form class=\"form\">\n" +
    "                    <div class=\"form-group form-group-lg form-group-buttons\">\n" +
    "                        <button class=\"form-control btn btn-alt btn-default\" ng-click=\"dismiss()\">{{ 'CLOSE' | translate }}</button>\n" +
    "                    </div>\n" +
    "                </form>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/wallet/wallet.tpl.html","<top-header mode=\"'loggedin'\"></top-header>\n" +
    "\n" +
    "<div class=\"appWrapper\">\n" +
    "    <div\n" +
    "        class=\"appContainer container page-blur\"\n" +
    "        ng-class=\"{'page-blur-active': isLoadingNewWallet}\"\n" +
    "    >\n" +
    "        <!-- Left column -->\n" +
    "        <div class=\"app-left-col\">\n" +
    "            <div class=\"mainMenu\">\n" +
    "                <!-- Wallets list PROD normal case -->\n" +
    "                <div\n" +
    "                        ng-if=\"!CONFIG.DEBUG && walletsListOptions.length <= 2\"\n" +
    "                        class=\"wallets-list-holder\"\n" +
    "                >\n" +
    "                    <div class=\"wallets-list\" dropdown>\n" +
    "                        <button type=\"button\" class=\"btn btn-default btn-block\" dropdown-toggle>\n" +
    "                            <span class=\"text\">{{ CONFIG.NETWORKS[walletData.networkType].NETWORK_LONG }}</span>\n" +
    "                            <span class=\"caret\"></span>\n" +
    "                        </button>\n" +
    "                        <ul class=\"dropdown-menu\">\n" +
    "                            <li ng-repeat=\"option in walletsListOptions\">\n" +
    "                                <a class=\"pointer\" ng-click=\"onClickSetActiveWallet(option.value)\">\n" +
    "                                    {{ CONFIG.NETWORKS[option.wallet.network].NETWORK_LONG }}\n" +
    "                                </a>\n" +
    "                            </li>\n" +
    "                        </ul>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <!-- Wallets list PROD more than 2 wallets case -->\n" +
    "                <div\n" +
    "                        ng-if=\"!CONFIG.DEBUG && walletsListOptions.length > 2\"\n" +
    "                        class=\"wallets-list-holder\"\n" +
    "                >\n" +
    "                    <div class=\"wallets-list\" dropdown>\n" +
    "                        <button type=\"button\" class=\"btn btn-default btn-block\" dropdown-toggle>\n" +
    "                            <span class=\"text\">{{ CONFIG.NETWORKS[walletData.networkType].NETWORK_LONG }}: {{ walletData.identifier }}</span>\n" +
    "                            <span class=\"caret\"></span>\n" +
    "                        </button>\n" +
    "                        <ul class=\"dropdown-menu\">\n" +
    "                            <li ng-repeat=\"option in walletsListOptions\">\n" +
    "                                <a class=\"pointer\" ng-click=\"onClickSetActiveWallet(option.value)\">\n" +
    "                                    {{ CONFIG.NETWORKS[option.wallet.network].NETWORK_LONG }}: {{ option.wallet.identifier }}\n" +
    "                                </a>\n" +
    "                            </li>\n" +
    "                        </ul>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <!-- Wallets list DEV -->\n" +
    "                <div\n" +
    "                    ng-if=\"CONFIG.DEBUG\"\n" +
    "                    class=\"wallets-list-holder\"\n" +
    "                >\n" +
    "                    <p style=\"color: #fff;\">{{ walletData.identifier }}</p>\n" +
    "\n" +
    "                    <div class=\"wallets-list\" dropdown>\n" +
    "                        <button type=\"button\" class=\"btn btn-default btn-block\" dropdown-toggle>\n" +
    "                            <span class=\"text\">\n" +
    "                                {{ walletData.networkType }} ({{ walletData.balance | satoshiToCoin : walletData.networkType : 4 }}) {{ walletData.identifier }}\n" +
    "                            </span>\n" +
    "                            <span class=\"caret\"></span>\n" +
    "                        </button>\n" +
    "                        <ul class=\"dropdown-menu\">\n" +
    "                            <li ng-repeat=\"option in walletsListOptions\">\n" +
    "                                <a class=\"pointer\" ng-click=\"onClickSetActiveWallet(option.value)\">\n" +
    "                                    {{ option.wallet.network }} ({{ option.wallet.balance | satoshiToCoin : option.wallet.network : 4 }}) {{ option.wallet.identifier }}\n" +
    "                                </a>\n" +
    "                            </li>\n" +
    "                        </ul>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <!-- Side Nav -->\n" +
    "                <wallet-side-nav list=\"sideNavList\"></wallet-side-nav>\n" +
    "                <!-- App store buttons -->\n" +
    "                <wallet-app-store-buttons language=\"settings.language\"></wallet-app-store-buttons>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <!-- Right column -->\n" +
    "        <div class=\"app-right-col\">\n" +
    "            <!-- App header -->\n" +
    "            <app-header\n" +
    "                    page-title=\"pageTitle\"\n" +
    "                    wallet-data=\"walletData\"\n" +
    "                    bitcoin-prices=\"bitcoinPrices\"\n" +
    "                    settings=\"settings\"\n" +
    "            ></app-header>\n" +
    "            <!-- App body -->\n" +
    "            <div class=\"app-body\" id=\"app-body\">\n" +
    "                <div class=\"app-body-container\" ui-view=\"mainView\"></div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <!-- Loader overlay -->\n" +
    "        <div\n" +
    "            class=\"page-loader\"\n" +
    "            ng-class=\"{'active': isLoadingNewWallet}\"\n" +
    "        >\n" +
    "            <loading-spinner></loading-spinner>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/controllers/wallet-transaction-info-modal/wallet-transaction-info-modal.tpl.html","<div class=\"tx-info\">\n" +
    "    <div class=\"modal-header\">\n" +
    "        <h3 class=\"modal-title\" ng-class=\"{ received: transaction['wallet_value_change'] > 0, sent: transaction['wallet_value_change'] <= 0 }\">\n" +
    "            <span ng-if=\"transaction['wallet_value_change'] <= 0\">{{ 'TX_INFO_SENT' | translate : { network: CONFIG['NETWORK_LONG'] } }}</span>\n" +
    "            <span ng-if=\"transaction['wallet_value_change'] >  0\">{{ 'TX_INFO_RECEIVED' | translate : { network: CONFIG['NETWORK_LONG'] } }}</span>\n" +
    "        </h3>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-body\">\n" +
    "        <small class=\"tx-hash text-ellipsis\">\n" +
    "            <span class=\"label\">{{ 'TX_INFO_HASH' | translate }}</span>\n" +
    "            <span class=\"value\">{{ transaction.hash }}</span>\n" +
    "        </small>\n" +
    "\n" +
    "        <div ng-if=\"transaction.buybtc\">\n" +
    "            <div class=\"label\">\n" +
    "                {{ 'TX_INFO_BUYBTC' | translate }}\n" +
    "            </div>\n" +
    "            <div class=\"value\">\n" +
    "                {{ 'TX_INFO_BUYBTC_DETAILS' | translate:transaction.buybtc }}\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"amount\" ng-class=\"{ received: transaction['wallet_value_change'] > 0, sent: transaction['wallet_value_change'] <= 0 }\">\n" +
    "            <div class=\"fiat text-ellipsis\" ng-if=\"transaction.price\">\n" +
    "                <span class=\"label\">{{ 'TX_INFO_TIME_SUBTITLE' | translate }}</span>\n" +
    "                <span class=\"value\">{{ transaction['wallet_value_change'] | mathAbs | satoshiToCurrency : localCurrency : transaction.price }}</span>\n" +
    "\n" +
    "            </div>\n" +
    "            <div class=\"fiat text-ellipsis\" ng-if=\"transaction.price\">\n" +
    "                <span class=\"label\">{{ 'TX_INFO_TIME_SUBTITLE_2' | translate }}</span>\n" +
    "                <span class=\"value\">{{ transaction['wallet_value_change'] | mathAbs | satoshiToCurrency : localCurrency : bitcoinPrices }}</span>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"date\">\n" +
    "            <div class=\"label\">\n" +
    "                <span ng-if=\"transaction['wallet_value_change'] <= 0\">{{ 'TX_INFO_DATE_SENT' | translate }}</span>\n" +
    "                <span ng-if=\"transaction['wallet_value_change'] >  0\">{{ 'TX_INFO_DATE_RECEIVED' | translate }}</span>\n" +
    "            </div>\n" +
    "            <div class=\"value\">{{ transaction.time | amDateFormat:'Do MMMM YYYY, h:mm:ss a' : 'unix' }}</div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"confirmations\">\n" +
    "            <div class=\"label\">\n" +
    "                {{ 'TX_INFO_CONFIRMATIONS_TITLE' | translate }}\n" +
    "            </div>\n" +
    "            <div class=\"value\">\n" +
    "                <span ng-if=\"transaction['block_height']\">{{ transaction['block_height'] | confirmations }}</span>\n" +
    "                <span ng-if=\"transaction['block_height'] == null\">{{ 'TX_INFO_PENDING' | translate }}</span>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"contact\" ng-if=\"!transaction.buybtc && (transaction.contact && transaction.contact.displayName || transaction.otherAddresses || transaction.is_internal)\">\n" +
    "            <div class=\"label\">\n" +
    "                <span ng-if=\"transaction['wallet_value_change'] <= 0\">{{ 'TX_INFO_SENT_TO' | translate }}</span>\n" +
    "                <span ng-if=\"transaction['wallet_value_change'] > 0\">{{ 'TX_INFO_RECEIVED_FROM' | translate }}</span>\n" +
    "            </div>\n" +
    "            <div class=\"value text-ellipsis\">{{ transaction.contact && transaction.contact.displayName || transaction.otherAddresses || ('INTERNAL_TRANSACTION_TITLE' | translate) }}</div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"more-info\">\n" +
    "            <div class=\"label\">\n" +
    "                {{ 'TX_INFO_MORE_TITLE' | translate }} <i class=\"ion-android-open\"></i>\n" +
    "            </div>\n" +
    "            <div class=\"value\">\n" +
    "                <a href=\"{{ CONFIG.NETWORKS[walletData.networkType].EXPLORER_TX_URL }}/{{ transaction.hash }}\" target=\"_blank\">{{ 'TX_INFO_MORE_LINK' | translate }}</a>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"modal-footer\">\n" +
    "        <a class=\"btn btn-alt btn-default\" ng-click=\"dismiss()\">{{ 'OK' | translate }}</a>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/directives/app-bcc-sweep-warning/app-bcc-sweep-warning.tpl.html","<div class=\"row bcc-sweep-warning\">\n" +
    "    <div class=\"col-xs-12\">\n" +
    "        <div class=\"alert alert-success col-xs-12\"\n" +
    "             ng-click=\"dismissBCCSweepWarning()\">\n" +
    "            <a href class=\"close\" data-dismiss=\"alert\">&times;</a>\n" +
    "            <div>\n" +
    "                <b><i class=\"bticon bticon-emo-sunglasses\"></i> {{ 'BCC_SWEEP_NOTICE_TITLE' | translate }}</b>\n" +
    "                <p ng-bind-html=\"'BCC_SWEEP_NOTICE_BODY' | translate | nl2br\"></p>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/directives/app-header/app-header.tpl.html","<div class=\"app-header\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-xs-4\">\n" +
    "            <h1 class=\"pageTitle\">{{ pageTitle | translate }}</h1>\n" +
    "        </div>\n" +
    "\n" +
    "        <div class=\"col-xs-8\">\n" +
    "            <div class=\"text-right\">\n" +
    "                <h1>\n" +
    "                    {{ (walletData.balance + walletData.uncBalance) | satoshiToCoin : walletData.networkType : 8 : false : 'long' }}\n" +
    "                    <small>≃ {{ (walletData.balance + walletData.uncBalance) | satoshiToCurrency : settings.localCurrency : bitcoinPrices }}</small>\n" +
    "                </h1>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>")

$templateCache.put("js/modules/wallet/directives/app-two-factor-warning/app-two-factor-warning.tpl.html","<div class=\"alert alert-warning\" style=\"border-radius:0; border-top:0;\">\n" +
    "    <button class=\"btn btn-warning pull-right\" ui-sref=\"app.wallet.settings\"><i class=\"bticon bticon-cog\"></i> {{ 'SETTINGS' | translate }}</button>\n" +
    "    <b><i class=\"bticon bticon-warning-empty\"></i> {{ 'SECURITY_REMINDER' | translate }}</b>\n" +
    "    <p>{{ 'SECURITY_REMINDER_2FA' | translate }}</p>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/directives/wallet-no-more-transactions/wallet-no-more-transactions.tpl.html","<div class=\"wallet-no-more-transactions text-center\">\n" +
    "    <div>\n" +
    "        {{ 'WALLET_NO_MORE_TXS' | translate }}\n" +
    "    </div>\n" +
    "</div>")

$templateCache.put("js/modules/wallet/directives/wallet-app-store-buttons/wallet-app-store-buttons.tpl.html","<div class=\"appStoreButtons\">\n" +
    "    <!-- TODO Remove hr add separator calss -->\n" +
    "    <hr style=\"margin-right: 25px; margin-top: 10px; margin-bottom: 10px; border-top: 1px solid #999;\" />\n" +
    "    <a href=\"https://btc.com/wallet/download\" class=\"btn-appstore\"\n" +
    "       ng-if=\"language === 'cn'\">\n" +
    "        <i class=\"bticon bticon-android\"></i>\n" +
    "        <span class=\"sentence-case\">{{ 'APP_DOWNLOAD_ON' | translate }} <b>Android</b></span>\n" +
    "    </a>\n" +
    "    <a href=\"https://play.google.com/store/apps/details?id=com.blocktrail.mywallet\" class=\"btn-appstore\"\n" +
    "       ng-if=\"language !== 'cn'\">\n" +
    "        <i class=\"bticon bticon-android\"></i>\n" +
    "        <span class=\"sentence-case\">{{ 'APP_DOWNLOAD_ON' | translate }} <b>Android</b></span>\n" +
    "    </a>\n" +
    "    <a href=\"https://itunes.apple.com/us/app/blocktrail-bitcoin-wallet/id1019614423\" class=\"btn-appstore\">\n" +
    "        <i class=\"bticon bticon-apple\"></i>\n" +
    "        <span class=\"sentence-case\">{{ 'APP_DOWNLOAD_ON' | translate }} <b>iOS</b></span>\n" +
    "    </a>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/directives/wallet-no-transactions/wallet-no-transactions.tpl.html","<div class=\"wallet-no-transactions\">\n" +
    "    <i class=\"bticon bticon-doc-text\"></i>\n" +
    "    <h1>\n" +
    "        {{ 'WALLET_NO_TXS' | translate }}\n" +
    "    </h1>\n" +
    "    <h2 class=\"sentence-case\">\n" +
    "        {{ 'WALLET_ACTION_PRE' | translate }}\n" +
    "        <a ui-sref=\"app.wallet.receive\">\n" +
    "            {{ 'WALLET_ACTION_LINK' | translate }}\n" +
    "        </a>\n" +
    "    </h2>\n" +
    "</div>")

$templateCache.put("js/modules/wallet/directives/wallet-transaction/wallet-transaction.tpl.html","<div ng-click=\"onShowTransaction(transaction)\" class=\"item-transaction\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-xs-6\">\n" +
    "            <div class=\"transaction-info\">\n" +
    "                <div class=\"media\">\n" +
    "                    <div class=\"media-left media-media\">\n" +
    "                        <!-- Transaction avatar -->\n" +
    "                        <wallet-transaction-avatar\n" +
    "                            transaction=\"transaction\"\n" +
    "                        ></wallet-transaction-avatar>\n" +
    "                    </div>\n" +
    "                    <div class=\"media-body media-top\">\n" +
    "                        <!-- Transaction description -->\n" +
    "                        <wallet-transaction-description\n" +
    "                                transaction=\"transaction\"\n" +
    "                        ></wallet-transaction-description>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-2 text-center\">\n" +
    "            <!-- Is pending transaction -->\n" +
    "            <div class=\"pending\" ng-if=\"!transaction.block_height\">\n" +
    "                <i class=\"bticon bticon-clock\"></i><br/><em>{{ 'TX_INFO_PENDING' | translate }}</em>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-4 text-right\">\n" +
    "            <div\n" +
    "                    class=\"value\"\n" +
    "                    ng-class=\"isReceived ? 'received' : 'sent'\"\n" +
    "            >\n" +
    "                {{ transaction['wallet_value_change'] | satoshiToCoin : walletData.networkType }}\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/directives/wallet-side-nav/wallet-side-nav.tpl.html","<ul class=\"sidebar-nav\">\n" +
    "    <li\n" +
    "            ng-repeat=\"item in list\"\n" +
    "            ng-class=\"{ 'active': $state.includes(item.stateName) }\"\n" +
    "            ng-hide=\"item.isHidden\"\n" +
    "    >\n" +
    "        <a ng-href=\"{{ item.stateHref }}\">\n" +
    "            <i class=\"bticon\" ng-class=\"item.linkIcon\"></i>\n" +
    "            <span>{{ item.linkText | translate }}</span>\n" +
    "        </a>\n" +
    "    </li>\n" +
    "</ul>")

$templateCache.put("js/modules/wallet/directives/wallet-transaction-avatar/wallet-transaction-avatar.tpl.html","<div\n" +
    "        class=\"display-token\"\n" +
    "        ng-class=\"{'received': isReceived, 'sent': !isReceived, 'contact-token': !isAnonymous, 'anon-token': isAnonymous}\"\n" +
    ">\n" +
    "    <!-- Display contact initials, default is empty string  -->\n" +
    "    <div class=\"token-text\">\n" +
    "        {{ contactInitials }}\n" +
    "    </div>\n" +
    "\n" +
    "    <!-- Display avatar -->\n" +
    "    <span\n" +
    "            class=\"avatar\"\n" +
    "            ng-style=\"{'background-image':'url({{ avatarUrl }})'}\"\n" +
    "    ></span>\n" +
    "</div>\n" +
    "")

$templateCache.put("js/modules/wallet/directives/wallet-transaction-description/wallet-transaction-description.tpl.html","<div>\n" +
    "    <div class=\"tx-type\">\n" +
    "        <span ng-if=\"transaction.contact && displayName\" class=\"sentence-case\">\n" +
    "            <span ng-if=\"transaction.buybtc\">{{ 'TX_INFO_BUYBTC_FROM' | translate }}</span>\n" +
    "            <span ng-if=\"!transaction.buybtc && !isReceived\">{{ 'TX_INFO_SENT_TO' | translate }}</span>\n" +
    "            <span ng-if=\"!transaction.buybtc && isReceived\">{{ 'TX_INFO_RECEIVED_FROM' | translate }}</span>\n" +
    "            <span>{{ displayName }}</span>\n" +
    "        </span>\n" +
    "        <span ng-if=\"!transaction.contact || !displayName\" class=\"sentence-case\">{{ altDisplay | translate }}</span>\n" +
    "    </div>\n" +
    "    <div class=\"timestamp\">\n" +
    "        {{ transaction.time | amDateFormat: 'h:mm a' : 'unix' }}\n" +
    "    </div>\n" +
    "</div>\n" +
    "")

$templateCache.put("templates/common/base.html","<div class=\"base-view\" ui-view></div>\n" +
    "")

$templateCache.put("templates/common/footer.html","<footer class=\"footer\">\n" +
    "    <div class=\"container\">\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-xs-12 col-md-3\">\n" +
    "                <div class=\"copyright\">\n" +
    "                    <div class=\"copyright-logo\"></div>\n" +
    "                    <div class=\"copyright-text\">&copy; Copyright BTC.COM 2017. All Rights Reserved.</div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-12 col-md-9 links\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-6 col-md-3\">\n" +
    "                        <div class=\"links-column\">\n" +
    "                            <div class=\"links-category\">{{ 'FOOTER_PRODUCT' | translate }}</div>\n" +
    "                            <ul class=\"links-list\">\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://www.bitmain.com\">{{ 'FOOTER_ANTMINER' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://pool.btc.com\">{{ 'FOOTER_BTCCOM_POOL' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://btc.com\">{{ 'FOOTER_BTCCOM_EXPLORER' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://www.hashnest.com\">{{ 'FOOTER_HASHNEST' | translate }}</a></li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-md-3\">\n" +
    "                        <div class=\"links-column\">\n" +
    "                            <div class=\"links-category\">{{ 'FOOTER_COMPANY' | translate }}</div>\n" +
    "                            <ul class=\"links-list\">\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://www.bitmain.com/about\">{{ 'FOOTER_ABOUT' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://www.bitmain.com/join_us\">{{ 'FOOTER_JOIN_US' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"http://support.bitmain.com/hc/en-us/requests/new\">{{ 'FOOTER_CONTACT' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://blog.btc.com/\">{{ 'FOOTER_BLOG' | translate }}</a></li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-md-3\">\n" +
    "                        <div class=\"links-column\">\n" +
    "                            <div class=\"links-category\">{{ 'FOOTER_MEDIA' | translate }}</div>\n" +
    "                            <ul class=\"links-list\">\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"http://weibo.com/bitmain\">{{ 'FOOTER_WEIBO' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"http://forum.bitmain.com/\">{{ 'FOOTER_COMMUNITY' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://twitter.com/btccom_official\">{{ 'FOOTER_TWITTER' | translate }}</a></li>\n" +
    "                                <li class=\"links-list-item\"><a target=\"_blank\" href=\"https://www.facebook.com/btccom\">{{ 'FOOTER_FACEBOOK' | translate }}</a></li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-md-3\">\n" +
    "                        <div class=\"links-column\">\n" +
    "                            <div class=\"links-category\">{{ 'FOOTER_DEVELOPERS' | translate }}</div>\n" +
    "                            <ul class=\"links-list\">\n" +
    "                                <li class=\"links-list-item\"><a href=\"https://btc.com/api-doc\">{{ 'FOOTER_API' | translate }}</a></li>\n" +
    "                            </ul>\n" +
    "                            <ul class=\"links-list\">\n" +
    "                                <li class=\"links-list-item\">\n" +
    "                                    <a target=\"_blank\" href=\"{{ 'https://bmfeedback.bitmain.com/feedback/app_feedback/?app=BTC.COM&imei=1236456456&lan=' + 'en_US' }}\">\n" +
    "                                        {{ 'FOOTER_FEEDBACK' | translate }}\n" +
    "                                    </a>\n" +
    "                                </li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</footer>\n" +
    "")
}]);
})();