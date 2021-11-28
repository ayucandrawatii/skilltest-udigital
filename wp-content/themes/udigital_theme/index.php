<?php get_header(); ?>
<div class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Who we are</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<section>
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12">
        <div class="content-wrapper">
          <h2><strong><?php echo $my_redux['title-section1']?></strong></h2>
          <?php echo apply_filters ('the_content', $my_redux['description-section1']) ?>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <h3><?php echo $my_redux['title-section2']?></h3>
        <hr>
        <?php echo do_shortcode( '[contact-form-7 id="'.$my_redux['enquire-form'].'"]' ); ?>
      </div>
      <div class="col-12 col-lg-5">
        <div class="box-reachus">
          <h3><?php echo $my_redux['title2-section2']?></h3>
          <hr>
          <?php echo apply_filters ('the_content', $my_redux['description-section2']) ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer();
