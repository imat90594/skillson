<div class="row notif-container redeem-container" >
   <div class="col-md-12">
      <div id="title-header" class="col-md-12">
         <h1>Voucher <strong class="bordered">Codes</strong><strong></strong></h1>
      </div>
      <div id="title-header" class="header-text col-md-10">
         <p>Insert a description and delete me. I'm just a dummy text placeholder.
            Insert a description and delete me. I'm just a dummy text placeholder.
         </p>
      </div>
      <br />
      <br />
   </div>
   <?php $form = drupal_get_form('enroll_form'); ?>
   <?php print '<form id="'.$form['#id'].'" accept-charset="UTF-8" method="'.$form['#method'].'" action="'.$form['#action'].'">'; ?>
   <div class="col-md-12 form-container ">
      <div class="col-md-8 no-padding-right">
	      <p>Enter Your <strong>Voucher Code</strong> to Redeem Courses</p>
         <?php print render($form["voucher_code"]); ?>
      </div>
      <div class="col-md-4 no-padding">
         <?php print drupal_render_children($form); ?>
      </div>
   </div>
   </form>
</div>