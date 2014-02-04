<?php
/*
 * Plugin Name: WP ezPlugins Admin UI Cleanup 1
 * Plugin URI: https://github.com/WPezPlugins/wp-ezplugins-admin-ui-cleanup-1
 * Description: Facilitates numerous changes to the WP dashboard and Admin UI in order to improve UX, data quality and application security. Please see the README for more details.
 * Version: 0.5.0
 * Author: Mark Simchock
 * Author URI: http://chiefalchemist.com
 * License: MIT
*/

/*
 * == Change Log == 
 *
 * --- 
 */
 
/**
 * Important
 * =========
 *
 * This plugin leans on a number of classes in the WP ezClasses framework (https://github.com/WPezClasses). While it can be used in production
 * "as is", it is essentially for demonstration purposes. It is presumed that you will use this plugin as a starting point for your own custom 
 * version; which will lean on WP ezClasses, of course. 
 *
 * For example, you might want a different set a presets / combinations for a particular project / client. With minimal effort you can create 
 * a custom plugin for that particular need.
 *
 * 
 */


if (!class_exists('Class_WP_ezPlugins_Admin_UI_Cleanup_1')) {
	class Class_WP_ezPlugins_Admin_UI_Cleanup_1 extends Class_WP_ezClasses_Master_Singleton {
		
		
		protected function __construct(){
			parent::__construct();
		}
		
		
		public function ezc_init($arr_args = NULL){
		
			add_action('init', array($this, 'admin_ui_cleanup_1_init'));
		}
		
		/*
		 *
		 */
		public function admin_ui_cleanup_1_init(){
			
			$obj_new_admin_cleanup_presets = Class_WP_ezClasses_Admin_UI_Cleanup_1_Presets_1::ezc_get_instance();	
			/*
			 * If you look in Class_WP_ezClasses_Admin_UI_Cleanup_1_Presets_1 you see there are individual "presets"
			 * and then there are "combinations" that bundle those. This (demo) plugin uses the 'all' bundle. 
			 */
			$arr_admin_cleanup_combos = $obj_new_admin_cleanup_presets->admin_ui_cleanup_presets_combinations('all');
			/*
			 * Use the combination bundle to get a set (i.e., array) of presets
			 */
			$arr_admin_ui_cleanup_presets_methods = $obj_new_admin_cleanup_presets->admin_ui_cleanup_presets($arr_admin_cleanup_combos);
			
			$obj_new_admin_ui_cleanup = Class_WP_ezClasses_Admin_UI_Cleanup_1::ezc_get_instance();
			/*
			 *
			 */
			$obj_new_admin_ui_cleanup->cleanup_do($arr_admin_ui_cleanup_presets_methods);
		
		}
	
		
	} // close class
} // close if class exists
			
$obj_new_init_admin_ui_cleanup_1 = Class_WP_ezPlugins_Admin_UI_Cleanup_1::ezc_get_instance();

?>
