
<?php $franchise_id = getIdFromCookie();

 ?>

<header class="fl-page-header fl-page-header-primary ac-non-sticky-header<?php FLTheme::header_classes(); ?>"<?php FLTheme::header_data_attrs(); ?><?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/WPHeader"' ); ?> role="banner">
	<div class="fl-page-header-wrap">
		<div class="fl-page-header-container <?php FLLayout::container_class(); ?>">
			<div class="fl-page-header-row <?php FLLayout::row_class(); ?> global-header-row">
				<div class="<?php FLLayout::col_classes( array( 'sm' => 4, 'md' => 4 ) ); // @codingStandardsIgnoreLine ?> fl-page-header-logo-col header-logo-clm">
					<div class="fl-page-header-logo"<?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/Organization"' ); ?>>

						<?php

							if(getIdFromCookie()){
								echo '<a href="'. locationPermalink() .'" class="desktopLogo locationBasedLogo">';
								echo	'<img src="'. locationLogo() .'" alt="Location Logo" width="415">';
								echo '</a>';

							}else{
								echo '<a href="'. esc_url( home_url( '/' ) ) .'" itemprop="url">';
							    	echo FLTheme::logo();
								echo '</a>';
							}
						?>

					</div>
				</div>
				<div class="<?php FLLayout::col_classes( array( 'sm' => 4, 'md' => 4 ) ); // @codingStandardsIgnoreLine ?> header-zip-search ac-cookie-reset-row ac-cookie-reset-row-desktop">
					<?php if( getIdFromCookie() ) : ?>
						<div class="ac-cookie-reset-clm"><a href="/locations/">Change Location</a><span class="ac-separator">|</span><a id="clearLocation" href="#clearLocation">Clear Location</a></div>
					<?php else: ?>
						<div class="searchFormFieldsRight">
							<a href="/locations/" target="_self" class="fl-button button" role="button"><span class="fl-button-text">Search Locations</span></a>
						</div><!--.searchFormFieldsRight-->

					<?php endif; ?>
				</div>
				<div class="<?php FLLayout::col_classes( array( 'sm' => 4, 'md' => 4 ) ); // @codingStandardsIgnoreLine ?> fl-page-nav-col header-phone-clm">
					<div class="fl-page-header-content">
						<?php FLTheme::header_content(); ?>
						<!--- Conditional Display :: Header Phone -->
						<?php if(locationPhone()) : ?>
						    <div class="location-phone">
								<div class="phone-icon">
									<span></span>
								</div>
								<div class="location-phone-number">
									<p>Get In Touch With Us</p>
									<a href="tel:+<?php echo locationPhone(); ?>"><?php echo locationPhone(); ?></a>
								</div>
							</div>
						<?php else: ?>
						    <a href="/about-us/contact-us/" target="_self" class="fl-button button ac-header-phone" role="button">
								<span class="fl-button-text">Get In Touch</span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="<?php FLLayout::col_classes( array( 'sm' => 12, 'md' => 12 ) ); // @codingStandardsIgnoreLine ?> header-zip-search ac-cookie-reset-row ac-cookie-reset-row-mobile">
			<?php if( getIdFromCookie() ) : ?>
						<div class="ac-cookie-reset-clm"><a href="/locations/">Change Location</a><span class="ac-separator">|</span><a id="clearLocation" href="#clearLocation">Clear Location</a></div>
					<?php else: ?>
						<div class="searchFormFieldsRight">
							<a href="/locations/" target="_self" class="fl-button button" role="button"><span class="fl-button-text">Search Locations</span></a>	
						</div><!--.searchFormFieldsRight-->

					<?php endif; ?>
		</div>
	</div>
	<div class="fl-page-nav-wrap">
		<div class="fl-page-nav-container <?php FLLayout::container_class(); ?>">
			<div class="header-nav">
			<nav class="fl-page-nav navbar navbar-default navbar-expand-md" aria-label="<?php echo esc_attr( FLTheme::get_nav_locations( 'header' ) ); ?>"<?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement"' ); ?> role="navigation">
				<button type="button" class="navbar-toggle navbar-toggler" data-toggle="collapse" data-target=".fl-page-nav-collapse">
					<span><?php FLTheme::nav_toggle_text(); ?></span>
				</button>
				<div class="fl-page-nav-collapse collapse navbar-collapse">
					<?php

					wp_nav_menu(array(
						'theme_location' => 'header',
						'items_wrap'     => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
						'container'      => false,
						'fallback_cb'    => 'FLTheme::nav_menu_fallback',
						'menu_class'     => 'menu fl-theme-menu',
					));

					FLTheme::nav_search();

					?>
					<div class="mobile-nav-additional-content">
						<div class="ac-clm-right">
							<!-- Mobile Menu :: Social Icons --->
							<div class="fl-col header-social">
					<div class="fl-col-content fl-node-content">
					<div class="fl-module fl-module-icon-group">
					<div class="fl-module-content fl-node-content">
						<div class="fl-icon-group">
					<span class="fl-icon">
							<a href="https://www.facebook.com/AccurateLeakAndLine" target="_blank" rel="noopener">
								<i class="icon-accuratefacebook" aria-hidden="true"></i>
							<span class="sr-only">facebook</span>
							</a>
							</span>
					<span class="fl-icon">
							<a href="https://twitter.com/AccurateLeak" target="_blank" rel="noopener">
								<i class="icon-accuratetwitter" aria-hidden="true"></i>
							<span class="sr-only">Twitter</span>
							</a>
							</span>
					<span class="fl-icon">
							<a href="https://www.linkedin.com/company/accurate-leak-and-line" target="_blank" rel="noopener">
								<i class="icon-accuratelinkedin" aria-hidden="true"></i>
							<span class="sr-only">linkedin</span>
							</a>
							</span>
					<span class="fl-icon">
							<a href="https://www.youtube.com/user/AccurateLeakandLine" target="_blank" rel="noopener">
								<i class="icon-accurateyoutube" aria-hidden="true"></i>
							<span class="sr-only">youtube</span>
							</a>
							</span>
						</div>
						</div>
					</div>
						</div>
					</div>
						</div>
					<div class="ac-clm-left">
							<!--- Conditional Display :: Header Phone in Mobile Navigation -->
							<?php if(locationPhone()) : ?>
							<div class="location-phone">
								<div class="phone-icon">
									<span></span>
								</div>
								<div class="location-phone-number">
									<p>Get In Touch With Us</p>
									<a href="tel:<?php echo locationPhone(); ?>"><?php echo locationPhone(); ?></a>
								</div>
							</div>
							<?php else: ?>
							<a href="/about-us/contact-us/" target="_self" class="fl-button button ac-header-phone" role="button">
								<span class="fl-button-text">Get In Touch Now</span>
							</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</nav>
			</div>
				<div class="fl-col header-social">
					<div class="fl-col-content fl-node-content">
					<div class="fl-module fl-module-icon-group">
					<div class="fl-module-content fl-node-content">
						<div class="fl-icon-group">
					<span class="fl-icon">
							<a href="https://www.facebook.com/AccurateLeakAndLine" target="_blank" rel="noopener">
								<i class="icon-accuratefacebook" aria-hidden="true"></i>
							<span class="sr-only">facebook</span>
							</a>
							</span>
					<span class="fl-icon">
							<a href="https://twitter.com/AccurateLeak" target="_blank" rel="noopener">
								<i class="icon-accuratetwitter" aria-hidden="true"></i>
							<span class="sr-only">Twitter</span>
							</a>
							</span>
					<span class="fl-icon">
							<a href="https://www.linkedin.com/company/accurate-leak-and-line" target="_blank" rel="noopener">
								<i class="icon-accuratelinkedin" aria-hidden="true"></i>
							<span class="sr-only">linkedin</span>
							</a>
							</span>
					<span class="fl-icon">
							<a href="https://www.youtube.com/user/AccurateLeakandLine" target="_blank" rel="noopener">
								<i class="icon-accurateyoutube" aria-hidden="true"></i>
							<span class="sr-only">youtube</span>
							</a>
							</span>
						</div>
						</div>
					</div>
						</div>
					</div>
		</div>
	</div>
</header><!-- .fl-page-header -->
