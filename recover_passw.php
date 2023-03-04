<html>

<head>
    <title>Wowonder login form</title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="title" content="Wowonder login form">
    <meta name="description" content="WoWonder v3.0.2 is a Social Networking Platform. With our new feature, user can wonder posts, photos,">
    <meta name="keywords" content="social, wowonder, social site">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="pinterest-rich-pin" content="false">
    <meta property="og:title" content="Wowonder login form">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://hexascripts.com/wonderful/welcome10/Script">
    <meta property="og:image" content="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/og.jpg">
    <meta property="og:image:secure_url" content="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/og.jpg">
    <meta property="og:description" content="WoWonder v3.0.2 is a Social Networking Platform. With our new feature, user can wonder posts, photos,">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Wowonder login form">
    <meta name="twitter:description" content="WoWonder v3.0.2 is a Social Networking Platform. With our new feature, user can wonder posts, photos,">
    <meta name="twitter:image" content="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/og.jpg">
    <link rel="canonical" href="https://hexascripts.com/wonderful/welcome10/Script/forgot-password">
    <link rel="shortcut icon" type="image/png" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/icon.png">
    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/stylesheet/general-style-plugins.css?version=4.1.1">



    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/stylesheet/style.css?version=4.1.1">
    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/stylesheet/font-awesome-4.7.0/css/font-awesome.min.css?version=4.1.1">



    <script src="https://connect.facebook.net/en_US/sdk.js?hash=39a64c8e74e75912c00285d8bbe2630f" async="" crossorigin="anonymous"></script>
    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/jquery-3.1.1.min.js?version=4.1.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-touch-punch@0.2.3/jquery.ui.touch-punch.min.js?version=4.1.1"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css?version=4.1.1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js?version=4.1.1"></script>

    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/stylesheet/leaflet.css?version=4.1.1">
    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/leaflet.js?version=4.1.1"></script>


    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/stylesheet/movies/style.movies.css?version=4.1.1">

    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/player/fluidplayer.min.css?version=4.1.1" type="text/css">
    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/player/fluidplayer.min.js?version=4.1.1"></script>
    <style>
        /* 

Add here your custom css styles Example: p { text-align: center; color: red; } 

*/
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/qrcode.js"></script>

    <script type="text/javascript">
        /* 
Add here your JavaScript Code. 
Note. the code entered here will be added in <head> tag 


	Example: 

	var x, y, z; 
	x = 5; 
	y = 6; 
	z = x + y;

*/
        function Wo_Ajax_Requests_File() {
            return "https://hexascripts.com/wonderful/welcome10/Script/requests.php"
        }

        function RunLiveAgora(channelName, DIV_ID, token) {
            var agoraAppId = '';
            var token = token;

            var client = AgoraRTC.createClient({
                mode: 'live',
                codec: 'vp8'
            });
            client.init(agoraAppId, function() {


                client.setClientRole('audience', function() {}, function(e) {});

                client.join(token, channelName, 756571, function(uid) {}, function(err) {});
            }, function(err) {});

            client.on('stream-added', function(evt) {
                var stream = evt.stream;
                var streamId = stream.getId();

                client.subscribe(stream, function(err) {});
            });
            client.on('stream-subscribed', function(evt) {
                var remoteStream = evt.stream;
                remoteStream.play(DIV_ID);
                $('#player_' + remoteStream.getId()).addClass('embed-responsive-item');
            });
        }
    </script>

    <style>
        @font-face {
            font-family: OpenSansLight;
            src: url("https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/fonts/OpenSansLight/OpenSansLight.woff") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: OpenSansRegular;
            src: url("https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/fonts/OpenSansRegular/OpenSansRegular.woff") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: OpenSansSemiBold;
            src: url("https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/fonts/OpenSansSemiBold/OpenSansSemiBold.woff") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: OpenSansBold;
            src: url("https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/fonts/OpenSansBold/OpenSansBold.woff") format("woff");
            font-weight: normal;
        }

        .navbar-default {
            background: #1e2321;
            border: none;
            height: 46px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        .round-check input[type="checkbox"]:checked+label:before,
        .round-check input[type="radio"]:checked+label:before {
            background: #a52729 !important;
        }

        .group-messages-wrapper a {
            color: #a52729 !important;
        }

        ul.profile-completion-bar li.completion-bar div.completion-bar-status {
            background: #a52729 !important;
        }

        .wow_srch_innr_filtr .round_check input:checked+label {
            background: #a52729 !important;
            color: #ffffff !important;
        }

        .featured-users {
            background: #fff !important;
        }

        .result-bar {
            background: #a52729 !important;
        }

        .featured-users .sidebar-title-back,
        .featured-users .pro-me-here a {
            color: #444 !important;
        }


        .avtive {
            border-color: #a52729 !important;
        }

        .new-update-alert {
            background: #bf3737;
            color: #ffffff;
        }

        #wo_nw_msg_page .msg_under_hood .mobilerightpane .messages-search-users-form .inner-addon .btn_contr {
            background: #a52729;
            color: #ffffff;
        }

        #wo_nw_msg_page .msg_under_hood .mobilerightpane .messages-search-users-form .inner-addon button.btn {
            color: #ffffff;
        }

        #wo_nw_msg_page .msg_under_hood .mobilerightpane .messages-search-users-form .inner-addon button.btn:hover {
            background: #bf3737;
        }

        .green-audio-player svg path {
            fill: #a52729;
        }

        .green-audio-player .slider .gap-progress,
        .green-audio-player .slider .gap-progress .pin {
            background-color: #a52729 !important;
        }

        .add_as_cont_list label input:checked+div {
            background-color: #a52729;
            color: #ffffff;
        }

        .barloading {
            background-color: transparent !important;
        }

        .barloading:before {
            background-color: #8dd9ff;
        }

        .left-sidebar ul li a i {
            color: #a52729 !important;
        }

        .cs-loader-inner,
        .main {
            color: #a52729;
        }

        .login input:focus,
        ul.profile-completion-bar li.completion-bar div.completion-bar-wrapper,
        .edit_grp_info_modal input.form-control:not(textarea):focus,
        .verfy_sett_email_phone input.form-control:not(textarea):focus {
            border-color: #a52729 !important;
        }

        .login:not(.loading) button:hover {
            background: #bf3737 !important;
            color: #ffffff;
        }

        .wo_setting_sidebar ul .list-group-item {
            background: #a52729 !important;
        }

        .wo_setting_sidebar ul .list-group-item a {
            color: #ffffff;
        }

        .wo_settings_page .setting-panel input[type=text]:focus,
        .wo_settings_page .setting-panel input[type=email]:focus,
        .wo_settings_page .setting-panel input[type=password]:focus,
        .wo_settings_page .setting-panel select:focus,
        .wo_settings_page .setting-panel textarea:focus {
            border-color: #03A9F4;
        }

        #search-nearby-users .nearby-users-relationship-collapse li.active .friends_toggle {
            border-color: #a52729;
        }

        #search-nearby-users .nearby-users-relationship-collapse li.active .friends_toggle:after {
            background: #a52729;
        }

        .wo_page_hdng_menu>ul li.active a {
            box-shadow: inset 0px -2.5px #a52729;
        }

        .login button,
        .postCategory h5,
        .wo_search_page .nav-tabs li.active a {
            background: #a52729 !important;
            color: #ffffff !important;
        }

        .mejs-controls .mejs-time-rail .mejs-time-current,
        .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
        .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current {
            background-color: #a52729 !important;
            background: #a52729 !important;
            background-image: #a52729 !important;
        }

        .navbar-default .navbar-nav>.open>a,
        .navbar-default .navbar-nav>.open>a:focus,
        .navbar-default .navbar-nav>.open>a:hover {
            color: #ffffff !important;
            background-color: #333333 !important;
        }

        .navbar-default .navbar-nav>.active>a,
        .navbar-default .navbar-nav>.active>a:focus,
        .navbar-default .navbar-nav>.active>a:hover,
        .nav-names li:hover {
            color: #ffffff !important;
            background-color: #333333 !important;
        }

        body {
            background-color: #f0f2f5;
        }

        .navbar-default .navbar-nav>li>a {
            color: #ffffff;
            font-size: 13px;
        }

        a.unread-update {
            color: #ffffff !important;
        }

        .btn-main {
            color: #ffffff;
            background-color: #a52729;
            border-color: #a52729;
        }

        .btn-main:hover {
            color: #ffffff;
            background-color: #bf3737;
            border-color: #bf3737;
        }

        .wow_pops_head {
            background: #bf3737;
        }

        .btn-main:focus {
            color: #ffffff;
        }

        .active-wonder {
            color: #a52729;
        }

        .admin-panel .col-md-9 .list-group-item:first-child,
        .setting-panel .col-md-8 .list-group-item:first-child,
        .profile-lists .list-group-item:first-child,
        .col-md-8 .list-group-item:first-child,
        .col-md-3.custom .list-group-item:first-child,
        .col-sm-4 .list-group-item:first-child,
        .col-md-7 .list-group-item:first-child,
        .col-md-9 .list-group-item:first-child,
        .red-list .list-group-item:first-child,
        .active.list-group-item:first-child {
            color: #444;
            background-color: #fcfcfc;
            border-bottom: 1px solid #f1f1f1;
            padding: 18px;
        }

        .admin-panel .col-md-9 .list-group-item:first-child a,
        .setting-panel .col-md-8 .list-group-item:first-child a,
        .profile-lists .list-group-item:first-child a,
        .col-md-8 .list-group-item:first-child a,
        .col-md-7 .list-group-item:first-child a,
        .active.list-group-item:first-child a {
            color: #444 !important;
        }

        .list-group-item.black-list.active-list,
        .red-list.active-list {
            color: #ffffff;
            background-color: #a52729;
        }

        .list-group-item.black-list {
            background: #a52729;
        }

        .profile-top-line {
            background-color: #a52729;
        }

        #bar {
            background-color: #a52729;
        }

        .list-group-item.black-list a {
            color: #ffffff;
        }

        .list-group-item.black-list.active-list a {
            color: #a52729;
        }

        .main-color,
        .small-text a {
            color: #a52729 !important;
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover {
            color: #ffffff;
            cursor: default;
            color: #a52729;
            border-bottom: 1px solid #a52729;
            background-color: transparent
        }

        .btn-active {
            color: #ffffff;
            background: #a52729;
            outline: none;
            border: 1px solid #a52729
        }

        .btn-active:hover,
        .btn-active:focus {
            border: 1px solid #bf3737;
            color: #ffffff;
            background: #bf3737;
        }

        .btn-active-color:hover {
            background: #bf3737;
        }

        .chat-tab .online-toggle-hdr,
        .wow_thread_head {
            background: #1e2321;
            color: #ffffff;
        }

        .chat-tab .chat-textarea .chat-btns-w .chat_optns {
            color: #a52729;
            fill: #a52729;
        }

        .chat-tab .online-toggle-hdr a {
            color: #ffffff;
        }

        .profile-style .user-follow-button button.btn-active,
        .btn-login,
        .btn-register {
            background: #a52729;
            color: #ffffff;
        }

        .profile-style .user-follow-button button.btn-active:hover,
        .btn-login:hover,
        .btn-login:focus,
        .btn-register:hover,
        .btn-register:focus {
            color: #ffffff;
            background: #bf3737;
        }

        .panel-login>.panel-heading a.active {
            color: #a52729;
            font-size: 18px;
        }

        .hash {
            color: #a52729;
        }

        .message-text .hash {
            color: #fff !important;
        }

        .search-container .search-input {
            color: #ffffff !important;
            background: #0f1110 !important;
        }

        .chat-messages-wrapper .outgoing .message-text {
            background: #a52729;
            color: #ffffff;
        }

        .normal-container {
            width: 100%;
            height: 100%;
            margin-top: 15px;
        }

        .active.fa-thumbs-up {
            color: #a52729;
        }

        .api-ex-urls {
            background-color: #a52729;
            color: #ffffff;
        }

        .user-username {
            color: #a52729;
        }

        .upload-image {
            border: 3px dashed #a52729;
        }

        .events-tab-list li {
            background-color: #a52729;
        }

        .events-tab-list li:hover {
            background-color: #a52729;
        }

        .active-e-tab {
            background-color: #a52729 !important;
        }

        .main {
            color: #a52729 !important;
        }

        .events-list-dropup-menu ul li a:hover {
            background: #a52729;
        }

        .usr-offline {
            color: #a52729;
        }

        .blog-dd-ul li span:hover,
        .blog-dd-ul li a:hover {
            background: #a52729 !important;
        }

        .blog_publ {
            background: #a52729;
            border: 1px solid #a52729;
        }

        .slide-film-desc:hover,
        .movies-top-breadcrumb li:hover,
        .movies-top-breadcrumb li a:hover {
            color: #a52729 !important;
        }

        .movies h3.latest-movies,
        h3.recommended-movies {
            border-left: 3px solid #a52729;
        }

        .wo_user_profile .user-bottom-nav li .menuactive {
            border-bottom: 2px solid #a52729;
            color: #a52729;
        }

        .ads-navbar-wrapper ul li a.active {
            border-color: #a52729;
        }

        .ads_mini_wallet,
        .wo_page_hdng_innr span {
            background-color: #a52729;
            color: #ffffff;
        }

        .btn-loading:after {
            background-color: #a52729;
        }

        .wow_pub_privacy_menu li label input[type="radio"]:checked+span {
            background-color: #a52729;
            color: #ffffff;
        }

        .order_by ul li.active a {
            background: #a52729 !important;
            color: #ffffff !important;
        }




        #welcomeheader .mdbtn:hover {
            background-color: #ffffff;
            color: #1e2321;
            border-color: #ffffff;
        }

        .post .panel.active_shadow {
            box-shadow: 0 0 0 1.5px #a52729 !important;
        }

        .ui-widget-header .ui-state-default,
        .wo_adv_search_filter_side .ui-slider .ui-slider-range,
        .wo_adv_search_filter_side .ui-slider .ui-slider-handle {
            background-color: #a52729;
        }

        .reaction-1::before {
            content: "Me gusta";
        }

        .reaction-2::before {
            content: "Amor";
        }

        .reaction-3::before {
            content: "HaHa";
        }

        .reaction-4::before {
            content: "WoW";
        }

        .reaction-5::before {
            content: "Triste";
        }

        .reaction-6::before {
            content: "Enojado";
        }

        /*.reaction-like::before {
    content: "Me gusta";
}
.reaction-love::before {
    content: "Amor";
}
.reaction-haha::before {
    content: "HaHa";
}
.reaction-wow::before {
    content: "WoW";
}
.reaction-sad::before {
    content: "Triste";
}
.reaction-angry::before {
    content: "Enojado";
}*/

        .navbar-default .dropdown-menu.ani-acc-menu>li>a:hover {
            color: #ffffff;
            background-color: #a52729;
        }

        #wo_nw_msg_page .msg_under_hood .mobilerightpane .messages-search-users-form .wo_msg_tabs li.active a,
        .text-sender-container .msg_usr_info_top_list .msg_usr_cht_opts_btns>span:hover,
        .text-sender-container .msg_usr_info_top_list .msg_usr_cht_usr_data a:hover,
        .wo_chat_tabs li.active a {
            color: #a52729;
        }

        .text-sender-container .outgoing .message-model .message {
            background-color: #a52729;
            color: #ffffff;
        }

        .text-sender-container .outgoing .message-model .message p,
        .text-sender-container .outgoing .message-model .message a {
            color: #ffffff;
        }

        #notification-popup {
            position: fixed;
            left: 20px;
            width: 300px;
            bottom: 20px;
            z-index: 10000;
        }

        #notification-popup .notifications-popup-list:empty {
            padding: 0;
        }

        #notification-popup .notifications-popup-list {
            position: relative;
            background: #333333 !important;
            border-radius: 10px;
            padding: 6px;
            width: 100%;
            margin-bottom: 10px;
            z-index: 10000;
            box-shadow: 0 2px 4px rgb(0 0 0 / 10%);
        }

        #notification-popup .notifications-popup-list,
        #notification-popup .notifications-popup-list a,
        #notification-popup .notifications-popup-list .main-color,
        #notification-popup .notifications-popup-list svg,
        #notification-popup .notifications-popup-list .notification-text,
        #notification-popup .notifications-popup-list .notification-time {
            color: #ffffff !important;
        }

        #notification-popup .notifications-popup-list .notification-list {
            border-radius: 10px;
        }

        #notification-popup .notifications-popup-list .notification-list:hover {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>

    <style>
        .login_left_combo {
            color: #ffffff
        }

        body {
            background: #a52729 !important;
        }

        .wo_regi_features:before {
            content: '';
            display: block;
            background-image: url(https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/backgrounds/login.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.35;
        }
    </style>

    <script crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/socket.io.js"></script>
    <script>
        let nodejs_system = "0";
        let socket = null
        let groupChatListener = {}
        $(() => {});
    </script>
    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.js"></script>


    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/green-audio-player/green-audio-player.css?version=4.1.1">
    <script src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/green-audio-player/green-audio-player.js?version=4.1.1"></script>
    <style type="text/css" data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_dialog_advanced {
            border-radius: 8px;
            padding: 10px
        }

        .fb_dialog_content {
            background: #fff;
            color: #373737
        }

        .fb_dialog_close_icon {
            background: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            left: 5px;
            right: auto;
            top: 5px
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title>span {
            background: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            height: 100%;
            left: 0;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            transform: none;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            background: none;
            height: auto;
            min-height: initial;
            min-width: initial;
            width: auto
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            clear: both;
            color: #fff;
            display: block;
            font-size: 18px;
            padding-top: 20px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .4);
            bottom: 0;
            left: 0;
            min-height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_mobile .fb_dialog_iframe {
            position: sticky;
            top: 0
        }

        .fb_dialog_content .dialog_header {
            background: linear-gradient(from(#738aba), to(#2c4987));
            border-bottom: 1px solid;
            border-color: #043b87;
            box-shadow: white 0 1px 1px -1px inset;
            color: #fff;
            font: bold 14px Helvetica, sans-serif;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: linear-gradient(from(#4267B2), to(#2a4887));
            background-clip: padding-box;
            border: 1px solid #29487d;
            border-radius: 3px;
            display: inline-block;
            line-height: 18px;
            margin-top: 3px;
            max-width: 85px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            background: none;
            border: none;
            color: #fff;
            font: bold 12px Helvetica, sans-serif;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #4a4a4a;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f5f6f7;
            border: 1px solid #4a4a4a;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop,
        .fb_iframe_widget_fluid_desktop span,
        .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }

        .fb_mpn_mobile_landing_page_slide_out {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_out_from_left {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_up {
            animation-duration: 500ms;
            animation-name: fb_mpn_landing_page_slide_up;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_in {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_in;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_mpn_fade_out;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_from_left;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_invisible_flow {
            display: inherit;
            height: 0;
            overflow-x: hidden;
            width: 0
        }

        @keyframes fb_mpn_landing_page_slide_out {
            0% {
                margin: 0 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                margin: 0 24px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_out_from_left {
            0% {
                left: 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                left: 12px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_up {
            0% {
                bottom: 0;
                opacity: 0
            }

            100% {
                bottom: 24px;
                opacity: 1
            }
        }

        @keyframes fb_mpn_bounce_in {
            0% {
                opacity: .5;
                top: 100%
            }

            100% {
                opacity: 1;
                top: 0
            }
        }

        @keyframes fb_mpn_fade_out {
            0% {
                bottom: 30px;
                opacity: 1
            }

            100% {
                bottom: 0;
                opacity: 0
            }
        }

        @keyframes fb_mpn_bounce_out {
            0% {
                opacity: 1;
                top: 0
            }

            100% {
                opacity: .5;
                top: 100%
            }
        }

        @keyframes fb_bounce_in_v2 {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom right
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_in_from_left {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom left
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }
        }

        @keyframes fb_bounce_out_v2 {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_out_from_left {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }
        }

        @keyframes slideInFromBottom {
            0% {
                opacity: .1;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes slideInFromBottomDelay {
            0% {
                opacity: 0;
                transform: translateY(100%)
            }

            97% {
                opacity: 0;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>
    <style></style>
</head>

<body>
    <div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc" class="cc-window cc-floating cc-type-info cc-theme-edgeless cc-bottom cc-left cc-color-override--228971438 cc-invisible" style="display: none;">
        <!--googleoff: all--><span id="cookieconsent:desc" class="cc-message">Este sitio web utiliza cookies para garantizar que obtenga la mejor experiencia en nuestro sitio web. <a aria-label="learn more about cookies" role="button" tabindex="0" class="cc-link" href="https://hexascripts.com/wonderful/welcome10/Script/terms/privacy-policy" target="_blank">Aprende más</a></span>
        <div class="cc-compliance"><a aria-label="dismiss cookie message" role="button" tabindex="0" class="cc-btn cc-dismiss">¡Lo tengo!</a></div>
        <!--googleon: all-->
    </div>
    <input type="hidden" id="get_no_posts_name" value="No hay mas publicaciones">
    <div id="focus-overlay"></div>
    <input type="hidden" class="seen_stories_users_ids" value="">
    <input type="hidden" class="main_session" value="0e266b5a5775209bbfc2">
    <div class="content-container welcome-container" style="">
        <div class="ad-placement-header-footer">
        </div>
        <div id="contnet">
            <style>
                .login_left_content {
                    background: url('https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/welcome/Cartoons.svg');
                }

                .login_div>div {
                    width: 100%;
                }

                .footer {
                    margin-top: 110px;
                }
            </style>
            <div class="wrapper">

                <svg class="black-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="749.408" height="205.786" viewBox="0 0 749.408 205.786">
                    <defs>
                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#343535"></stop>
                            <stop offset="1" stop-color="#181717"></stop>
                        </linearGradient>
                    </defs>
                    <path id="Path_6944" data-name="Path 6944" d="M-5446.921,2382.22s56.339,35.212,97.03,139.591,142.954,58.659,183.2,40.26,58.17-10.726,116.144-16.1,98.37-35.6,112.644-71.44,41.936-71.2,87.934-74.325,54.709,7.772,82.308,11.222,70.146-26.449,70.146-26.449Z" transform="translate(5446.921 -2382.22)" fill="url(#linear-gradient)"></path>
                </svg>
                <img class="red-svg" src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/welcome/red-wave.svg" alt="wave">


                <div class="new_login">
                    <div class="login_header">
                        <div>
                            <div class="header_logo">
                                <a href="https://hexascripts.com/wonderful/welcome10/Script" class="logo"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/logo.png" alt="Logo"> </a>
                            </div>
                            <div class="header_text">
                                <p>¡Crea tu cuenta Wowonder Theme!</p>
                            </div>
                        </div>
                        <div class="form-tabs">
                            <a href="https://hexascripts.com/wonderful/welcome10/Script"><button>Acceder</button></a>
                        </div>
                        <div class="dontHaveAnAccount">
                            <p>¿No tienes una cuenta? <a class="dec main" href="https://hexascripts.com/wonderful/welcome10/Script/register">Registrar</a></p>
                        </div>
                    </div>
                    <div class="login_div" id="login_div">
                        <div class="formDiv">


                            <form id="forgot-form" class="recover_password_by_email" method="post">
                                <p class="title">¿Olvidaste tu Contraseña?</p>
                                <div class="alert alert-danger login_errors"></div>
                                <div class="form_fields">
                                    <label for="recoveremail">E-mail</label>
                                    <input id="recoveremail" name="recoveremail" type="email" autofocus="">
                                </div>
                                <div class="login_signup_combo">
                                    <div class="login__">
                                        <button type="submit" style="background-color: #c32e3a!important;" class="btn btn-main btn-mat add_wow_loader">Recuperar</button>
                                    </div>
                                </div>
                            </form>

                            <form id="forgot-form-sms" class="recover_password_by_sms" method="post" style="display: none;">
                                <div class="login_errors"></div>
                                <div class="form_fields">
                                    <label for="recoverphone">Teléfono</label>
                                    <input id="recoverphone" name="recoverphone" type="text" autofocus="">
                                </div>

                                <div class="login_signup_combo">
                                    <div class="login__">
                                        <button type="submit" style="background-color: #c32e3a!important;" class="btn btn-main btn-mat add_wow_loader">Recuperar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="welcome-footer">
                            © 2023 Wowonder Theme &nbsp;•&nbsp;
                            <a data-ajax="?link1=terms&amp;type=terms" href="https://hexascripts.com/wonderful/welcome10/Script/terms/terms">Condiciones</a> &nbsp;•&nbsp;
                            <a data-ajax="?link1=terms&amp;type=privacy-policy" href="https://hexascripts.com/wonderful/welcome10/Script/terms/privacy-policy">Política</a> &nbsp;•&nbsp;
                            <a data-ajax="?link1=contact-us" href="https://hexascripts.com/wonderful/welcome10/Script/contact-us">Contacto</a> &nbsp;•&nbsp;
                            <a data-ajax="?link1=terms&amp;type=about-us" href="https://hexascripts.com/wonderful/welcome10/Script/terms/about-us">Pin</a> &nbsp;•&nbsp;
                            <a href="https://hexascripts.com/wonderful/welcome10/Script/blogs">Blog</a> &nbsp;•&nbsp;
                            <span class="lang dropup">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><svg fill="currentColor" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" class="feather feather-translate" style="margin-top: -3px;width: 15px;height: 15px;vertical-align: middle;">
                                        <path d="M12.87,15.07L10.33,12.56L10.36,12.53C12.1,10.59 13.34,8.36 14.07,6H17V4H10V2H8V4H1V6H12.17C11.5,7.92 10.44,9.75 9,11.35C8.07,10.32 7.3,9.19 6.69,8H4.69C5.42,9.63 6.42,11.17 7.67,12.56L2.58,17.58L4,19L9,14L12.11,17.11L12.87,15.07M18.5,10H16.5L12,22H14L15.12,19H19.87L21,22H23L18.5,10M15.88,17L17.5,12.67L19.12,17H15.88Z"></path>
                                    </svg>
                                    Idioma</a>
                                <ul class="dropdown-menu dropdown-menu-right wow_lang_select_menu">
                                    <li class="language_select"><a href="?lang=english" rel="nofollow" class="English">English</a></li>
                                    <li class="language_select"><a href="?lang=arabic" rel="nofollow" class="Arabic">Arabic</a></li>
                                    <li class="language_select"><a href="?lang=dutch" rel="nofollow" class="Dutch">Dutch</a></li>
                                    <li class="language_select"><a href="?lang=french" rel="nofollow" class="French">French</a></li>
                                    <li class="language_select"><a href="?lang=german" rel="nofollow" class="German">German</a></li>
                                    <li class="language_select"><a href="?lang=italian" rel="nofollow" class="Italian">Italian</a></li>
                                    <li class="language_select"><a href="?lang=portuguese" rel="nofollow" class="Portuguese">Portuguese</a></li>
                                    <li class="language_select"><a href="?lang=russian" rel="nofollow" class="Russian">Russian</a></li>
                                    <li class="language_select"><a href="?lang=spanish" rel="nofollow" class="Spanish">Spanish</a></li>
                                    <li class="language_select"><a href="?lang=turkish" rel="nofollow" class="Turkish">Turkish</a></li>
                                </ul>
                            </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- <script>
                var working = false;
                var $this = $('#forgot-form');
                var $this_sms = $('#forgot-form-sms');
                var $state = $this.find('.login_errors');
                var $state_sms = $this_sms.find('.login_errors');
                $(function() {
                    $('#recover_password_by_email').click(function() {
                        $('.x_chooser').hide();
                        $('.recover_password_by_email').show();
                    });
                    $('#recover_password_by_sms').click(function() {
                        $('.x_chooser').hide();
                        $('.recover_password_by_sms').show();
                    });

                    Wo_SetTimer();
                    $this.ajaxForm({
                        url: Wo_Ajax_Requests_File() + '?f=recover',
                        beforeSend: function() {
                            working = true;
                            $this.find('button').attr("disabled", true);
                            $this.find('.add_wow_loader').addClass('btn-loading');
                        },
                        success: function(data) {
                            if (data.status == 200) {
                                $state.removeClass('alert-danger');
                                $state.addClass('alert-success');
                                $state.html('Correo enviado correctamente');
                                $this.find('.add_wow_loader').removeClass('btn-loading');
                            } else {
                                $this.find('button').attr("disabled", false);
                                $this.find('.add_wow_loader').removeClass('btn-loading');
                                $state.html(data.errors);
                            }
                            working = false;
                        }
                    });

                    $this_sms.ajaxForm({
                        url: Wo_Ajax_Requests_File() + '?f=recoversms',
                        beforeSend: function() {
                            working = true;
                            $this_sms.find('button').attr("disabled", true);
                            $this_sms.find('.add_wow_loader').addClass('btn-loading');
                        },
                        success: function(data) {
                            if (data.status == 200) {
                                $state_sms.removeClass('alert-danger');
                                $state_sms.addClass('alert-success');
                                $state_sms.html('Recuperar SMS ha sido enviado con éxito');
                                $this_sms.find('.add_wow_loader').removeClass('btn-loading');
                                setTimeout(function() {
                                    window.location.href = data.location;
                                }, 1000);
                            } else {
                                $this_sms.find('button').attr("disabled", false);
                                $this_sms.find('.add_wow_loader').removeClass('btn-loading');
                                $state_sms.html(data.errors);
                            }
                            working = false;
                        }
                    });

                });
            </script> -->
        </div>
        <footer>
        </footer>
        <div class="second-footer" style="display: none; ">
            <div class="page-margin">
                <div class="footer-wrapper">
                    <hr>
                    <div class="footer-powered">
                        <p>
                            © 2023 Wowonder Theme </p>
                        <ul class="list-inline">
                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script" data-ajax="?link1=home">Inicio</a></li>
                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script/terms/about-us" data-ajax="?link1=terms&amp;type=about-us">Pin</a></li>
                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script/contact-us" data-ajax="?link1=contact-us">Contacto</a></li>
                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script/terms/privacy-policy" data-ajax="?link1=terms&amp;type=privacy-policy">Política</a></li>
                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script/terms/terms" data-ajax="?link1=terms&amp;type=terms">Condiciones</a></li>
                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script/terms/refund" data-ajax="?link1=terms&amp;type=refund">Solicitar un reembolso</a></li>

                            <li><a href="https://hexascripts.com/wonderful/welcome10/Script/blogs" data-ajax="?link1=blogs">Blog</a></li>
                            <li><a data-ajax="?link1=developers" href="https://hexascripts.com/wonderful/welcome10/Script/developers">Developers</a></li>
                        </ul>
                        <span class="lang_selct dropup">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path>
                                </svg> Idioma </a>
                            <ul class="dropdown-menu dropdown-menu-right wow_lang_select_menu">
                                <li class="language_select"><a href="?lang=english" rel="nofollow" class="English">English</a></li>
                                <li class="language_select"><a href="?lang=arabic" rel="nofollow" class="Arabic">Arabic</a></li>
                                <li class="language_select"><a href="?lang=dutch" rel="nofollow" class="Dutch">Dutch</a></li>
                                <li class="language_select"><a href="?lang=french" rel="nofollow" class="French">French</a></li>
                                <li class="language_select"><a href="?lang=german" rel="nofollow" class="German">German</a></li>
                                <li class="language_select"><a href="?lang=italian" rel="nofollow" class="Italian">Italian</a></li>
                                <li class="language_select"><a href="?lang=portuguese" rel="nofollow" class="Portuguese">Portuguese</a></li>
                                <li class="language_select"><a href="?lang=russian" rel="nofollow" class="Russian">Russian</a></li>
                                <li class="language_select"><a href="?lang=spanish" rel="nofollow" class="Spanish">Spanish</a></li>
                                <li class="language_select"><a href="?lang=turkish" rel="nofollow" class="Turkish">Turkish</a></li>
                            </ul>
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="extra">
        </div>
    </div>
    <!-- Load modal alerts -->
    <div class="modal fade in" id="comment_report_box" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 496.158 496.158" xml:space="preserve">
                        <path style="fill:#32BEA6;" d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.003,0,111.063,0,248.085 c0,137.002,111.07,248.07,248.082,248.07C385.088,496.155,496.158,385.087,496.158,248.085z"></path>
                        <path style="fill:#FFFFFF;" d="M384.673,164.968c-5.84-15.059-17.74-12.682-30.635-10.127c-7.701,1.605-41.953,11.631-96.148,68.777 c-22.49,23.717-37.326,42.625-47.094,57.045c-5.967-7.326-12.803-15.164-19.982-22.346c-22.078-22.072-46.699-37.23-47.734-37.867 c-10.332-6.316-23.82-3.066-30.154,7.258c-6.326,10.324-3.086,23.834,7.23,30.174c0.211,0.133,21.354,13.205,39.619,31.475 c18.627,18.629,35.504,43.822,35.67,44.066c4.109,6.178,11.008,9.783,18.266,9.783c1.246,0,2.504-0.105,3.756-0.322 c8.566-1.488,15.447-7.893,17.545-16.332c0.053-0.203,8.756-24.256,54.73-72.727c37.029-39.053,61.723-51.465,70.279-54.908 c0.082-0.014,0.141-0.02,0.252-0.043c-0.041,0.01,0.277-0.137,0.793-0.369c1.469-0.551,2.256-0.762,2.301-0.773 c-0.422,0.105-0.641,0.131-0.641,0.131l-0.014-0.076c3.959-1.727,11.371-4.916,11.533-4.984 C385.405,188.218,389.034,176.214,384.673,164.968z"></path>
                    </svg>
                    <span class="msg">Comentario reportado con éxito</span>
                </p>
            </div>

        </div>
    </div>

    <div class="modal fade in" id="post-shared" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 496.158 496.158" xml:space="preserve">
                        <path style="fill:#32BEA6;" d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.003,0,111.063,0,248.085 c0,137.002,111.07,248.07,248.082,248.07C385.088,496.155,496.158,385.087,496.158,248.085z"></path>
                        <path style="fill:#FFFFFF;" d="M384.673,164.968c-5.84-15.059-17.74-12.682-30.635-10.127c-7.701,1.605-41.953,11.631-96.148,68.777 c-22.49,23.717-37.326,42.625-47.094,57.045c-5.967-7.326-12.803-15.164-19.982-22.346c-22.078-22.072-46.699-37.23-47.734-37.867 c-10.332-6.316-23.82-3.066-30.154,7.258c-6.326,10.324-3.086,23.834,7.23,30.174c0.211,0.133,21.354,13.205,39.619,31.475 c18.627,18.629,35.504,43.822,35.67,44.066c4.109,6.178,11.008,9.783,18.266,9.783c1.246,0,2.504-0.105,3.756-0.322 c8.566-1.488,15.447-7.893,17.545-16.332c0.053-0.203,8.756-24.256,54.73-72.727c37.029-39.053,61.723-51.465,70.279-54.908 c0.082-0.014,0.141-0.02,0.252-0.043c-0.041,0.01,0.277-0.137,0.793-0.369c1.469-0.551,2.256-0.762,2.301-0.773 c-0.422,0.105-0.641,0.131-0.641,0.131l-0.014-0.076c3.959-1.727,11.371-4.916,11.533-4.984 C385.405,188.218,389.034,176.214,384.673,164.968z"></path>
                    </svg>
                    ¡Se ha agregado el mensaje a tu línea de tiempo! </p>
            </div>

        </div>
    </div>
    <div class="modal fade in" id="modal-alert" role="dialog">
        <div class="modal-dialog wow_mat_mdl">
            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                        <g id="Icons">
                            <g>
                                <g>
                                    <path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"></path>
                                </g>
                                <g>
                                    <path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"></path>
                                </g>
                                <g>
                                    <path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                                <g>
                                    <path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span id="modal-alert-msg">
                        ¡Has alcanzado el límite de 5000 amigos! </span>
                </p>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="invalid_file" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                        <g id="Icons">
                            <g>
                                <g>
                                    <path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"></path>
                                </g>
                                <g>
                                    <path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"></path>
                                </g>
                                <g>
                                    <path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                                <g>
                                    <path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Error de tamaño de archivo: El archivo excede el límite permitido (92 MB) y no se puede cargar. </p>
            </div>

        </div>
    </div>
    <div class="modal fade in" id="ffmpeg_file" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p style="text-align: center;padding: 30px 20px;font-size: 16px;margin: 0;background: linear-gradient(rgb(244 67 54 / 10%), transparent);">
                    <svg xmlns="http://www.w3.org/2000/svg" height="100px" viewBox="0 0 512 512" width="100px" class="main" style="display: block;margin: 0 auto 30px;">
                        <g fill="currentColor" opacity="0.6">
                            <path d="m71.072 303.9a189.244 189.244 0 0 0 66.661 97.518 186.451 186.451 0 0 0 114.189 38.582c103.707 0 188.078-84.284 188.078-187.884a185.963 185.963 0 0 0 -38.974-114.534 189.368 189.368 0 0 0 -98.448-66.463 24 24 0 1 1 12.883-46.238 237.668 237.668 0 0 1 123.578 83.392 235.9 235.9 0 0 1 -187.117 379.727 234.064 234.064 0 0 1 -143.342-48.444 237.546 237.546 0 0 1 -83.652-122.438z"></path>
                            <circle cx="200" cy="48" r="24"></circle>
                            <circle cx="56" cy="192" r="24"></circle>
                            <circle cx="109" cy="101" r="24"></circle>
                        </g>
                        <path d="m48 480a24 24 0 0 1 -24-24v-144a24 24 0 0 1 29.206-23.429l144 32a24 24 0 1 1 -10.412 46.858l-114.794-25.51v114.081a24 24 0 0 1 -24 24z" fill="currentColor"></path>
                    </svg>
                    Se está procesando su video, le informaremos cuando esté listo para ver. </p>
            </div>

        </div>
    </div>
    <div class="modal fade in" id="file_not_supported" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                        <g id="Icons">
                            <g>
                                <g>
                                    <path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"></path>
                                </g>
                                <g>
                                    <path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"></path>
                                </g>
                                <g>
                                    <path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                                <g>
                                    <path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    No se puede cargar un archivo: este tipo de archivo no es compatible. </p>
            </div>

        </div>
    </div>
    <div class="modal fade" id="modal_light_box" role="dialog">
        <button type="button" class="close comm_mod_img_close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg></button>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0;">
                    <img class="image" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="adult_image_file" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                        <g id="Icons">
                            <g>
                                <g>
                                    <path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"></path>
                                </g>
                                <g>
                                    <path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"></path>
                                </g>
                                <g>
                                    <path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                                <g>
                                    <path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Hemos detectado contenido para adultos en la imagen que subiste, por lo tanto, hemos rechazado tu proceso de carga. </p>
            </div>

        </div>
    </div>
    <div class="modal fade" id="share_post_on_group" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">
                        Compartir publicación en un grupo </h4>
                </div>
                <form id="share_post_on_group_form" class="share_post_on_group_form" method="POST">
                    <div class="modal-body">
                        <div id="share_post_on_group_form_alert"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:#03A9F4;">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                            </span>
                            <input onkeydown="SearchFor(this,'group')" type="text" class="form-control" name="name" placeholder="Por favor escriba el nombre del grupo">
                            <input type="hidden" id="SearchForInputGroup" name="group_id">
                            <input type="hidden" id="SearchForInputPostId" name="post_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="ball-pulse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <button id="share_post_on_group_form_btn" type="button" class="btn btn-main">
                            Compartir </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="share_post_on_page" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">
                        Compartir en una página </h4>
                </div>
                <form id="share_post_on_page_form" class="share_post_on_page_form" method="POST">
                    <div class="modal-body">
                        <div id="share_post_on_page_form_alert"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:#f79f58;">
                                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                    <line x1="4" y1="22" x2="4" y2="15"></line>
                                </svg>
                            </span>
                            <input onkeydown="SearchFor(this,'page')" type="text" class="form-control" name="name" placeholder="Por favor escriba el nombre de la página">
                            <input type="hidden" id="SearchForInputPage" name="page_id">
                            <input type="hidden" id="SearchForInputPostIdPage" name="post_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="ball-pulse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <button id="share_post_on_page_form_btn" type="button" class="btn btn-main">
                            Compartir </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="share_post_on_user" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">
                        Compartir al usuario </h4>
                </div>
                <form id="share_post_on_page_form" class="share_post_on_user_form" method="POST">
                    <div class="modal-body">
                        <div id="share_post_on_user_form_alert"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share" style="margin-top: -4px;width: 19px;height: 19px;">
                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                    <polyline points="16 6 12 2 8 6"></polyline>
                                    <line x1="12" y1="2" x2="12" y2="15"></line>
                                </svg>
                            </span>
                            <input onkeydown="SearchFor(this,'user')" type="text" class="form-control" name="name" placeholder="Nombre de Usuario">
                            <input type="hidden" id="SearchForInputUser" name="user_id">
                            <input type="hidden" id="SearchForInputUserPostId" name="post_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="ball-pulse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <button id="share_post_on_user_form_btn" type="button" class="btn btn-main">
                            Compartir </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade sun_modal" id="views-info-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title"><span id="views_info_title"></span></h4>
                </div>
                <div class="modal-body">
                    <div id="views_info" class="wo_react_ursrs_list"></div>
                    <div class="clearfix"></div>
                    <div id="views_info_load" style="display: none;">
                        <div class="load-more views_info_load_ wo_react_ursrs_list_lod_mor">
                            <button class="btn btn-default text-center views_info_load_more" data-type="" post-id="" table-type="" onclick="Wo_LoadViewsInfo(this);"><span id="load_more_info_btn">Cargar más</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade sun_modal" id="users-reacted-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">
                        <div class="who_react_modal">

                            <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(1);">
                                <div class="inline_post_emoji inline_act_emoji no_anim">
                                    <div class="emoji emoji--like">
                                        <div class="emoji__hand">
                                            <div class="emoji__thumb"></div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(2);">
                                <div class="inline_post_emoji inline_act_emoji no_anim">
                                    <div class="emoji emoji--love">
                                        <div class="emoji__heart"></div>
                                    </div>
                                </div>
                            </span>
                            <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(3);">
                                <div class="inline_post_emoji inline_act_emoji no_anim">
                                    <div class="emoji emoji--haha">
                                        <div class="emoji__face">
                                            <div class="emoji__eyes"></div>
                                            <div class="emoji__mouth">
                                                <div class="emoji__tongue"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(4);">
                                <div class="inline_post_emoji inline_act_emoji no_anim">
                                    <div class="emoji emoji--wow">
                                        <div class="emoji__face">
                                            <div class="emoji__eyebrows"></div>
                                            <div class="emoji__eyes"></div>
                                            <div class="emoji__mouth"></div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(5);">
                                <div class="inline_post_emoji inline_act_emoji no_anim">
                                    <div class="emoji emoji--sad">
                                        <div class="emoji__face">
                                            <div class="emoji__eyebrows"></div>
                                            <div class="emoji__eyes"></div>
                                            <div class="emoji__mouth"></div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(6);">
                                <div class="inline_post_emoji inline_act_emoji no_anim">
                                    <div class="emoji emoji--angry">
                                        <div class="emoji__face">
                                            <div class="emoji__eyebrows"></div>
                                            <div class="emoji__eyes"></div>
                                            <div class="emoji__mouth"></div>
                                        </div>
                                    </div>
                                </div>
                            </span>


                            <!-- <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers('like');">
							<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>
						</span>
						<span class="how_reacted like-btn-love pointer" id="_post333" onclick="Wo_LoadReactedUsers('love');">
							<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>
						</span>
						<span class="how_reacted like-btn-haha pointer" id="_post333" onclick="Wo_LoadReactedUsers('haha');">
							<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>
						</span>
						<span class="how_reacted like-btn-wow pointer" id="_post333" onclick="Wo_LoadReactedUsers('wow');">
							<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>
						</span>
						<span class="how_reacted like-btn-sad pointer" id="_post333" onclick="Wo_LoadReactedUsers('sad');">
							<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>
						</span>
						<span class="how_reacted like-btn-angry pointer" id="_post333" onclick="Wo_LoadReactedUsers('angry');">
							<div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>
						</span> -->
                        </div>
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="reacted_users_box" class="wo_react_ursrs_list"></div>
                    <div class="clearfix"></div>
                    <div id="reacted_users_load" style="display: none;">
                        <div class="load-more wo_react_ursrs_list_lod_mor">
                            <button class="btn btn-default text-center reacted_users_load_more" data-type="" post-id="" col-type="" onclick="Wo_LoadMoreReactedUsers(this);"><span id="load_more_reacted_btn">Cargar más</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade in" id="approve_post" role="dialog">
        <div class="modal-dialog wow_mat_mdl">
            <div class="modal-content">
                <div class="empty_state" style="margin: 40px 0;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9,13A3,3 0 0,0 12,16A3,3 0 0,0 15,13A3,3 0 0,0 12,10A3,3 0 0,0 9,13M20,19.59V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18C18.45,22 18.85,21.85 19.19,21.6L14.76,17.17C13.96,17.69 13,18 12,18A5,5 0 0,1 7,13A5,5 0 0,1 12,8A5,5 0 0,1 17,13C17,14 16.69,14.96 16.17,15.75L20,19.59Z"></path>
                    </svg> Su publicación fue enviada, revisaremos su contenido pronto.</div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="error_post" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages" id="error_post_text">
                </p>
            </div>

        </div>
    </div>

    <div class="modal fade in" id="pro_upload_file" role="dialog">
        <div class="modal-dialog wow_mat_mdl">

            <div class="modal-content">
                <p class="wo_error_messages">
                    <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                        <g id="Icons">
                            <g>
                                <g>
                                    <path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"></path>
                                </g>
                                <g>
                                    <path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"></path>
                                </g>
                                <g>
                                    <path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                                <g>
                                    <path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Para cargar imágenes, videos y archivos de audio, debe actualizar a miembro profesional. <a href="https://hexascripts.com/wonderful/welcome10/Script/go-pro">Para actualizar Pro</a>
                </p>
            </div>

        </div>
    </div>

    <div class="modal fade sun_modal" id="edit-offer-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg> Editar oferta</h4>
                </div>
                <div class="modal-body">
                    <div class="wo_settings_page">
                        <form class="edit-offer-form form-horizontal" method="post">
                            <div class="app-offer-alert app-general-alert"></div>
                            <div class="clear"></div>
                            <div class="setting-panel row job-setting-panel edit_offer_modal_form">


                            </div>

                            <div class="publisher-hidden-option">
                                <div id="progress" class="create-offer-progress">
                                    <span id="percent" class="create-product-percent pull-right">0%</span>
                                    <div class="progress">
                                        <div id="bar" class="progress-bar active create-product-bar"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>


                            <div class="form-group last-sett-btn modal-footer">
                                <div class="ball-pulse">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <button type="submit" class="btn btn-main setting-panel-mdbtn">Publicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="add_tier_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">Agregar un nivel</h4>
                </div>
                <form class="form form-horizontal tier_form" method="post" action="#">
                    <div class="modal-body twocheckout_modal">
                        <div class="modal_add_tier_modal_alert"></div>
                        <div class="clear"></div>
                        <div class="sun_input col-md-6">
                            <input name="title" type="text" class="form-control input-md" autocomplete="off" placeholder="Título del nivel">
                            <label class="plr15">Título del nivel</label>
                        </div>
                        <div class="sun_input col-md-6">
                            <input name="price" type="number" class="form-control input-md" autocomplete="off" placeholder="Precio de nivel">
                            <label class="plr15">Precio de nivel</label>
                        </div>
                        <div class=" col-lg-12">
                            <label class="plr15">Beneficios</label>
                            <br>
                            <input type="checkbox" name="benefits[]" value="chat" onclick="ShowBenefitsChat(this)">
                            <label>Chat</label><br>
                            <div class="add_benefits_chat" style="display: none;">
                                <input type="radio" id="benefits_chat_1" name="chat" value="chat_without_audio_video">
                                <label for="benefits_chat_1">Chat sin audio y videollamada.</label><br>
                                <input type="radio" id="benefits_chat_2" name="chat" value="chat_with_audio_without_video">
                                <label for="benefits_chat_2">Chatea con llamada de audio y sin videollamada.</label><br>
                                <input type="radio" id="benefits_chat_3" name="chat" value="chat_without_audio_with_video">
                                <label for="benefits_chat_3">Chat sin llamada de audio y con videollamada.</label><br>
                                <input type="radio" id="benefits_chat_4" name="chat" value="chat_with_audio_video">
                                <label for="benefits_chat_4">Chatea con audio y videollamada.</label><br>
                            </div>
                            <input type="checkbox" name="benefits[]" value="live_stream">
                            <label>Corriente</label><br>
                        </div>
                        <div class="sun_input col-md-12">
                            <textarea class="form-control input-md" placeholder="Descripción del nivel" name="description"></textarea>
                            <label class="plr15">Descripción del nivel</label>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group col-lg-12">
                            <label class="col-md-12">Imagen de nivel:</label>
                            <div class="col-md-12">
                                <div class="select_ev_covr" id="select_tier_image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M5,3A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H14.09C14.03,20.67 14,20.34 14,20C14,19.32 14.12,18.64 14.35,18H5L8.5,13.5L11,16.5L14.5,12L16.73,14.97C17.7,14.34 18.84,14 20,14C20.34,14 20.67,14.03 21,14.09V5C21,3.89 20.1,3 19,3H5M19,16V19H16V21H19V24H21V21H24V19H21V16H19Z"></path>
                                    </svg>
                                    Seleccione una imagen
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="image" class="hidden" id="tier_image">
                    <div class="clear"></div>
                    <div class="modal-footer">
                        <div class="ball-pulse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <button type="submit" class="btn btn-main btn-mat">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-tier" tabindex="-1" role="dialog" aria-labelledby="delete-tier" aria-hidden="true" data-id="0">
        <div class="modal-dialog mat_box" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Elimina tu nivel</h5>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres eliminar este nivel? </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade sun_modal" id="show_product_reviews_modal" role="dialog">
        <div class="modal-dialog wow_mat_mdl">
            <div class="modal-content check_reviews">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">Comentarios</h4>
                </div>
                <div class="modal-body">
                    <div id="show_product_reviews_modal_info" class="wo_react_ursrs_list"></div>
                    <div class="clearfix"></div>
                    <div id="show_product_reviews_modal_info_load" style="display: none;">
                        <div class="load-more">
                            <button class="btn btn-default text-center" data-type="" post-id="" table-type="" onclick="Wo_LoadReviews();"><span id="show_product_reviews_load_text">Cargar más</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="node-js-templates">
          <div> -->




    <!-- JS FILES -->

    <script type="text/javascript" src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/welcome.js?version=4.1.1"></script>
    <script type="text/javascript">
        const node_socket_flow = "0"
    </script>
    <script type="text/javascript" src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/javascript/script.js?version=4.1.1"></script>
    <div class="extra-css"></div>

    <!-- End 'JS FILES' -->
    <script type="text/javascript">
        (function(factory) {
            if (typeof define === 'function' && define.amd) {
                // AMD. Register as an anonymous module.
                define(['jquery'], factory);
            } else {
                // Browser globals
                factory(jQuery);
            }
        }(function($) {
            $.timeago = function(timestamp) {
                if (timestamp instanceof Date) {
                    return inWords(timestamp);
                } else if (typeof timestamp === "string") {
                    return inWords($.timeago.parse(timestamp));
                } else if (typeof timestamp === "number") {
                    return inWords(new Date(timestamp));
                } else {
                    return inWords($.timeago.datetime(timestamp));
                }
            };
            var $t = $.timeago;

            $.extend($.timeago, {
                settings: {
                    refreshMillis: 60000,
                    allowPast: true,
                    allowFuture: false,
                    localeTitle: false,
                    cutoff: 0,
                    strings: {
                        prefixAgo: null,
                        prefixFromNow: null,
                        suffixAgo: "",
                        suffixFromNow: "desde ahora",
                        inPast: "cualquier momento",
                        seconds: "ahora",
                        minute: "minuto",
                        minutes: "minutos",
                        hour: "hora",
                        hours: "horas",
                        day: "d&iacute;a",
                        days: "d&iacute;as",
                        month: "mes",
                        months: "meses",
                        year: "A&ntilde;o",
                        years: "a&ntilde;os",
                        wordSeparator: " ",
                        numbers: []
                    }
                },

                inWords: function(distanceMillis) {
                    if (!this.settings.allowPast && !this.settings.allowFuture) {
                        throw 'timeago allowPast and allowFuture settings can not both be set to false.';
                    }

                    var $l = this.settings.strings;
                    var prefix = $l.prefixAgo;
                    var suffix = $l.suffixAgo;
                    if (this.settings.allowFuture) {
                        if (distanceMillis < 0) {
                            prefix = $l.prefixFromNow;
                            suffix = $l.suffixFromNow;
                        }
                    }

                    if (!this.settings.allowPast && distanceMillis >= 0) {
                        return this.settings.strings.inPast;
                    }

                    var seconds = Math.abs(distanceMillis) / 1000;
                    var minutes = seconds / 60;
                    var hours = minutes / 60;
                    var days = hours / 24;
                    var weeks = days / 7;
                    var years = days / 365;

                    function substitute(stringOrFunction, number) {
                        var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
                        var value = ($l.numbers && $l.numbers[number]) || number;
                        return number + ' ' + string.replace(/%d/i, value);
                        //return string.replace(/%d/i, value);
                    }

                    // var words = seconds < 45 && substitute($l.seconds, '') ||
                    // seconds < 90 && substitute('m', 1) ||
                    // minutes < 45 && substitute('m', Math.round(minutes)) ||
                    // minutes < 90 && substitute('h', 1) ||
                    // hours < 24 && substitute('hrs', Math.round(hours)) ||
                    // hours < 42 && substitute('d', 1) ||
                    // days < 7 && substitute('d', Math.round(days)) ||
                    // weeks < 2 && substitute('w', 1) ||
                    // weeks < 52 && substitute('w', Math.round(weeks)) ||
                    // years < 1.5 && substitute('y', 1) ||
                    // substitute('yrs', Math.round(years));
                    var words = '';
                    if (seconds < 45) {
                        words = substitute($l.seconds, '');
                    } else if (seconds < 90) {
                        words = substitute('metro', 1);
                    } else if (minutes < 45) {
                        words = substitute('metro', Math.round(minutes));
                    } else if (minutes < 90) {
                        words = substitute('h', 1);
                    } else if (hours < 24) {
                        words = substitute('horas', Math.round(hours));
                    } else if (hours < 42) {
                        words = substitute('D', 1);
                    } else if (days < 7) {
                        words = substitute('D', Math.round(days));
                    } else if (weeks < 2) {
                        words = substitute('w', 1);
                    } else if (weeks < 52) {
                        words = substitute('w', Math.round(weeks));
                    } else if (years < 1.5) {
                        words = substitute('y', 1);
                    } else {
                        words = substitute('años', Math.round(years));
                    }



                    var separator = $l.wordSeparator || "";
                    if ($l.wordSeparator === undefined) {
                        separator = " ";
                    }


                    return $.trim([prefix, words].join(separator));

                },

                parse: function(iso8601) {
                    var s = $.trim(iso8601);
                    s = s.replace(/\.\d+/, ""); // remove milliseconds
                    s = s.replace(/-/, "/").replace(/-/, "/");
                    s = s.replace(/T/, " ").replace(/Z/, " UTC");
                    s = s.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // -04:00 -> -0400
                    s = s.replace(/([\+\-]\d\d)$/, " $100"); // +09 -> +0900
                    return new Date(s);
                },
                datetime: function(elem) {
                    var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
                    return $t.parse(iso8601);
                },
                isTime: function(elem) {
                    // jQuery's `is()` doesn't play well with HTML5 in IE
                    return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
                }
            });

            // functions that can be called via $(el).timeago('action')
            // init is default when no action is given
            // functions are called with context of a single element
            var functions = {
                init: function() {
                    var refresh_el = $.proxy(refresh, this);
                    refresh_el();
                    var $s = $t.settings;
                    if ($s.refreshMillis > 0) {
                        this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
                    }
                },
                update: function(time) {
                    var parsedTime = $t.parse(time);
                    $(this).data('timeago', {
                        datetime: parsedTime
                    });
                    if ($t.settings.localeTitle) $(this).attr("title", parsedTime.toLocaleString());
                    refresh.apply(this);
                },
                updateFromDOM: function() {
                    $(this).data('timeago', {
                        datetime: $t.parse($t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title"))
                    });
                    refresh.apply(this);
                },
                dispose: function() {
                    if (this._timeagoInterval) {
                        window.clearInterval(this._timeagoInterval);
                        this._timeagoInterval = null;
                    }
                }
            };

            $.fn.timeago = function(action, options) {
                var fn = action ? functions[action] : functions.init;
                if (!fn) {
                    throw new Error("Unknown function name '" + action + "' for timeago");
                }
                // each over objects here and call the requested function
                this.each(function() {
                    fn.call(this, options);
                });
                return this;
            };

            function refresh() {
                var data = prepareData(this);
                var $s = $t.settings;

                if (!isNaN(data.datetime)) {
                    if ($s.cutoff == 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
                        $(this).text(inWords(data.datetime));
                    }
                }
                return this;
            }

            function prepareData(element) {
                element = $(element);
                if (!element.data("timeago")) {
                    element.data("timeago", {
                        datetime: $t.datetime(element)
                    });
                    var text = $.trim(element.text());
                    if ($t.settings.localeTitle) {
                        element.attr("title", element.data('timeago').datetime.toLocaleString());
                    } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
                        element.attr("title", text);
                    }
                }
                return element.data("timeago");
            }

            function inWords(date) {
                return $t.inWords(distance(date));
            }

            function distance(date) {
                return (new Date().getTime() - date.getTime());
            }

            // fix for IE6 suckage
            document.createElement("abbr");
            document.createElement("time");
        }));


        $(function() {
            setInterval(function() {

                    if ($('.ajax-time').length > 0) {
                        $('.ajax-time').timeago()
                            .removeClass('.ajax-time');
                    }
                },
                1000);
        });
    </script>
    <!-- Audio FILES -->

    <!-- End 'Audio FILES' -->
    <script>
        let f = navigator.userAgent.search("Firefox");
        if (f > -1) {
            $('.header-brand').attr('href', "https://hexascripts.com/wonderful/welcome10/Script/?cache=1677438396");
        }

        function ShowCommentGif(id, type) {
            $(".gif_post_comment").each(function(index) {
                if ($(this).attr('id') != 'gif-form-' + id) {
                    $(this).slideUp();
                }
            });
            $('#gif-form-' + id).slideToggle(200);
            $('.gif_post_comment_gif').html('');
        }

        function GifScrolledC(self) {
            if ((($(self).prop("scrollHeight") - $(self).height()) - $(self).scrollTop()) < 300) {
                id = $(self).attr('GId');
                type = $(self).attr('GType');
                word = $(self).attr('GWord');
                offset = $(self).attr('GOffset');
                SearchForGif(word, id, type, offset);
            }
        }

        function SearchForGif(keyword, id = 0, type = '', offset = 0) {

            if ($('#publisher-box-stickers-cont-' + id).attr('GWord') != keyword) {
                $('#publisher-box-stickers-cont-' + id).empty();
                $('#publisher-box-stickers-cont-' + id).attr('GOffset', 0);
                $('#publisher-box-stickers-cont-' + id).attr('GWord', keyword);
            } else {
                $('#publisher-box-stickers-cont-' + id).attr('GOffset', parseInt($('#publisher-box-stickers-cont-' + id).attr('GOffset')) + 20);
            }
            Wo_Delay(function() {
                $.ajax({
                        url: 'https://api.giphy.com/v1/gifs/search?',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            q: keyword,
                            api_key: '420d477a542b4287b2bf91ac134ae041',
                            limit: 20,
                            offset: offset
                        },
                    })
                    .done(function(data) {
                        if (data.meta.status == 200 && data.data.length > 0) {
                            var appended = false;
                            for (var i = 0; i < data.data.length; i++) {
                                appended = true;
                                if (appended == true) {
                                    appended = false;
                                    if (type == 'story') {
                                        $('#publisher-box-stickers-cont-' + id).append($('<img alt="gif" src="' + data.data[i].images.fixed_height_small.url + '" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostCommentGif_' + id + '(this,' + id + ')" autoplay loop>'));
                                    } else {
                                        $('#publisher-box-stickers-cont-' + id).append($('<img alt="gif" src="' + data.data[i].images.fixed_height_small.url + '" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostReplyCommentGif_' + id + '(this,' + id + ')" autoplay loop>'));
                                    }
                                    appended = true;
                                }
                            }
                            var images = 0;
                            Wo_ElementLoad($('img[alt=gif]'), function() {
                                images++;
                            });
                            if (data.data.length == images || images >= 5) {

                            }
                        } else {
                            $('#publisher-box-stickers-cont-' + id).html('<p class="no_gifs_found"><i class="fa fa-frown-o"></i> Sin resultados</p>');
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
            }, 100);
        }

        function ShowCommentStickers(id, type) {
            $('.gif_post_comment').slideUp(200);
            $('.gif_post_comment_gif').html('');
            $('#sticker-form-' + id).slideToggle(200);
            $('.chat-box-stickers-cont').empty();
            functionName = "Wo_PostReplyCommentSticker_" + id + "(this," + id + ");";
            if (type == 'story') {
                functionName = "Wo_PostCommentSticker_" + id + "(this," + id + ");";
            }

            sticker = '<div class="empty_state" style="margin: 15px 0 0;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,2C3.56,2 2,3.56 2,5.5V18.5C2,20.44 3.56,22 5.5,22H16L22,16V5.5C22,3.56 20.44,2 18.5,2H5.5M5.75,4H18.25A1.75,1.75 0 0,1 20,5.75V15H18.5C16.56,15 15,16.56 15,18.5V20H5.75A1.75,1.75 0 0,1 4,18.25V5.75A1.75,1.75 0 0,1 5.75,4M14.44,6.77C14.28,6.77 14.12,6.79 13.97,6.83C13.03,7.09 12.5,8.05 12.74,9C12.79,9.15 12.86,9.3 12.95,9.44L16.18,8.56C16.18,8.39 16.16,8.22 16.12,8.05C15.91,7.3 15.22,6.77 14.44,6.77M8.17,8.5C8,8.5 7.85,8.5 7.7,8.55C6.77,8.81 6.22,9.77 6.47,10.7C6.5,10.86 6.59,11 6.68,11.16L9.91,10.28C9.91,10.11 9.89,9.94 9.85,9.78C9.64,9 8.95,8.5 8.17,8.5M16.72,11.26L7.59,13.77C8.91,15.3 11,15.94 12.95,15.41C14.9,14.87 16.36,13.25 16.72,11.26Z"></path></svg> Sin resultados</div>';
            $('#publisher-box-sticker-cont-' + id).html(sticker);

        }
        $(window).on("popstate", function(e) {
            location.reload();
        });
        /*Language Select*/
        $(document).ready(function() {
            $("#wo_language_modal .language_select .English").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/united-states.svg"/></span> ');
            $("#wo_language_modal .language_select .Arabic").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/saudi-arabia.svg"/></span> ');
            $("#wo_language_modal .language_select .Dutch").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/netherlands.svg"/></span> ');
            $("#wo_language_modal .language_select .French").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/france.svg"/></span> ');
            $("#wo_language_modal .language_select .German").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/germany.svg"/></span> ');
            $("#wo_language_modal .language_select .Hungarian, #wo_language_modal .language_select .Magyar").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/hungary.svg"/></span> ');
            $("#wo_language_modal .language_select .Italian").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/italy.svg"/></span> ');
            $("#wo_language_modal .language_select .Portuguese").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/portugal.svg"/></span> ');
            $("#wo_language_modal .language_select .Russian").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/russia.svg"/></span> ');
            $("#wo_language_modal .language_select .Spanish").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/spain.svg"/></span> ');
            $("#wo_language_modal .language_select .Serbian").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/serbia.svg"/></span> ');
            $("#wo_language_modal .language_select .Turkish").append('<span class="language_initial"><img src="https://hexascripts.com/wonderful/welcome10/Script/themes/wowonder/img/flags/turkey.svg"/></span> ');
        });
        /* 

The code entered here will be added in <footer> tag 

*/
    </script>
    <script>
        // window.addEventListener("load", function() {
        //     window.cookieconsent.initialise({
        //         "palette": {
        //             "popup": {
        //                 "background": "#1e2321",
        //                 "text": "#fff"
        //             },
        //             "button": {
        //                 "background": "#a52729"
        //             }
        //         },
        //         "theme": "edgeless",
        //         "position": "bottom-left",
        //         "content": {
        //             "message": "Este sitio web utiliza cookies para garantizar que obtenga la mejor experiencia en nuestro sitio web.",
        //             "dismiss": "¡Lo tengo!",
        //             "link": "Aprende más",
        //             "href": "https://hexascripts.com/wonderful/welcome10/Script/terms/privacy-policy"
        //         }
        //     })
        // });
    </script>
    <style>
        .cc-bottom {
            bottom: 2.5em;
        }
    </style>

    <!-- // NEW STORY -->
    <script type="text/javascript">
        $(document).on('mouseover', '.story_lightbox', function(event) {
            $('.width_').css('width', $('.width_').css('width'));
            value = $(this).attr('data-post-id');
            $(this).addClass('dont_close_story_' + value);
        });
        $(document).on('mouseleave', '.story_lightbox', function(event) {
            Wo_Delay(function() {
                if ($('#users-reacted-modal').is(':hidden')) {
                    value = $(this).attr('data-post-id');
                    $(this).removeClass('dont_close_story_' + value);
                    setTimeout(function() {
                        $('.width_').css('width', '100%');
                    }, 700);
                    Wo_Delay(function() {
                        if ($('.dont_close_story_' + value).length == 0) {
                            $('.story_lightbox').find('.next-btn').click();
                        }
                    }, 10000);
                }
            }, 500);

        });
        $(document).on('click', '.story-image-wrapper', function(event) {
            event.preventDefault();
            $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');

            $value = $(this).parents(".story-container").attr('data-status-id');
            $.post(Wo_Ajax_Requests_File() + '?f=story_view', {
                id: $value
            }, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    document.body.style.overflow = 'hidden';
                    $('.lightbox-container').html(data.html);
                    $('.width_').addClass('load');
                    setTimeout(function() {
                        $('.width_').css('width', '100%');
                    }, 200);
                    Wo_Delay(function() {
                        if ($('.dont_close_story_' + $value).length == 0) {
                            Get_NextStory(data.story_id);
                        }
                    }, 10000);
                } else {
                    Wo_CloseLightbox();
                }
            });
        });

        function Wo_GetMoreStoryViews(story_id, self) {
            last_view = $('.story_views_').last().attr('id');
            $(self).addClass('dont_close_story_' + story_id);
            $(self).find('span').html('Por favor espera..');
            $.post(Wo_Ajax_Requests_File() + '?f=story_views_', {
                last_view: last_view,
                story_id: story_id
            }, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    $(self).find('button').html('<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather"><polyline points="6 9 12 15 18 9"></polyline></svg> Cargar más');

                    $('.views_container_').append(data.html);
                } else {
                    $(self).find('button').html('No mas vistas');

                }
            });
        }
        $(document).on('click', '.see_all_stories', function(event) {
            event.preventDefault();
            $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
            user_id = $(this).attr('data_story_user_id');
            type = $(this).attr('data_story_type');
            $.post(Wo_Ajax_Requests_File() + '?f=view_all_stories', {
                user_id: user_id,
                type: type
            }, function(data, textStatus, xhr) {
                if (node_socket_flow == "1") {
                    socket.emit("user_notification", {
                        to_id: user_id,
                        user_id: _getCookie("user_id"),
                        type: "added"
                    });
                }
                document.body.style.overflow = 'hidden';
                $('.lightbox-container').html(data.html);
                setTimeout(function() {
                    video_story = $('#video_story').attr('data-story-video');
                    if ($('[data-story-video=' + video_story + ']').length == 0) {

                        $('.width_').addClass('load');
                        setTimeout(function() {
                            $('.width_').css('width', '100%');
                        }, 200);
                        Wo_Delay(function() {
                            value = $('.user_story_').attr('id');

                            if ($('.dont_close_story_' + value).length == 0) {
                                if (type == 'user') {
                                    Get_NextStory(data.story_id);
                                } else {

                                    Get_NextStory(data.story_id, 'friends');
                                }
                            }
                        }, 10000);
                    }
                }, 200);
            });
        });

        function Get_PreviousStory(story_id, story_type = '') {
            if ($('.lightbox-container').is(":visible")) {

                Wo_CloseLightbox();
                $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
                $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {
                    story_id: story_id,
                    type: 'previous',
                    story_type: story_type
                }, function(data, textStatus, xhr) {
                    user_id = $(this).attr('data_story_user_id');
                    if (node_socket_flow == "1") {
                        socket.emit("user_notification", {
                            to_id: user_id,
                            user_id: _getCookie("user_id"),
                            type: "added"
                        });
                    }
                    if (data.status == 200) {
                        document.body.style.overflow = 'hidden';
                        $('.lightbox-container').html(data.html);
                        video_story = $('#video_story').attr('data-story-video');
                        if ($('[data-story-video=' + video_story + ']').length == 0) {
                            $('.width_').addClass('load');
                            setTimeout(function() {
                                $('.width_').css('width', '100%');
                            }, 200);
                            Wo_Delay(function() {
                                value = $('.user_story_').attr('id');
                                if ($('.dont_close_story_' + value).length == 0) {
                                    if (story_type == 'user') {
                                        if ($('.lightpost-' + data.story_id).length > 0) {
                                            Get_NextStory(data.story_id);
                                        }
                                    } else {
                                        if ($('.lightpost-' + data.story_id).length > 0) {
                                            Get_NextStory(data.story_id, 'friends');
                                        }
                                    }
                                }
                            }, 10000);
                        }
                    } else {
                        Wo_CloseLightbox();
                    }
                });
            }
        }

        function Get_NextStory(story_id, story_type = '') {
            if ($('.lightbox-container').is(":visible")) {

                Wo_CloseLightbox();
                $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
                $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {
                    story_id: story_id,
                    type: 'next',
                    story_type: story_type
                }, function(data, textStatus, xhr) {
                    if (data.status == 200) {
                        user_id = $(this).attr('data_story_user_id');
                        if (node_socket_flow == "1") {
                            socket.emit("user_notification", {
                                to_id: user_id,
                                user_id: _getCookie("user_id"),
                                type: "added"
                            });
                        }
                        document.body.style.overflow = 'hidden';
                        $('.lightbox-container').html(data.html);
                        video_story = $('#video_story').attr('data-story-video');
                        if ($('[data-story-video=' + video_story + ']').length == 0) {
                            $('.width_').addClass('load');
                            setTimeout(function() {
                                $('.width_').css('width', '100%');
                            }, 200);
                            Wo_Delay(function() {
                                value = $('.user_story_').attr('id');
                                if ($('.dont_close_story_' + value).length == 0) {
                                    if (story_type == 'user') {
                                        if ($('.lightpost-' + data.story_id).length > 0) {
                                            Get_NextStory(data.story_id);
                                        }
                                    } else {
                                        if ($('.lightpost-' + data.story_id).length > 0) {
                                            Get_NextStory(data.story_id, 'friends');
                                        }
                                    }
                                }
                            }, 10000);
                        }
                    } else {
                        if (story_type == 'user') {
                            if ($('.unseen_story').length > 0) {
                                $('.unseen_story').addClass('seen_story');
                                $('.unseen_story').removeClass('unseen_story');

                            }
                        }
                        Wo_CloseLightbox();
                    }
                });
            }
        }

        function Get_CurrentStory(story_id, story_type = '') {

            Wo_CloseLightbox();
            $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
            $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {
                story_id: story_id,
                type: 'current',
                story_type: story_type
            }, function(data, textStatus, xhr) {
                if (data.status == 200) {
                    user_id = $(this).attr('data_story_user_id');
                    if (node_socket_flow == "1") {
                        socket.emit("user_notification", {
                            to_id: user_id,
                            user_id: _getCookie("user_id"),
                            type: "added"
                        });
                    }
                    document.body.style.overflow = 'hidden';
                    $('.lightbox-container').html(data.html);
                    video_story = $('#video_story').attr('data-story-video');
                    if ($('[data-story-video=' + video_story + ']').length == 0) {
                        $('.width_').addClass('load');
                        setTimeout(function() {
                            $('.width_').css('width', '100%');
                        }, 200);
                        Wo_Delay(function() {
                            value = $('.user_story_').attr('id');
                            if ($('.dont_close_story_' + value).length == 0) {
                                if (story_type == 'user') {
                                    if ($('.lightpost-' + data.story_id).length > 0) {
                                        Get_NextStory(data.story_id);
                                    }
                                } else {
                                    if ($('.lightpost-' + data.story_id).length > 0) {
                                        Get_NextStory(data.story_id, 'friends');
                                    }
                                }
                            }
                        }, 10000);
                    }
                } else {
                    if (story_type == 'user') {
                        if ($('.unseen_story').length > 0) {
                            $('.unseen_story').addClass('seen_story');
                            $('.unseen_story').removeClass('unseen_story');

                        }
                    }
                    Wo_CloseLightbox();
                }
            });
        }
    </script>
    <!-- // NEW STORY -->

    <div class="modal fade sun_modal" id="apply-job-modal" role="dialog">
    </div>
    <div id="pay_modal_wallet">
        <div class="modal fade wow_mat_pops" id="pay-go-pro" role="dialog" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="wow_pops_head">
                        <svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path>
                            <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path>
                            <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path>
                        </svg>
                        <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path>
                            </svg> Pagar por billetera</h4>
                    </div>
                    <div class="modal-body">
                        <div class="pay_modal_wallet_alert"></div>
                        <h4 class="pay_modal_wallet_text"></h4>
                    </div>
                    <div class="clear"></div>
                    <div class="modal-footer">
                        <div class="ball-pulse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <button type="button" class="btn btn-main" id="pay_modal_wallet_btn">Pague ahora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HTML NOTIFICATION POPUP -->
    <div id="notification-popup"></div>
    <!-- HTML NOTIFICATION POPUP -->
    <div class="modal fade" id="add_address_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
        <div class="modal-dialog wow_mat_mdl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">Agregar nueva dirección</h4>
                </div>
                <form class="form form-horizontal address_form" method="post" action="#">
                    <div class="modal-body twocheckout_modal">
                        <div class="modal_add_address_modal_alert"></div>
                        <div class="clear"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form_fields">
                                    <label for="name">Nombre</label>
                                    <input id="name" name="name" type="text" autocomplete="off" placeholder="Nombre" value="<br />
<b>Notice</b>:  Undefined index: user in <b>/home/admin/web/hexascripts.com/public_html/wonderful/welcome10/Script/themes/wowonder/layout/container.phtml</b> on line <b>1360</b><br />
<br />
<b>Notice</b>:  Trying to access array offset on value of type null in <b>/home/admin/web/hexascripts.com/public_html/wonderful/welcome10/Script/themes/wowonder/layout/container.phtml</b> on line <b>1360</b><br />
">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_fields">
                                    <label for="phone">Teléfono</label>
                                    <input id="phone" name="phone" type="text" autocomplete="off" placeholder="Teléfono" value="<br />
<b>Notice</b>:  Undefined index: user in <b>/home/admin/web/hexascripts.com/public_html/wonderful/welcome10/Script/themes/wowonder/layout/container.phtml</b> on line <b>1366</b><br />
<br />
<b>Notice</b>:  Trying to access array offset on value of type null in <b>/home/admin/web/hexascripts.com/public_html/wonderful/welcome10/Script/themes/wowonder/layout/container.phtml</b> on line <b>1366</b><br />
">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_fields">
                                    <label for="country">País</label>
                                    <input id="country" name="country" type="text" autocomplete="off" placeholder="País">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_fields">
                                    <label for="city">Ciudad</label>
                                    <input id="city" name="city" type="text" autocomplete="off" placeholder="Ciudad">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_fields">
                                    <label for="zip">Código postal</label>
                                    <input id="zip" name="zip" type="text" autocomplete="off" placeholder="Código postal">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form_fields">
                                    <label for="address">Nombre</label>
                                    <textarea id="address" placeholder="Dirección" name="address" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="modal-footer">
                        <div class="ball-pulse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <button type="submit" class="btn btn-main btn-mat">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-address" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true" data-id="0">
        <div class="modal-dialog modal-md mat_box wow_mat_mdl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></span></button>
                    <h4 class="modal-title">Elimina tu dirección</h4>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar esta dirección? </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade ch_payment_box" id="buy_product_modal" tabindex="-1" role="dialog" aria-labelledby="buy_product" aria-hidden="true" data-id="0">
        <div class="modal-dialog modal-md mat_box" role="document">
            <div class="modal-content">
                <div class="ch_payment_head">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path>
                    </svg>
                    <h4>Alerta de pago</h4>
                </div>
                <div class="modal-body">
                    <div class="modal_product_pay_alert"></div>
                    Está a punto de comprar los artículos, ¿desea continuar?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="product_id">
                    <input type="hidden" id="product_price">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-main btn-mat">Pague ahora</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="refund_order" tabindex="-1" role="dialog" aria-labelledby="refund_order" aria-hidden="true" data-id="0">
        <div class="modal-dialog mat_box wow_mat_mdl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Solicitar un reembolso</h5>
                </div>
                <form class="refund_order_form" method="post">
                    <div class="modal-body">
                        <div class="modal_refund_order_modal_alert"></div>
                        <div class="form_fields">
                            <label class="form-label">Por favor explique la razón</label>
                            <textarea placeholder="Por favor explique la razón" rows="5" name="message" id="refund_order_message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-mat" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-main btn-mat get_refnd">Petición</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="https://hexascripts.com/wonderful/welcome10/Script/checkout" data-ajax="?link1=checkout" id="load_checkout" style="display: none;"></a>


    <div id="fb-root" class=" fb_reset">
        <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
            <div></div>
        </div>
    </div>
</body>

</html>