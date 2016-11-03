<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>index.php">Home</a></li>
                <li><a href="<?php echo base_url(); ?>account">My Account</a></li>
                <li class="active"> My information</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i
                    class="glyphicon glyphicon-user"></i> My personal information </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> Please be sure to update your personal information if it has
                        changed. </h2>

                    <p class="required"><sup>*</sup> Required field</p>
                </div>
                <form>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group ">
	                        <label for="InputName">First Name</label>
	                        <input type="text" class="form-control" id="InputName" placeholder="First Name" maxlength="20" value="<?php if(!empty($profile_details['user_first_name'])) : echo $profile_details['user_first_name']; endif;?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="InputLastName">Last Name</label>
	                        <input for="InputLastName" class="form-control" id="InputLastName" placeholder="Last Name" maxlength="20" value="<?php if(!empty($profile_details['user_last_name'])) : echo $profile_details['user_last_name']; endif;?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="InputAddress"> Address (Line 1)</label>
	                        <input type="text" class="form-control" id="InputAddress" placeholder="Address" maxlength="20" value="<?php if(!empty($profile_details['user_default_address1'])) : echo $profile_details['user_default_address1']; endif;?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="InputAddress2">Address (Line 2) </label>
	                        <input type="text" class="form-control" id="InputAddress2" placeholder="Address" maxlength="30" value="<?php if(!empty($profile_details['user_default_address2'])) : echo $profile_details['user_default_address2']; endif;?>">
	                    </div>	                                    
	                    <div class="form-group">
	                        <label for="InputState">State</label>
	                        <select class="form-control che_state" aria-required="true" id="InputState" name="InputState">
	                            <option value=""> Please select state </option>
                                                <?php 
                                                if(!empty($state)) : 
                                                foreach($state as $state_row): 
                                                if(!empty($profile_details)) { 
                                                    if($state_row['state_id'] == $profile_details['user_state_id']) {
                                                ?>  
                                                        <option selected value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                <?php
                                                        }
                                                    else 
                                                        {
                                                ?>
                                                        <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                <?php
                                                        }
                                                    }
                                                else 
                                                    {
                                                ?>
                                                    <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                <?php 
                                                    }
                                                endforeach; 
                                                endif;
                                                ?> 
								</select>
	                </div>
	                <div class="form-group">
	                          <label for="InputCity">City</label>
	                          <select class="form-control che_city" aria-required="true" id="InputCity" name="InputCity">
	                               <option value=""> Please select city </option>
	                                            <?php 
                                                if(!empty($profile_get_city) && !empty($profile_details)) : 
                                                foreach($profile_get_city as $city_row): 
                                                if($city_row['city_id'] == $profile_details['user_city_id']) {
                                                ?>  
                                                <option selected value="<?php echo $city_row['city_id']; ?>"> <?php echo $city_row['city_name']; ?> </option>
                                                <?php
                                                }
                                                else {
                                                ?>
                                                <option value="<?php echo $city_row['city_id']; ?>"> <?php echo $city_row['city_name']; ?> </option>
                                                <?php
                                                }
                                                endforeach; 
                                                endif;
                                                ?>	
	                              </select>
	             </div>                               
			             <div class="form-group">
			                        <label for="InputArea">Area</label>
			                        <select class="form-control che_area" aria-required="true" id="InputArea" name="InputArea">
			                        <option value=""> Please select area </option>
		                                    	      	<?php 
		                                                if(!empty($profile_get_area) && !empty($profile_details)) : 
		                                                foreach($profile_get_area as $area_row): 
		                                                	if($area_row['area_id'] == $profile_details['user_area_id']) :
		                                                ?>  
		                                                		<option selected value="<?php echo $area_row['area_id']; ?>"> <?php echo $area_row['area_name']; ?> </option>
		                                                <?php
		                                                    else :
		                                                ?>
		                                                    	<option value="<?php echo $area_row['area_id']; ?>"> <?php echo $area_row['area_name']; ?> </option>
		                                                <?php
		                                                	endif;
		                                                endforeach; 
		                                                endif;
		                                                ?>                                        
			                       </select>
			            </div>
			            <div class="form-group">
			                      <label for="InputZip">Zip / Postal Code</label>
			                      <input type="text" class="form-control" id="InputZip" placeholder="Zip / Postal Code" maxlength="6" value="<?php if(!empty($profile_details['user_zip'])) : echo $profile_details['user_zip']; endif;?>">
			            </div>
			            <div class="form-group">
			                       <label for="InputMobile">Mobile phone</label>
			                       <input type="tel" name="InputMobile" class="form-control" id="InputMobile" maxlength="10" value="<?php if(!empty($profile_details['user_mobile'])) : echo $profile_details['user_mobile']; endif;?>">
			            </div>
			            <div class="form-group">
			                        <label for="InputEmail"> Email <sup>*</sup></label>
			                        <input type="text" class="form-control" id="InputEmail" placeholder="Email" value="<?php if(!empty($profile_details['user_email'])) : echo $profile_details['user_email']; endif;?>">
			            </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group required">
                            <label for="InputPasswordCurrent"> Password <sup> * </sup> </label>
                            <input type="password" value="" name="InputPasswordCurrent" class="form-control"
                                   id="InputPasswordCurrent">
                        </div>
                        <div class="form-group required">
                            <label for="InputPasswordnew"> New Password </label>
                            <input type="password" name="InputPasswordnew" class="form-control" id="InputPasswordnew">
                        </div>
                        <div class="form-group required">
                            <label for="InputPasswordnewConfirm"> Confirm Password </label>
                            <input type="password" name="InputPasswordnewConfirm" class="form-control"
                                   id="InputPasswordnewConfirm">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <p class=" clearfix">
                                <input type="checkbox" value="1" name="newsletter" id="newsletter">
                                <label for="newsletter">Sign up for our newsletter!</label>
                            </p>

                            <p class="clearfix">
                                <input type="checkbox" value="1" id="optin" name="optin">
                                <label for="optin">Receive special offers from our partners!</label>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn   btn-primary"><i class="fa fa-save"></i> &nbsp; Save</button>
                    </div>
                </form>
                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="index.php"> <i class="fa fa-home"></i> Go to Shop </a>
                        </li>
                        <li class="next pull-left"><a href="<?php echo base_url(); ?>account"> &larr; Back to My Account</a></li>
                    </ul>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /main-container -->

<div class="gap"></div>
<?php include "templates/footer.php"; ?>