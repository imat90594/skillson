<?php if (isset($page['#views_contextual_links_info']['views_ui']['view']->name)):?>
 	 <?php if (!empty($messages)): ?>
    	<div id="messages">
      	<?php print render($messages); ?>
    	</div>
  	<?php endif; ?>
	
  	<?php if ($page['#views_contextual_links_info']['views_ui']['view']->name == 'opigno_quizzes'):?>		<?php $node = node_load(arg(1));?>
		<div class="units-header">			<div class="course-title">				<h1><?php print $node->title?></h1>				<hr/>			</div>			<div class="course-description">				<?php print $node->body['und'][0]['value']?>			</div>		</div>
  		<div class="units">
			<div class="row unit-card-header">
				<div class="col-md-1 unit-card-title">					<h2 class="text-primary">Units</h2>				</div>			</div>						 <?php print render($page['content']); ?>		</div>
  	<?php endif;?>
  	<?php //for courses results?>
  	<?php if ($page['#views_contextual_links_info']['views_ui']['view']->name == 'courses_results'):?>
		<?php print render($page['content']); ?>
  	<?php endif;?>
 
 <?php else: //default page?>
 
  <?php if (!empty($page['help'])): ?>
    <div id="help">
      <?php print render($page['help']); ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($title)): ?>
    <div id="title-wrapper">
      <?php print render($title_prefix); ?>
      <h1><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
      
      <?php if (!empty($og_context_navigation)): ?>
      	<?php if (in_array('administrator', $user->roles)):?>
        <div id="og-context-navigation">
          <?php print $og_context_navigation; ?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($messages)): ?>
    <div id="messages">
      <?php print render($messages); ?>
    </div>
  <?php endif; ?>

  <?php if (!(empty($tabs['#primary']) && empty($tabs['#secondary'])) && empty($hide_tabs)): ?>
    <div id="tabs">
      <?php print render($tabs); ?>
    </div>
  <?php endif; ?>

  <?php if (($action_links)&&(!(isset($node)&&($node->type=="course")))): ?>
    <ul class="action-links">
      <?php print render($action_links); ?>
    </ul>
  <?php endif; ?>

  <div id="content">
    <?php print render($page['content']); ?>
    <?php // print render($page['content_bottom']); ?>
  </div>

  <?php if (($action_links)&&((isset($node)&&($node->type=="course")))): ?>
    <ul class="action-links">
      <?php print render($action_links); ?>
    </ul>
  <?php endif; ?>
<?php endif; //for page detection?>


<?php if(drupal_is_front_page()):?>
<?php print render($page['content']); ?>
<?php endif?>