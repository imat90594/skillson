<?php


function skillson_fboauth_action__connect($variables) {
	$action = $variables['action'];
	$link = $variables['properties'];
	$url = url($link['href'], array('query' => $link['query']));
	$link['attributes']['class'] = isset($link['attributes']['class']) ? $link['attributes']['class'] : 'facebook-action-connect';
	$link['attributes']['rel'] = 'nofollow';
	$attributes = isset($link['attributes']) ? drupal_attributes($link['attributes']) : '';
	$title = isset($link['title']) ? check_plain($link['title']) : '';
	$src = ($GLOBALS['is_https'] ? 'https' : 'http') . '://www.facebook.com/images/fbconnect/login-buttons/connect_light_medium_short.gif';
	return '<a ' . $attributes . ' href="' . $url . '"><img src="/sites/all/themes/skillson/img/theme/fb.png" alt="' . $title . '" /></a>';
}
//--------------------------------------------------------------------------------------------------------------------------------

function skillson_preprocess_html (&$variables) {
}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_preprocess_page (&$variables) {
	global $user;
	_daisyflo_page_title($variables);
	check_new_notification();
	
	//check if front page
	if (drupal_is_front_page()) {
		if (!$user->uid) {
			header('location: /user/login');
		}
	}

	//this is inside lessons listing
	if (arg(0) == 'node' && arg(2) == 'quizzes' && !arg(3)) {
		$course_id = arg(1);
		$variables['_course_id'] = $course_id;
	}
	
	if ($node = menu_get_object()) {
		// Get the nid
		$nid = $node->nid;
	}
	
	if (isset($variables['action_links'])) {
		
		//change the start url to node/%/quizzes to change the landing destination upon quiz start
		//$variables['action_links'][0]['#link']['href'] = 'node/' .
		//$nid . '/quizzes';
	}
	
	if (isset($variables['node']))
		$variables['content_type'] = $variables['node']->type;
	
	if (isset($variables['page']['#contextual_links']['views_ui'])) {
		if ($variables['page']['#contextual_links']['views_ui'][1][0] == 'opigno_quizzes') {
			$variables['content_type'] = 'quiz';
		}
	}
	
	if (arg(0) != 'checkout')
		$variables['main_navigation'] = _daisyflo_get_main_navigation();
}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_preprocess_block (&$variables) {

}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_preprocess_node (&$variables) {
	if (arg(2) == 'quizzes' && arg(3) == NULL) {
	}	unset($variables['content']['fields']); //remove the side info block of Courses
}
//--------------------------------------------------------------------------------------------------------------------------------
//keep this code for merge
function skillson_preprocess_views_view (&$variables) {
	$theme_path = drupal_get_path('theme', 'daisyflo');
	if ($variables['view']->name == 'courses_results') {
		drupal_add_js($theme_path.'/js/vendor/chartjs/Chart.min.js');		
		drupal_add_js($theme_path.'/js/chart.script.js');
	}
}//--------------------------------------------------------------------------------------------------------------------------------
function skillson_theme() {
	
	return array(
		'opigno_tool' => array(
				'variables' => array('tool' => NULL, 'course' => NULL),
				'template' => 'templates/base-theme-overrides/opigno--tool',
	),
		'opigno_tools' => array(
				'variables' => array('tools' => NULL, 'course' => NULL),
				'template' => 'templates/base-theme-overrides/opigno--tools',
	),
		
		'commerce_checkout_form_checkout' => array(
			'render element' => 'form',
	      	'template' 		 => 'commerce-checkout-form-checkout',
		    'path' 			 => drupal_get_path('theme', 'skillson') . '/templates/pages/commerce',
	),
	
			'commerce_checkout_form_complete' => array(
			'render element' => 'form',
	      	'template' 		 => 'commerce_checkout_form_complete',
		    'path' 			 => drupal_get_path('theme', 'skillson') . '/templates/pages/commerce',
	),
	
	
		'user_profile_form' => array(
	      'arguments' => array('form' => NULL),
	      'render element' => 'form',
	      'template' => 'user-profile-edit',
	      'path' 			 => drupal_get_path('theme', 'skillson') . '/templates/pages/user-profile',
	),
	
		'user_login' => array(
	      'arguments' => array('form' => NULL),
	      'render element' => 'form',
	      'template' => 'user-login',
	      'path' 			 => drupal_get_path('theme', 'skillson') . '/templates/pages/user',
	),
	
	
		'user_register_form' => array(
	      'arguments' => array('form' => NULL),
	      'render element' => 'form',
	      'template' => 'user_register_form',
	      'path' 			 => drupal_get_path('theme', 'skillson') . '/templates/pages/user',
	),
	
	
	
		'user_pass' => array(
				      'arguments' => array('form' => NULL),
				      'render element' => 'form',
				      'template' => 'user-pass',
				      'path' 			 => drupal_get_path('theme', 'skillson') . '/templates/pages/user',
	),
	
		'mailchimp_signup_subscribe_block_careertastic_subscriber_form'=> array(
			      'render element' => 'form',
			      'template' => 'subscriber-form',
			  	  'path' 	=> drupal_get_path('theme', 'skillson') . '/templates/mailchimp',
	),
	
		
	);
	
}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_theme_registry_alter(&$registry) {
	$path = drupal_get_path('theme', 'daisyflo');
	$registry['opigno_tool']['template'] = "$path/templates/base-theme-overrides/opigno--tool";
	$registry['opigno_tools']['template'] = "$path/templates/base-theme-overrides/opigno--tools";
	$registry['opigno_tool']['theme path'] = $registry['opigno_tools']['theme path'] = $path;
}
//--------------------------------------------------------------------------------------------------------------------------------
function _daisyflo_get_main_navigation() {
	$html = '';	$items = _platon_get_main_navigation_items();	$items_per_col = 2;
	foreach ($items as $index => $item) {
		$row_html .= theme('platon__main_navigation__item', array('item' => $item));
	}
	if (!empty($row_html)) {
		$html .= theme('platon__main_navigation__row', array('items' => $row_html));
	}
	return $html;}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_form_commerce_checkout_form_checkout_alter(&$form, &$form_state, $form_id) {
	$form['buttons']['continue']['#value'] = "PLACE ORDER";
}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_element_info_alter(&$elements) {
	foreach ($elements as &$element) {
		// Process all elements.		$element['#process'][] = '_bootstrap_process_element';
		// Process input elements.		if (!empty($element['#input'])) {
			$element['#process'][] = '_bootstrap_process_input';
	}
}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_breadcrumb($variables) {
	if (empty($breadcrumb)) {
		return NULL;
	}
	// These settings may be missing, if theme('breadcrumb') is called from	// somewhere outside of Crumbs, or if another module is messing with the theme	// registry.
	$variables += array(
			'crumbs_trailing_separator' => FALSE,			'crumbs_separator' => ' &raquo; ',			'crumbs_separator_span' => FALSE,
	);
	$separator = $variables['crumbs_separator'];
	if ($variables['crumbs_separator_span']) {
		$separator = '<span class="crumbs-separator">' . $separator . '</span>';
	}
	$output = implode($separator, $breadcrumb);
	if ($variables['crumbs_trailing_separator']) {
		$output .= $separator;
	}
	$output = '<div class="breadcrumb">' . $output . '</div>';
	// Provide a navigational heading to give context for breadcrumb links to	// screen-reader users. Make the heading invisible with .element-invisible.
	return '<h2 class="element-invisible">' . t('You are here') . '</h2>' . $output;
}
//--------------------------------------------------------------------------------------------------------------------------------
function skillson_css_alter(&$css) {
	global $user;
	if (!in_array('administrator', $user->roles)) {
		unset($css['sites/all/themes/daisyflo/css/styles.css']);
	}
}
//--------------------------------------------------------------------------------------------------------------------------------
function _bootstrap_process_element(&$element, &$form_state) {
	if (!empty($element['#attributes']['class']) && is_array($element['#attributes']['class'])) {
		if (in_array('container-inline', $element['#attributes']['class'])) {
			$element['#attributes']['class'][] = 'form-inline';
		}
		if (in_array('form-wrapper', $element['#attributes']['class'])) {
			$element['#attributes']['class'][] = 'form-group';
		}
	}
	return $element;
}
//--------------------------------------------------------------------------------------------------------------------------------
/**
 * Process input elements.
 */
function _bootstrap_process_input(&$element, &$form_state) {
	// Only add the "form-control" class for specific element input types.
	$types = array(
	// Core.
    'password',    'password_confirm',    'select',    'textarea',    'textfield',	// Elements module.    'emailfield',    'numberfield',    'rangefield',    'searchfield',    'telfield',    'urlfield',
	);
	if (!empty($element['#type']) && (in_array($element['#type'], $types) || ($element['#type'] === 'file' && empty($element['#managed_file'])))) {
		$element['#attributes']['class'][] = 'form-control';
	}
	return $element;
}
//--------------------------------------------------------------------------------------------------------------------------------
function _daisyflo_get_scores($course_id, $uid) {
	/*
	$lessons = opigno_quiz_app_course_lessons($course_id); //get quizzes within a course	//$nid = opigno_quiz_app_course_lessons_progress_and_time(3);//get progress and time	//$nid = opigno_quiz_app_get_score_data($nid[3], $user->uid);	//$nid = quiz_get_score_data(array(39), $user->uid);	
	foreach ($lessons as $course_nid => $quizs) {
		foreach ($quizs as $quiz_id => $quiz) {
			$score = quiz_get_score_data(array($quiz_id), $uid);			$lessons_[$course_nid][$quiz['vid']]=$score[$quiz['vid']];			$total_time=0;			$all_scores = opigno_quiz_app_get_score_data(array($quiz_id), $uid);
		}
	}*/
	/*	 * taken from opigno quiz app	 */
	$lessons = opigno_quiz_app_course_lessons($course_id);	
	$node = node_load($course_id);	
	$course_quiz_details = opigno_quiz_app_get_all_required_quizzes($node);
	$lessons_=array();
	foreach ($lessons as $course_nid => $quizs) {
		foreach ($quizs as $quiz_id => $quiz) {
			
			$score = quiz_get_score_data(array($quiz_id), $uid);			
			$lessons_[$course_nid][$quiz['vid']]=$score[$quiz['vid']];			
			$total_time=0;			
			$all_scores = opigno_quiz_app_get_score_data(array($quiz_id), $uid);
			
			foreach ($all_scores as $quiz_nid => $results) {
				foreach ($results as $rid => $score) {
					if ($score->time_end != 0) {
						if (!isset($quiz_total_time[$quiz_nid])) {
							$quiz_total_time[$quiz_nid] = 0;
						}
						$total_time += $score->time_end - $score->time_start;						
						$quiz_total_time[$quiz_nid] += $score->time_end - $score->time_start;
					}
				}
			}
			$lessons_[$course_nid][$quiz['vid']]->total_time = $total_time;			
			$lessons_[$course_nid][$quiz['vid']]->quiz_id = $quiz_id;			
			$lessons_[$course_nid][$quiz['vid']]->type = $course_quiz_details[$quiz_id]->quiz_type['und'][0]['value']; //get quiz type
			/*$lessons_[$course_nid][$quiz['vid']]->quiz_details = $course_quiz_details[$quiz_id];*/
		}
	}
	$displayinfo=array();	
	$displayinfo['courses']=$lessons_;	
	return $displayinfo;
}
//--------------------------------------------------------------------------------------------------------------------------------
function _daisyflo_is_course_taken($course_id, $uid) {
	$course_results = _daisyflo_get_scores($course_id, $uid);	$flag = false;	$last_quiz_id = NULL;
	foreach ($course_results['courses'] as $course_nid => $course) {
		foreach ($course as $quiz_vid => $quiz) {
			 if ($quiz->percent_score !== NULL)
			 	$flag = true;
			 if ($flag)
			 	if ($quiz->percent_score === NULL)
			 		break;
			$last_quiz_id = $quiz->quiz_id;
		}	}
	if ($flag)
		return $last_quiz_id;
	return $flag;
}
//--------------------------------------------------------------------------------------------------------------------------------
function _daisyflo_get_course_progress($course_id, $uid) {
	
	$course_results = _daisyflo_get_scores($course_id, $uid);	$count_progress = 0;	$count_total = 0;	$last_quiz_id = NULL;
	foreach ($course_results['courses'] as $course_nid => $course) {
		foreach ($course as $quiz_vid => $quiz) {
			$count_total++;
			if ($quiz->percent_score >= $quiz->percent_pass) {
				$count_progress++;
			}
		}
	}
	if ($count_progress == 0)		return $count_progress;
	return round(($count_progress/$count_total) * 100, 2);
}
//--------------------------------------------------------------------------------------------------------------------------------
function _daisyflo_sidenav ($label) {
	
	if (strtolower(arg(0)) == strtolower($label)) {
		return "active";
	}
	return null;
}
//--------------------------------------------------------------------------------------------------------------------------------
function _deisyflo_context_nav () {
	if (module_exists('og_context')) {
		$group = og_context('node');
		if (!empty($group['gid'])) {
			$tabs = array();
			foreach (array(
					"node/{$group['gid']}" => array(
							'title' => "",							'class' => 'platon-og-context-view-tab platon-og-context-home-tab',
					),
					"node/{$group['gid']}/edit" => array(
							'class' => 'platon-og-context-view-tab platon-og-context-settings-tab',							'query' => array('destination' => current_path()),
					),
					"node/{$group['gid']}/group" => array(
							'class' => 'platon-og-context-view-tab platon-og-context-users-tab',
					),
					"node/{$group['gid']}/tools" => array(
							'class' => 'platon-og-context-view-tab platon-og-context-tools-tab',
					),
					// Ajout du menu trier les cours - Cédric - 10.09.2014
					"node/{$group['gid']}/sort_courses" => array(
							'class' => 'platon-og-context-view-tab platon-og-context-sort-tab',
					),
			) as $path => $override) {
				$link = menu_get_item($path);
				if (!empty($link) && $link['access']) {
					if (!empty($override['title'])) {
						$link['title'] = $override['title'];
					}
					if (!empty($override['class'])) {
						$link['options']['attributes']['class'][] = $link['localized_options']['attributes']['class'][] = $override['class'];
					}
					if (!empty($override['query'])) {
						if (!isset($link['options']['query'])) {
							$link['options']['query'] = array();
						}
						if (!isset($link['localized_options']['query'])) {
							$link['localized_options']['query'] = array();
						}
						$link['localized_options']['query'] += $override['query'];						$link['options']['query'] += $override['query'];
					}
					$link['options']['attributes']['title']= $link['localized_options']['attributes']['title']=$link['title'];//Ajout Axel
					$link['title'] = ''; //Ajout Axel
					$tabs[] = array(
							'#theme' => 'menu_local_task',							'#link' => $link,							'#active' => TRUE,
					);				}			}		}	}}
					
					//--------------------------------------------------------------------------------------------------------------------------------
					
					
					function _daisyflo_page_title(&$variables) {		
						
						$variables['_page_title'] = 'Course';
						$variables['_page_class'] = 'page-class';
						
						$arg = explode('/', request_path());
						
						if (strtolower(arg(0)) == 'my-courses') {			
							
							$variables['_page_title'] = 'Dashboard';
							$variables['_page_class'] = 'dashboard-page';
							
						} elseif (strtolower(arg(0)) == 'notification') {		
							
							$variables['_page_title'] = 'Notifications';		
							$variables['_page_class'] = 'notifications-page';
							
						} elseif (strtolower(arg(0)) == 'events') {			
							
							$variables['_page_title'] = 'Events';	
							$variables['_page_class'] = 'events-page';
							
						} elseif (strtolower(arg(0)) == 'certificates') {		
							
							$variables['_page_title'] = 'Certificates';			
							$variables['_page_class'] = 'certificates-page';
							
						} elseif (strtolower(arg(0)) == 'courses-results') {		
							
							$variables['_page_title'] = 'Courses Results';		
							$variables['_page_class'] = 'courses-results-page';
							
						} elseif (strtolower(arg(0)) == 'referrals') {			
							
							$variables['_page_title'] = 'Referrals';			
							$variables['_page_class'] = 'referrals-page';
							
						} elseif (strtolower(arg(0)) == 'user' && strtolower(arg(2)) == 'edit') {		
							
							$variables['_page_title'] = 'Manage Account';			
							$variables['_page_class'] = 'manage-account-page';
							
						} elseif (strtolower(arg(0)) == 'subscribe') {
							
							$variables['_page_title'] = 'Social and Newsletter';	
							$variables['_page_class'] = 'social-and-newsletter-page';
							
						} elseif (strtolower(arg(0)) == 'checkout') {	
							
							$variables['_page_title'] = 'Checkout';		
							$variables['_page_class'] = 'checkout-page';
							
						} elseif (strtolower($arg[0]) == 'course') {
							
							$variables['_page_class'] = 'page-'.$arg[0];
							
						} elseif (strtolower(arg(0)) == 'node' && strtolower(arg(2)) == 'take') {
							
							$variables['_page_class'] = 'quiz-page';
							
						} elseif (strtolower(arg(0)) == 'node' && strtolower(arg(2)) == 'quizzes') {
							
							//$variables['_page_title'] = 'Lessons';
							$variables['_page_class'] = 'quizzes-page';
							
						}
					}



