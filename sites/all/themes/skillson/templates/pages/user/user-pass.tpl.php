<?php 

$form['name']['#description'] = "";
$form['name']['#prefix']      = "";
$form['name']['#attributes']['placeholder'] = t('Enter Your Email here');
$form['name']['#title_display'] = 'invisible';

$form['actions']['#suffix']   = "";

?><div class="full-banner login-banner jumbotron no-margin-bottom">	<div class="container">	      <h1 class="text-secondary"><span class="font-light">Forgot Password...</h1>	</div></div><div class="jumbotron login-bottom-banner no-padding">   <div class="container">   	  <div class="col-md-4">      </div>        	  <div class="col-md-2 active text-center no-padding">   	  	  <div class="no-padding active-heading">   	  	  		<span class="glyphicon glyphicon glyphicon-log-in"></span>   	  	  </div>	      <h2 class="login-title">	      	<a href="/user/login">Log In</a>	      </h2>      </div>   	  <div class="col-md-2 <?php echo arg(1) == "register" ? "active" : "non-active"?> text-center no-padding">   	  	  <div class="no-padding active-heading">   	  	  		<span class="glyphicon glyphicon glyphicon-off"></span>   	  	  </div>	      <h2 class="login-title">	      	<a href="/user/register">Sign Up</a>	      </h2>      </div>   	  <div class="col-md-4">      </div>   </div></div><div class="container">	<div class="col-md-12 login-fields-container">	   <div class="col-md-6">		   <div class="login-field-container">		      <?php if(form_get_errors()):?>		      <div class="alert alert-danger fade in">		         <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>		         <ul>		            <?php foreach(form_get_errors() as $error):?>		            <li><?php echo $error?></li>		            <?php endforeach?>		         </ul>		      </div>		      <?php endif?>		   </div>		   <div class="login-field-container">			   <div class="inner-addon left-addon">			        <?php echo render($form['name']);?>				    <i class="glyphicon glyphicon-envelope"></i>				</div>		   </div>	      <div class="login-field-container no-margin">	         <?php echo render($form['actions']);?>	      </div>	   </div> 	    <div class="col-md-6 divider">		      <div class="text-center">		         <p id="login-fb"><strong>Simply login with your external Facebook account</strong></p>		         <?php print fboauth_action_display('connect'); ?>		      </div>		      		      <div class="text-center">				<a href="/user/register" class="btn btn-primary big-btn">Create New Account</a>		      		      </div>		  	  <?php print drupal_render_children($form);?>		</div>	</div></div>
