<?php 
// disable popup after first visit
if (get_option('gs-popup-showed')  != "showed") {
    update_option("gs-popup-showed", "showed");
    ?><script type="text/javascript">var popup_showed = "showed";</script><?php 
}
?>
<div id="gs-master-wrapper">
    <?php include('tmpl/header.php'); ?>
    <main data-href="<?php echo $GS->api_url ?>sites/<?php echo get_option('gs-api-key') ?>">
        <div class="large">
            <?php if(get_option('gs-api-key') == ''): ?>
                <div class="account-info gs-form gs-small">
                    <span id="error-type-3" class="gs-error">
                        <p>Invalid E-mail!</p>
                    </span>
                    <div class="form-content">
                        <div class="field-group">
                            <div class="field-label no-desc">
                                <label for="site-name">URL</label>
                            </div>
                            <div class="field-input">
                                <?php echo get_option('siteurl') ?>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-label no-desc">
                                <label for="site-name">Email</label>
                            </div>
                            <input type="email" class="field-input" id="gs-user-email" value="<?php echo wp_get_current_user()->data->user_email ?>">
                        </div>
                    </div>
                    <div class="form-button-group">
                        <a href="<?php echo $GS->gs_account() ?>/api/v1/sites/create" class="gs-button gs-big gs-success create-gs-account"><i class="fa fa-check"></i> Activate your account</a>
                        <span class="loading-create gs-button gs-success trans border gs-big hide">
                            <i class="fa fa-refresh fa-spin"></i> Activating Account...
                        </span>
                    </div>
                </div>
                <?php include('tmpl/alerts.php') ?>
                <div class="gs-small">
                    <form id="api-key-form" method="post" class="api-key gs-form gs-small hidden" action="options.php">
                        <?php settings_fields( 'getsocial-gs-settings' ); ?>
                        <?php do_settings_sections( 'getsocial-gs-settings' ); ?>
                        <div class="form-content">
                            <div class="field-clean">
                                <div class="field-input">
                                    <span id="error-type-1" class="hidden">
                                        <p>It seems this URL has already been registered. Please <a class="uservoice-contact" href="mailto:support@getsocial.io">contact</a> our support if you are the website owner.</p>
                                    </span>
                                    <span id="error-type-2" class="hidden">
                                        <p>Please go to your <a href="https://getsocial.io/redirect/site-options" target="_blank">Getsocial Account</a> and get your API KEY in the site options page.</p>
                                        <p>If you can't find it request it <a id="request_api_key" href="#">here</a></p><br>
                                        <input id="gs-api-key" type="text" name="gs-api-key" size="60" value="" maxlength="20"/>
                                        <p>Need help?
                                            <a href="#" class="uservoice-contact" id="contact_us">Contact us</a>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span id="check-key-href" style="display: none;"><?php echo $GS->gs_account() ?>/api/v1/sites/verify_key?url=<?php echo get_option('siteurl'); ?></span>
                        <div class="form-button-group">
                            <input type="submit" name="save-changes" class="gs-button gs-success" value="Save Changes" />
                            <span class="loading-create gs-button gs-success trans border gs-big hide">
                                <i class="fa fa-refresh fa-spin"></i> Activating Account...
                            </span>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <?php if( !isset($_GET['tab']) ): ?>
                    <?php include('tmpl/apps_config.php') ?>
                    <?php include('tmpl/apps_filters.php') ?>
                    <?php include('tmpl/alerts.php') ?>
                    <?php include('tmpl/apps.php') ?>
                <?php else: ?>
                    <?php include('tmpl/apps_config.php') ?>
                    <?php include('tmpl/apps_filters.php') ?>
                    <?php include('tmpl/alerts.php') ?>
                    <?php include('tmpl/apps/'.$_GET['tab'].'.php') ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
    <?php include('tmpl/footer.php'); ?>
    <!-- Settings Modal -->
    <div id="settings-modal" class="modal-wrapper hide">
        <div class="gs-modal">
            <div class="modal-title">
                <p class="title">Settings</p>
            </div>
            <form id="config-form" method="post" action="options.php" class="gs-form">
                <?php settings_fields( 'getsocial-gs-settings' ); ?>
                <?php do_settings_sections( 'getsocial-gs-settings' ); ?>
                <div class="form-content">
                    <div class="field-group">
                        <div class="field-label">
                            <label for=""><br>API KEY</label>
                        </div>
                        <div class="field-input">
                            <input type="text" name="gs-api-key" size="60" value="<?php echo get_option('gs-api-key'); ?>" />
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-label">
                            <label for="">Where to display sharing bars</label>
                        </div>
                        <div class="field-input">
                            <p>
                                Choose where to have your apps displayed. <strong>For now this is limited to Horizontal Sharing Bars</strong>
                            </p>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place" value="place-posts" <?php echo (get_option('gs-place') == 'place-posts') ? 'checked' : '' ?> /><span>Only Posts</span></label>
                            </div>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place" value="place-pages" <?php echo (get_option('gs-place') == 'place-pages') ? 'checked' : '' ?>/><span>Only Pages</span></label>
                            </div>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place" value="place-all" <?php echo (get_option('gs-place') == 'place-all' || get_option('gs-place') == null) ? 'checked' : '' ?>/><span>Pages & Posts</span></label>
                            </div>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place" value="only-shortcodes" <?php echo (get_option('gs-place') == 'only-shortcodes') ? 'checked' : '' ?> /><span>None. I will use shortcodes</span></label>
                            </div>
                            <br>
                            <div class="checkbox-list gs-place">
                                <input type="checkbox" name="gs-posts-page" value="active" <?php echo (get_option('gs-posts-page') == 'active') ? 'checked' : '' ?>>Enable Multiple Share Bars in the same page (Sharing in Excerpts)
                            </div>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-label">
                            <label for="">Where to display follow bar</label>
                        </div>
                        <div class="field-input">
                            <p>
                                Choose where to have your apps displayed.
                            </p>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place-follow" value="place-posts" <?php echo (get_option('gs-place-follow') == 'place-posts') ? 'checked' : '' ?> /><span>Only Posts</span></label>
                            </div>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place-follow" value="place-pages" <?php echo (get_option('gs-place-follow') == 'place-pages') ? 'checked' : '' ?>/><span>Only Pages</span></label>
                            </div>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place-follow" value="place-all" <?php echo (get_option('gs-place-follow') == 'place-all' || get_option('gs-place-follow') == null) ? 'checked' : '' ?>/><span>Pages & Posts</span></label>
                            </div>
                            <div class="checkbox-list">
                                <label><input type="radio" name="gs-place-follow" value="only-shortcodes" <?php echo (get_option('gs-place-follow') == 'only-shortcodes') ? 'checked' : '' ?> /><span>None. I will use shortcodes</span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button-group">
                    <input type="submit" value="Save Settings" class="gs-button gs-success">
                    <a href="javascript:void(0)" class="gs-button gs-error trans modal-close">Cancel</a>
                </div>
            </form>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
    <!-- Install Google Analytics Modal -->
    <div id="install-ga-analytics-modal" class="modal-wrapper hide">
        <div class="gs-modal small text-center">
            <div class="text-block">
                <div class="modal-title">
                    <p class="title-obj">Google Analytics Integration</p>
                </div>
                <p class="text-center">
                    Track all social interactions made on your website without any code. Social sharing analytics, directly on Google Analytics. 
                </p>
                <div class="clearfix text-center" style="margin-top: 30px">
                    <div class="col-16">
                        <p style="margin-bottom: 0"><strong>Our Blog's example</strong></p>
                        <img src="<?php echo plugins_url( '/img/modals/ga_integration.png', __FILE__ ) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="form-button-group">
                <a href="<?php echo $GS->gs_account() ?>/sites/gs-wordpress/billing/select_tier?api_key=<?php echo $GS->api_key ?>&amp;source=wordpress<?php echo $GS->utms('pro_header') ?>" target="_blank" class="gs-button gs-success plan-two">
                    Upgrade to Starter
                </a>
                <a href="javascript:void(0)" class="gs-button gs-error trans modal-close">Cancel</a>
            </div>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
    <!-- Install Copy and Share Modal -->
    <div id="install-copy-and-share-modal" class="modal-wrapper hide">
        <div class="gs-modal small text-center">
            <div class="text-block">
                <div class="modal-title">
                    <p class="title-obj">Copy Paste Share Tracking</p>
                </div>
                <p class="text-center">
                    Half of shares made on our blog are made via dark social channels, such as copy & paste, SMS and chat applications. What about yours?
                </p>
                <div class="clearfix text-center" style="margin-top: 30px">
                    <div class="col-16">
                        <p style="margin-bottom: 0"><strong>Out Blog's example</strong></p>
                        <img src="<?php echo plugins_url( '/img/modals/ga_integration.png', __FILE__ ) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="form-button-group">
                <a href="<?php echo $GS->gs_account() ?>/sites/gs-wordpress/billing/select_tier?api_key=<?php echo $GS->api_key ?>&amp;source=wordpress<?php echo $GS->utms('pro_header') ?>" target="_blank" class="gs-button gs-success plan-two">
                    Upgrade to Starter
                </a>
                <a href="javascript:void(0)" class="gs-button gs-error trans modal-close">Cancel</a>
            </div>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
    <!-- Install Mailchimp Modal -->
    <div id="install-mailchimp-modal" class="modal-wrapper hide">
        <div class="gs-modal small text-center">
            <div class="text-block">
                <div class="modal-title">
                    <p class="title">MailChimp Integration</p>
                </div>
                <p class="text-center">
                    Real-time integration with MailChimp. Connect our Subscriber Bar & Price Alert features to the world’s #1 e-mail marketing tool.
                </p>
                <div class="clearfix text-center" style="margin-top: 30px">
                    <div class="col-16" style="margin-top: 30px">
                        <img src="<?php echo plugins_url( '/img/modals/mailchimp.png', __FILE__ ) ?>" alt="">
                    </div>
                </div>
            </div> 
            <div class="form-button-group">
                <a href="<?php echo $GS->gs_account() ?>/sites/gs-wordpress/billing/select_tier?api_key=<?php echo $GS->api_key ?>&amp;source=wordpress<?php echo $GS->utms('pro_header') ?>" target="_blank" class="gs-button gs-success plan-two">
                    Upgrade to Starter
                </a>
                <a href="javascript:void(0)" class="gs-button gs-error trans modal-close">Cancel</a>
            </div>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
    <!-- Install Bitly Modal -->
    <div id="install-bitly-modal" class="modal-wrapper hide">
        <div class="gs-modal small text-center">
            <div class="text-block">
                <div class="modal-title">
                    <p class="title">Bitly Integration</p>
                </div>
                <p class="text-center">
                    Activating our Bitly integration will allow your readers to share using your Bitly account. Easy, no code required!
                </p>
                <br>
                <div class="before-after">
                    <div>
                        <strong>Before</strong>
                        <img src="<?php echo plugins_url( '/img/modals/bitly_via_before.png', __FILE__ ) ?>" alt="">
                    </div>
                    <div>
                        <strong>After</strong>
                        <img src="<?php echo plugins_url( '/img/modals/bitly_via_after.png', __FILE__ ) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="form-button-group">
                <a href="<?php echo $GS->gs_account() ?>/sites/gs-wordpress/billing/select_tier?api_key=<?php echo $GS->api_key ?>&amp;source=wordpress<?php echo $GS->utms('pro_header') ?>" target="_blank" class="gs-button gs-success plan-two">
                    Upgrade to Starter
                </a>
                <a href="javascript:void(0)" class="gs-button gs-error trans modal-close">Cancel</a>
            </div>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
    <!-- Install InfusionSoft Modal -->
    <div id="install-infusionsoft-modal" class="modal-wrapper hide">
        <div class="gs-modal small text-center">
            <div class="text-block">
                <div class="modal-title">
                    <p class="title">InfusionSoft Integration</p>
                </div>
                <p class="text-center">
                    By linking your InfusionSoft account, you'll be able to automatically send all emails captured on Subscriber Bar & Hello Buddy features.
                </p>
                <div class="clearfix text-center" style="margin-top: 30px">
                    <div class="col-16" style="margin-bottom: 30px">
                        <img src="<?php echo plugins_url( '/img/modals/infusionsoft.png', __FILE__ ) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="form-button-group">
                <a href="<?php echo $GS->gs_account() ?>/sites/gs-wordpress/billing/select_tier?api_key=<?php echo $GS->api_key ?>&amp;source=wordpress<?php echo $GS->utms('pro_header') ?>" target="_blank" class="gs-button gs-success plan-two">
                    Upgrade to Starter
                </a>
                <a href="javascript:void(0)" class="gs-button gs-error trans modal-close">Cancel</a>
            </div>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
    <!-- Confirm API KEY request Modal -->
    <div id="confirm-apikey-request-modal" class="modal-wrapper hide">
        <div class="gs-modal small text-center">
            <div class="text-block">
                <div class="modal-title">
                    <p class="title">API KEY Requested</p>
                </div>
                <p class="text-center">
                    Your request has been sent. We will process it as soon as possible.
                </p>
            </div>
            <a href="javascript:void(0)" class="gs-button gs-success modal-close">OK</a>
        </div>
        <div class="modal-cover modal-close"></div>
    </div>
</div>

<script>
// Include the UserVoice JavaScript SDK (only needed once on a page)
UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/hizF2VOh3oNKSWQxuKYjg.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();

// Set colors
UserVoice.push(['set', {
    accent_color: '#448dd6',
    trigger_color: 'white',
    trigger_background_color: '#e2753a'
}]);

// Identify the user and pass traits
// To enable, replace sample data with actual user traits and uncomment the line
UserVoice.push(['identify', {
    email: '<?php echo get_option('admin_email') ?>'
}]);

// Add default trigger to the bottom-right corner of the window:
UserVoice.push(['addTrigger', '#help', { mode: 'contact' }]);

if (document.getElementById('contact_us')) {
    UserVoice.push(['addTrigger', '#contact_us', { mode: 'contact' }]);
}

if (document.getElementById('contact-2')) {
    UserVoice.push(['addTrigger', '#contact-2', { mode: 'contact' }]);
}

if (document.getElementById('contact-3')) {
    UserVoice.push(['addTrigger', '#contact-3', { mode: 'contact' }]);
}

if (document.getElementById('contact-4')) {
    UserVoice.push(['addTrigger', '#contact-4', { mode: 'contact' }]);
}

</script>
