<?php
  $settings = variable_get('theme_platon_settings');
  if(!empty($settings['palette'])) {
    $backgroundColor = $settings['palette']['dark_blue'];
  }
?>

<?php if (in_array('administrator', $user->roles)):?>
<?php if (!empty($main_navigation) && ($logged_in || theme_get_setting('platon_menu_show_for_anonymous')) && theme_get_setting('toggle_main_menu')): ?>
	<nav class="navbar" id="sidebar-wrapper" role="navigation">
		<?php print $main_navigation; ?>
	</nav>
	<?php endif; ?>
<?php print render($page['sidebar_first']); ?>
<?php else:?>
<ul class="nav text-secondary">
	<li class="sidenav-main-link <?php print _daisyflo_sidenav("my-courses")?>"><a href="/" class="state">Courses</a></li>
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("notification")?>">
		<a href="/notification" class="text-secodary state ">Notifications</a>
	</li>              
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("events")?>">
		<a href="/events" class="text-secodary state">My Events</a>
	</li>              
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("certificates")?>">
		<a href="/certificates/user" class="state">Certificates</a>
	</li>
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("courses-results")?>">
		<a href="/courses-results" class="state">Test Results</a>
	</li>
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("referrals")?>">
		<a href="/referrals" class="state">Referrals</a>
	</li>   
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("user")?>">
		<a href="/user/<?php echo $user->uid?>/edit" class="state">Manage Account</a>
	</li>    
	<li class="category sidenav-top-link <?php print _daisyflo_sidenav("subscribe")?>">
		<a href="/subscribe" class="state">Social and Newsletter</a>
	</li>           
</ul>
<?php endif;?>