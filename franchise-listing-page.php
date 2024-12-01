<?php
/*
Template Name: Franchise Listing Page
Template Post Type: page
*/

get_header(); ?>

<!--Start: Location Search Section--->
<div class="location-row location-search-section">
    <div class="location-container location-search-content">
        <div class="location-search-title">
            <h2>Find a Driveway Company Location near you</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <form action="" method="post" id="locationFormListing">
        <div class="searchFormFieldsLeft">
            <div class="labelForSearchByState">
                <label>Search by State</label>
            </div><!--.labelForSearchByState-->
            <div class="selectField">
                <select id="state_code" name="statecode">
                    <option selected="selected" value="">Select State</option>
                    <option value="AL">Alabama</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DC">District of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                </select>
            </div><!--.selectField-->
        </div><!--.searchFormFieldsLeft-->
        <div class="searchFormFieldsRight">
            <div class="labelOrByZip">
                <span>or</span>
                <label>By ZIP Code</label>
            </div><!--.labelOrByZip-->
            <div class="searchFormFieldsRightInner">
                <div class="searchFormFieldsRightInnerInput">
                    <input placeholder="Enter ZIP Code.." name="zipcode" type="number" value="" title="zip code" />
                    <div class="divForBgImage">
                        <input name="submit" type="submit" value="Find Now" id="btn_search_location"/>
                        <input name="stateSearchBtn" type="submit" value="state" id="btn_search_state" style="display:none;">
                    </div>
                </div>    
                <div id="validation_message" class="gfield_description location_search_validation_message" style="display: none;" aria-live="polite">Incorrect Format. Please enter a valid ZIP Code.</div>
            </div><!--.searchFormFieldsRightInner-->
        </div><!--.searchFormFieldsRight-->
    </form>
    </div><!--.location-search-content-->
</div><!--.location-search-section-->
<!--End: Location Search Section--->

<!--Start: Location Search Section :: Bottom--->
<div class="location-row location-search-section-bottom">
    <div class="location-container location-search-content-bottom">
        <h2>Choose your state or enter you ZIP/ state code above</h2>
    </div><!--.location-search-content-bottom-->
</div><!--.location-search-section-bottom-->
<!--End: Location Search Section :: Bottom--->

<!--Start: Location Search Resutl Section--->
<div class="location-row location-search-result-section">
    <div class="location-container location-search-result-content">
        <div class="location-search-result-list-content">
            <div class="location-search-result-icon-wrp">
                <div class="location-search-result-icon">
                    <img src="/wp-content/uploads/2021/10/flag-Stars.jpg" alt="location Icon/Image">
                </div>
            </div>
            <div class="location-search-result-list-wrp">
                
                <div class="location-search-result-list"><!-- Start: List -->
                    <div class="location-search-result-list-title">
                        <h2>Dallas</h2>
                    </div>
                    <div class="location-search-result-list-address-phone">
                        <span class="list-address">3333 Lee Parkway, Suite 600, Dallas, TX 75219</span>
                        <span class="list-phonne"><a href="tel:214.340.5325">214.340.5325</a></span>
                    </div>
                    <div class="location-search-result-list-details">
                        <h3>Areas We Serve</h3>
                        <p>Collin County, Dallas County, Denton County, Ellis County and More.</p>
                        <a href="/locations/dallas/" target="_self" class="fl-button button list-view-details-btn">
                            <span class="fl-button-text">View Details</span>
                        </a>
                    </div>
                </div><!-- End: List -->

                <div class="location-search-result-list"><!-- Start: List -->
                    <div class="location-search-result-list-title">
                        <h2>Fort Worth / Mid-cities</h2>
                    </div>
                    <div class="location-search-result-list-address-phone">
                        <span class="list-address">2000 E. Lamar Blvd. #600, Arlington, TX 76006</span>
                        <span class="list-phonne"><a href="tel:817-287-9826">817-287-9826</a></span>
                    </div>
                    <div class="location-search-result-list-details">
                        <h3>Areas We Serve</h3>
                        <p>Dallas County, Denton County, Ellis County, Johnson County and More.</p>
                        <a href="/locations/fort-worth/" target="_self" class="fl-button button list-view-details-btn">
                            <span class="fl-button-text">View Details</span>
                        </a>
                    </div>
                </div><!-- End: List -->

                <div class="location-search-result-list"><!-- Start: List -->
                    <div class="location-search-result-list-title">
                        <h2>Austin</h2>
                    </div>
                    <div class="location-search-result-list-address-phone">
                        <span class="list-address">7000 North Mopac Expressway, Suite 200, Austin, Texas 78731</span>
                        <span class="list-phonne"><a href="tel:512.219.5325">512.219.5325</a></span>
                    </div>
                    <div class="location-search-result-list-details">
                        <h3>Areas We Serve</h3>
                        <p>Dallas County, Denton County, Johnson County, Tarrant County and More.</p>
                        <a href="/locations/austin/" target="_self" class="fl-button button list-view-details-btn">
                            <span class="fl-button-text">View Details</span>
                        </a>
                    </div>
                </div><!-- End: List -->
				
				<div class="location-search-result-list"><!-- Start: List -->
                    <div class="location-search-result-list-title">
                        <h2>San Antonio</h2>
                    </div>
                    <div class="location-search-result-list-address-phone">
                        <span class="list-address">1100 North West Loop 410 #700, San Antonio, TX 78213</span>
                        <span class="list-phonne"><a href="tel:210.853.5380">210.853.5380</a></span>
                    </div>
                    <div class="location-search-result-list-details">
                        <h3>Areas We Serve</h3>
                        <p>Dallas County, Denton County, Johnson County, Tarrant County and More.</p>
                        <a href="/locations/san-antonio/" target="_self" class="fl-button button list-view-details-btn">
                            <span class="fl-button-text">View Details</span>
                        </a>
                    </div>
                </div><!-- End: List -->

            </div><!--.location-search-result-list-wrp-->
        </div><!--.location-search-result-list-content-->
    </div><!--.location-search-result-content-->
</div><!--.location-search-result-section-->
<!--End: Location Search Resutl Section--->

<div class="fl-content-full container">
    <div class="row">
        <div class="fl-content col-md-12">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'content', 'page' );
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
