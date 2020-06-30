<?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/save"); ?>
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Next</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="account[username]" pattern="[^\s]+" onkeypress="return AvoidSpace(event)" class="form-control" required="" placeholder="Username" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="account[password]" id="password" class="form-control" required="" placeholder="Password" />
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="account[confirm_password]" id="confirm_password" class="form-control" required="" placeholder="Confirm Password" />
			</div>
			
			<div class="form-group">
				<label for="account_type_id">Account Type</label>
				<select name="account[account_type_id]" id="account_type" class="form-control" required="" placeholder="Select">
					<option value="">Select Account Type</option>
					<?php foreach($general_class->data['all_data'] as $all_data_key=>$all_data_value): ?>
						<option value="<?php echo $all_data_value['main_account_type_id']?>"><?php echo ucwords($all_data_value['account_type_name']); ?> - (<?php echo ucwords($all_data_value['company_name']); ?>)</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group" id="section_container">
				<label for="account_type_id">Select Section</label>
				<select name="section" id="section" class="form-control" required="" placeholder="Select">
					<option value="">Select Section</option>
					<?php foreach($general_class->data['section'] as $section_key=>$section_value): ?>
						<option value="<?php echo $section_value['main_section_id']?>"><?php echo ucwords($section_value['section_name']); ?> (Grade <?php echo ucwords($section_value['grade_name']); ?>)</option>
					<?php endforeach; ?>
				</select>
			</div>

			



		</div>
	</div>

</div>
</form>
<script type="text/javascript">
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Password and Confirm Password does not match.");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

	$(document).ready(function() {
	    var opt = $("#section option").sort(function (a,b) { return a.value.toUpperCase().localeCompare(b.value.toUpperCase()) });
	    $("#section_container").hide();
	    $("#section").append(opt);
	    $("#account_type").change(function(){
	    	if($(this).val() == "5"){
	    		$("#section_container").show();
	    		$("#section").attr("required","");
	    	}else{
	    		$("#section_container").hide();
	    		$("#section").removeAttr("required");
	    	}
	    });

	});

	// $("#username").on('input',function(){
	// 	console.log($(this).val().replace(" ",""));
	// 	$("#username").val($(this).val().replace(" ",""));
	// });

	$("#username").bind("paste", function(e){
    // access the clipboard using the api
	    var pastedData = e.originalEvent.clipboardData.getData('text').replace(" ","");
	    // alert(pastedData);
	    pastedData = pastedData.replace(" ","");
	    // alert(pastedData);
	    $("#username").val(pastedData);
	} );

	function AvoidSpace(event) {
	    var k = event ? event.which : window.event.keyCode;
	    $("#username").val($("#username").val().replace(" ",""));
	    if (k == 32) return false;


	}
</script>