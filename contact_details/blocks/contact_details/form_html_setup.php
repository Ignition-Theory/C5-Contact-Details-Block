<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<div class="ccm-block-field-group">
	<h4>Card</h4>
	<div class="clearfix">
		<label for="cardType"><?php echo t('Card Type')?></label>
		<div class="input">	
			<select name="cardType" id="cardType">
				<option value="0" <?php echo ($cardType == 0 ? 'selected="selected"' : '')?>><?php echo t('Organisation')?></option>
				<option value="1" <?php echo ($cardType == 1 ? 'selected="selected"' : '')?>><?php echo t('Person')?></option>
			</select>
		</div>
	</div>
	
	<div class="clearfix">
		<label for="vcardDownload"><?php echo t('Enable vCard download link')?></label>
		<div class="input">	
			<input type="checkbox" name="vcardDownload" value="1" <?php echo ($controller->vcardDownload)?'checked':''?>>
			
	
		</div>
	</div>
</div>

<div class="ccm-block-field-group">
	<h4>Name</h4>
	<!-- Organisation -->
	<div id="name" class="clearfix">
		<label for="orgName"><?php echo t('Organisation Name')?></label>
		<div class="input">
			<?php  echo $form->text('orgName', $orgName, array('style' => 'width: 250px')); ?>
			<span>Required</span>
		</div>
	</div>
	
	<!-- Personal -->
	<div id="psnName" class="clearfix" style="display: none;">
		<div class="clearfix">
			<label for="honorificName"><?php echo t('Honorific')?></label>
			<div class="input">
				<?php  echo $form->text('honorificName', $honorificName, array('style' => 'width: 60px')); ?>
				<span>e.g. Mr., Mrs., Miss.</span>
			</div>
		</div>
		
		<div class="clearfix">
			<label for="firstName"><?php echo t('First Name')?></label>
			<div class="input">
				<?php  echo $form->text('firstName', $firstName, array('style' => 'width: 250px')); ?>
				<span>Required</span>
			</div>
		</div>
		
		<div class="clearfix">
			<label for="midName"><?php echo t('Middle Name')?></label>
			<div class="input">
				<?php  echo $form->text('midName', $midName, array('style' => 'width: 250px')); ?>
			</div>
		</div>
		
		<div class="clearfix">
			<label for="lastName"><?php echo t('Last Name')?></label>
			<div class="input">
				<?php  echo $form->text('lastName', $lastName, array('style' => 'width: 250px')); ?>
			</div>
			<span>Required if First Name is empty</span>
		</div>
		
		<div class="clearfix">
			<label for="honorificSuffixName"><?php echo t('Honorific Suffix')?></label>
			<div class="input">
				<?php  echo $form->text('honorificSuffixName', $honorificSuffixName, array('style' => 'width: 60px')); ?>
				<span>e.g. Ph.D., Esq.</span>
			</div>
		</div>
	</div>
	
</div>



<div class="ccm-block-field-group">
	<h4>Details</h4>

	<div class="clearfix">
		<label for="category"><?php echo t('Category or Department')?></label>
		<div class="input">
			<?php  echo $form->text('category', $category, array('style' => 'width: 250px;')); ?>
			<span>e.g. Marketing, Support</span>
		</div>
	</div>

	<!-- Personal -->
	<div class="clearfix" id="psnRole" style="display: none;">
		<label for="role"><?php echo t('Role')?></label>
		<div class="input">
			<?php  echo $form->text('role', $role, array('style' => 'width: 250px;')); ?>
			<span>e.g. Designer, Marketer</span>
		</div>
	</div>
	
	<div class="clearfix">
		<label for="email"><?php echo t('Email')?></label>
		<div class="input">
			<?php  echo $form->text('email', $email, array('style' => 'width: 300px;')); ?>
		</div>
	</div>
</div>




<div class="ccm-block-field-group">
	<h4>Telephone</h4>
		
		<table>
			<tr>
				<td>
				<h5>Number 1</h5>
					<label for="phoneType1"><?php echo t('Type')?></label>
					<div class="input">
						<select name="phoneType1" id="phoneType1">
							<option value="home" <?php echo ($phoneType1 == 'home' ? 'selected="selected"' : '')?>><?php echo t('Home')?></option>
							<option value="work" <?php echo ($phoneType1 == 'work' ? 'selected="selected"' : '')?>><?php echo t('Work')?></option>
							<option value="cell" <?php echo ($phoneType1 == 'cell' ? 'selected="selected"' : '')?>><?php echo t('Mobile')?></option>
							<option value="fax" <?php echo ($phoneType1 == 'fax' ? 'selected="selected"' : '')?>><?php echo t('Fax')?></option>
						</select>
					</div>

					<label for="phoneNumber1"><?php echo t('Number')?></label>
					<div class="input">
						<?php  echo $form->text('phoneNumber1', $phoneNumber1, array('style' => 'width: 150px;')); ?>
					</div>
				</td>
				<td>
					<h5>Number 2</h5>
					<label for="phoneType2"><?php echo t('Type')?></label>
					<div class="input">
						<select name="phoneType2" id="phoneType2">
							<option value="home" <?php echo ($phoneType2 == 'home' ? 'selected="selected"' : '')?>><?php echo t('Home')?></option>
							<option value="work" <?php echo ($phoneType2 == 'work' ? 'selected="selected"' : '')?>><?php echo t('Work')?></option>
							<option value="cell" <?php echo ($phoneType2 == 'cell' ? 'selected="selected"' : '')?>><?php echo t('Mobile')?></option>
							<option value="fax" <?php echo ($phoneType2 == 'fax' ? 'selected="selected"' : '')?>><?php echo t('Fax')?></option>
						</select>
					</div>
			
					<label for="phoneNumber2"><?php echo t('Number')?></label>
					<div class="input">
						<?php  echo $form->text('phoneNumber2', $phoneNumber2, array('style' => 'width: 150px;')); ?>
					</div>
				</td>
			</tr>
		</table>
</div>



<div class="ccm-block-field-group">
	<h4>Address</h4>
	
	<div class="clearfix">
		<label for="addressStreet"><?php echo t('Street')?></label>
		<div class="input">
			<?php  echo $form->text('addressStreet', $addressStreet, array('style' => 'width: 250px;')); ?>
		</div>
	</div>

	<div class="clearfix">
		<label for="addressStreet"><?php echo t('Town/City')?></label>
		<div class="input">
			<?php  echo $form->text('addressCity', $addressCity, array('style' => 'width: 250px;')); ?>
		</div>
	</div>
			
	<div class="clearfix">
		<label for="addressStreet"><?php echo t('County/State')?></label>
		<div class="input">
			<?php  echo $form->text('addressCounty', $addressCounty, array('style' => 'width: 250px;')); ?>
		</div>
	</div>

	<div class="clearfix">
		<label for="addressStreet"><?php echo t('Post/Zip Code')?></label>
		<div class="input">
			<?php  echo $form->text('addressCode', $addressCode, array('style' => 'width: 250px;')); ?>
		</div>
	</div>
</div>