<div class="wrap">
<div class="icon32"><img src="<?=plugins_url( 'images/feedback32x32.png' , __FILE__ );?>"/><br></div><h2>ShareHere Mobile Recommendations</h2>

<p>The ShareHere bar recycles relevant content from your mobile website to increase viewership. ShareHere also allows readers to see recommended content and easily share your content on social networks. You will see additional page views and new users on your site. Most importantly, this technology is absolutely free of charge to use.</p>

<?php if (!@$options['sharehereTagID']): ?>
    <h3>If you have already registered on ShareHere.com:</h3>
<?php else: ?>
    <p><strong>Your ShareHere recommendations are currently active.</strong></p>
<?php endif ?>

<form method="post" action="options.php">
<input type="hidden" name="embeddedSignUp" id="embeddedSignUp" value="0"/>
    <?php settings_fields( 'sharehere-mobile-recommendations-options'); ?>
    <?php do_settings_fields( 'sharehere-mobile-recommendations-options',"buttonOptions"  ); ?>
<table class="form-table">
<tbody>
    <tr valign="top">
        <th scope="row"><label for="sharehereTagID">Tag ID</label></th><td><input name="buttonOptions[sharehereTagID]" type="text" id="sharehereTagID" value="<?=@$options['sharehereTagID']; ?>" style="width:273px" class="regular-text"></td>
    </tr>
</tbody></table>
<?php submit_button("Save", "primary", "sharehereSettingsSubmit"); ?>
</form>

<?php if (!@$options['sharehereTagID']): ?>
    <hr/>
    <h3>If you're a new user:</h3>
    <p>Email:<br/>
    <input type="text" id="email" value="<?php echo get_option('admin_email') ?>" class="regular-text"></p>

    <input id="agree_terms" name="agree_terms" value="1" type="checkbox">
    <label for="agree_terms">I have read and agree to the <a href="http://www.sharehere.com/termsofuse" target="_blank">Terms of Use</a>.</label><br>
    <input id="agree_privacy" name="agree_privacy" value="1" type="checkbox">
    <label for="agree_privacy">I have read and agree to the <a href="http://www.sharehere.com/privacy" target="_blank">Privacy Policy</a>.</label><br>
    <input id="agree_display" name="agree_display" value="1" type="checkbox">
    <label for="agree_display">I understand that the ShareHere bar will appear on my public site for users on mobile devices.</label>

    <input type="hidden" id="url" value="<?php echo get_option('siteurl') ?>">
    <input type="hidden" id="feed_url" value="<?php echo get_option('siteurl') ?>?feed=rss2">
    <p><input type="submit" value="Sign up" class="button button-primary" id="sherehere-signup"/>&nbsp;&nbsp;&nbsp;&nbsp;<span id="sharehere-signup-status"></span></p>
<?php endif ?>

</div>