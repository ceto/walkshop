<?php
/**
* Template Name: Zoho Newsletter Form
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="csimpedwrap ps ps--wide ps--light">
    <div class="row">
        <div class="columns tablet-8 large-7 tablet-centered">
            <div class="callout csimped">
                <aside class="csimped__form">

                    <!--Zoho Campaigns Web-Optin Form's Header Code Starts Here-->

<script type="text/javascript" src="https://rdzb.maillist-manage.eu/js/optin.min.js" onload="setupSF('sf3z26b0a63655ffbdd0514252e5b2335c24496106d116de848df12e43c6524462a0','ZCFORMVIEW',false,'light',false,'0')"></script>
<script type="text/javascript">
	function runOnFormSubmit_sf3z26b0a63655ffbdd0514252e5b2335c24496106d116de848df12e43c6524462a0(th){
		/*Before submit, if you want to trigger your event, "include your code here"*/
	};
</script>

<style>
::-webkit-input-placeholder {
    color: rgb(62, 62, 62)
}
</style>

<!--Zoho Campaigns Web-Optin Form's Header Code Ends Here--><!--Zoho Campaigns Web-Optin Form Starts Here-->

<div id="sf3z26b0a63655ffbdd0514252e5b2335c24496106d116de848df12e43c6524462a0" data-type="signupform" style="opacity: 1;">
	<div id="customForm">
		<div name="SIGNUP_BODY" changeitem="BG_IMAGE" style="width: 300px; position: relative; font-family: Arial; background-color: rgb(255, 255, 255); margin: auto; overflow: hidden; border-bottom: 2rem solid #ffffff;">
			<!-- <div changeitem="ELEGANTFORM_IMAGE" style="width: 100%; height: 100%; position: absolute; top: -1.5rem">
				<img src="https://campaign-image.com/zohocampaigns/1301d85c_sign_form_bg_27_2_1.png" style="width: 100%; height: 100%; position: relative">
			</div> -->
			<div style="text-align: center; width: 100%; float: left; margin-top:20px; position: relative; z-index: 2">
				<div style="position:relative;">
					<div id="Zc_SignupSuccess" style="display:none;position:absolute;margin-left:4%;width:90%;background-color: white; padding: 3px; border: 3px solid rgb(194, 225, 154);  margin-top: 10px;margin-bottom:10px;word-break:break-all">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tbody>
								<tr>
									<td width="10%">
										<img class="successicon" src="https://rdzb.maillist-manage.eu/images/challangeiconenable.jpg" align="absmiddle">
									</td>
									<td>
										<span id="signupSuccessMsg" style="color: rgb(73, 140, 132); font-family: sans-serif; font-size: 14px;word-break:break-word">&nbsp;&nbsp;Köszönjük a feliratkozásodat!</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<form method="POST" id="zcampaignOptinForm" style="margin: 0px; width: 100%; color: rgb(255, 255, 255)" action="https://maillist-manage.eu/weboptin.zc" target="_zcSignup">
					<div style="background-color: rgb(255, 235, 232); padding: 10px; color: rgb(210, 0, 0); font-size: 11px; border: 1px solid rgb(255, 217, 211); opacity: 1; position: absolute; width: 80%; margin: 20px 10%; box-shadow: rgb(27, 27, 27) 0px 5px 12px 0px; margin: 50px 10%; z-index: 2; box-sizing: border-box; display: none" id="errorMsgDiv">A jelölt mező(ke)t ellenőrizd!</div>
					<div style="font-size: 18px; font-family: &quot;Poppins&quot;, &quot;Arial&quot;, sans-serif; font-weight: bold; color: rgb(62, 62, 62); line-height: 1.556; text-align: center; margin: 10px 0 0; width: 100%; float: left"><?php the_title(); ?></div>
					<div style="font-size: 14px; font-family: Poppins, Arial, sans-serif; font-weight: normal; color: rgb(62, 62, 62); float: left; text-align: center; margin: 0px 0px 0px; width: 300px; border-width: 15px; border-style: solid; border-color: rgba(0, 0, 0, 0)"><?php the_excerpt(); ?></div>
					<div style="position: relative; width: 230px; height: 40px; margin-bottom: 20px; display: inline-block">
						<input type="text" style="border: 2px solid #5b5e61; outline: none; border-radius: 6px; background-color: #fafafb; width: 100%; height: 100%; color: rgb(86, 86, 86); font-family: &quot;Poppins&quot;, &quot;Arial&quot;, sans-serif; text-align: left; padding: 5px 10px" placeholder="Hogy szólíthatunk?" changeitem="SIGNUP_FORM_FIELD" name="FIRSTNAME" id="FIRSTNAME">
					</div>
					<div style="text-align: center; width: 230px; height: 40px; margin: auto; margin-bottom: 20px">
						<div id="Zc_SignupSuccess" style="position: absolute; width: 87%; background-color: white; padding: 3px; border: 3px solid rgb(194, 225, 154); margin-bottom: 10px; word-break: break-all; opacity: 1; display: none">
							<div style="width: 20px; padding: 5px; display: table-cell">
								<img class="successicon" src="https://campaigns.zoho.com/images/challangeiconenable.jpg" style="width: 20px">
							</div>
							<div style="display: table-cell">
								<span id="signupSuccessMsg" style="color: rgb(73, 140, 132); font-family: sans-serif; font-size: 14px; line-height: 30px; display: block"></span>
							</div>
						</div>
						<input placeholder="Email" changeitem="SIGNUP_FORM_FIELD" name="CONTACT_EMAIL" id="EMBED_FORM_EMAIL_LABEL" type="text" style="border: 2px solid #5b5e61; outline: none; border-radius: 6px; background-color: #fafafb; width: 100%; height: 100%; color: rgb(86, 86, 86); font-family: &quot;Poppins&quot;, &quot;Arial&quot;, sans-serif; text-align: left; padding: 5px 10px">
					</div>
					<div style="position: relative; width: 230px; height: 42px; margin-top: 0; display: inline-block">
						<input type="button" style="text-align: center; background-color: rgb(84, 166, 151); color: rgb(255, 255, 255); width: 100%; height: 100%; border-radius: 6px; border: 0px; cursor: pointer; outline: none; font-size: 14px; font-weight: bold; font-family: Poppins, Arial, sans-serif" name="SIGNUP_SUBMIT_BUTTON" id="zcWebOptin" value="Feliratkozom">
					</div>
					<input type="hidden" id="fieldBorder" value="">
					<input type="hidden" id="submitType" name="submitType" value="optinCustomView">
					<input type="hidden" id="emailReportId" name="emailReportId" value="">
					<input type="hidden" id="formType" name="formType" value="QuickForm">
					<input type="hidden" name="zx" id="cmpZuid" value="14ac512516">
					<input type="hidden" name="zcvers" value="2.0">
					<input type="hidden" name="oldListIds" id="allCheckedListIds" value="">
					<input type="hidden" id="mode" name="mode" value="OptinCreateView">
					<input type="hidden" id="zcld" name="zcld" value="110fc59dbf64e691">
					<input type="hidden" id="zctd" name="zctd" value="">
					<input type="hidden" id="document_domain" value="">
					<input type="hidden" id="zc_Url" value="rdzb.maillist-manage.eu">
					<input type="hidden" id="new_optin_response_in" value="0">
					<input type="hidden" id="duplicate_optin_response_in" value="0">
					<input type="hidden" name="zc_trackCode" id="zc_trackCode" value="ZCFORMVIEW">
					<input type="hidden" id="zc_formIx" name="zc_formIx" value="3z26b0a63655ffbdd0514252e5b2335c24496106d116de848df12e43c6524462a0">
					<input type="hidden" id="viewFrom" value="URL_ACTION">
					<span style="display: none" id="dt_CONTACT_EMAIL">1,true,6,Contact Email,2</span>
					<span style="display: none" id="dt_FIRSTNAME">1,false,1,First Name,2</span>
					<span style="display: none" id="dt_LASTNAME">1,false,1,Last Name,2</span>
				</form>
			</div>
		</div>
	</div>
	<img src="https://rdzb.maillist-manage.eu/images/spacer.gif" id="refImage" onload="referenceSetter(this)" style="display:none;">
</div>
<input type="hidden" id="signupFormType" value="QuickForm_Vertical">
<div id="zcOptinOverLay" oncontextmenu="return false" style="display:none;text-align: center; background-color: rgb(0, 0, 0); opacity: 0.5; z-index: 100; position: fixed; width: 100%; top: 0px; left: 0px; height: 988px;"></div>
<div id="zcOptinSuccessPopup" style="display:none;z-index: 9999;width: 800px; height: 40%;top: 84px;position: fixed; left: 26%;background-color: #FFFFFF;border-color: #E6E6E6; border-style: solid; border-width: 1px;  box-shadow: 0 1px 10px #424242;padding: 35px;">
	<span style="position: absolute;top: -16px;right:-14px;z-index:99999;cursor: pointer;" id="closeSuccess">
		<img src="https://rdzb.maillist-manage.eu/images/videoclose.png">
	</span>
	<div id="zcOptinSuccessPanel"></div>
</div>

<!--Zoho Campaigns Web-Optin Form Ends Here-->






                    <div class="formactions">
                        <div class="formactions__instruction" style="margin:1rem auto 0; float:none; text-align:center;">
                            <p>Feliratkozásoddal elfogadod az <a href="<?php the_permalink( 978 ) ?>">általános szerződési feltételeket.</a></p>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- <div class="csimpifooter">
                <?php the_content(); ?>
            </div> -->
        </div>
    </div>
</div>
<?php endwhile; ?>


