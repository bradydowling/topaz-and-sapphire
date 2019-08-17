<?php
// ReduxFramework Sample Config File
// For full documentation, please visit: https://docs.reduxframework.com
if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {
            // General Settings
            $this->sections[] = array(
                'icon' => 'el el-cogs',
                'title' => __('General', 'infashion'),
                'fields' => array(
                    array(
                        'id'                    	=> 'section-general-post',
                        'type'                		=> 'info',
                        'icon'						=> 'el el-info-sign',
                        'title'    		            => __('Post settings', 'infashion'),
                        'desc'                	    => __('Post common settings.', 'infashion'),
                    ),

                    array(
                        'id'                   		=> 'post_excerpt_length',
                        'type'                 		=> 'slider',
                        'title'                		=> __('Post excerpt length', 'infashion'),
                        'default'              		=> 65,
                        'min'                  	    => 20,
                        'step'                 		=> 1,
                        'max'                   	=> 65,
                        'display_value'        		=> 'text'
                    ),

                    array(
                        'id'                        => 'display_continue_reading',
                        'type'                      => 'switch',
                        'title'                     => __('Display continue reading button', 'infashion'),
                        'desc'                     => __('Display continue reading button in homepage, category and archive pages.', 'infashion'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'share_buttons_post',
                        'type'                      => 'switch',
                        'title'                     => __('Post detail share buttons', 'infashion'),
                        'desc'                     => __('Display share buttons in post detail.', 'infashion'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'share_buttons_page',
                        'type'                      => 'switch',
                        'title'                     => __('Page detail share buttons', 'infashion'),
                        'desc'                     => __('Display share buttons in page post type.', 'infashion'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'display_author_',
                        'type'                      => 'switch',
                        'title'                     => __('Display author box', 'infashion'),
                        'desc'                      => __('Display author description in post detail.', 'infashion'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'display_comments',
                        'type'                      => 'switch',
                        'title'                     => __('Display comments', 'infashion'),
                        'desc'                      => __('Display comments in post detail.', 'infashion'),
                        'default'                   => 1,
                    ),

                    array(
                        'id'                        => 'display_instagram_feed',
                        'type'                      => 'switch',
                        'title'                     => __('Display Instagram feed', 'infashion'),
                        'desc'                      => __('Display Instagram feed in footer.', 'infashion'),
                        'default'                   => 1,
                    ),
                )
            );

            // General Settings
            $this->sections[] = array(
                'icon' => 'el el-website',
                'title' => __('Appearance', 'infashion'),
                'fields' => array(
                    array(
                        'id'                => 'logo_type',
                        'type'              => 'button_set',
                        'title'             => __('Logo type', 'infashion'), 
                        'desc'              => sprintf(__('Use site <a href="%s" target="_blank">title & desription</a> or use image logo.', 'infashion'), admin_url('/options-general.php') ),
                        'options'           => array('1' => __('Site Title', 'infashion'), '2' => __('Image', 'infashion')),
                        'default'           => '2'
                    ),

                    array(
                        'id'                => 'logo_image',
                        'type'              => 'media', 
                        'url'               => true,
                        'required'          => array('logo_type', 'equals', '2'),
                        'title'             => __('Image logo', 'infashion'),
                        'output'            => 'true',
                        'desc'              => __('Upload your logo or type the URL on the text box.', 'infashion'),
                        'default'           => array('url' => get_template_directory_uri() .'/images/logo.png'),
                    ),

                    array(
                        'id'                =>'favicon',
                        'type'              => 'media', 
                        'title'             => __('Favicon', 'infashion'),
                        'output'            => 'true',
                        'mode'              => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'              => __('Upload your favicon.', 'infashion'),
                        'default'           => array('url' => get_template_directory_uri().'/images/favicon.png'),
                    ),

                    array(
                        'id'                => 'custom_css',
                        'type'              => 'ace_editor',
                        'title'             => __('Custom CSS codes', 'infashion'),
                        'mode'              => 'css',
                        'theme'             => 'monokai',
                        'desc'              => __('Type your custom CSS codes here, alternatively you can also write down you custom CSS styles on the custom.css file located on the theme root directory.', 'moticia'),
                        'default'                   => ''
                    ),
                )
            );

             // Typography Settings
            $this->sections[] = array(
                'icon'    => 'el el-text-width',
                'title'   => __('Typography', 'infashion'),
                'fields'  => array(
                    array(
                        'id'                => 'site_title_font',
                        'type'              => 'typography',
                        'title'             => __('Site title', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'text-transform'    => true,
                        'output'            => array('#logo h2.site-title'),
                        'default'           => array(
                            'font-family'       => 'Quicksand',
                            'font-size'         => '30px',
                            'font-weight'       => '400',
                            'color'             => '#000000',
                            'text-transform'    => 'uppercase'
                        )
                    ),

                    array(
                        'id'                => 'site_desc_font_wp',
                        'type'              => 'typography',
                        'title'             => __('Site description in logo', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'output'            => array('#logo h4.site-desc'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '16px',
                            'font-weight'       => '300',
                            'color'             => '#555555'
                        )
                    ),

                    array(
                        'id'                => 'body_font',
                        'type'              => 'typography',
                        'title'             => __('Main body font', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'text-align'        => false,
                        'letter-spacing'    => false,
                        'line-height'       => true,
                        'output'            => array('body'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'color'             => '#666666',
                            'line-height'       => '170%'
                        )
                    ),

                    array(
                        'id'                => 'main_menu_font',
                        'type'              => 'typography',
                        'title'             => __('Main menu font', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'letter-spacing'    => true,
                        'text-align'        => false,
                        'text-transform'    => true,
                        'output'            => array('.site-navigation ul li a'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '11px',
                            'font-weight'       => '400',
                            'color'             => '#212121',
                            'letter-spacing'    => '1px',
                            'text-transform'    => 'uppercase'
                        )
                    ),

                    array(
                        'id'                => 'title_slider_wp',
                        'type'              => 'typography',
                        'title'             => __('Title in slider', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => false,
                        'text-align'        => false,
                        'output'            => array('#slider-header .detail .post-title'),
                        'default'           => array(
                            'font-family'       => 'Montserrat, Helvetica, Arial',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'color'             => '#fff'
                        )
                    ),

                    array(
                        'id'                => 'posts_title',
                        'type'              => 'typography',
                        'title'             => __('Archive Post title', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'letter-spacing'    => false,
                        'text-transform'    => true,
                        'output'            => array('article.hentry h3.post-title'),
                        'default'           => array(
                            'font-family'       => 'Droid Serif',
                            'font-size'         => '35px',
                            'font-weight'       => '400',
                            'color'             => '#000000'
                        )
                    ),

                    array(
                        'id'                => 'archive_page_title_section',
                        'type'              => 'typography',
                        'title'             => __('Archive page title', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'text-transform'    => true,
                        'output'            => array('#primary h2.archive-title span'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '12px',
                            'font-weight'       => '400',
                            'color'             => '#666',
                            'text-transform'    => 'uppercase'
                        )
                    ),

                    array(
                        'id'                => 'title_post_detail',
                        'type'              => 'typography',
                        'title'             => __('Title in singe post', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'letter-spacing'    => false,
                        'output'            => array('article.hentry h1.post-title'),
                        'default'           => array(
                            'font-family'       => 'Droid Serif',
                            'font-size'         => '40px',
                            'font-weight'       => '400',
                            'color'             => '#000000'
                        )
                    ),

                    array(
                        'id'                => 'single_post_section',
                        'type'              => 'typography',
                        'title'             => __('Single post section title', 'infashion'),
                        'desc'              => __('Related posts, comments etc.', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'text-align'        => false,
                        'text-transform'    => true,
                        'output'            => array('h4.widget-title', '.yarpp-related h3'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '12px',
                            'font-weight'       => '700',
                            'color'             => '#000000',
                            'text-transform'    => 'uppercase'
                        )
                    ),

                    array(
                        'id'                => 'entry_meta_font',
                        'type'              => 'typography',
                        'title'             => __('Entry post meta', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'all_styles'        => true,
                        'preview'           => true,
                        'line-height'       => true,
                        'font-style'        => true,
                        'text-align'        => false,
                        'output'            => array('.entry-meta'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'color'             => '#9e9e9e'
                        )
                    ),

                    array(
                        'id'                => 'author_button_social_media',
                        'type'              => 'typography',
                        'title'             => __('Social media in page author', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => false,
                        'text-align'        => false,
                        'output'            => array('section#about-site .detail .social ul li', '.widgets.about-author .social ul li '),
                        'default'           => array(
                            'font-family'       => 'Droid Serif',
                            'font-size'         => '18px',
                            'font-weight'       => '400',
                            'color'             => '#696969'
                        )
                    ),

                    array(
                        'id'                    => 'form_field_font',
                        'type'                  => 'typography',
                        'title'                 => __('Form field text', 'guru'),
                        'google'                => true,
                        'subsets'               => true,
                        'preview'               => true,
                        'line-height'           => false,
                        'text-transform'        => true,
                        'output'                => array('form input[type="text"]', 'form input[type="password"]', 'form input[type="email"]', 'select', 'form textarea', '.input textarea', 'form input[type="url"]'),
                        'default'               => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '14px',
                                'font-weight'       => '400',
                                'color'             => '#666',
                        )
                    ),

                    array(
                        'id'                => 'warrior_text_footer',
                        'type'              => 'typography',
                        'title'             => __('Footer', 'infashion'),
                        'google'            => true,
                        'subsets'           => true,
                        'preview'           => true,
                        'line-height'       => false,
                        'text-align'        => false,
                        'output'            => array('footer#colophone'),
                        'default'           => array(
                            'font-family'       => 'Lato',
                            'font-size'         => '14px',
                            'font-weight'       => '400',
                            'color'             => '#6e787f'
                        )
                    ),

                        array(
                            'id'                => 'heading_h1',
                            'type'              => 'typography',
                            'title'             => __('Heading H1 (Post & Page Title)', 'infashion'),
                            'desc'             => __('Also used for post & page title.', 'infashion'),
                            'google'            => true,
                            'subsets'           => true,
                            'preview'           => true,
                            'line-height'       => false,
                            'text-align'        => false,
                            'text-transform'    => true,
                            'output'            => array('#primary article.hentry .entry-content h1'),
                            'default'           => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '35px',
                                'font-weight'       => '700',
                                'color'             => '#000000',
                                'text-transform'    => 'none'
                            )
                        ),

                        array(
                            'id'                => 'heading_h2',
                            'type'              => 'typography',
                            'title'             => __('Heading H2', 'infashion'),
                            'desc'             => __('Also used for post & page title.', 'infashion'),
                            'google'            => true,
                            'subsets'           => true,
                            'preview'           => true,
                            'line-height'       => false,
                            'text-align'        => false,
                            'text-transform'    => true,
                            'output'            => array('#primary article.hentry .entry-content h2'),
                            'default'           => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '30px',
                                'font-weight'       => '700',
                                'color'             => '#000000',
                            )
                        ),

                        array(
                            'id'                => 'heading_h3',
                            'type'              => 'typography',
                            'title'             => __('Heading H3', 'infashion'),
                            'desc'              => __('Also used for post & page title.', 'infashion'),
                            'google'            => true,
                            'subsets'           => true,
                            'all_styles'        => true,
                            'preview'           => true,
                            'line-height'       => false,
                            'text-align'        => false,
                            'text-transform'    => true,
                            'letter-spacing'    => true,
                            'output'            => array('#primary article.hentry .entry-content h3'),
                            'default'           => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '25px',
                                'font-weight'       => '400',
                                'color'             => '#000000',
                                'text-transform'    => 'none'
                            )
                        ),

                        array(
                            'id'                => 'heading_h4',
                            'type'              => 'typography',
                            'title'             => __('Heading H4', 'infashion'),
                            'desc'             => __('Also used for post & page title.', 'infashion'),
                            'google'            => true,
                            'subsets'           => true,
                            'preview'           => true,
                            'line-height'       => false,
                            'text-align'        => false,
                            'text-transform'    => true,
                            'output'            => array('#primary article.hentry .entry-content h4'),
                            'default'           => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '20px',
                                'font-weight'       => '700',
                                'color'             => '#000000',
                            )
                        ),

                        array(
                           'id'                => 'heading_h5',
                            'type'              => 'typography',
                            'title'             => __('Heading H5', 'infashion'),
                            'desc'             => __('Also used for post & page title.', 'infashion'),
                            'google'            => true,
                            'subsets'           => true,
                            'preview'           => true,
                            'line-height'       => false,
                            'text-align'        => false,
                            'text-transform'    => true,
                            'output'            => array('#primary article.hentry .entry-content h5'),
                            'default'           => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '14px',
                                'font-weight'       => '700',
                                'color'             => '#000000',
                            )
                        ),

                        array(
                           'id'                => 'heading_h6',
                            'type'              => 'typography',
                            'title'             => __('Heading H6', 'infashion'),
                            'desc'             => __('Also used for post & page title.', 'infashion'),
                            'google'            => true,
                            'subsets'           => true,
                            'preview'           => true,
                            'line-height'       => false,
                            'text-align'        => false,
                            'text-transform'    => true,
                            'output'            => array('#primary article.hentry .entry-content h6'),
                            'default'           => array(
                                'font-family'       => 'Lato',
                                'font-size'         => '11px',
                                'font-weight'       => '400',
                                'color'             => '#000000',
                            )
                        ),
                ),
            );

              
            // Color Settings
            $this->sections[] = array(
                'icon'    => 'el el-brush',
                'title'   => __('Colors', 'infashion'),
                'fields'  => array(
                     array(
                        'id'                    => 'main_link',
                        'type'                  => 'link_color',
                        'title'                 => __('Main link color', 'infashion'),
                        'active'                => false,
                        'output'                => array('.page-home a'),
                        'default'               => array(
                                                    'regular'  => '#000',
                                                    'hover'    => '#900',
                        )
                    ),

                    array(
                        'id'                    => 'site_title_link',
                        'type'                  => 'link_color',
                        'title'                 => __('Site title link color', 'infashion'),
                        'active'                => false,
                        'output'                => array('#main-content a'),
                        'default'               => array(
                                                    'regular'  => '#000',
                                                    'hover'    => '#aD1457',
                        )
                    ),

                    array(
                        'id'                    => 'link_title_slider_wp',
                        'type'                  => 'link_color',
                        'title'                 => __('Link color title in slider', 'infashion'),
                        'active'                => false,
                        'output'                => array('#slider-header .detail .post-title a'),
                        'default'               => array(
                                                    'regular'  => '#fff',
                                                    'hover'    => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'info-post-color',
                        'type'                  => 'info',
                        'icon'                  => 'el el-info-sign',
                        'title'                 => __('Post Related Colors', 'infashion'),
                        'desc'                 => __('Post related color settings', 'infashion'),
                    ),

                    array(
                        'id'                    => 'link_posts',
                        'type'                  => 'link_color',
                        'title'                 => __('Post title', 'infashion'),
                        'active'                => false,
                        'output'                => array('article.hentry h3.post-title a'),
                        'default'               => array(
                                                    'regular'  => '#000000',
                                                    'hover'    => '#ad1457',
                        )
                    ),

                    array(
                        'id'                    => 'meta_post_wp',
                        'type'                  => 'link_color',
                        'title'                 => __('Link post meta', 'infashion'),
                        'active'                => false,
                        'output'                => array('.entry-meta span a'),
                        'default'               => array(
                                                    'regular'  => '#909090',
                                                    'hover'    => '#9e9e9e',
                        )
                    ),

                    array(
                        'id'                    => 'meta_postlink_slider',
                        'type'                  => 'link_color',
                        'title'                 => __('Link post meta in slider', 'infashion'),
                        'active'                => false,
                        'output'                => array('#slider-header .detail .entry-meta span a'),
                        'default'               => array(
                                                    'regular'  => '#c9c9c9',
                                                    'hover'    => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'primary_button_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Primary button text color', 'infashion'),
                        'active'                => false,
                        'output'                => array('#main-content a.button', 'input[type="submit"]', 'button'),
                        'default'               => array(
                                                    'regular'  => '#212121',
                                                    'hover'    => '#ffffff',
                        )
                    ),

                    array(
                        'id'                    => 'primary_button_bg_color',
                        'type'                  => 'background',
                        'title'                 => __('Primary button background color', 'infashion'),
                        'output'                => array('#main-content a.button', 'input[type="submit"]', 'button'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#ffffff',
                        )
                    ),

                    array(
                        'id'                    => 'primary_button_hover_bg_color',
                        'type'                  => 'background',
                        'title'                 => __('Primary button background hover color', 'infashion'),
                        'output'                => array('#main-content a.button:hover', '#sidebar a.button:hover', 'input[type="submit"]:hover', 'button:hover'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#212121',
                        )
                    ),

                    array( 
                        'id'                    => 'primary_button_border',
                        'type'                  => 'border',
                        'title'                 => __('Primary button border', 'infashion'),
                        'output'                => array('#main-content a.button', 'input[type="submit"]', 'button'),
                        'all'                   => true,
                        'default'               => array(
                            'border-color'            => '#333', 
                            'border-style'            => 'solid', 
                            'border-width'            => '1px',
                        )
                    ),

                    array( 
                        'id'                    => 'primary_button_hover_border',
                        'type'                  => 'border',
                        'title'                 => __('Primary button hover border', 'infashion'),
                        'output'                => array('#main-content a.button:hover', 'input[type="submit"]:hover', 'button:hover'),
                        'all'                   => true,
                        'default'               => array(
                            'border-color'            => '#333', 
                            'border-style'            => 'solid', 
                            'border-width'            => '1px',
                        )
                    ),

                    array(
                        'id'                    => 'button_form_wp',
                        'type'                  => 'link_color',
                        'title'                 => __('Text color button submit form', 'infashion'),
                        'active'                => false,
                        'output'                => array('form input[type="submit"]', 'form button'),
                        'default'               => array(
                                                    'regular'  => '#000',
                                                    'hover'    => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'post_tag_link_color_wp',
                        'type'                  => 'link_color',
                        'title'                 => __('Post tags text color ', 'infashion'),
                        'active'                => false,
                        'output'                => array('article.hentry .post-tags a'),
                        'default'               => array(
                                                    'regular'       => '#666',
                                                    'hover'         => '#000'
                        )
                    ),

                    array( 
                        'id'                    => 'sidebar_widget_title_border',
                        'type'                  => 'border',
                        'title'                 => __('Sidebar widget title border', 'infashion'),
                        'output'                => array('h4.widget-title', '.yarpp-related h3', 'h2.archive-title'),
                        'all'                   => false,
                        'top'                   => false,
                        'right'                 => false,
                        'left'                  => false,
                        'default'               => array(
                            'border-color'            => '#eee', 
                            'border-style'            => 'solid', 
                            'border-width'            => '1px'
                        )
                    ),

                    array(
                        'id'                    => 'about_author_link',
                        'type'                  => 'link_color',
                        'title'                 => __('About author widget link color', 'infashion'),
                        'active'                => false,
                        'output'                => array('.widget.about_author .social a'),
                        'default'               => array(
                                                    'regular'  => '#aaaaaa',
                                                    'hover'    => '#999999',
                        )
                    ),

                    array(
                        'id'                    => 'color_author_button_socmed',
                        'type'                  => 'link_color',
                        'title'                 => __('Social media icons in author page', 'infashion'),
                        'active'                => false,
                        'output'                => array('section#about-site .detail .social ul li a'),
                        'default'               => array(
                                                    'regular'  => '#696969',
                                                    'hover'    => '#000',
                        )
                    ),

                    array(
                        'id'                    => 'footer_social_icon_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Social network icon color in footer', 'infashion'),
                        'active'                => false,
                        'output'                => array('footer#colophone .social ul li a'),
                        'default'               => array(
                                                    'regular'  => '#bfbfbf',
                                                    'hover'    => '#bfbfbf',
                        )
                    ),

                    array(
                        'id'                    => 'color_back_to_top',
                        'type'                  => 'link_color',
                        'title'                 => __('Back to top button color', 'infashion'),
                        'active'                => false,
                        'output'                => array('footer#colophone #backtotop'),
                        'default'               => array(
                                                    'regular'  => '#000',
                                                    'hover'    => '#555',
                        )
                    ),

                    array(
                        'id'                    => 'footer_link_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Link color in footer', 'infashion'),
                        'active'                => false,
                        'output'                => array('footer#colophone a'),
                        'default'               => array(
                                                    'regular'  => '#7dc561',
                                                    'hover'    => '#ffe082',
                        )
                    ),

                    array(
                        'id'                    => 'info-main-menu',
                        'type'                  => 'info',
                        'icon'                  => 'el el-info-sign',
                        'title'                 => __('Header Color', 'infashion'),
                        'desc'                 => __('Header color settings', 'infashion'),
                    ),

                    array(
                        'id'                    => 'main_menu_bg',
                        'type'                  => 'background',
                        'title'                 => __('Main menu bar background', 'infashion'),
                        'output'                => array('#masthead'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'main_menu_sub_bg',
                        'type'                  => 'background',
                        'title'                 => __('Sub menu background', 'infashion'),
                        'output'                => array('#masthead #main-menu ul.sub-menu'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#555',
                        )
                    ),

                    array( 
                        'id'                    => 'sub_menu_border',
                        'type'                  => 'border',
                        'title'                 => __('Sub menu border', 'infashion'),
                        'output'                => array('.primary-navigation ul.sub-menu li a'),
                        'all'                   => false,
                        'top'                   => false,
                        'right'                   => false,
                        'left'                   => false,
                        'default'               => array(
                            'border-color'            => '#666', 
                            'border-style'            => 'solid', 
                            'border-width'            => '1px'
                        )
                    ),

                    array(
                        'id'                    => 'menu_link_parent_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Main menu parent link color', 'infashion'),
                        'active'                => false,
                        'output'                => array('.site-navigation ul li a'),
                        'default'               => array(
                                                    'regular'  => '#333333',
                                                    'hover'    => '#c6671a',
                        )
                    ),

                    array(
                        'id'                    => 'menu_link_sub_menu_color',
                        'type'                  => 'link_color',
                        'title'                 => __('Main menu sub menu link color', 'infashion'),
                        'active'                => false,
                        'output'                => array('.site-navigation ul.sub-menu li a'),
                        'default'               => array(
                                                    'regular'  => '#ffffff',
                                                    'hover'    => '#cccccc',
                        )
                    ),

                    array(
                        'id'                    => 'info-background-color',
                        'type'                  => 'info',
                        'icon'                  => 'el el-info-sign',
                        'title'                 => __('Background color', 'infashion'),
                    ),

                    array(
                        'id'                    => 'background-button',
                        'type'                  => 'background',
                        'title'                 => __('Background button form', 'infashion'),
                        'output'                => array('form input[type="submit"]', 'form button[type="submit"]'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'background-button-hover',
                        'type'                  => 'background',
                        'title'                 => __('Background button form hover', 'infashion'),
                        'output'                => array('form input[type="submit"]:hover', 'form button[type="submit"]:hover'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#000',
                        )
                    ),

                    array(
                        'id'                    => 'back-to-top',
                        'type'                  => 'background',
                        'title'                 => __('Background back to top', 'infashion'),
                        'output'                => array('footer#colophone #backtotop'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#fff',
                        )
                    ),

                    array(
                        'id'                    => 'background-footer',
                        'type'                  => 'background',
                        'title'                 => __('Background footer', 'infashion'),
                        'output'                => array('footer#colophone'),
                        'preview'               => false,
                        'preview_media'         => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-position'   => false,
                        'background-image'      => false,
                        'background-gradient'   => false,
                        'background-clip'       => false,
                        'background-origin'     => false,
                        'background-size'       => false,
                        'default'               => array(
                                                    'background-color'      => '#2b3338',
                        )
                    ),
                    
                    array(
                        'id'                    => 'info-border-color',
                        'type'                  => 'info',
                        'icon'                  => 'el el-info-sign',
                        'title'                 => __('Border color', 'infashion'),
                    ),

                    array( 
                        'id'                    => 'border-read-more',
                        'type'                  => 'border',
                        'title'                 => __('Border button read more', 'infashion'),
                        'output'                => array('article.hentry .inner a.white'),
                        'all'                   => true,
                        'default'               => array(
                            'border-color'            => '#000', 
                            'border-style'            => 'solid', 
                            'border-top'              => '1px',
                            'border-right'            => '1px', 
                            'border-bottom'           => '1px', 
                            'border-left'             => '1px'
                        )
                    ),

                    array( 
                        'id'                    => 'border-button-form',
                        'type'                  => 'border',
                        'title'                 => __('Border button form', 'infashion'),
                        'output'                => array('form input[type="submit"]', 'form button[type="submit"]'),
                        'all'                   => true,
                        'default'               => array(
                            'border-color'            => '#000', 
                            'border-style'            => 'solid', 
                            'border-top'              => '1px',
                            'border-right'            => '1px', 
                            'border-bottom'           => '1px', 
                            'border-left'             => '1px'
                        )
                    ),
                ),
            );


            // Social Networks
            $this->sections[] = array(
                'icon' => 'el el-user',
                'title' => __('Social Networks', 'infashion'),
                'fields' => array(
                    array(
                        'id'                    => 'author_description',
                        'type'                  => 'textarea', 
                        'title'                 => __('Author short description', 'infashion'),
                        'default'               => __('Write a short description about your self and what you do. That way your blog readers could get to know you better.', 'infashion')
                    ),

                    array(
                        'id'                => 'author_avatar',
                        'type'              => 'media', 
                        'url'               => true,
                        'title'             => __('Author avatar', 'infashion'),
                        'output'            => 'true',
                        'default'           => array('url' => get_template_directory_uri() .'/images/avatar.jpg'),
                    ),

                    array(
                        'id'                    => 'url_facebook',
                        'type'                  => 'text', 
                        'title'                 => __('Facebook profile', 'infashion'),
                        'desc'                  => __('Your Facebook profile page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_twitter',
                        'type'                  => 'text', 
                        'title'                 => __('Twitter profile', 'infashion'),
                        'desc'                  => __('Your Twitter profile page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_instagram',
                        'type'                  => 'text', 
                        'title'                 => __('Instagram profile', 'infashion'),
                        'desc'                  => __('Your Instagram profile page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_gplus',
                        'type'                  => 'text', 
                        'title'                 => __('Google+ profile', 'infashion'),
                        'desc'                  => __('Your Google+ profile page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_flickr',
                        'type'                  => 'text', 
                        'title'                 => __('Flickr profile', 'infashion'),
                        'desc'                  => __('Your Flickr profile page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_linkedin',
                        'type'                  => 'text', 
                        'title'                 => __('LinkedIn profile', 'infashion'),
                        'desc'                  => __('Your LinkedIn profile page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_pinterest',
                        'type'                  => 'text', 
                        'title'                 => __('Pinterest profile', 'infashion'),
                        'desc'                  => __('Your Pinterest page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_youtube',
                        'type'                  => 'text', 
                        'title'                 => __('YouTube profile', 'infashion'),
                        'desc'                  => __('Your YouTube video page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),

                    array(
                        'id'                    => 'url_vimeo',
                        'type'                  => 'text', 
                        'title'                 => __('Vimeo profile', 'infashion'),
                        'desc'                  => __('Your Vimeo video page.', 'infashion'),
                        'placeholder'           => 'http://',
                        'default'               => '#'
                    ),
                )
            );
        }


        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'infashion'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'infashion')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'infashion'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'infashion')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'infashion');
        }

        //  All the possible arguments for Redux.
        //  For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'             => 'infashion_option',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'         => $theme->get( 'Name' ),
                // Name that appears at the top of your panel
                'display_version'      => $theme->get( 'Version' ),
                // Version that appears at the top of your panel
                'menu_type'            => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'       => true,
                // Show the sections below the admin menu item or not
                'menu_title'           => __( 'Theme Options', 'infashion' ),
                'page_title'           => __( 'Theme Options', 'infashion' ),
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
                // Ajax save
                'ajax_save'            => true,
                // Set a different name for your global variable other than the opt_name
                'dev_mode'             => false,
                // Show the time the page took to load, etc
                'update_notice'        => true,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer'           => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority'        => 61,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'          => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'     => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon'            => get_template_directory_uri() .'/images/warrior-icon.png',
                // Specify a custom URL to an icon
                'last_tab'             => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon'            => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug'            => 'warriorpanel',
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
                'system_info'          => false,
                // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                    'hide'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/themewarrior',
                'title' => 'Like us on Facebook',
                'icon' => 'el el-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/themewarrior',
                'title' => 'Follow us on Twitter',
                'icon' => 'el el-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://themeforest.net/user/ThemeWarriors/portfolio',
                'title' => 'See our portfolio',
                'icon' => 'el el-check'
            );

            // Panel Intro text -> before the form
            $this->args['intro_text'] = __('<p>If you like this theme, please consider giving it a 5 star rating on ThemeForest. <a href="http://themeforest.net/downloads" target="_blank">Rate now</a> and <a href="http://www.themewarrior.com/purchase-confirmation/" target="_blank">confirm</a> your theme purchase.</p>', 'infashion');

            // Add content after the form.
            // $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'infashion');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}
