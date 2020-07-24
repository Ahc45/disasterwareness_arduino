
			<div class="row">
				<div class="card card-signup" data-background-color="orange">
					<form class="form" method="post" action="<?php echo base_url('public_view/register')?>" id="register-res">
						<div class="card-header text-center">
							<h3 class="card-title title-up">Register to be Notified</h3>
							
						</div>
						<div class="card-body">
							<div class="input-group no-border form-group ">
								<div class="input-group-prepend">
				                  <span class="input-group-text">
				                    <i class="now-ui-icons users_circle-08"></i>
				                  </span>
								</div>
								<input type="text" name ="firs_tname" class="form-control" placeholder="First Name...">
									 <span class="help-block"></span>
							</div>

							<div class="input-group no-border form-group">
								<div class="input-group-prepend">
				                  <span class="input-group-text">
				                    <i class="now-ui-icons text_caps-small"></i>
				                  </span>
								</div>
								<input type="text" name="last_name" placeholder="Last Name..." class="form-control">
									<span class="help-block"></span>
							</div>

							<div class="input-group no-border form-group">
								<div class="input-group-prepend">
				                  <span class="input-group-text">
				                    <i class="now-ui-icons tech_mobile"></i>
				                  </span>
								</div>
								<input type="text" name="PhoneNo" class="form-control" placeholder="Number...">
                      				<span class="help-block"></span>	
							</div>

							<!-- <div class="checkbox">
								<input id="checkboxSignup" type="checkbox">
									<label for="checkboxSignup">
									Unchecked
									</label>
								</div> -->
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-neutral btn-round btn-lg" >Register</button>
						</div>
					</form>
				</div>
			</div>
			<script type="text/javascript">
				$('#register-res').on('submit', function(e){
                   e.preventDefault();
                   alert('click');
                  var $this = $(this);
                  console.log($this);
                   $.ajax({
                      url: $this.attr('action'),
                      type: 'POST',
                      dataType: 'json',
                      data: $this.serializeArray(),
                    })
                    .fail(function(e) {
                      console.log(e.responseText)
                      console.log("error");
                    })
                    .always(function(data) {
                      console.log('submited');
                      if ( typeof data !="undefined" && !data.is_valid ) {
                          $('.form-group').removeClass('has-error');
                          $('.error-help-block').text('');
                              var change =   $.each(data.errors, function(index, val) {

                                  if (val !="") {
                                      $("#" + index).parents('.form-group').addClass('has-error').find('.help-block').text(val).addClass('error-help-block');
                                  }
                                   console.log(index);
                         });
                             
                      }else{
                          bootbox.dialog({
                            title: "Congratulations!", 
                            message: "<p>Successful!</p>",
                            className: "modal-success",
                            buttons: {
                              dismiss: {
                                  label: "Dismiss",
                                  className: "btn-sm btn-default",
                                  callback: function () {
                                    window.location.href = base_url+"patient";
                                  }
                                }
                            }

                          });
                      }
                    })
                  });
			</script>