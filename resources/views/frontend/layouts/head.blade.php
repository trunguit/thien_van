<head>
    <title>@yield('title')</title>
    <link rel="dns-prefetch preconnect" href="https://frontend/s-a4jwov0yt3" crossorigin>
    <link rel="dns-prefetch preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="dns-prefetch preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name='platform' content='bigcommerce.stencil' />

    <meta name='meta-description' content='@yield('meta_description')' />
    <meta name='meta-keywords' content='@yield('meta_keywords')' />
    <meta name='meta-title' content='@yield('meta_title')' />
    <link href="https://frontend/r-b18b9335793bd739336fc60021bcd6ae5d5e3ad4/img/bc_favicon.ico"
        rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
    </script>

    <script>
        function browserSupportsAllFeatures() {
            return window.Promise &&
                window.fetch &&
                window.URL &&
                window.URLSearchParams &&
                window.WeakMap
                // object-fit support
                &&
                ('objectFit' in document.documentElement.style);
        }

        function loadScript(src) {
            var js = document.createElement('script');
            js.src = src;
            js.onerror = function() {
                console.error('Failed to load polyfill script ' + src);
            };
            document.head.appendChild(js);
        }

        if (!browserSupportsAllFeatures()) {
            loadScript(
                '../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/dist/theme-bundle.polyfills.js'
                );
        }
    </script>
    <script>
        window.consentManagerTranslations =
            `{"locale":"en","locales":{"consent_manager.data_collection_warning":"en","consent_manager.accept_all_cookies":"en","consent_manager.gdpr_settings":"en","consent_manager.data_collection_preferences":"en","consent_manager.manage_data_collection_preferences":"en","consent_manager.use_data_by_cookies":"en","consent_manager.data_categories_table":"en","consent_manager.allow":"en","consent_manager.accept":"en","consent_manager.deny":"en","consent_manager.dismiss":"en","consent_manager.reject_all":"en","consent_manager.category":"en","consent_manager.purpose":"en","consent_manager.functional_category":"en","consent_manager.functional_purpose":"en","consent_manager.analytics_category":"en","consent_manager.analytics_purpose":"en","consent_manager.targeting_category":"en","consent_manager.advertising_category":"en","consent_manager.advertising_purpose":"en","consent_manager.essential_category":"en","consent_manager.esential_purpose":"en","consent_manager.yes":"en","consent_manager.no":"en","consent_manager.not_available":"en","consent_manager.cancel":"en","consent_manager.save":"en","consent_manager.back_to_preferences":"en","consent_manager.close_without_changes":"en","consent_manager.unsaved_changes":"en","consent_manager.by_using":"en","consent_manager.agree_on_data_collection":"en","consent_manager.change_preferences":"en","consent_manager.cancel_dialog_title":"en","consent_manager.privacy_policy":"en","consent_manager.allow_category_tracking":"en","consent_manager.disallow_category_tracking":"en"},"translations":{"consent_manager.data_collection_warning":"We use cookies (and other similar technologies) to collect data to improve your shopping experience.","consent_manager.accept_all_cookies":"Accept All Cookies","consent_manager.gdpr_settings":"Settings","consent_manager.data_collection_preferences":"Website Data Collection Preferences","consent_manager.manage_data_collection_preferences":"Manage Website Data Collection Preferences","consent_manager.use_data_by_cookies":" uses data collected by cookies and JavaScript libraries to improve your shopping experience.","consent_manager.data_categories_table":"The table below outlines how we use this data by category. To opt out of a category of data collection, select 'No' and save your preferences.","consent_manager.allow":"Allow","consent_manager.accept":"Accept","consent_manager.deny":"Deny","consent_manager.dismiss":"Dismiss","consent_manager.reject_all":"Reject all","consent_manager.category":"Category","consent_manager.purpose":"Purpose","consent_manager.functional_category":"Functional","consent_manager.functional_purpose":"Enables enhanced functionality, such as videos and live chat. If you do not allow these, then some or all of these functions may not work properly.","consent_manager.analytics_category":"Analytics","consent_manager.analytics_purpose":"Provide statistical information on site usage, e.g., web analytics so we can improve this website over time.","consent_manager.targeting_category":"Targeting","consent_manager.advertising_category":"Advertising","consent_manager.advertising_purpose":"Used to create profiles or personalize content to enhance your shopping experience.","consent_manager.essential_category":"Essential","consent_manager.esential_purpose":"Essential for the site and any requested services to work, but do not perform any additional or secondary function.","consent_manager.yes":"Yes","consent_manager.no":"No","consent_manager.not_available":"N/A","consent_manager.cancel":"Cancel","consent_manager.save":"Save","consent_manager.back_to_preferences":"Back to Preferences","consent_manager.close_without_changes":"You have unsaved changes to your data collection preferences. Are you sure you want to close without saving?","consent_manager.unsaved_changes":"You have unsaved changes","consent_manager.by_using":"By using our website, you're agreeing to our","consent_manager.agree_on_data_collection":"By using our website, you're agreeing to the collection of data as described in our ","consent_manager.change_preferences":"You can change your preferences at any time","consent_manager.cancel_dialog_title":"Are you sure you want to cancel?","consent_manager.privacy_policy":"Privacy Policy","consent_manager.allow_category_tracking":"Allow [CATEGORY_NAME] tracking","consent_manager.disallow_category_tracking":"Disallow [CATEGORY_NAME] tracking"}}`;
    </script>

    <script>
        window.lazySizesConfig = window.lazySizesConfig || {};
        window.lazySizesConfig.loadMode = 1;
    </script>
    <script async
        src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/dist/theme-bundle.head_async.js">
    </script>
    <!-- Bootstrap V4 CSS -->
    <link data-stencil-stylesheet
        href="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.26/webfontloader.js" integrity="sha512-etP/hl/u6R7Hlgbfa/3F0I6ujZbB82gTCNwzvAif5LHGF1Anouyf6bGeqY2g7rKGb/lQtLFvdys/9f7RRDXqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        WebFont.load({
            custom: {
                families: ['Karla', 'Roboto', 'Source Sans Pro']
            },
            classes: false
        });
    </script>

    <link href="https://fonts.googleapis.com/css?family=Cairo:700,600%7CMontserrat:500&amp;display=swap"
        rel="stylesheet">
    <link data-stencil-stylesheet
        href="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/css/theme.css"
        rel="stylesheet">
    @stack('css')

    <script type="text/javascript">
        var BCData = {};
    </script>


    </script>

    <!-- Winter custom -->
    <link data-stencil-stylesheet
        href="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/owl-carousel/css/owl.carousel.css"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
        src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/owl-carousel/jquery-2.1.1.min.js">
    </script>
    <script
        src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/owl-carousel/jquery.countdown.min.js">
    </script>
    <script
        src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/owl-carousel/owl.carousel.min.js">
    </script>
    <script src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/custom.js">
    </script>
    <link data-stencil-stylesheet
        href="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/webi-style.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <!-- home banner heading font style -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap V4 JS -->
    <script
        src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/bootstrap/js/popper.min.js">
    </script>
    <script
        src="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/custom/bootstrap/js/bootstrap.min.js">
    </script>
</head>