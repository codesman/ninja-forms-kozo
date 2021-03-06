<?php if ( ! defined( 'ABSPATH' ) or ! class_exists( 'NF_Notification_Base_Type' ) ) exit;

final class NF_Action_{{NAME}} extends NF_Notification_Base_Type
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $slug = '{{name}}';



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->name = __( '{{Name}}', NF_{{NAME}}::TEXTDOMAIN );

        add_filter( 'nf_notification_types', array( $this, 'register_action_type' ) );
    }


    /**
     * Register Action Type
     *
     * @param $types
     * @return array
     */
    public function register_action_type( $types )
    {
        $types[ $this->slug ] = $this;
        return (array) $types;
    }



    /**
     * Edit Screen
     *
     * @return void
     */
    public function edit_screen( $id = '' )
    {
        $settings['example'] = Ninja_Forms()->notification( $id )->get_setting( 'example' );

        include NF_{{NAME}}::$dir . 'includes/templates/action-{{name}}.html.php';
    }



    /**
     * Process
     *
     * @param string $id
     * @return void
     */
    public function process( $id = '' )
    {
        //Process Action Here
    }
}

new NF_Action_{{NAME}}();
