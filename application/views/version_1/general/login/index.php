<style type="text/css">
	body {
	    background-image: url(http://[::1]/brainee/resources/version_1/images/general/login/login_bg.jpg);
	    background-repeat: no-repeat;
	    background-size: 100%;
	}
	.container {
	    position: relative;
	    top: 100px;
	}
	.col-centered{
	    float: none;
	    margin: 0 auto;
	}
	.form-control {
	    display: block;
	    width: 100%;
	    height: 44px;
	    padding: 6px 12px;
	    font-size: 22px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	}
	.h5, h5{
		font-size: 20px;
	}
</style>
<div class="container login_container">
	<div class="row">
		<div class="col-lg-7 col-centered">
			<?php echo $general_class->ben_open_form("general/login/login"); ?>
				<div class="form-group">
					<h5>Username</h5>
					<input type="text" id="username" name="username" class="form-control" value="" size="50" />
				</div>
				<div class="form-group">
					<h5>Password</h5>
					<input type="password" id="password" name="password" class="form-control" value="" size="50" />
				</div>
				<div class="form-group">
					<input type="submit" class="form-control" value="Submit" />
				</div>

			</form>
		</div>

	</div>
</div>