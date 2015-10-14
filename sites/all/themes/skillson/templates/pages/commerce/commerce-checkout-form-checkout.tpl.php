<?php //echo kprint_r(get_defined_vars(), TRUE);     $order = commerce_order_load(arg(1));    $product_line_item = commerce_line_item_load($order->commerce_line_items["und"][0]["line_item_id"]);    $product = commerce_product_load($product_line_item->commerce_product["und"][0]["product_id"]);        // echo kprint_r($order, TRUE);    // echo kprint_r($product_line_item, TRUE);    // echo kprint_r($product, TRUE);    // echo kprint_r($form, TRUE);    // die;        // $vars - is a variable which you want to print.     ?><?php $form['cart_contents']['#title'] = ""; ?><?php $form['customer_profile_billing']['#title'] = ""; ?><?php $form['commerce_payment']['#title'] = ""; ?><?php $form["commerce_coupon"]["coupon_code"]['#description'] ="" ?><?php $form["commerce_coupon"]["coupon_code"]['#attributes']['placeholder'] = t('Enter your Code (Only Given by Skills on Project)'); ?><?php $form["commerce_coupon"]["coupon_code"]['#title_display'] = 'invisible'; ?><?php $form['customer_profile_billing']['#attributes']['placeholder'] = t('Enter Code'); ?><?php $domain = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'] : "http://".$_SERVER['SERVER_NAME']; ?><div class="checkout">    	<div class="col-md-12 text-center no-margin no-padding">    		<h1 class="font-light">Product Information</h1>    	</div>            	<div class="col-md-6">        		<table class="table table-striped table-bordered">        			<tbody>	        			<tr class="odd">	        				<td class="col-md-3"><strong>Publisher</strong></td>	        				<td class="col-md-9"><?php echo isset($product->field_publisher["und"][0]["value"]) ? $product->field_publisher["und"][0]["value"] : ""?></td>        			</tr>        			<tr>        				<td class="col-md-3"><strong>Access Dury</strong></td>        				<td class="col-md-6">        					<span class="pull-left">        						<?php echo isset($product->field_access["und"][0]["value"]) ? $product->field_access["und"][0]["value"] : ""?>        					</span>        					<strong class="pull-right pro"><span class="glyphicon glyphicon-lock pro-lock"></span>Unlock Pro Access        				</td>        			</tr>        			<tr class="odd">        				<td class="col-md-3"><strong>Price</strong></td>        				<td class="col-md-9"><?php echo commerce_currency_format($order->commerce_order_total['und']['0']['amount'], "USD");?></td>	        			</tr>        			</tbody>        		</table>        	</div>                    <div class="col-md-6">					<div class="row cart-panel">						<div class="col-md-4 no-padding-left" style="background-image:url('/sites/all/themes/skillson/img/theme/F9607ECDC9.jpg')">				</div>				<div class="col-md-8">					<h3 class="prod-title"><?php echo $product->title?></h3>					<p class="prod-details">						<span>Category:</span> <?php echo $product->field_category["und"][0]["value"]?>						<br>						<span>Details:</span> <?php echo $product->title?> on SkillsOnProject					</p>					<p class="prod-feature">						  <?php foreach($product->field_features["und"] as $feature):?>						 	 <?php echo $feature["value"]?>						 	 <br />						  <?php endforeach?>						<span class="prod-price btn btn-primary pull-right">							<?php echo commerce_currency_format($order->commerce_order_total['und']['0']['amount'], "USD");?>						</span>					</p>				</div>			</div>		</div>				<div class="col-md-12 coupon-container">			<div class="col-md-6 no-padding-left">			  <div class="text-center">			  		<div class="col-md-12 no-padding-left">			  			<p class="pull-left" style="font-size:16px;"><strong>Do you have a coupon code?</strong></p>			  		</div>	                <div class="col-md-8 no-padding-left no-padding-right">	                    <?php echo render($form["commerce_coupon"]["coupon_code"])?>	                </div>	                <div class="col-md-4 no-padding-left">	                    <div class="coupon-btn-container">	                        <?php echo render($form["commerce_coupon"]["coupon_add"])?>	                    </div>	                </div>					 <div class="col-md-12 no-padding-left" id="commerce-checkout-coupon-ajax-wrapper">			            <br />  					 	<?php echo render($form["commerce_coupon"]["redeemed_coupons"])?>		            </div>				</div>			</div>			<div class="col-md-6">				<span class="big-price btn btn-primary col-md-12">TOTAL <?php echo commerce_currency_format($order->commerce_order_total['und']['0']['amount'], "USD");?></span>			</div>		</div>                       	<div class="col-md-12 text-center no-margin no-padding">       		<hr class="checkout-divider"/>    		<h1 class="font-light">Customer Information</h1>    	</div>    	    	                <div class="col-md-12 checkout-billing-payment-container text-center">        	<h3><strong><span class="glyphicon glyphicon-map-marker"></span> Billing Information</strong> <span class="text-muted">(Your Privacy is Highly Protected)</span></h3>            <div class="col-md-offset-2 col-md-8">                <!-- Billing Block -->                <?php print render($form['customer_profile_billing']); ?>            </div>                        <div class="col-md-2">            </div>                       <div class="col-md-12">           	<h3><strong><span class="glyphicon glyphicon-user"></span> Account Information</strong> <span class="text-muted">(Your Privacy is Highly Protected)</span></h3>           </div>        	        	<div class="col-md-offset-2 col-md-8">                <!-- Email Block -->                <?php if(isset($form['account'])):?>                <?php print render($form['account']); ?>                <?php endif?>            </div>                        <div class="col-md-2">           </div>        </div>                        <div class="col-md-12 text-center no-margin no-padding">       		<hr class="checkout-divider"/>    		<h1 class="font-light">Payment Information</h1>    		<br />    		<br />    	</div>    	        <div class="col-md-12 no-margin">		  <div class="col-md-1">		  </div>	        <div class="col-md-10 no-margin payment-banner">			  <div class="col-md-7">			  	<span class="text">Choose PayPal Account</span>			  	<img src="/sites/all/themes/skillson/img/theme/paypal.png"/>			  </div>			  <div class="col-md-5">			  	<span class="text2">or Your Credit Card</span>			  	<span class="glyphicon glyphicon-credit-card"></span>			  </div>	    	</div>    	</div>    	        <div class="col-md-12 payment-container">            <div class="col-md-2">            </div>            <div class="col-md-7">                <?php $form["commerce_payment"]["payment_method"]["paypal_wps|commerce_payment_paypal_wps"]["#title"] =                     'Paypal <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/paypal.gif" alt="PayPal" title="PayPal" />' ?>                <?php $form["commerce_payment"]["payment_method"]["commerce_stripe|commerce_payment_commerce_stripe"]["#title"] =                     'Credit Card <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/visa.gif" alt="Visa" title="Visa" />                       <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/mastercard.gif" alt="Mastercard" title="Mastercard" />                      <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/amex.gif" alt="American Express" title="American Express" />                      <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/discover.gif" alt="Discover" title="Discover" />                      <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/echeck.gif" alt="eCheck" title="eCheck" />' ?>                <?php print render($form['commerce_payment']); ?>            </div>        </div>    </div>                <div class="col-md-12 text-center">            <?$form['buttons']["cancel"]["#prefix"] = "";?>            <?php print render($form['buttons']["continue"]); ?>            <br>    </div>    <div class="hidden">        <?php  print drupal_render_children($form);?>    </div>