$(document).ready(function(){
	var current_question = 0;
	var question_limit = $(".question_container").length;
	var matchingtype_option_list = [];
	var matchingtype_option_hide_list = [];
	var expiration_status = 0;

	$.each($(".matching_type_option_list"),function(key,value){
		matchingtype_option_list.push($(value).val());
	});

	var previous_value;
	$('.matching_type_option_select').change(function(){
		$(this).find("option").each(function(key,value){
			if($(value).is(':selected')){
				if($(value).val()){
					var option_id = $(value).attr("option_id");
					var question_id = $(value).attr("question_id");
					var option_order = $(value).attr("option_order");
					matchingtype_option_hide_list.push(option_id);

					var remove = $(".null_value_"+option_order+"_"+question_id).attr("last_value");
					matchingtype_option_hide_list = jQuery.grep(matchingtype_option_hide_list, function(wwvalue) {
					  return wwvalue != remove;
					});
					$(".null_value_"+option_order+"_"+question_id).attr("last_value",option_id);
					$.each(matchingtype_option_list,function(new_key,new_value){
						$('.option_'+new_value).show();
					});
					$.each(matchingtype_option_hide_list,function(new_key,new_value){
						$('.option_'+new_value).hide();
					});
				}else{
					var remove = $(value).attr("last_value");
					matchingtype_option_hide_list = jQuery.grep(matchingtype_option_hide_list, function(wwvalue) {
					  return wwvalue != remove;
					});
					$.each(matchingtype_option_list,function(new_key,new_value){
						$('.option_'+new_value).show();
					});
					$.each(matchingtype_option_hide_list,function(new_key,new_value){
						$('.option_'+new_value).hide();
					});
				}
			}
		});
		
	});
	function update_answer_sheet(){
		var answer_sheet = {};
		var checked_multiple_choice = $(".multiple_choice:checked");
		var identification = $(".identification");
		var essay = $(".essay");
		var true_or_false = $(".true_or_false:checked");
		var multiple_choice_multiple_answer = $(".multiple_choice_multiple_answer");
		var matching_type = $(".matching_type");

		$.each(matching_type,function(key,value){
			var matching_type_id = $(value).val();
			var option_answer = new Array();
			$.each($(".matching_type_"+matching_type_id),function(matching_type_key,matching_type_value){
				option_answer.push($(matching_type_value).val());
			});
			var answers = option_answer.join();
			
			answer_sheet[matching_type_id] = answers;

		});

		$.each(checked_multiple_choice,function(key,value){
			var question_id = $(value).attr("question_id");
			var checked_value = $(value).val();
			var options_count = $(".option_"+question_id).length;
			var option_answer = new Array();
			for(var x=1;x<=options_count;x++){
				if(x==checked_value){
					var push_value = 1;
				}else{
					var push_value = 0;
				}
				option_answer.push(push_value);
			}
			var answers = option_answer.join();
			answer_sheet[question_id] = answers;
			
		});

		var multiple_choice_multiple_answer_push = [];
		var distinct_multiple_choice_multiple_answer_question_id = $(".distinct_multiple_choice_multiple_answer_question_id");
		var concat_checked_value = "";

		$.each(distinct_multiple_choice_multiple_answer_question_id,function(key,value){
			var question_id = $(value).val();
			var checked = $(".option_"+question_id+":checked");
			var options_count = $(".option_"+question_id);
			var concat = [];

			$.each(checked,function(new_key,new_value){
				concat.push(parseInt($(new_value).val()));
			});

			option_answer = [];
			
			for(var y=1;y<=options_count.length;y++){
				if($.inArray(y,concat)==-1){
					option_answer.push(0);
				}else{
					option_answer.push(1);
				}
			}
			answers = option_answer.join();
			answer_sheet[question_id] = answers;
			
		});

		$.each(true_or_false,function(key,value){
			var question_id = $(value).attr("question_id");
			var checked_value = $(value).val();
			var options_count = $(".option_"+question_id).length;
			var option_answer = new Array();
			for(var x=1;x<=options_count;x++){
				if(x==checked_value){
					var push_value = 1;
				}else{
					var push_value = 0;
				}
				option_answer.push(push_value);
			}
			var answers = option_answer.join();
			answer_sheet[question_id] = answers;
			
		});

		$.each(identification,function(key,value){
			var question_id = $(value).attr("question_id");
			var checked_value = $(value).val();
			var options_count = $(".option_"+question_id).length;
			var option_answer = new Array();
			var answers = $(value).val();
			answer_sheet[question_id] = answers;
			
		});

		$.each(essay,function(key,value){
			var question_id = $(value).attr("question_id");
			var checked_value = $(value).val();
			var options_count = $(".option_"+question_id).length;
			var option_answer = new Array();
			var answers = $(value).val();
			answer_sheet[question_id] = {"answer":answers,"score":"x"};
			
		});

		var attempt_id = "<?php echo $attempt['id']?>";
		answer_sheet = JSON.stringify(answer_sheet);
		$("#answers").val(answer_sheet);
		$("#attempt_id").val(attempt_id);
		$.ajax({
		  	url: "<?php echo $general_class->ben_link('lms/answer_sheet/ajax_saving'); ?>",
		  	type: "POST",
		  	data:{attempt_id:attempt_id,answers:answer_sheet},
		}).done(function(response) {
		  	// console.log(response);
		}).fail(function() {
		  	console.log("fail bro ez");
		});
	}
	$(".multiple_choice").click(function(){
		var form_group = $(this).parent().parent().parent().parent();
		var question_id = $(form_group).attr("question_id");
		var choices_count = form_group.find("input").length;
		$("#question_numbering_"+question_id).addClass("answered_number");
	});
	$(".matching_type_option_select").change(function(){
		var question_id = $(this).attr("question_id");
		$("#question_numbering_"+question_id).addClass("answered_number");
	});

	$(".identification").change(function(){
		var question_id = $(this).attr("question_id");
		$("#question_numbering_"+question_id).addClass("answered_number");
	});

	$(".true_or_false").change(function(){
		var question_id = $(this).attr("question_id");
		$("#question_numbering_"+question_id).addClass("answered_number");
	});

	$(".multiple_choice_multiple_answer").change(function(){
		var question_id = $(this).attr("question_id");
		console.log($(".option_"+question_id+":checked").length);
		if($(".option_"+question_id+":checked").length){
			$("#question_numbering_"+question_id).addClass("answered_number");
		}else{
			$("#question_numbering_"+question_id).removeClass("answered_number");
		}
		
	});

	$(".question_container").eq(0).show();
	$(".question_number_container").eq(0).find(".question_number").addClass("active_number");

	$("#next").click(function(){
		$(".question_container").eq(current_question).hide();
		$(".question_number_container").eq(current_question).find(".question_number").removeClass("active_number");
		if(current_question<question_limit){
			current_question = current_question+1;
		}
		$(".question_container").eq(current_question).show();
		$(".question_number_container").eq(current_question).find(".question_number").addClass("active_number");
		update_answer_sheet();
	});

	$("form").submit(function(e){
		update_answer_sheet();

		if(expiration_status==0){
			var r = confirm("Are you sure you want to submit?");
			if (r == true) {
			  	
			} else {
				e.preventDefault();
			}
		}
	});

	$(".question_number").click(function(){
		$(".question_container").eq(current_question).hide();
		$(".question_number_container").eq(current_question).find(".question_number").removeClass("active_number");
		current_question = $(this).parent().index();
		$(".question_number_container").eq(current_question).find(".question_number").addClass("active_number");
		$(".question_container").eq(current_question).show();
		update_answer_sheet();
	});

	$("#back").click(function(){
		$(".question_container").eq(current_question).hide();
		$(".question_number_container").eq(current_question).find(".question_number").removeClass("active_number");
		if(current_question>0){
			current_question = current_question-1;
		}
		
		$(".question_container").eq(current_question).show();
		$(".question_number_container").eq(current_question).find(".question_number").addClass("active_number");
		update_answer_sheet();
	});

	var expiration_date = $("#expiration_value").val();
	$(document).ready(function(){
		startTime();
	});

	function startTime() {
		// Set the date we're counting down to
		var countDownDate = new Date(expiration_date).getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

			// Get todays date and time
			var now = new Date().getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Display the result in the element with id="demo"
			document.getElementById("time").innerHTML = days + "d " + hours + "h "
			+ minutes + "m " + seconds + "s ";

			// If the count down is finished, write some text 
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("time").innerHTML = "Expired";
				update_answer_sheet();
				expiration_status = 1;
				// $("#submit").click();
			}
		}, 1000);
	}

});