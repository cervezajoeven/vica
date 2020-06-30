<div class="brainee-page_container col-lg-12">
  
  <div class="mc col-md-8 col-md-offset-2">
    <h1>Matching type</h1>
    <textarea class="form-control" placeholder="Enter question..." id="exampleFormControlTextarea1" rows="3"></textarea>
    
    <div id="container">
         <table class="form-group" id="mt_table">
          <tbody id="mt_body">
      <tr>
        <th colspan="8">
          <h4>Choices</h4>
        </th>
        <th>
          <div class="btn_add"> 
            <button type="button" class="btn btn-success btn-circle" id="mt_add"><i class="glyphicon glyphicon-plus"></i></button>
          </div>
        </th>
      </tr>
        
      <!-- start of choices -->
          <tr id="mt_choices1">    
            <td>
              <div class="input-group">              
                    <input type = "text" class = "form-control" id="mt_question1" placeholder="">
                    <span class="input-group-addon">=</span>
                    <input type = "text" class = "form-control" id="mt_answer1" placeholder="">
                  </div><br>
                </td>
            </tr>
            </tbody>
    </table>
    </div>
  </div>  
  
</div>
<script>
  $('#mt_add').click(function(){
    window.rowCountCheck = $('#mt_body tr').length;
    $('#row_count_check').val(rowCountCheck);

    var tRowId = '#mt_choices'+(rowCountCheck-1);
    var trialIndex;
    $('#row_count_check').val(rowCountCheck);
    $(tRowId).after('<tr id="mt_choices'+rowCountCheck+'">'
      +'<td>'+
      '<div class="input-group">'
      +'<input type = "text" class = "form-control" id="mt_quesion'+rowCountCheck+'" placeholder="">'
      +'<span class="input-group-addon">=</span>'
      +'<input type = "text" class = "form-control" id="mt_answer'+rowCountCheck+'" placeholder="">'
      +'<div class="input-group-btn">'
      +'<button id="mt_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>'
      +'</div>'
      +'</div><br>'
      +'</td>');
  });
  $('#mt_body').on('click','#mt_remove',function(){
    $(this).closest('tr').remove();
     return false;

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