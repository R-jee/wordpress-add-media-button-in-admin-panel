<div>
    <p>
        <input type="number" value="" class="regular-text process_custom_images" id="popup_image_url_id" name="" max="" min="1" step="1">
        <button class="set_custom_images button">Set Image ID</button>
    </p>
</div>

<script>
jQuery(document).ready(function() {
    var $ = jQuery;
    // console.log($("#popup_discountBtn_url").val());
    // console.log($('.set_custom_images').length);
    if ($('.set_custom_images').length > 0) {
        // console.log(( typeof wp !== 'undefined' && wp.media && wp.media.editor));
        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            $('.set_custom_images').on('click', function(e) {
                e.preventDefault();
                var button = $(this);
                var id = button.prev();
                // var id = $("#popup_image_url_id");
                wp.media.editor.send.attachment = function(props, attachment) {
                    id.val(attachment.id);
                    console.log(attachment.id);
                };
                wp.media.editor.open(button);
                return false;
            });
        }
    }
});
</script>
<?php 
$imgid =(isset( $instance[ 'popup_image_url_id' ] )) ? $instance[ 'popup_image_url_id' ] : "";
// $img    = wp_get_attachment_image_src($imgid, 'thumbnail');
$img    = wp_get_attachment_image_src($imgid);
print_r($img);


if($img != "") {
?>
    <img src="<?= $img[0]; ?>" width="80px" /><br />
<?php 
}

?>
