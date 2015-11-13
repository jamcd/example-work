<div class="single-property-header">

  <div id="property-slick-header">

    <?php
    $attachments = get_attached_media( 'image', $post->ID );

    $i = 0;
    foreach($attachments as $attachment_id => $attachment) :

      if(++$i > 3) break;
      //$attachment_id = 2; // attachment ID

      $image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' ); // returns an array
      if( $image_attributes ) {
        ?>
        <div class="slick-slides">
          <img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>">
        </div>
      <?php }

    endforeach; ?>

  </div>

  <div class="property-title">

    <?php
    $prop_beds = get_post_meta($post->ID, 'property_bedrooms', true);
    $prop_housetype = get_post_meta($post->ID, 'property_heading', true);
    $prop_street = get_post_meta($post->ID, 'property_address_street', true);
    $prop_town = get_post_meta($post->ID, 'property_address_suburb', true);
    $prop_price = get_post_meta($post->ID, 'property_price_view', true);

    ?>


    <div class="property-title-line1">
      <?php echo $prop_beds . ' Bedroom ';
      if ($prop_housetype) {
        echo $prop_housetype;
      } else {
        echo 'Property';
      } ?>
    </div>
    <?php if ($prop_town) { ?>
    <div class="property-title-line2">
      <?php if($prop_street && $prop_town) {
        echo $prop_street . ', ' . $prop_town;
      } else {
        echo $prop_town;
      } ?>
    </div>
    <?php } ?>

    <?php if ($prop_price) { ?>
    <div class="property-title-line3">
      <?php echo $prop_price; ?>
    </div>
    <?php } ?>

  </div>

</div> <!-- END single-property-header -->


<div id="property-tabs" class="property-tabs">
  <div class="full-container">
    <ul class="tabs">
      <li class="tab-link current" data-tab="tab-1">Tab One</li>
      <li class="tab-link" data-tab="tab-2">Gallery</li>
      <li class="tab-link" data-tab="tab-3">Floorplan</li>
      <?php
      // If the property has location coordinates, display the map button
      if(get_post_meta($post->ID, 'wpcf-latitude', true) && get_post_meta($post->ID, 'wpcf-longitude', true)) { ?>
      <li class="tab-link" data-tab="tab-4">Maps</li>
      <?php } ?>
    </ul>
  </div>
</div>
