<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'             => $opt_name,
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'         => $theme->get( 'Name' ),
                // Name that appears at the top of your panel
                'display_version'      => $theme->get( 'Version' ),
                // Version that appears at the top of your panel
                'menu_type'            => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'       => true,
                // Show the sections below the admin menu item or not
                'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
                'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'       => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography'     => true,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar'            => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon'       => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority'   => 50,
                // Choose an priority for the admin bar menu
                'global_variable'      => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode'             => false,
                // Show the time the page took to load, etc
                'update_notice'        => false,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer'           => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority'        => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'          => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'     => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon'            => '',
                // Specify a custom URL to an icon
                'last_tab'             => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon'            => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug'            => '_options',
                // Page slug used to denote the panel
                'save_defaults'        => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show'         => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark'         => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export'   => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time'       => 60 * MINUTE_IN_SECONDS,
                'output'               => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'           => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'             => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

                'use_cdn'              => true,
                // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

                //'compiler'             => true,

                // HINTS
                'hints'                => array(
                                            'icon'          => 'el el-question-sign',
                                            'icon_position' => 'right',
                                            'icon_color'    => 'lightgray',
                                            'icon_size'     => 'normal',
                                            'tip_style'     => array(
                                                'color'   => 'light',
                                                'shadow'  => true,
                                                'rounded' => false,
                                                'style'   => '',
                                            ),
                                            'tip_position'  => array(
                                                'my' => 'top left',
                                                'at' => 'bottom right',
                                            ),
                                            'tip_effect'    => array(
                                                'show' => array(
                                                    'effect'   => 'slide',
                                                    'duration' => '500',
                                                    'event'    => 'mouseover',
                                                ),
                                                'hide' => array(
                                                    'effect'   => 'slide',
                                                    'duration' => '500',
                                                    'event'    => 'click mouseleave',
                                                ),
                                            ),
                                        )
            );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
                                    'id'    => 'theme-option-developer',
                                    'href'  => 'https://wordpress.org/',
                                    'title' => __( 'Developer', 'redux-framework-demo' ),
                                );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        //$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Made with <i class="el el-heart"></i></p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
                array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
                ),
                array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
                )
            );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // GENERAL.
    Redux::setSection( $opt_name, array(
                                    'title'  => __( 'General', 'redux-framework-demo' ),
                                    'id'     => 'general',
                                    'desc'   => __( 'From here you can change general part of your website.', 'redux-framework-demo' ),
                                    'icon'   => 'el el-website'
                                ) );

    // HEADER
    Redux::setSection( $opt_name, array(
                                    'title'  => __( 'Header', 'redux-framework-demo' ),
                                    'id'     => 'header',
                                    'desc'   => __( 'From here you can change header part of your website.', 'redux-framework-demo' ),
                                    'icon'   => 'el el-credit-card'
                                ) );

    // HEADER - LOGO.
    Redux::setSection( $opt_name, array(
                                    'title'      => __( 'Header Fields', 'redux-framework-demo' ),
                                    'id'         => 'logo',
                                    'subsection' => true,
                                    'desc'       => __( 'From here you can change logo part of your website.', 'redux-framework-demo' ),
                                    'icon'       => 'el el-bulb',
                                    'fields'     => array(
                                                        // array(
                                                        //     'id'       => 'header-note',
                                                        //     'type'     => 'textarea',
                                                        //     'title'    => __( 'Header Note', 'redux-framework-demo' ),
                                                        //     'subtitle'     => __( 'Update header welcome note.', 'redux-framework-demo' ),
                                                        // ),
                                                        array(
                                                            'id'       => 'header-facebook-icon',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Facebook Icon', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Facebook logo for the header of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-Facebook-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Facebook URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update header facebook url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-twitter-icon',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Twitter Icon', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Twitter logo for the header of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-twitter-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Twitter URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update header Twitter url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-youtube-icon',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header youtube Icon', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Youtube logo for the header of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-youtube-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Youtube URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update header youtube url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-linkedin-icon',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Linkedin Icon', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload linkedin logo for the header of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-linkedin-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header linkedin URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update header linkedin url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-sales-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header sales Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update header sales text.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-sales-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header sales url', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update header sales url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-left-logo',
                                                            'type'     => 'media',
                                                            'title'    => __( 'Left-Logo', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Left logo for your website.', 'redux-framework-demo' ),
                                                        ),
                                                        array(
                                                            'id'       => 'header-right-logo',
                                                            'type'     => 'media',
                                                            'title'    => __( 'Right-Logo', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Right logo for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-logo-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'header-logo-url', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'header-logo-url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-contact-no',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Contact No', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Contact No for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-email-address',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Email Address', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Email Address for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-button-link',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Button Link', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Button for Admission.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'header-button-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Header Button Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Button Text for Admission.', 'redux-framework-demo' ),
                                                        )
                                                    )
                                ) );

Redux::setSection( $opt_name, array(
                                    'title'  => __( 'Course', 'redux-framework-demo' ),
                                    'id'     => 'course',
                                    'desc'   => __( 'From here you can change header part of your website.', 'redux-framework-demo' ),
                                    'icon'   => 'el el-credit-card'
                                ) );

    // HEADER - LOGO.
    Redux::setSection( $opt_name, array(
                                    'title'      => __( 'Course Fields', 'redux-framework-demo' ),
                                    'id'         => 'logo-course',
                                    'subsection' => true,
                                    'desc'       => __( 'From here you can change logo part of your website.', 'redux-framework-demo' ),
                                    'icon'       => 'el el-bulb',
                                    'fields'     => array(
                                                        // array(
                                                        //     'id'       => 'header-note',
                                                        //     'type'     => 'textarea',
                                                        //     'title'    => __( 'Header Note', 'redux-framework-demo' ),
                                                        //     'subtitle'     => __( 'Update header welcome note.', 'redux-framework-demo' ),
                                                        // ),
                                                        array(
                                                            'id'       => 'course-apply-now-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Course Apply Now Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Course Apply Now Text of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'course-apply-now-link',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Course Apply Now URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Course Apply Now url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-one',
                                                            'type'     => 'media',
                                                            'title'    => __( 'Hanging Inner Image One', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Hanging Inner Image One for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-one-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Hanging Inner Image One Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Hanging Inner Image One Text for of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-two',
                                                            'type'     => 'media',
                                                            'title'    => __( 'Hanging Inner Image Two', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Hanging Inner Image Two for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-two-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Hanging Inner Image Two Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Hanging Inner Image Two Text for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-three',
                                                            'type'     => 'media',
                                                            'title'    => __( 'Hanging Inner Image Three', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Hanging Inner Image Three for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-three-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Hanging Inner Image Three Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Hanging Inner Image Three Text for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-four',
                                                            'type'     => 'media',
                                                            'title'    => __( 'Hanging Inner Image Four', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Upload Hanging Inner Image Four for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'hanging-inner-image-four-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Hanging Inner Image Four Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Hanging Inner Image Four Text for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'learn-more-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Learn More URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Learn More url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'learn-more-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Learn More Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Learn More Text for the header of your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'take-a-vital-tour-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Take A Vital Tour URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Take A Vital Tour url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'take-a-vital-tour-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Take A Vital Tour Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Take A Vital Tour Text for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'contact-us-first-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Contact Us First URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Contact Us First url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'contact-us-first-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Contact Us First Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Contact Us First text.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'previous-year-Sample-papers-first-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Previous Year Sample Papers First url', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Previous Year Sample Papers url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'previous-year-Sample-papers-first-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Previous Year Sample Papers First Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Previous Year Sample Papers First Text.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'admission-call-first',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Admission Call First', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Admission Call First for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'admission-call',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Admission Call', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Admission Call for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'apply-now-last',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Apply Now Last', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Apply Now Last for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'apply-now-last-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Apply Now Last Url', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Apply Now Last Url for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'contact-us-second-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Contact Us Second URL', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Contact Us Second url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'contact-us-second-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Contact Us Second Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Contact Us Second text.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'previous-year-Sample-papers-second-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Previous Year Sample Papers Second url', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Previous Year Sample Second url.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'previous-year-Sample-papers-second-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Previous Year Sample Papers Second Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Previous Year Sample Papers Second Text.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'view-brochure-text',
                                                            'type'     => 'text',
                                                            'title'    => __( 'View Brochure Text', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update View Brochure Text.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'view-brochure-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'View Brochure Link', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update View Brochure Link.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'admission-call-text-second',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Admission Call Text Second', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Admission Call Text Second for your website.', 'redux-framework-demo' ),
                                                        ),array(
                                                            'id'       => 'admission-call-second',
                                                            'type'     => 'text',
                                                            'title'    => __( 'Admission Call Second', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'Update Admission Call Second for your website.', 'redux-framework-demo' ),
                                                        ),
                                                        
                                                    )
                                ) );



    // FOOTER
    Redux::setSection( $opt_name, array(
                                    'title'  => __( 'Footer', 'redux-framework-demo' ),
                                    'id'     => 'footer',
                                    'desc'   => __( 'From here you can change footer part of your website.', 'redux-framework-demo' ),
                                    'icon'   => 'el el-credit-card'
                                ) );

    // FOOTER - MAIN
    Redux::setSection( $opt_name, array(
                                    'title'      => __( 'Footer Fields', 'redux-framework-demo' ),
                                    'id'         => 'footer-main',
                                    'subsection' => true,
                                    'desc'       => __( 'From here you can change main section of the footer.', 'redux-framework-demo' ),
                                    'icon'       => 'el el-credit-card',
                                    'fields' => array(                          
                                                    array(
                                                        'id'       => 'footer-logo',
                                                        'type'     => 'media',
                                                        'title'    => __( 'Footer Logo', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Upload Footer Logo for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                            'id'       => 'footer-logo-url',
                                                            'type'     => 'text',
                                                            'title'    => __( 'footer-logo-url', 'redux-framework-demo' ),
                                                            'subtitle'     => __( 'footer-logo-url.', 'redux-framework-demo' ),
                                                        ),
                                                     array(
                                                        'id'       => 'footer-first-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer First College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer First College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-first-college-contact-no',
                                                        'type'     => 'text',
                                                        'title'    => __( 'First College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Copyright Text on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    

                                                    array(
                                                        'id'       => 'footer-second-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Second College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer Second College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-second-college-contact-no',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Second College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update econd College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    

                                                    array(
                                                        'id'       => 'footer-third-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Third College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer First College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-third-college-contact-no-1',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Third College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Third College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-third-college-contact-no-2',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Third College Contact No 2', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Third College Contact No 2 on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    
                                                    

                                                    array(
                                                        'id'       => 'footer-fourth-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Fourth College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer First College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-fourth-college-contact-no-1',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Fourth College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Fourth College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-fourth-college-contact-no-2',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Fourth College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Fourth College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                   
                                                    array(
                                                        'id'       => 'footer-fifth-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Fifth College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer Fifth College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-fifth-college-contact-no-1',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Fifth College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Fifth College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-fifth-college-contact-no-2',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Fifth College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Fifth College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),

                                                    array(
                                                        'id'       => 'footer-sixth-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Fifth College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer Fifth College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-sixth-college-contact-no-1',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Sixth College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Sixth College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-sixth-college-contact-no-2',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Sixth College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Sixth College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),

                                                    array(
                                                        'id'       => 'footer-seventh-college-name',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Seventh College Name', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Footer Seventh College Name on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-seventh-college-contact-no-1',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Seventh College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Seventh College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-seventh-college-contact-no-2',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Seventh College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Seventh College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-seventh-college-contact-no-3',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Seventh College Contact No', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update Seventh College Contact No on your website.', 'redux-framework-demo' ),
                                                    ),


                                                    
                                                    array(
                                                        'id'       => 'footer-Email-Link',
                                                        'type'     => 'text',
                                                        'title'    => __( 'footer-Email-Link', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Upload footer-Email-Link for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-Email-Text',
                                                        'type'     => 'text',
                                                        'title'    => __( 'footer-Email-Text', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Upload footer-Email-Text for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'footer-button-link',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Button Link', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update footer Button Link.', 'redux-framework-demo' ),
                                                    )
                                                    ,array(
                                                        'id'       => 'footer-Button-text-3',
                                                        'type'     => 'text',
                                                        'title'    => __( 'Footer Button Text 3', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Update footer Button Text.', 'redux-framework-demo' ),
                                                    )
                                                )
                                ) );

    // ERROR PAGE
    Redux::setSection( $opt_name, array(
                                    'title'  => __( '404 Page', 'redux-framework-demo' ),
                                    'id'     => 'error-page',
                                    'desc'   => __( 'From here you can change 404 Page of your website.', 'redux-framework-demo' ),
                                    'icon'   => 'el el-warning-sign',
                                    'fields' => array(
                                                    array(
                                                        'id'       => 'error-page-image',
                                                        'type'     => 'media',
                                                        'title'    => __( '404 Image', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Upload 404 image for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'error-page-heading-text',
                                                        'type'     => 'text',
                                                        'title'    => __( '404 Page Heading', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Edit 404 Heading Text for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'error-page-subheading-text',
                                                        'type'     => 'text',
                                                        'title'    => __( '404 Page Sub Heading', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Edit 404 Sub Heading Text for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'error-page-text',
                                                        'type'     => 'editor',
                                                        'title'    => __( '404 Page Text', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Edit 404 Text for your website.', 'redux-framework-demo' ),
                                                    ),
                                                    array(
                                                        'id'       => 'error-page-button-text',
                                                        'type'     => 'text',
                                                        'title'    => __( '404 Page Button Text', 'redux-framework-demo' ),
                                                        'subtitle'     => __( 'Edit 404 Button Text for your website.', 'redux-framework-demo' ),
                                                    ),
                                                )
                                ) );
    
