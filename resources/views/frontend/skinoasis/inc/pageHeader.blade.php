<div class="page-header text-center" <?php $banner = getSetting('banner_header'); ?> style="background-image: url('{{ uploadedAsset($banner) }}')">
    <div class="container">
        <h1 class="page-title"> {{ $title }}</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->