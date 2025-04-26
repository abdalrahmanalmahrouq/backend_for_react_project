@extends('admin.admin_master')
@section('admin')


<div class="content-body" style="min-height: 876px;">
			<div class="container-fluid">
				<!-- Add Project -->
				<div class="modal fade" id="addProjectSidebar">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Project</h5>
								<button type="button" class="close" data-dismiss="modal"><span>×</span>
								</button>
							</div>
							
						</div>
					</div>
				</div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi  welcome back!</h4>
                            <span>change password </span>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form method='post' action="{{ route('update.password') }}">
                                @csrf
                                <label for="">Current Password</label>
                                        <div class="form-group">
                                            <input type="password" id="current_password" name='oldpassword' class="form-control input-rounded "  >
                                        </div>
                                        <label for="">New Password</label>
                                        <div class="form-group">
                                            <input type="password" id="password" name='password' class="form-control input-rounded" >
                                        </div>
                                        <label for="">Confirm Password</label>
                                        <div class="form-group">
                                            <input  type="password" id="password_confirmation" name='password_confirmation' class="form-control input-rounded"  >
                                        </div>
                                       

                                        

                                        <input type='submit' class='btn btn-success' value='Update Password' />
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					
                        </div>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader =new FileReader();
            reader.onload =function (e){
                $('#showImage').attr('src' ,e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection