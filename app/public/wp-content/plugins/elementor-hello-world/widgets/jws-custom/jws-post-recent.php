<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class PostRecent extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Jws-post-recent';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Jws-post-recent', 'consbie' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-test' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_product',
			[
				'label' => __( 'Product', 'consbie' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '6',
				'mobile_default' => '12',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'prefix_class' => 'ee-grid-columns%s-',
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Actually its `image_size`.
				'label' => __( 'Image Size', 'consbie' ),
				'default' => 'large',
                'exclude' 		=> [ 'custom' ],
			]
        );

		$this->add_control(
			'show_category',
			[
				'label' => __( 'Show Category', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'show_decription',
			[
				'label' => __( 'Show Decription', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'studiess_per_words',
			[
				'label' => __( 'Posts Per Words', 'elementor-hello-world' ),
				'type' => Controls_Manager::NUMBER,
                'default' => '50',
                'condition' 	=> [
					'show_decription!'	=> '',
				],
			]
		);
		$this->add_control(
			'show_reading_contlnue',
			[
				'label' => __( 'Show Button', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'consbie' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'consbie' ),
                'placeholder' => __( 'Click me', 'consbie' ),
                'condition' 	=> [
					'show_reading_contlnue!'	=> '',
				],
			]
		);
		$this->add_control(
			'icon-button',
			[
				'label' => __( 'Icon Button', 'consbie' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
                'default' => '',
                'condition' 	=> [
					'show_reading_contlnue!'	=> '',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_query',
			[
				'label' => __( 'Query', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Orderby', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => [
					'studies_date' => 'Date',
					'menu_order' => 'Menu Order',
					'studies_title' => 'Title',
					'rand' => 'Random',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => 'ASC',
					'DESC' => 'DESC',
				],
			]
		);
		
        $this->end_controls_section();

		// Post 
		$this->start_controls_section(
			'section_studies',
			[
				'label' => __( 'Post', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'consbie' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'consbie' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'consbie' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'consbie' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'consbie' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_transform_studies',
			[
				'label' => __( 'Text Transform', 'elementor-hello-world' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'elementor-hello-world' ),
					'uppercase' => __( 'UPPERCASE', 'elementor-hello-world' ),
					'lowercase' => __( 'lowercase', 'elementor-hello-world' ),
					'capitalize' => __( 'Capitalize', 'elementor-hello-world' ),
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-studies' => 'text-transform: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_studies_style' );
		$this->start_controls_tab(
			'tab_studies_normal',
			[
				'label' => __( 'Normal', 'consbie' ),
			]
		);

		$this->add_control(
			'text_color_studies',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-studies' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_studies',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-studies' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_studies_hover',
			[
				'label' => __( 'Hover', 'consbie' ),
			]
		);

		$this->add_control(
			'hover_studies_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-studies:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'studies_background_hover_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-studies:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->add_control(
			'text_margin_studies',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-studies' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_studies',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-studies' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_studies',
				'label' => __( 'Border', 'consbie' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-studies',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .elementor-studies',
			]
		);

		$this->end_controls_section();

        // category
        
        $this->start_controls_section(
			'section_category_style',
			[
				'label' => __( 'Category', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-category',
				
				'selector' => '{{WRAPPER}} .studies-category',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-category',
				'selector' => '{{WRAPPER}} .studies-category',
			]
		);

		$this->add_control(
			'text_color-category',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .studies-category' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_category',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_category',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// title

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-title',
				
				'selector' => '{{WRAPPER}} .studies-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-title',
				'selector' => '{{WRAPPER}} .studies-title',
			]
		);

		$this->add_control(
			'text_color-title',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .studies-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_title',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_title',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// decription

		$this->start_controls_section(
			'section_decription_style',
			[
				'label' => __( 'Decription', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-decription',
				
				'selector' => '{{WRAPPER}} .studies-decription',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-decription',
				'selector' => '{{WRAPPER}} .studies-decription',
			]
		);

		$this->add_control(
			'text_color-decription',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .studies-decription' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_decription',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-decription' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_decription',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-decription' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// button

		$this->start_controls_section(
			'section_botton',
			[
				'label' => __( 'Button', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'consbie' ),
				
				'selector' => '{{WRAPPER}} studies-link__text',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'consbie' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .studies-link__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .studies-link__text' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'consbie' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .studies-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .studies-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .studies-link:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'consbie' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'consbie' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .studies-link__text',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .studies-link__text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .studies-link__text',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					' {{WRAPPER}} .studies-link__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Button Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					' {{WRAPPER}} .studies-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 4, // Number of recent posts thumbnails to display
            'post_status' => 'publish' // Show only the published posts
		));
		?>
		<div class="row">
		<?php
        foreach($recent_posts as $post) : ?>
            <div class="col-<?php echo $settings['columns_mobile'] ?> col-lg-<?php echo $settings['columns_tablet'] ?> col-xl-<?php echo $settings['columns'] ?>">
                <a href="<?php echo get_permalink($post['ID']) ?>">
                    <?php echo get_the_post_thumbnail($post['ID'], 'full'); ?>
                    <p class="slider-caption-class"><?php echo $post['post_title'] ?></p>
                    <p class="slider-caption-class"><?php echo get_the_date('M d, Y', $post['ID'])?></p>
                </a>
            </li>
        <?php endforeach; wp_reset_query(); ?>
		</div>

          <?php
    }  

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
    
     
    protected function render_thumbnail() {
		$settings = $this->get_settings();
		?>
			<a href="<?php the_permalink()?>"><?php the_post_thumbnail($settings['image_size'])?></a>
		<?php
    }
    
    protected function render_open_div() {
        ?><div class="studies-info"> <?php
    }
    
    protected function render_category() {
        if ( ! $this->get_settings( 'show_category' ) ) {
			return;
		}
		?>
			<p class="studies-category"><?php echo get_the_term_list(get_the_ID(), 'studies_cat', '', ', '); ?></p>
		<?php
	}
	protected function render_title() {
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?><a href="<?php the_permalink() ?>">
				<p class="studies-title"><?php the_title() ?></p>
			</a>
		<?php
	}
	protected function render_excerpt() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_decription' ) ) {
			return;
		}
		?>
		<div class="studies-decription"><?php echo wp_trim_words( get_the_excerpt(), $settings['studiess_per_words'] , '...' ) ?></div>
		<?php
	}

	protected function render_button() {

		if ( ! $this->get_settings( 'show_reading_contlnue' ) ) {
			return;
		}
		$settings = $this->get_settings();

		$this->add_render_attribute( 'text', 'class', 'elementor-button-text' );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<div class="studies-link">
			<a href="<?php the_permalink() ?>">
				<span class="studies-link__text" ><?php echo $settings['text']; ?>
					<?php if ( ! empty( $settings['icon-button'] ) ) : ?>
						<i class="<?php echo esc_attr( $settings['icon-button'] ); ?>" aria-hidden="true"></i>
					<?php endif; ?>
				</span>
			</a>
		</div>
		
		<?php
	}

    protected function render_close_div() {
        ?></div> <?php
    }

	protected function render_studies() {
        $this->render_thumbnail();
        $this->render_open_div();
        $this->render_category();
		$this->render_title();
        $this->render_close_div();

	}
    
    
	protected function _content_template() {
		
	}
}
