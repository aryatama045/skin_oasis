    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700','Poppins:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            var url = {{ staticAsset('frontend/skinoasis') }};
            wf.src = url + '/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>