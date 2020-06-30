<div class="brainee-page_container col-lg-12">
	<form action="<?php echo $general_class->ben_link('lms/question/save_true_or_false/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >

        <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>True or False (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/question/index/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>
        
        <div class="form-group">
        	<label>Question: </label>
            <textarea class="form-control" name="question" placeholder="Enter question..." id="mcmr" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label>Score: </label>
            <input class="form-control" placeholder="Score" value="1" type="number" min="1" required="" name="points">
    	</div>

        <input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
        <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">
    	<div id="container">
            <table class="form-group" id="mcmr_table">
             	<tbody id="mcmr_body">
        			<tr>
        				<th>
        					<h4>Choices</h4>
        				</th>
        			</tr>
    			
                 	<tr id="mcmr_choices1">    
                 		<td>
                 			<div class="input-group">
                       			<span class = "input-group-addon">
                          			<input class="form-check-input tralse" name="correct" value="1" type="radio" id="true">
                       			</span>               
                      			<input type = "text" class="form-control" name="answer[1]" id="mcmr_true" value="True" readonly>
                       		</div><br>
                       	</td>               	
                    </tr>
                    <tr id="mcmr_choices2">
                    	<td>
                 			<div class="input-group">
                       			<span class="input-group-addon">
                          			<input class="form-check-input tralse" name="correct" value="2" type="radio" id="false">
                       			</span>               
                      			<input type="text" class="form-control" name="answer[2]" id="mcmr_false" value="False" readonly>
                       		</div><br>
                       	</td>
                    </tr>
                </tbody>
    	    </table>
    	</div>
    </form>
</div>
<script type="text/javascript">
  function atLeastOneRadio() {
      return ($('input[type=radio]:checked').size() > 0);
  }
  $(".tralse").change(function(){
      
  });
  $("form").submit(function(e){
      if(atLeastOneRadio()){

      }else{
        e.preventDefault();
        alert("Please select a correct answer");
      }
  });
</script>

<style>
	

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
.btn_right{
	position: absolute;
}
</style>