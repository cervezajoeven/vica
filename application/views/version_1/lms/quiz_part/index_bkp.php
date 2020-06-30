<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar(array("create"=>$general_class->data['quiz_id']));?>
	<center><h3><i class="fas fa-pen-fancy"></i> <b>Quiz 4</b></h3></center>

	<div class="col-lg-12 brainee-label">
		<div class="col-lg-1 brainee-label_parts brainee-part_toggle"><i class="fas fa-window-maximize"></i></div>
		<form>
		<div class="col-lg-9 brainee-label_parts brainee-part_label"><textarea></textarea><span>I. Pick the most appropriate answer for the following questions.</span> <i class="fas fa-pen-fancy"></i></div>

		<div class="col-lg-1 brainee-label_parts brainee-label_updown"><input type="checkbox" /> Randomize <i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i></div>
		<div class="col-lg-1"><input type="button" value="Add Question" class="btn btn-success" /></div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		
		<div class="brainee-question">1. What is the capital city of the Philippines</div>
		<div class="brainee-choices"><input type="radio" name="choice_1" /> Manila</div>
		<div class="brainee-choices"><input type="radio" name="choice_1" /> Cebu</div>
		<div class="brainee-choices"><input type="radio" name="choice_1" /> Marikina</div>
		<div class="brainee-choices"><input type="radio" name="choice_1" /> Metro Manila</div>
	</div>

	<div class="col-lg-12 brainee-label">
		<div class="col-lg-1 brainee-label_parts brainee-part_toggle"><i class="fas fa-window-maximize"></i></div>
		<div class="col-lg-9 brainee-label_parts brainee-part_label">Animals</div>
		<div class="col-lg-1 brainee-label_parts brainee-label_updown"><input type="checkbox" /> Randomize <i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i></div>
		<div class="col-lg-1"><input type="button" value="Add Question" class="btn btn-success" /></div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		<div class="brainee-question">1. Pick the following animals that lives in water</div>
		<div class="brainee-choices"><input type="checkbox" name="choice_1" /> Fish</div>
		<div class="brainee-choices"><input type="checkbox" name="choice_1" /> Crab</div>
		<div class="brainee-choices"><input type="checkbox" name="choice_1" /> Dog</div>
		<div class="brainee-choices"><input type="checkbox" name="choice_1" /> Shrimp</div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		<div class="brainee-question">2. Does a dog bark?</div>
		<div class="brainee-choices"><input type="radio" name="choice_1" /> True <input type="radio" name="choice_1" /> False</div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		<div class="brainee-question">3. Fill in the blanks</div>
		<div class="brainee-choices">The <input type="text" /> brown fox <input type="text" /> over a lazy dog near the <input type="text" /> of a <input type="text" /> The <input type="text" /> brown fox <input type="text" /> over a lazy dog near the <input type="text" /> of a <input type="text" /></div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		<div class="brainee-question">4. Name an animal that has four legs.</div>
		<div class="brainee-choices"><input type="text"></div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		<div class="brainee-question">5. Explain your pet animal.</div>
		<div class="brainee-choices"><textarea></textarea></div>
	</div>
	<div class="col-lg-12 brainee-question_container">
		<div class="brainee-question">6. Match from tagalog to english.</div>
		<div class="brainee-choices">
			<div class="brainee-choice_container">
				<div class="brainee-choice_match_choices">1. Ang Aso </div> 
				<div class="brainee-choice_match_match">The Cat</div> 
				<div class="brainee-choice_match_answer"><input type="brainee-choice_match_match"></div>
			</div>
			<div class="brainee-choice_container">
				<div class="brainee-choice_match_choices">2. Ang Pusa </div> 
				<div class="brainee-choice_match_match">The Rat</div> 
				<div class="brainee-choice_match_answer"><input type="brainee-choice_match_match"></div>
			</div>
			<div class="brainee-choice_container">
				<div class="brainee-choice_match_choices">3. Ang Daga </div> 
				<div class="brainee-choice_match_match">The Dog</div> 
				<div class="brainee-choice_match_answer"><input type="brainee-choice_match_match"></div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
.col-lg-12.brainee-label{
	background-color: #222222;
    color: white;
    padding: 10px;
}
.brainee-label_parts {
    display: inline;
}
.brainee-part_label {
    font-size: 16px;
}
.brainee-part_toggle {
    width: auto;
    font-size: 24px;
}
.brainee-label_updown{
	width: 160px;
}
.brainee-question_container{
	background-color: #cacaca;
}
.brainee-question_container{
    padding: 15px;
}
.brainee-question {
    font-size: 15px;
}
.brainee-choices {
    padding-left: 30px;
    padding-top: 5px;
    font-size: 13px;
    line-height: 10px;
}
.brainee-page_container{
	margin-bottom: 30px; 
}
.brainee-choice_match_match {
    display: inline-block;
    min-width: 100px;
}
.brainee-choice_match_choices{
	display: inline-block;
	width: 200px;
}
.brainee-choice_match_answer{
	display: inline;
}
.brainee-choices textarea{
	width: 80%;
	height: 100px;
}
</style>