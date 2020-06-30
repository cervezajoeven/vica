<style type="text/css">
	.adding{
		background-color: #edffee;
	}
	<?php if($general_class->session->userdata('account_type_id')==5):?>
	.action_element{
		display: none;
	}
	.admin_action{
		display: none;
	}
	<?php endif; ?>
	td:first-child{
		width: 10%;
	}
	td:last-child{
		width: 20%;
	}
	label{
		width: 100%;
	}
	.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon, .radio label input[type="radio"]:checked + .cr > .cr-icon {
	    transform: scale(1) rotateZ(0deg);
	    opacity: 1;
	    left: 3px;
	}
</style>


<li id="key_clone_identification" style="display: none" class="adding file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr>
			<td>
				<div class="radio">
		            <label style="font-size: 1.5em">
		                Type : Identification
		            </label>
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group checkbox">
		            <label style="font-size: 1.5em">
		                Number of options
		            </label>
		            <input type="number" id="key_clone_number_of_options" class="form-control" value="1" placeholder="1">
		            <select class="form-control"></select>
		            
		        </div>

		        
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <button class="done_adding form-control btn btn-success">Done</button>
		            <button class="cancel_adding form-control btn btn-danger">Cancel</button>
		        </div>
			</td>

		</tr>
	</table>
</li>

<li id="identification_key" style="display: none;" class="file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr id="first_row">
			<td id="number_container">
				<div class="radio">
		            <label class="sort_number" id="number" style="font-size: 1.5em">
		                
		            </label>
		        </div>
			</td>
			<td id="first_element">
	            <label style="font-size: 1.5em">
	            	<span class="semi_number" id="semi_number"></span>
	                <input type="text" name="" class="the_input form-control" value=""/>
	            </label>

			</td>
			
			<td class="action_element" id="action_element">
				<div id="action_element_container">
					<input type="number" placeholder="Score/Options" value="1" class="the_score form-control" name="" />
					<button id="key_delete" class="btn btn-danger form-control delete_button" style="padding: 0px" li_delete="">Delete</button>
				</div>
			</td>
		</tr>
		
	</table>
</li>

<li id="key_clone_multiple_choice" style="display: none" class="adding file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr>
			<td>
				<div class="radio">
		            <label style="font-size: 1.5em">
		                Type : Multiple Choice
		            </label>
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <label style="font-size: 1.5em">
		                Number of options
		            </label>
		            <input type="number" id="key_clone_number_of_options" class="form-control" value="4" placeholder="4">
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <button class="done_adding form-control btn btn-success">Done</button>
		            <button class="cancel_adding form-control btn btn-danger">Cancel</button>
		        </div>
			</td>

		</tr>
	</table>
</li>

<li id="multiple_choice_key" style="display: none;" class="file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr id="first_row">
			<td id="number_container">
				<div class="radio">
		            <label class="sort_number" id="number" style="font-size: 1.5em">
		                
		            </label>
		        </div>
			</td>
			<td id="first_element">
            	<div class="radio">
		            <label style="font-size: 1.5em">
		                <input type="radio" class="the_radio the_input" name="">
		                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
		                <span id="the_letter" class="the_letter">A</span>
		            </label>
		        </div>
			</td>
			
			<td class="action_element" id="action_element">
				<div id="action_element_container">
					<input type="number" placeholder="Score" value="1" class="the_score form-control" name="" />
					<button id="key_delete" class="btn btn-danger form-control delete_button" style="padding: 0px" li_delete="">Delete</button>
				</div>
			</td>
		</tr>
		
	</table>
</li>

<li id="key_clone_true_or_false" style="display: none" class="adding file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr>
			<td>
				<div class="radio">
		            <label style="font-size: 1.5em">
		                Type : True or False
		            </label>
		        </div>
			</td>

		</tr>

		<tr>
			<td>
				<div class="form-group radio">
		            <button class="done_adding form-control btn btn-success">Done</button>
		            <button class="cancel_adding form-control btn btn-danger">Cancel</button>
		        </div>
			</td>

		</tr>
	</table>
</li>

<li id="true_or_false_key" style="display: none;" class="file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr id="first_row">
			<td id="number_container">
				<div class="radio">
		            <label class="sort_number" id="number" style="font-size: 1.5em">
		                
		            </label>
		        </div>
			</td>
			<td id="first_element">
            	<div class="radio">
		            <label style="font-size: 1.5em">
		                <input type="radio" class="the_radio the_input" name="" value="">
		                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
		                <span id="the_letter" class="the_letter">True</span>
		            </label>
		        </div>
			</td>
			<td id="second_element">
            	<div class="radio">
		            <label style="font-size: 1.5em">
		                <input type="radio" class="the_radio the_input" name="" value="">
		                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
		                <span id="the_letter" class="the_letter">False</span>
		            </label>
		        </div>
			</td>
			
			<td class="action_element" id="action_element">
				<div id="action_element_container">
					<input type="number" placeholder="Score" value="1" class="the_score form-control" name="" />
					<button id="key_delete" class="btn btn-danger form-control delete_button" style="padding: 0px" li_delete="">Delete</button>
				</div>
			</td>
		</tr>
		
	</table>
</li>

<li id="key_clone_multiple_answers" style="display: none" class="adding file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr>
			<td>
				<div class="radio">
		            <label style="font-size: 1.5em">
		                Type : Multiple Answers
		            </label>
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <label style="font-size: 1.5em">
		                Number of options
		            </label>
		            <input type="number" id="key_clone_number_of_options" class="form-control" value="4" placeholder="4">
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <button class="done_adding form-control btn btn-success">Done</button>
		            <button class="cancel_adding form-control btn btn-danger">Cancel</button>
		        </div>
			</td>

		</tr>
	</table>
</li>

<li id="multiple_answers_key" style="display: none;" class="file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr id="first_row">
			<td id="number_container">
				<div class="radio">
		            <label class="sort_number" id="number" style="font-size: 1.5em">
		                
		            </label>
		        </div>
			</td>
			<td id="first_element">
            	<div class="checkbox">
		            <label style="font-size: 1.5em">
		                <input type="checkbox" class="the_input" name="" value="">
		                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
		                <span id="the_letter" class="the_letter">A</span>
		            </label>
		        </div>
			</td>
			
			<td class="action_element" id="action_element">
				<div id="action_element_container">
					<input type="number" placeholder="Score" value="1" class="the_score form-control" name="" />
					<button id="key_delete" class="btn btn-danger form-control delete_button" style="padding: 0px" li_delete="">Delete</button>
				</div>
			</td>
		</tr>
		
	</table>
</li>

<li id="key_clone_essay" style="display: none" class="adding file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr>
			<td>
				<div class="radio">
		            <label style="font-size: 1.5em">
		                Type : Essay
		            </label>
		        </div>
			</td>

		</tr>
		<tr>
			<td>	
				<div class="form-group radio">
		            <label style="font-size: 1.5em">
		                Number of options
		            </label>
		            <input type="number" id="key_clone_number_of_options" class="form-control" value="1" placeholder="1">
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <button class="done_adding form-control btn btn-success">Done</button>
		            <button class="cancel_adding form-control btn btn-danger">Cancel</button>
		        </div>
			</td>

		</tr>
	</table>
</li>

<li id="essay_key" style="display: none;" class="file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr id="first_row">
			<td id="number_container">
				<div class="radio">
		            <label class="sort_number" id="number" style="font-size: 1.5em">
		                
		            </label>
		        </div>
			</td>
			<td id="first_element">
	            <label style="font-size: 1.5em">
	            	<span class="semi_number" id="semi_number"></span>
	                <textarea type="text" name="" class="form-control" value=""></textarea>
	            </label>

			</td>
			
			<td class="action_element" id="action_element">
				<div id="action_element_container">
					<input type="number" placeholder="Score/Options" value="1" class="the_score form-control" name="" />
					<button id="key_delete" class="btn btn-danger form-control delete_button" style="padding: 0px" li_delete="">Delete</button>
				</div>
			</td>
		</tr>
		
	</table>
</li>




<li id="key_clone_matching_type" style="display: none" class="adding file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr>
			<td>
				<div class="radio">
		            <label style="font-size: 1.5em">
		                Type : Matching Type
		            </label>
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <label style="font-size: 1.5em">
		                Number of options
		            </label>
		            <input type="number" id="key_clone_number_of_options" class="form-control" value="4" placeholder="4">
		        </div>
			</td>

		</tr>
		<tr>
			<td>
				<div class="form-group radio">
		            <button class="done_adding form-control btn btn-success">Done</button>
		            <button class="cancel_adding form-control btn btn-danger">Cancel</button>
		        </div>
			</td>

		</tr>
	</table>
</li>

<li id="matching_type_key" style="display: none;" class="file-preview-frame ben-default ui-state-default kv-preview-thumb">
	<table class="table">
		<tr id="first_row">
			<td id="number_container">
				<div class="radio">
		            <label class="sort_number" id="number" style="font-size: 1.5em">
		                
		            </label>
		        </div>
			</td>
			<td id="first_element">
	            <label style="font-size: 1.5em">
	            	<span class="semi_number" id="semi_number"></span>
	                <select id="the_input" class="form-control">
	                	<option>A</option>
	                	<option>B</option>
	                	<option>C</option>
	                	<option>D</option>
	                </select>
	            </label>

			</td>
			
			<td class="action_element" id="action_element">
				<div id="action_element_container">
					<input type="number" placeholder="Score/Options" value="4" class="the_score form-control" name="" />
					<button id="key_delete" class="btn btn-danger form-control delete_button" style="padding: 0px" li_delete="">Delete</button>
				</div>
			</td>
		</tr>
		
	</table>
</li>

<!-- <input type="hidden" id="the_answers" value="<?php echo $this->data['optical'][0]['answers']; ?>" name=""> -->

<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/bootstrap.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/piexif.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/sortable.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/purify.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/fileinput.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/theme.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/jquery-ui.js')?>"></script>

<script type="text/javascript">
	var window_height = $(".left").height();
	var add_key_select = "";
	var numbering = $(".the_key").length;
	var cloned_key;
	var live_answers;
	function genCharArray(charA, charZ) {
	    var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0);
	    for (; i <= j; ++i) {
	        a.push(String.fromCharCode(i));
	    }
	    return a;
	}
	<?php if($general_class->session->userdata('account_type_id')!=5):?>
		$(document).ready(function(){
			var the_answers = '<?php echo $this->data["optical"][0]["answers"]; ?>';
			if(the_answers != ""){
				the_answers = JSON.parse(the_answers);
				console.log(the_answers);
				$.each(the_answers,function(key,value){
					var object_key = Object.keys(value)[0];

					if(object_key.includes("multiple_choice")){

						var teacher_answer = value[object_key].split(",");
						$("#"+object_key).find(".the_score").val(value.the_score);
						$.each(teacher_answer,function(option_key,option_value){
							
							$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
						});
						$.each(teacher_answer,function(option_key,option_value){
							
							if(option_value=="1"){
								$("#"+object_key).find(".the_input").eq(option_key).attr("checked","checked");
							}
						});
						
					}
					if(object_key.includes("multiple_answers")){
						var teacher_answer = value[object_key].split(",");
						$("#"+object_key).find(".the_score").val(value.the_score);
						$.each(teacher_answer,function(option_key,option_value){

							if(option_value=="1"){

								$("#"+object_key).find(".the_input").eq(option_key).attr("checked","checked");
							}else{
								$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
							}
						});
					}

					if(object_key.includes("true_or_false")){
						var teacher_answer = value[object_key].split(",");
						$("#"+object_key).find(".the_score").val(value.the_score);
						$.each(teacher_answer,function(option_key,option_value){
							
							$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
						});
						$.each(teacher_answer,function(option_key,option_value){
							
							if(option_value=="1"){
								$("#"+object_key).find(".the_input").eq(option_key).attr("checked","checked");
							}
						});
					}

					if(object_key.includes("identification")){
						var teacher_answer = value[object_key];
						$("#"+object_key).find(".the_score").val(value.the_score);
						$.each(teacher_answer,function(option_key,option_value){
							
							$("#"+object_key).find(".the_input").eq(option_key).val(option_value[option_key]);
						});
					}

					if(object_key.includes("essay")){
						var teacher_answer = value[object_key];
						$("#"+object_key).find(".the_score").val(value.the_score);
						$.each(teacher_answer,function(option_key,option_value){
							
							$("#"+object_key).find(".the_input").eq(option_key).val(option_value[option_key]);
						});
					}
					if(object_key.includes("matching_type")){
						var teacher_answer = value[object_key];
						$("#"+object_key).find(".the_score").val(value.the_score);
						$.each(teacher_answer,function(option_key,option_value){
							var option_answer = option_value[option_key];
							var options_select = $("#"+object_key).find(".the_input").eq(option_key).find("option");
							$(options_select).removeAttr("selected");
						});

						$.each(teacher_answer,function(option_key,option_value){
							var option_answer = option_value[option_key];
							var options_select = $("#"+object_key).find(".the_input").eq(option_key).find("option");
							options_select.eq(parseInt(option_answer)).attr("selected","selected");
						});
						
					}

				});
			}else{
				console.log("no answers");
			}
		});
	<?php else:?>
		
		
		<?php if($this->data['optical_answer_sheet']):?>
			$(document).ready(function(){
				var the_answers = '<?php echo $this->data["optical_answer_sheet"][0]["answers"]; ?>';
				if(the_answers != ""){
					the_answers = JSON.parse(the_answers);
					console.log(the_answers);
					$.each(the_answers,function(key,value){
						var object_key = Object.keys(value)[0];

						if(object_key.includes("multiple_choice")){

							var teacher_answer = value[object_key].split(",");
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
							});
							$.each(teacher_answer,function(option_key,option_value){
								
								if(option_value=="1"){
									$("#"+object_key).find(".the_input").eq(option_key).attr("checked","checked");
								}
							});
							
						}
						if(object_key.includes("multiple_answers")){
							var teacher_answer = value[object_key].split(",");
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){

								if(option_value=="1"){

									$("#"+object_key).find(".the_input").eq(option_key).attr("checked","checked");
								}else{
									$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
								}
							});
						}

						if(object_key.includes("true_or_false")){
							var teacher_answer = value[object_key].split(",");
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
							});
							$.each(teacher_answer,function(option_key,option_value){
								
								if(option_value=="1"){
									$("#"+object_key).find(".the_input").eq(option_key).attr("checked","checked");
								}
							});
						}

						if(object_key.includes("identification")){
							var teacher_answer = value[object_key];
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).val(option_value[option_key]);
							});
						}

						if(object_key.includes("essay")){
							var teacher_answer = value[object_key];
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).val(option_value[option_key]);
							});
						}
						if(object_key.includes("matching_type")){
							var teacher_answer = value[object_key];
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								var option_answer = option_value[option_key];
								var options_select = $("#"+object_key).find(".the_input").eq(option_key).find("option");
								$(options_select).removeAttr("selected");
							});

							$.each(teacher_answer,function(option_key,option_value){
								var option_answer = option_value[option_key];
								var options_select = $("#"+object_key).find(".the_input").eq(option_key).find("option");
								options_select.eq(parseInt(option_answer)).attr("selected","selected");
							});
							
						}

					});
				}else{
					console.log("no answers");
				}
			});
		<?php else: ?>

			$(document).ready(function(){
				var the_answers = '<?php echo $this->data["optical"][0]["answers"]; ?>';
				if(the_answers != ""){
					the_answers = JSON.parse(the_answers);
					$.each(the_answers,function(key,value){
						var object_key = Object.keys(value)[0];

						if(object_key.includes("multiple_choice")){

							var teacher_answer = value[object_key].split(",");
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
							});
							
						}
						if(object_key.includes("multiple_answers")){
							var teacher_answer = value[object_key].split(",");
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){


								$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");

							});
						}

						if(object_key.includes("true_or_false")){
							var teacher_answer = value[object_key].split(",");
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).removeAttr("checked");
							});

						}

						if(object_key.includes("identification")){
							var teacher_answer = value[object_key];
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).val("");
							});
						}

						if(object_key.includes("essay")){
							var teacher_answer = value[object_key];
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								
								$("#"+object_key).find(".the_input").eq(option_key).val("");
							});
						}
						if(object_key.includes("matching_type")){
							var teacher_answer = value[object_key];
							$("#"+object_key).find(".the_score").val(value.the_score);
							$.each(teacher_answer,function(option_key,option_value){
								var option_answer = option_value[option_key];
								var options_select = $("#"+object_key).find(".the_input").eq(option_key).find("option");
								$(options_select).removeAttr("selected");
							});
							
						}

					});
				}else{
					console.log("no answers");
				}
			});
		<?php endif; ?>




	<?php endif;?>
	function update_numbering(){
		var updated_length = $(".the_key").length;
		
		for(var sort_numbering = 1; sort_numbering<=updated_length;sort_numbering++){

			var li_id = $(".the_key").eq(sort_numbering-1).attr("id").split("_");
			li_id[li_id.length-1] = String(sort_numbering);
			$(".the_key").eq(sort_numbering-1).attr("id",li_id.join("_"));
			$(".the_key").eq(sort_numbering-1).find(".delete_button").eq(0).attr("li_delete",li_id.join("_"));
			$(".the_key").eq(sort_numbering-1).find(".the_input").attr("name",li_id.join("_"));
			$(".the_key").eq(sort_numbering-1).find(".sort_number").text(sort_numbering);
			var semi_number = $(".the_key").eq(sort_numbering-1).find(".semi_number");
			if($(semi_number).length){
				$.each(semi_number,function(semi_number_key,semi_number_value){
					var point_number = $(semi_number_value).text().split(".")[1];
					$(semi_number_value).text(sort_numbering+"."+point_number);

				});
			}
			

		}
	}

	function show_add_key(){
		$("#add_key").show();
		$("#add_key_select").show();
	}
	function hide_add_key(){
		$("#add_key").hide();
		$("#add_key_select").hide();
	}
	function delete_key(){
		$("#key_clone_"+add_key_select).remove();
	}
	function add_number(){
		numbering = numbering+1;
	}
	function subtract_number(){
		numbering = numbering-1;
	}

	function id_cleanup(data){
		data.find("#first_row").removeAttr("id");
		data.find("#first_element").removeAttr("id");
		data.find("#action_element").removeAttr("id");
		data.find("#semi_number").removeAttr("id");
		data.find("#number").removeAttr("id");
		data.find("#action_element_container").removeAttr("id");
		data.find("#key_delete").removeAttr("id");
	}
	function add_key(){

		if(add_key_select=="identification"){
			add_number();
			number_of_options = cloned_key.find("#key_clone_number_of_options").val();
			var new_key = $("#"+add_key_select+"_key").clone().attr("id",add_key_select+"_"+numbering).addClass("the_key "+add_key_select);
			new_key.find("#the_letter").removeAttr("id");
			new_key.find(".the_score").eq(0).val(number_of_options);
			new_key.find("#number_container").removeAttr("id");
			new_key.find("#number").text(numbering);
			new_key.find("#number").remove("id");
			new_key.find("#first_row").find("#semi_number").text(numbering+"."+1);
			for(var count = 1;count<number_of_options;count++){
				var choices = new_key.find("#first_element").clone().removeAttr("id");
				var first_row = new_key.find("#first_row").clone().removeAttr("id");
				first_row.find("#action_element").empty().removeAttr("id");
				first_row.find("td").eq(0).empty().removeAttr("id");
				var number_count = count+1;
				first_row.find("#semi_number").empty().text(numbering+"."+number_count);
				new_key.find("tr").last().after(first_row);
			}
			new_key.find("#key_delete").attr("li_delete",add_key_select+"_"+numbering);
			id_cleanup(new_key);

		}
		else if(add_key_select=="multiple_choice"){
			add_number();
			number_of_options = cloned_key.find("#key_clone_number_of_options").val();
			var new_key = $("#"+add_key_select+"_key").clone().attr("id",add_key_select+"_"+numbering).addClass("the_key "+add_key_select);
			new_key.find("#the_letter").removeAttr("id");
			new_key.find("#number_container").removeAttr("id");
			new_key.find("#number").text(numbering);
			new_key.find("#number").remove("id");
			new_key.find("#first_row").find("#semi_number").text(numbering+"."+1);
			for(var count = 1;count<number_of_options;count++){
				var choices = new_key.find("#first_element").clone().removeAttr("id");
				var td_count = new_key.find("td").length;
				new_key.find("#first_element").find(".the_radio").eq(0).attr("name","multiple_choice_"+numbering);
				choices.find(".the_radio").eq(0).attr("name","multiple_choice_"+numbering);
				choices.find(".the_radio").eq(0).removeAttr("id");
				choices.find(".the_letter").text(genCharArray('A','Z')[count]);

				new_key.find("td").eq(td_count-2).after(choices);
			}
			new_key.find("#key_delete").attr("li_delete",add_key_select+"_"+numbering);
			id_cleanup(new_key);
		}
		else if(add_key_select=="true_or_false"){
			add_number();
			number_of_options = cloned_key.find("#key_clone_number_of_options").val();
			var new_key = $("#"+add_key_select+"_key").clone().attr("id",add_key_select+"_"+numbering).addClass("the_key "+add_key_select);
			new_key.find("#the_letter").removeAttr("id");
			new_key.find("#number_container").removeAttr("id");
			new_key.find("#number").text(numbering);
			new_key.find("#number").remove("id");
			new_key.find("#first_row").find("#semi_number").text(numbering+"."+1);
			new_key.find("#first_element").find(".the_radio").eq(0).attr("name","true_or_false_"+numbering);
			new_key.find("#second_element").find(".the_radio").eq(0).attr("name","true_or_false_"+numbering);
			new_key.find("#key_delete").attr("li_delete",add_key_select+"_"+numbering);
			id_cleanup(new_key);
		}

		else if(add_key_select=="multiple_answers"){
			add_number();
			number_of_options = cloned_key.find("#key_clone_number_of_options").val();
			var new_key = $("#"+add_key_select+"_key").clone().attr("id",add_key_select+"_"+numbering).addClass("the_key "+add_key_select);
			new_key.find("#the_letter").removeAttr("id");
			new_key.find("#number_container").removeAttr("id");
			new_key.find("#number").text(numbering);
			new_key.find("#number").remove("id");
			new_key.find("#first_row").find("#semi_number").text(numbering+"."+1);
			for(var count = 1;count<number_of_options;count++){
				var choices = new_key.find("#first_element").clone().removeAttr("id");
				var td_count = new_key.find("td").length;
				new_key.find("#first_element").find(".the_input").eq(0).attr("name","multiple_choice_"+numbering);
				choices.find(".the_input").eq(0).attr("name","multiple_choice_"+numbering);
				choices.find(".the_input").eq(0).removeAttr("id");
				choices.find(".the_letter").text(genCharArray('A','Z')[count]);
				new_key.find("td").eq(td_count-2).after(choices);
			}
			new_key.find("#key_delete").attr("li_delete",add_key_select+"_"+numbering);
			id_cleanup(new_key);
		}
		else if(add_key_select=="essay"){
			add_number();
			number_of_options = cloned_key.find("#key_clone_number_of_options").val();
			var new_key = $("#"+add_key_select+"_key").clone().attr("id",add_key_select+"_"+numbering).addClass("the_key "+add_key_select);
			new_key.find("#the_letter").removeAttr("id");
			new_key.find(".the_score").eq(0).val(number_of_options);
			new_key.find("#number_container").removeAttr("id");
			new_key.find("#number").text(numbering);
			new_key.find("#number").remove("id");
			new_key.find("#first_row").find("#semi_number").text(numbering+"."+1);
			new_key.find("textarea").attr("name","essay_"+numbering);
			new_key.find("textarea").addClass("the_input");
			for(var count = 1;count<number_of_options;count++){
				var choices = new_key.find("#first_element").clone().removeAttr("id");
				var first_row = new_key.find("#first_row").clone().removeAttr("id");
				
				first_row.find("#action_element").empty().removeAttr("id");
				first_row.find("td").eq(0).empty().removeAttr("id");
				first_row.find("textarea").attr("name","essay_"+numbering);
				first_row.find("textarea").addClass("the_input");
				var number_count = count+1;
				first_row.find("#semi_number").empty().text(numbering+"."+number_count);
				new_key.find("tr").last().after(first_row);
			}
			new_key.find("#key_delete").attr("li_delete",add_key_select+"_"+numbering);
			id_cleanup(new_key);

		}

		else if(add_key_select=="matching_type"){
			add_number();
			number_of_options = cloned_key.find("#key_clone_number_of_options").val();
			var new_key = $("#"+add_key_select+"_key").clone().attr("id",add_key_select+"_"+numbering).addClass("the_key "+add_key_select);
			new_key.find("#the_letter").removeAttr("id");
			new_key.find(".the_score").eq(0).val(number_of_options);
			new_key.find("#number_container").removeAttr("id");
			new_key.find("#number").text(numbering);
			new_key.find("#number").remove("id");

			new_key.find("#first_row").find("#semi_number").text(numbering+"."+1);
			new_key.find("#the_input").addClass("the_input");
			new_key.find("#the_input").empty();
			for(var	new_count = 0;new_count<number_of_options;new_count++){
					new_key.find("#the_input").append("<option value="+new_count+">"+genCharArray('A','Z')[new_count]+"</option>");
				}
			for(var count = 1;count<number_of_options;count++){
				var choices = new_key.find("#first_element").clone().removeAttr("id");
				var first_row = new_key.find("#first_row").clone().removeAttr("id");

				first_row.find("#the_input").addClass("the_input");
				first_row.find("#the_input").empty();
				for(var	new_count = 0;new_count<number_of_options;new_count++){
					first_row.find("#the_input").append("<option value="+new_count+">"+genCharArray('A','Z')[new_count]+"</option>");
				}
				first_row.find("#action_element").empty().removeAttr("id");
				first_row.find("td").eq(0).empty().removeAttr("id");
				var number_count = count+1;
				first_row.find("#semi_number").empty().text(numbering+"."+number_count);
				new_key.find("tr").last().after(first_row);
			}
			new_key.find("#key_delete").attr("li_delete",add_key_select+"_"+numbering);
			id_cleanup(new_key);

		}

		$(".sortable").append(new_key.show());
	}
	$("#add_key").click(function(){
		add_key_select = $("#add_key_select").val();
		cloned_key = $("#key_clone_"+add_key_select).clone();
		$(this).hide();
		$("#add_key_select").hide();
		$(".sortable").append(cloned_key.show());
	});

	$(document).on("click",".delete_button",function(){
		var li_delete = $(this).attr("li_delete");
		$("#"+li_delete).remove();
		update_numbering();
		subtract_number();
	});

	$(document).on("click",".save",function(){
		var correct_answer_key = [];
		var score = [];
		var optical_save_url = "<?php echo $general_class->ben_link('lms/optical/save_optical/'); ?>";
		var answer_key = $(".sortable").html();
		var id = "<?php echo $general_class->data['optical'][0]['id']?>";

		$.each($(".the_key"),function(key,value){
			if($(value).hasClass('multiple_choice')){
				var radio_array = [];
				var radio_id = $(value).attr("id");

				$.each($(value).find(".the_radio"),function(radio_key,radio_value){
					if($(radio_value).is(":checked")){
						radio_array.push("1");
					}else{
						radio_array.push("0");
					}
				});

				var number_of_options = 1;
				var the_score = $(value).find(".the_score").val();
				var radio_json = {[radio_id]:radio_array.join(","),number_of_options:number_of_options,the_score:the_score};
				correct_answer_key.push(radio_json);

			}else if($(value).hasClass('identification')){
				var the_array = [];
				var the_id = $(value).attr("id");
				var holder = [];
				$.each($(value).find(".the_input"),function(key,value){
					var inputs_object = {[key]:$(value).val()};
					holder.push(inputs_object);
				});

				var number_of_options = $(value).find(".the_input").length;
				var the_score = $(value).find(".the_score").val();
				var final_holder = {[the_id]:holder,number_of_options:number_of_options,the_score,the_score};
				correct_answer_key.push(final_holder);

			}else if($(value).hasClass('multiple_answers')){
				var the_array = [];
				var the_id = $(value).attr("id");
				var holder = [];
				$.each($(value).find(".the_input"),function(key,value){
					if($(value).is(":checked")){
						the_array.push("1");
					}else{
						the_array.push("0");
					}
				});
				var number_of_options = 1;
				var the_score = $(value).find(".the_score").val();
				var the_json = {[the_id]:the_array.join(","),number_of_options:number_of_options,the_score:the_score};
				correct_answer_key.push(the_json);

			}else if($(value).hasClass('true_or_false')){
				var the_array = [];
				var the_id = $(value).attr("id");
				var holder = [];
				$.each($(value).find(".the_input"),function(key,value){
					if($(value).is(":checked")){
						the_array.push("1");
					}else{
						the_array.push("0");
					}
				});
				var number_of_options = 1;
				var the_score = $(value).find(".the_score").val();
				var the_json = {[the_id]:the_array.join(","),number_of_options:number_of_options,the_score:the_score};
				correct_answer_key.push(the_json);
			}else if($(value).hasClass('matching_type')){
				var the_array = [];
				var the_id = $(value).attr("id");
				var holder = [];
				$.each($(value).find(".the_input"),function(key,value){
					var inputs_object = {[key]:$(value).val()};
					holder.push(inputs_object);
				});
				var number_of_options = $(value).find(".the_input").length;
				var the_score = $(value).find(".the_score").val();
				var final_holder = {[the_id]:holder,number_of_options:number_of_options,the_score:the_score};
				correct_answer_key.push(final_holder);
			}else if($(value).hasClass('essay')){
				var the_array = [];
				var the_id = $(value).attr("id");
				var holder = [];
				$.each($(value).find(".the_input"),function(key,value){
					var inputs_object = {[key]:$(value).val()};
					holder.push(inputs_object);
				});
				var number_of_options = $(value).find(".the_input").length;
				var the_json = {[the_id]:the_array.join(",")};
				var the_score = $(value).find(".the_score").val();
				var final_holder = {[the_id]:holder,number_of_options:number_of_options,the_score:the_score};
				correct_answer_key.push(final_holder);
			}
		});
		var answers = JSON.stringify(correct_answer_key);
		live_answers = JSON.stringify(correct_answer_key);
		// console.log(optical_save_url);

		$.ajax({
	      	type: "POST",
	      	url: optical_save_url,
	      	data: {id:id,answer_key:answer_key,answers:answers},
	      	success: function (result) {

	      		if(result=="yes"){







	      		var the_answers = live_answers;
				var the_actual_answers = JSON.parse(live_answers);
				var the_real_score = 0;
				var total_score = 0;
				if(the_answers != ""){
					the_answers = JSON.parse(the_answers);
					$.each(the_answers,function(key,value){
						var object_key = Object.keys(value)[0];
						// console.log(value[object_key]);

						$.each(the_actual_answers,function(the_actual_answers_key,the_actual_answers_value){
							var actual_object_key = Object.keys(the_actual_answers_value)[0];
							if(object_key == actual_object_key){
								if(actual_object_key.includes("multiple_choice")||actual_object_key.includes("multiple_answers")||actual_object_key.includes("true_or_false")){
									// console.log(actual_object_key);
									if(the_actual_answers_value[actual_object_key].toLowerCase()==value[actual_object_key].toLowerCase()){
										the_real_score = parseInt(the_real_score)+parseInt(the_actual_answers_value['the_score']);
									}else{
										// $("#"+actual_object_key).css("border","3px solid red");
									}
									total_score = parseInt(total_score)+parseInt(the_actual_answers_value['the_score']);
								}
								// if(actual_object_key.includes("matching_type")){
								if(actual_object_key.includes("essay")||actual_object_key.includes("identification")||actual_object_key.includes("matching_type")){
									// console.log(the_actual_answers_value);
										
									$.each(the_actual_answers_value[actual_object_key],function(option_key,option_value){
										// console.log(value[actual_object_key][option_key][option_key]);
										// console.log(option_value[option_key]);
										var score_divider = the_actual_answers_value['the_score']/the_actual_answers_value['number_of_options'];
										if(value[actual_object_key][option_key][option_key].toLowerCase() == option_value[option_key].toLowerCase()){

											the_real_score = parseInt(the_real_score)+parseInt(score_divider);

										}else{
											// $("#"+actual_object_key).find(".the_input").eq(option_key).css("border","3px solid red");
										}
										total_score = parseInt(total_score)+parseInt(score_divider);
									});

								}
							}
							

						});

					});


					$.ajax({
				      	type: "POST",
				      	url: optical_save_url,
				      	data: {id:id,answer_key:answer_key,answers:answers,total_score:total_score},
				      	success: function (result) {
				      		// console.log(result);
	      					if(result=="yes"){
	      						alert("Quiz has been successfully saved.");

				      			// window.location.replace("<?php echo $general_class->ben_link('lms/quiz/index/'); ?>");
				      		}else{
				      			alert("Not saved properly");
				      		}
				      	}
					});


				}else{
					console.log("no answers");
				}


					





















	      		}else{
	      			alert("Not saved properly");
	      		}
	      	}
		});
	});
<?php if($general_class->session->userdata('account_type_id')==5):?>
	$(document).on("click",".the_key",function(){
			var correct_answer_key = [];
			var score = [];
			var optical_save_url = "<?php echo $general_class->ben_link('lms/optical/auto_save/'); ?>";
			var answer_key = $(".sortable").html();
			var id = "<?php echo $general_class->data['optical'][0]['id']?>";
			var account_id = "<?php echo $general_class->session->userdata('id'); ?>";
			var quiz_id = '<?php echo $general_class->data["optical"][0]['quiz_id']; ?>';
			var quiz_assign_id = '<?php echo $general_class->data["quiz_assign_id"]; ?>';

			$.each($(".the_key"),function(key,value){
				if($(value).hasClass('multiple_choice')){
					var radio_array = [];
					var radio_id = $(value).attr("id");

					$.each($(value).find(".the_radio"),function(radio_key,radio_value){
						if($(radio_value).is(":checked")){
							radio_array.push("1");
						}else{
							radio_array.push("0");
						}
					});

					var number_of_options = 1;
					var the_score = $(value).find(".the_score").val();
					var radio_json = {[radio_id]:radio_array.join(",")};
					correct_answer_key.push(radio_json);

				}else if($(value).hasClass('identification')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						var inputs_object = {[key]:$(value).val()};
						holder.push(inputs_object);
					});

					var number_of_options = $(value).find(".the_input").length;
					var the_score = $(value).find(".the_score").val();
					var final_holder = {[the_id]:holder};
					correct_answer_key.push(final_holder);

				}else if($(value).hasClass('multiple_answers')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						if($(value).is(":checked")){
							the_array.push("1");
						}else{
							the_array.push("0");
						}
					});
					var number_of_options = 1;
					var the_score = $(value).find(".the_score").val();
					var the_json = {[the_id]:the_array.join(",")};
					correct_answer_key.push(the_json);

				}else if($(value).hasClass('true_or_false')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						if($(value).is(":checked")){
							the_array.push("1");
						}else{
							the_array.push("0");
						}
					});
					var number_of_options = 1;
					var the_score = $(value).find(".the_score").val();
					var the_json = {[the_id]:the_array.join(",")};
					correct_answer_key.push(the_json);
				}else if($(value).hasClass('matching_type')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						var inputs_object = {[key]:$(value).val()};
						holder.push(inputs_object);
					});
					var number_of_options = $(value).find(".the_input").length;
					var the_score = $(value).find(".the_score").val();
					var final_holder = {[the_id]:holder};
					correct_answer_key.push(final_holder);
				}else if($(value).hasClass('essay')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						var inputs_object = {[key]:$(value).val()};
						holder.push(inputs_object);
					});
					var number_of_options = $(value).find(".the_input").length;
					var the_json = {[the_id]:the_array.join(",")};
					var the_score = $(value).find(".the_score").val();
					var final_holder = {[the_id]:holder};
					correct_answer_key.push(final_holder);
				}
			});
			var answers = JSON.stringify(correct_answer_key);
			live_answers = JSON.stringify(correct_answer_key);
			// console.log(correct_answer_key);
			$.ajax({
		      	type: "POST",
		      	url: optical_save_url,
		      	data: {id:id,account_id:account_id,quiz_id:quiz_id,answers:answers,quiz_assign_id:quiz_assign_id},
		      	success: function (result) {
		      		// console.log(result);
		      		if(result=="yes"){







		      		var the_answers = live_answers;
					var the_actual_answers = JSON.parse('<?php echo $this->data["optical"][0]["answers"]; ?>');
					var the_real_score = 0;
					var total_score = 0;
					if(the_answers != ""){
						the_answers = JSON.parse(the_answers);
						$.each(the_answers,function(key,value){
							var object_key = Object.keys(value)[0];
							// console.log(value[object_key]);

							$.each(the_actual_answers,function(the_actual_answers_key,the_actual_answers_value){
								var actual_object_key = Object.keys(the_actual_answers_value)[0];
								if(object_key == actual_object_key){
									if(actual_object_key.includes("multiple_choice")||actual_object_key.includes("multiple_answers")||actual_object_key.includes("true_or_false")){
										// console.log(actual_object_key);
										if(the_actual_answers_value[actual_object_key].toLowerCase()==value[actual_object_key].toLowerCase()){
											the_real_score = parseInt(the_real_score)+parseInt(the_actual_answers_value['the_score']);
										}else{
											// $("#"+actual_object_key).css("border","3px solid red");
										}
										total_score = parseInt(total_score)+parseInt(the_actual_answers_value['the_score']);
									}
									// if(actual_object_key.includes("matching_type")){
									if(actual_object_key.includes("essay")||actual_object_key.includes("identification")||actual_object_key.includes("matching_type")){
										// console.log(the_actual_answers_value);
											
										$.each(the_actual_answers_value[actual_object_key],function(option_key,option_value){
											// console.log(value[actual_object_key][option_key][option_key]);
											// console.log(option_value[option_key]);
											var score_divider = the_actual_answers_value['the_score']/the_actual_answers_value['number_of_options'];
											if(value[actual_object_key][option_key][option_key].toLowerCase() == option_value[option_key].toLowerCase()){

												the_real_score = parseInt(the_real_score)+parseInt(score_divider);

											}else{
												// $("#"+actual_object_key).find(".the_input").eq(option_key).css("border","3px solid red");
											}
											total_score = parseInt(total_score)+parseInt(score_divider);
										});

									}
								}
								

							});

						});
						// console.log(the_real_score);
						console.log(the_real_score);
						console.log(total_score);
						$("#total_score").val(total_score);
						$("#actual_score").val(the_real_score);


						$.ajax({
					      	type: "POST",
					      	url: optical_save_url,
					      	data: {id:id,account_id:account_id,quiz_id:quiz_id,answers:answers,quiz_assign_id:quiz_assign_id,score:the_real_score},
					      	success: function (result) {
					      		// console.log(result);
		      					if(result=="yes"){
		      						// alert("Quiz has been successfully saved.");

					      			// window.location.replace("<?php echo $general_class->ben_link('lms/quiz/student_assigned_quizzes/'); ?>");
					      		}else{
					      			alert("Not saved properly");
					      		}
					      	}
						});


					}else{
						console.log("no answers");
					}

















		      			// window.location.replace("<?php echo $general_class->ben_link('lms/quiz/student_assigned_quizzes/'); ?>");
		      		}else{
		      			alert("Not saved properly");
		      		}
		      	}
			});
	});
<?php endif;?>
	
	$(document).on("click",".submit",function(){
		if(confirm("Are you sure you want to sumbit this quiz?")){


			var correct_answer_key = [];
			var score = [];
			var optical_save_url = "<?php echo $general_class->ben_link('lms/optical/student_answer/'); ?>";
			var answer_key = $(".sortable").html();
			var id = "<?php echo $general_class->data['optical'][0]['id']?>";
			var account_id = "<?php echo $general_class->session->userdata('id'); ?>";
			var quiz_id = '<?php echo $general_class->data["optical"][0]['quiz_id']; ?>';
			var quiz_assign_id = '<?php echo $general_class->data["quiz_assign_id"]; ?>';

			$.each($(".the_key"),function(key,value){
				if($(value).hasClass('multiple_choice')){
					var radio_array = [];
					var radio_id = $(value).attr("id");

					$.each($(value).find(".the_radio"),function(radio_key,radio_value){
						if($(radio_value).is(":checked")){
							radio_array.push("1");
						}else{
							radio_array.push("0");
						}
					});

					var number_of_options = 1;
					var the_score = $(value).find(".the_score").val();
					var radio_json = {[radio_id]:radio_array.join(",")};
					correct_answer_key.push(radio_json);

				}else if($(value).hasClass('identification')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						var inputs_object = {[key]:$(value).val()};
						holder.push(inputs_object);
					});

					var number_of_options = $(value).find(".the_input").length;
					var the_score = $(value).find(".the_score").val();
					var final_holder = {[the_id]:holder};
					correct_answer_key.push(final_holder);

				}else if($(value).hasClass('multiple_answers')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						if($(value).is(":checked")){
							the_array.push("1");
						}else{
							the_array.push("0");
						}
					});
					var number_of_options = 1;
					var the_score = $(value).find(".the_score").val();
					var the_json = {[the_id]:the_array.join(",")};
					correct_answer_key.push(the_json);

				}else if($(value).hasClass('true_or_false')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						if($(value).is(":checked")){
							the_array.push("1");
						}else{
							the_array.push("0");
						}
					});
					var number_of_options = 1;
					var the_score = $(value).find(".the_score").val();
					var the_json = {[the_id]:the_array.join(",")};
					correct_answer_key.push(the_json);
				}else if($(value).hasClass('matching_type')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						var inputs_object = {[key]:$(value).val()};
						holder.push(inputs_object);
					});
					var number_of_options = $(value).find(".the_input").length;
					var the_score = $(value).find(".the_score").val();
					var final_holder = {[the_id]:holder};
					correct_answer_key.push(final_holder);
				}else if($(value).hasClass('essay')){
					var the_array = [];
					var the_id = $(value).attr("id");
					var holder = [];
					$.each($(value).find(".the_input"),function(key,value){
						var inputs_object = {[key]:$(value).val()};
						holder.push(inputs_object);
					});
					var number_of_options = $(value).find(".the_input").length;
					var the_json = {[the_id]:the_array.join(",")};
					var the_score = $(value).find(".the_score").val();
					var final_holder = {[the_id]:holder};
					correct_answer_key.push(final_holder);
				}
			});
			var answers = JSON.stringify(correct_answer_key);
			live_answers = JSON.stringify(correct_answer_key);
			// console.log(correct_answer_key);
			$.ajax({
		      	type: "POST",
		      	url: optical_save_url,
		      	data: {id:id,account_id:account_id,quiz_id:quiz_id,answers:answers,quiz_assign_id:quiz_assign_id},
		      	success: function (result) {
		      		// console.log(result);
		      		if(result=="yes"){







		      		var the_answers = live_answers;
					var the_actual_answers = JSON.parse('<?php echo $this->data["optical"][0]["answers"]; ?>');
					var the_real_score = 0;
					var total_score = 0;
					if(the_answers != ""){
						the_answers = JSON.parse(the_answers);
						$.each(the_answers,function(key,value){
							var object_key = Object.keys(value)[0];
							// console.log(value[object_key]);

							$.each(the_actual_answers,function(the_actual_answers_key,the_actual_answers_value){
								var actual_object_key = Object.keys(the_actual_answers_value)[0];
								if(object_key == actual_object_key){
									if(actual_object_key.includes("multiple_choice")||actual_object_key.includes("multiple_answers")||actual_object_key.includes("true_or_false")){
										// console.log(actual_object_key);
										if(the_actual_answers_value[actual_object_key].toLowerCase()==value[actual_object_key].toLowerCase()){
											the_real_score = parseInt(the_real_score)+parseInt(the_actual_answers_value['the_score']);
										}else{
											$("#"+actual_object_key).css("border","3px solid red");
										}
										total_score = parseInt(total_score)+parseInt(the_actual_answers_value['the_score']);
									}
									// if(actual_object_key.includes("matching_type")){
									if(actual_object_key.includes("essay")||actual_object_key.includes("identification")||actual_object_key.includes("matching_type")){
										// console.log(the_actual_answers_value);
											
										$.each(the_actual_answers_value[actual_object_key],function(option_key,option_value){
											// console.log(value[actual_object_key][option_key][option_key]);
											// console.log(option_value[option_key]);
											var score_divider = the_actual_answers_value['the_score']/the_actual_answers_value['number_of_options'];
											if(value[actual_object_key][option_key][option_key].toLowerCase() == option_value[option_key].toLowerCase()){

												the_real_score = parseInt(the_real_score)+parseInt(score_divider);

											}else{
												$("#"+actual_object_key).find(".the_input").eq(option_key).css("border","3px solid red");
											}
											total_score = parseInt(total_score)+parseInt(score_divider);
										});

									}
								}
								

							});

						});
						// console.log(the_real_score);
						console.log(the_real_score);
						console.log(total_score);
						$("#total_score").val(total_score);
						$("#actual_score").val(the_real_score);


						$.ajax({
					      	type: "POST",
					      	url: optical_save_url,
					      	data: {id:id,account_id:account_id,quiz_id:quiz_id,answers:answers,quiz_assign_id:quiz_assign_id,score:the_real_score},
					      	success: function (result) {
					      		// console.log(result);
		      					if(result=="yes"){
		      						// alert("Quiz has been successfully saved.");

					      			window.location.replace("<?php echo $general_class->ben_link('lms/quiz/student_assigned_quizzes/'); ?>");
					      		}else{
					      			alert("Not saved properly");
					      		}
					      	}
						});


					}else{
						console.log("no answers");
					}

















		      			// window.location.replace("<?php echo $general_class->ben_link('lms/quiz/student_assigned_quizzes/'); ?>");
		      		}else{
		      			alert("Not saved properly");
		      		}
		      	}
			});
		}
	});










































	$(document).on("click",".done_adding",function(){
		show_add_key();
		delete_key();
		add_key();
	});

	$(document).on("click",".cancel_adding",function(){
		show_add_key();
		delete_key();
	});






















	$("#optical_pdf").css("height",window_height);
	<?php if($general_class->session->userdata('account_type_id')!=5):?>
		
	<?php else: ?>
		$(".ui-sortable-handle").removeClass("ui-sortable-handle");
		
	<?php endif;?>

	window.addEventListener("orientationchange", function() {
    // Announce the new orientation number
    $("#optical_pdf").css("height",window_height);
     
	}, false);

	

</script>