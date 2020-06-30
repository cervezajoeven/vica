<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Lesson Create</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <button class="btn btn-success waves-effect">Done</button>
                        </div>

                    </ul>
                </div>
                <div class="body">
                    
                    <?php $field = "lesson_name" ?>
                    <div class="form-group">
                        <div class="form-line">

                            <label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
                            <input type="text" id="<?php echo $field?>" name="<?php echo $field?>" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
                        </div>
                    </div>

                    <?php $field = "subject_id" ?>
                    <?php $field_name = "subject" ?>
                    <div class="form-group">
                        <label for="<?php echo $field?>"><?php echo ucfirst($field_name); ?></label>
                        <select required="" name="<?php echo $field?>" class="form-control show-tick" required="" placeholder="Select">
                            <option value="">Select <?php echo ucfirst($field_name); ?></option>
                            <?php foreach($general_class->data[$field_name.'_data'] as $all_data_key=>$all_data_value): ?>
                                <option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value[$field_name.'_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php $field = "grade_id" ?>
                    <?php $field_name = "grade" ?>
                    <div class="form-group">
                        <label for="<?php echo $field?>"><?php echo ucfirst($field_name); ?></label>
                        <select required="" name="<?php echo $field?>" class="form-control show-tick" required="" placeholder="Select">
                            <option value="">Select <?php echo ucfirst($field_name); ?></option>
                            <?php foreach($general_class->data[$field_name.'_data'] as $all_data_key=>$all_data_value): ?>
                                <option value="<?php echo $all_data_value['id']?>">Grade <?php echo ucwords($all_data_value[$field_name.'_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php $field = "semester_id" ?>
                    <?php $field_name = "semester" ?>
                    <div class="form-group">
                        <label for="<?php echo $field?>">Quarter</label>
                        <select required="" name="<?php echo $field?>" class="form-control" required="" placeholder="Select">
                            <option value="">Select Quarter</option>
                            <?php foreach($general_class->data[$field_name.'_data'] as $all_data_key=>$all_data_value): ?>
                                <option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value[$field_name]); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if($general_class->session->userdata('company_id') == 1): ?>
                    <?php $field = "company_name" ?>
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select name="company_id" class="form-control" required="" placeholder="Select">
                            <option value="">Select Company</option>
                            <?php foreach($general_class->data['company_data'] as $all_data_key=>$all_data_value): ?>
                                <option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['company_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php $field = "company_owner" ?>
                        <label for="<?php echo $field?>">Company Owner</label>
                        <select name="<?php echo $field?>" class="form-control" required="" placeholder="Select">
                            <option value="">Select <?php echo underscore_convert(ucwords($field)); ?></option>
                            <?php foreach($general_class->data['company_data'] as $all_data_key=>$all_data_value): ?>
                                <option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['company_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                <?php else: ?>

                <?php endif;?>

                </div>
            </form>
        </div>
    </div>
</div>