<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{config('constants.GOOGLE_ANALYTICS_KEY')}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '{{config('constants.GOOGLE_ANALYTICS_KEY')}}');
</script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey={{config('constants.TINY_MCE_KEY')}}"></script>
<script>tinymce.init({
        selector: 'textarea',
        plugins: "hr code anchor autoresize table image",
    });
</script>
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/main.css">

<title>{{  config('constants.SITE_NAME')  }}</title>


<script>
    window.Laravel = '<?= json_encode(['csrfToken' => csrf_token()]); ?>';
</script>