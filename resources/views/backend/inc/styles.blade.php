<link href="{{ staticAsset('backend/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ staticAsset('backend/custom/custom.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@import url('https://fonts.cdnfonts.com/css/avenir-lt-pro');
</style>
  <script
    type="text/javascript"
    src='https://cdn.tiny.cloud/1/juez0wz1dbg4x999k32xos1vj0ve1zher33qw3r6dru9npry/tinymce/5/tinymce.min.js'
    referrerpolicy="origin">
  </script>
  <script type="text/javascript">
    tinymce.init({
      selector: '#myTextarea',
      height: 300,
      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
      ],
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css'
    });
  </script>
<style>

.checked {
  color: orange;
}
</style>
