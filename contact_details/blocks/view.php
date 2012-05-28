<?php  defined('C5_EXECUTE') or die("Access Denied.");

$cardUrl = $controller->generateDownloadLink();

// Change the abbreviated Telephone 1 type in to proper english
switch ($phoneType1) {
	case "home" : $phoneType1_Label = "Home"; break;
	case "work" : $phoneType1_Label = "Work"; break;
	case "cell" : $phoneType1_Label = "Mobile"; break;
	case "fax" : $phoneType1_Label = "Fax"; break;
	default : $phoneType1_Label = "Phone";
}

// Change the abbreviated Telephone 2 type in to proper english
switch ($phoneType2) {
	case "home" : $phoneType2_Label = "Home"; break;
	case "work" : $phoneType2_Label = "Work"; break;
	case "cell" : $phoneType2_Label = "Mobile"; break;
	case "fax" : $phoneType2_Label = "Fax"; break;
	default : $phoneType2_Label = "Phone";
}
?>


<section class="vcard">


	<?php  if ($cardType == 0): ?>
	
		<h4 class="fn org"><?php  echo htmlentities($orgName, ENT_QUOTES, APP_CHARSET); ?></h4>
		
	<?php  elseif ($cardType == 1): ?>
		<h4 class="cardGroup cardName fn n">
			
			<?php  if (!empty($honorificName)): ?>
				<span class="honorific-prefix"><?php  echo htmlentities($honorificName, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($firstName)): ?>
				<span class="given-name"><?php  echo htmlentities($firstName, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($midName)): ?>
				<span class="additional-name"><?php  echo htmlentities($midName, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($lastName)): ?>
				<span class="family-name"><?php  echo htmlentities($lastName, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($honorificSuffixName)): ?>
				<span class="honorific-suffix"><?php  echo htmlentities($honorificSuffixName, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
		</h4>
	<?php  endif; ?>
	
	<dl class="dl-horizontal">
	
		<?php  if (!empty($category)): ?>
			<dt>Department</dt>
			<dd class="category"><?php  echo htmlentities($category, ENT_QUOTES, APP_CHARSET); ?></dd>
		<?php  endif; ?>
		
		<?php  if ($cardType == 1 && !empty($role)): ?>
			<dt>Role</dt>
			<dd class="role"><?php  echo htmlentities($role, ENT_QUOTES, APP_CHARSET); ?></dd>
		<?php  endif; ?>
		
		<?php  if (!empty($phoneNumber1)): ?>
			<span class="cardGroup cardTelephone tel">
		
				<dt>
					<span class="type" style="display:none;"><?php  echo htmlentities($phoneType1, ENT_QUOTES, APP_CHARSET); ?></span> <!-- Don't display the true type -->
					<span><?php  echo htmlentities($phoneType1_Label, ENT_QUOTES, APP_CHARSET); ?></span> <!-- Display the human readable version instead -->
				</dt>
				
				<dd class="value"><?php  echo htmlentities($phoneNumber1, ENT_QUOTES, APP_CHARSET); ?></dd>
			</span>
		<?php  endif; ?>
		
		<?php  if (!empty($phoneNumber2)): ?>
			<span class="cardGroup cardTelephone tel">
			
				<dt>
					<span class="type" style="display:none;"><?php  echo htmlentities($phoneType2, ENT_QUOTES, APP_CHARSET); ?></span> <!-- Don't display the true type -->
					<span><?php  echo htmlentities($phoneType2_Label, ENT_QUOTES, APP_CHARSET); ?></span> <!-- Display the human readable version instead -->
				</dt>
				<dd class="value"><?php  echo htmlentities($phoneNumber2, ENT_QUOTES, APP_CHARSET); ?></dd>
			</span>
		<?php  endif; ?>
		
		<?php  if (!empty($email)): ?>
			<dt>Email</dt>
			<dd class="email">
				<a href="mailto:<?php  echo htmlentities($email, ENT_QUOTES, APP_CHARSET); ?>"><?php  echo htmlentities($email, ENT_QUOTES, APP_CHARSET); ?></a>
			</dd>
		<?php  endif; ?>
	
		<span class="cardGroup cardAddress adr">
			<dt>Address</dt>
			<dd>
			<?php  if (!empty($addressStreet)): ?>
				<span class="street-address"><?php  echo htmlentities($addressStreet, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($addressCity)): ?>
				<span class="locality"><?php  echo htmlentities($addressCity, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($addressCounty)): ?>
				<span class="region"><?php  echo htmlentities($addressCounty, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			
			<?php  if (!empty($addressCode)): ?>
				<span class="postal-code"><?php  echo htmlentities($addressCode, ENT_QUOTES, APP_CHARSET); ?></span>
			<?php  endif; ?>
			</dd>
		</span>
		
		<dd>
			<?php  if ($vcardDownload == true): ?>
				<a class="cardDownload btn btn-small" href="<?php echo $cardUrl; ?>">Download vCard</a>
			<?php  endif; ?>
		</dd>
	</dl>	
	

	
</section>

