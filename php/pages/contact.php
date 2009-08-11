<?php
// Make the page validate
ini_set('session.use_trans_sid', '0');

// Include the random string file
require 'lib/captcha/rand.php';

// Begin the session
session_start();

// Set the session contents
$_SESSION['captcha_id'] = $str;
?>

<div id="contact-form">
        <form class="cmxform" id="commentForm" method="POST" action="contact_action.php">
        <fieldset>
                <!--    <legend>Please provide your name, email address (won't be published) and a comment</legend> -->
                <p>
                        <label for="cfname">First Name <strong>*</strong></label>
                        <input id="cfname" name="fname" class="required" minlength="2" />
                </p>
                <p>
                        <label for="clname">Last Name <strong>*</strong></label>
                        <input id="clname" name="lname" class="required" minlength="2" />
                </p>
                <p>
                <label for="creason">Reason for contacting <strong>*</strong></label>
                <select id="creason" class="required" validate="required:true" title="Please select a reason!" name="reason">
                        <option value=""></option>
                        <option value="Place an Order">Place an order</option>
                        <option value="Need a sample">Get a sample</option>
                        <option value="Enquiry">Enquiry</option>
                        <option value="Feedback">Feedback and Comments!</option>
                        <option value="Other">Other..</option>
                </select>

                </p>
                <p>
                        <label for="ccompany">Company</label>
                        <input id="ccompany" name="company" class="" />
                </p>
                <p>
                        <label for="clocation">Location</label>
                        <input id="clocation" name="location" class="" />
                </p>
                <p>
                        <label for="cemail">E-Mail</label>
                        <input id="cemail" name="email" class="email" />
                </p>
                <p>
                        <label for="cphone">Phone <strong>*</strong></label>
                        <input id="cphone" name="phone" class="required digits" value="" />
                </p>
                <p>
                        <label for="cphone_confirm">Confirm phone <strong>*</strong></label>
                        <input id="cphone_confirm" equalTo="#cphone" name="confirm_phone" class="required digits" value="" />
                </p>
                <p>
                        <label for="ccomment">Your message <strong>*</strong></label>

                        <textarea id="ccomment" name="comment" class="required"></textarea>
                </p>
                  <p>
                         <label for="captcha">Enter the characters as seen on the image below (case insensitive)<strong>*</strong>
                         <a href="#" id="refreshimg" title="Click to refresh image"><img src="lib/captcha/images/image.php?<?php echo time(); ?>" width="132" height="46" alt="Captcha image" /></a></span></label>
                         <input type="text" maxlength="6" name="captcha" id="captcha" />
                </p>
                 <p>
                        <input class="submit" type="submit" value="Submit"/>
                </p>
        </fieldset>
	</form>
        <div id="result"></div>
</div>


<div id="contact-details">
	<p>Email: <a href="mailto:info@rainbownovelties.in">info@rainbownovelties.in</a><br/>
	Phone: 080-22254777, 080-22351125 <br/><br/>

	Monday to Friday – 10 AM to 7 PM<br/>
	Saturday – 10 AM to 1 PM <br/><br/>

	Office Address: <br/>
	No.6, 3rd Cross, J M lane, Balepet, Bangalore – 560053<br/><br/>

	Factory Address: <br/>
	No. 192/1, 4th cross, Cheluvadipalaya, Bangalore – 560053<br/><br/>
	</p>
</div>									 											 							  				
