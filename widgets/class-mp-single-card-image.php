<?php
/**
 * MP_Single_Card class.
 *
 * @category   Class
 * @package    ElementorMPAddons
 * @subpackage WordPress
 * @author     Priyanka behera
 * @since      1.0.0
 */

namespace ElementorMPAddons\SingleCardImage;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * MPAddons widget class.
 *
 * @since 1.0.0
 */
class MP_Single_Card_Image extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'mp-single-card-image', plugins_url( '/assets/css/mp-single-card-image.css', ELEMENTOR_MP_ADDONS ), array(), '1.0.0' );
	}

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
		return 'mp_single_card_image';
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
		return __( 'MP Single Card With Image', 'elementor-mp-addons' );
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
		return 'eicon-image-box';
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
		return array( 'general' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'mp-single-card-image' );
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
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor-mp-addons' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-mp-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'elementor-mp-addons' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'elementor-mp-addons' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => __( 'Content', 'elementor-mp-addons' ),
			)
		);

		$this->add_control(
			'link_text',
			array(
				'label'   => __( 'Link Text', 'elementor-mp-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'elementor-mp-addons' ),
			)
		);

		$this->add_control(
			'link',
			array(
				'label'   => __( 'Link', 'elementor-mp-addons' ),
				'type'    => Controls_Manager::URL,
			)
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-mp-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );
		
		?>
		<img src="<?php echo esc_url( $settings['image']['url'] ) ?>" alt="">		
		<h2>
			<?php echo $settings['title']; ?>
		</h2>
		<div>
			<?php echo $settings['content']; ?>
		</div>
		
		<a href="<?php echo $settings['link']['url']; ?>"><?php echo $settings['link_text']; ?></a>
		
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
	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'none' );
		view.addInlineEditingAttributes( 'content', 'advanced' );
		#>
		<img src="{{{ settings.image.url }}}">		
		<h2>{{{ settings.title }}}</h2>
		<div>{{{ settings.content }}}</div>	
		<a href="{{{ settings.link.url }}}">{{{ settings.link_text }}}</a>
		<?php
	}
}
