<?php

namespace widget_loader;

/* The Card3d class is a Elementor widget that extends the Widget_Base class in the Elementor plugin for
WordPress. */

class Card3d extends \Elementor\Widget_Base {

    public function get_name() {
        return '3d_card';
    }

    public function get_title() {
        return esc_html__('3D Card', 'elementor-addon');
    }

    public function get_icon() {
        return 'eicon-slider-3d';
    }

    public function get_categories() {
        return array('basic');
    }

    public function get_keywords() {
        return array('3d', 'card', 'slider');
    }

    /**
     * START CONTROLS 
     * The function "register_controls" is used to define the controls and settings for an Elementor
     * widget in a WordPress plugin.
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            array(
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_title',
            array(
                'label'       => esc_html__('Title', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Default title', 'plugin-name'),
                'placeholder' => esc_html__('Type your title here', 'plugin-name'),
            )
        );
        $repeater->add_control(
            'card_subtitle',
            array(
                'label'       => esc_html__('Subtitle', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Default sub title', 'plugin-name'),
                'placeholder' => esc_html__('Type your subtitle here', 'plugin-name'),
            )
        );

        $repeater->add_control(
            'card_description',
            array(
                'label'       => esc_html__('Card Description', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 10,
                'default'     => esc_html__('Default description about the person will be here. this is a dumy discription , just to show the place where will be the card discription....', 'plugin-name'),
                'placeholder' => esc_html__('Type your description here', 'plugin-name'),
            )
        );

        // $repeater->add_control(
        // 'card_btn',
        // [
        // 'label' => esc_html__('Delete Content', 'textdomain'),
        // 'type' => \Elementor\Controls_Manager::BUTTON,
        // 'separator' => 'before',
        // 'button_type' => 'success',
        // 'text' => esc_html__('Delete', 'textdomain'),
        // 'event' => 'namespace:editor:delete',
        // ]
        // );
        $repeater->add_control(
            'card_btn_text',
            array(
                'label'       => esc_html__('Button Text', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Read more', 'plugin-name'),
                'placeholder' => esc_html__('Type your card button text here', 'plugin-name'),
            )
        );

        $repeater->add_control(
            'card_link',
            array(
                'label'       => esc_html__('Button Link', 'textdomain'),
                'type'        => \Elementor\Controls_Manager::URL,
                'options'     => array('url', 'is_external', 'nofollow'),
                'default'     => array(
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ),
                'label_block' => true,
                'dynamic'     => array(
                    'active' => true,
                ),
            )
        );

        $repeater->add_control(
            'card_image',
            array(
                'label'   => esc_html__('Choose Image', 'plugin-name'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
            )
        );

        $this->add_control(
            'list',
            array(
                'label'       => esc_html__('card List', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'card_title'       => esc_html__('Title #1', 'plugin-name'),
                        'card_subtitle'    => esc_html__('Subtitle one', 'plugin-name'),
                        'card_discription' => esc_html__('Item content. Click the edit button to change this text.', 'plugin-name'),
                    ),
                    array(
                        'card_title'       => esc_html__('Title #2', 'plugin-name'),
                        'card_subtitle'    => esc_html__('Subtitle two', 'plugin-name'),
                        'card_discription' => esc_html__('Item content. Click the edit button to change this text.', 'plugin-name'),
                    ),
                    array(
                        'card_title'       => esc_html__('Title #3', 'plugin-name'),
                        'card_subtitle'    => esc_html__('Subtitle two', 'plugin-name'),
                        'card_discription' => esc_html__('Item content. Click the edit button to change this text.', 'plugin-name'),
                    ),
                ),
                'title_field' => '{{{ card_title }}}',
            )
        );

        $this->end_controls_section();

        // =========== Style section ============
        $this->start_controls_section(
            'genaral_style',
            array(
                'label' => esc_html__('Genaral Style', 'textdomain'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'card3d_position',
            array(
                'label'        => esc_html__('Content Position', 'elementor'),
                'type'         => \Elementor\Controls_Manager::CHOOSE,
                'default'      => 'top',
                'options'      => array(
                    'flex-start' => array(
                        'title' => esc_html__('Top', 'elementor'),
                        'icon'  => 'eicon-v-align-top',
                    ),
                    'center'     => array(
                        'title' => esc_html__('Center', 'elementor'),
                        'icon'  => 'eicon-v-align-middle',
                    ),
                    'flex-end'   => array(
                        'title' => esc_html__('Bottom', 'elementor'),
                        'icon'  => 'eicon-v-align-bottom',
                    ),
                ),
                'prefix_class' => 'elementor-position-',
                'toggle'       => false,
                'selectors'    => array(
                    '{{WRAPPER}} .dp_item' => ' align-items: {{VALUE}};',
                ),

            )
        );

        $this->add_control(
            'card3d_color',
            array(
                'label'     => esc_html__('Slider Color', 'textdomain'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .dp_item'  => ' border-top: 5px solid {{VALUE}}',
                    '{{WRAPPER}} .cls-1'    => ' stroke: {{VALUE}}',
                    '{{WRAPPER}} .site-btn' => ' background-color: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_section();
        // content styling
        $this->start_controls_section(
            'content_style',
            array(
                'label' => esc_html__('Content Style', 'textdomain'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'label'    => esc_html__('Title Typography', 'textdomain'),
                'name'     => 'card_title_typography',
                'selector' => '{{WRAPPER}} .card3d_title',
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'label'    => esc_html__('Subtitle Typography', 'textdomain'),
                'name'     => 'card_subtitle_typography',
                'selector' => '{{WRAPPER}} .card3d_subtitle',
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'label'    => esc_html__('Description Typography', 'textdomain'),
                'name'     => 'card_description_typography',
                'selector' => '{{WRAPPER}} .card3d_description',
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(

                'label'    => esc_html__('Button Typography', 'textdomain'),
                'name'     => 'card_btn_typography',
                'selector' => '{{WRAPPER}} .site-btn',
            )
        );
        $this->end_controls_section();
    }


    /**
     * The `render()` function in PHP is used to display a slider with dynamic content.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        // show content
?>
        <div class="slider">
            <div class="dp-wrap">
                <div class="dp-slider3d">
                    <?php
                    if ($settings['list']) {
                        $i = 1;
                        foreach ($settings['list'] as $item) {
                    ?>
                            <?php echo "<div class='dp_item' data-class='$i' data-position='$i'>"; ?>
                            <div class="dp-content">
                                <h2 class="card3d_title"> <?php echo $item['card_title']; ?> </h2>
                                <h5 class="card3d_subtitle"> <?php echo $item['card_subtitle']; ?> </h5>
                                <p class="card3d_description"> <?php echo  $item['card_description']; ?> </p>
                                <a href="<?php echo esc_url($item['card_link']['url']); ?>" class="site-btn"><?php echo $item['card_btn_text']; ?></a>

                            </div>
                            <div class="dp-img">
                                <img class="img-fluid" src="<?php echo esc_url($item['card_image']['url']); ?>" alt="investing">
                            </div>
                </div>

        <?php
                            $i += 1;
                        }
                    }

        ?>

            </div>

            <span class="dp-next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.401 51.401">

                    <path id="Rectangle_4_Copy" data-name="Rectangle 4 Copy" class="cls-1" d="M32.246,0V33.178L0,31.953" transform="translate(0.094 25.276) rotate(-45)" />
                </svg>
            </span>

            <span class="dp-prev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.401 51.401">

                    <path id="Rectangle_4_Copy" data-name="Rectangle 4 Copy" class="cls-1" d="M32.246,0V33.178L0,31.953" transform="translate(0.094 25.276) rotate(-45)" />
                </svg>
            </span>

        </div>
        </div>

    <?php
    }


    /**
     * The  content_template() function is used to show to changes instently .
     */
    protected function content_template() {
    ?>
        <div class="slider">
            <div class="dp-wrap">
                <div class="dp-slider3d">
                    <# if ( settings.list ) { #>
                        <# _.each( settings.list, function( item, index ) { #>
                            <div class="dp_item" data-class="{{ index + 1 }}" data-position="{{ index + 1 }}">
                                <div class="dp-content">
                                    <h2 class="card3d_title">{{{ item.card_title }}}</h2>
                                    <h5 class="card3d_subtitle">{{{ item.card_subtitle }}}</h5>
                                    <p class="card3d_description">{{{ item.card_description }}}</p>
                                    <a href="{{ item.card_link.url }}" class="site-btn">{{ item.card_btn_text }}</a>
                                </div>
                                <div class="dp-img">
                                    <img class="img-fluid" src="{{ item.card_image.url }}" alt="investing">
                                </div>
                            </div>
                            <# }); #>
                                <# } #>
                </div>

                <span class="dp-next">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.401 51.401">
                        <path id="Rectangle_4_Copy" data-name="Rectangle 4 Copy" class="cls-1" d="M32.246,0V33.178L0,31.953" transform="translate(0.094 25.276) rotate(-45)" />
                    </svg>
                </span>

                <span class="dp-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.401 51.401">

                        <path id="Rectangle_4_Copy" data-name="Rectangle 4 Copy" class="cls-1" d="M32.246,0V33.178L0,31.953" transform="translate(0.094 25.276) rotate(-45)" />
                    </svg>
                </span>
            </div>
        </div>
<?php
    }
}
