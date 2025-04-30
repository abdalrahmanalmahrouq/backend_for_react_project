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
                            
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form method='post' action="{{ route('update.information',$information->id) }}">
                                @csrf
                                        <label for="">about</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name='about' rows="4" id="comment">
                                                {{ $information->about }}
                                            </textarea>
                                        </div>
                                        <label for="">terms</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name='terms' rows="4" id="comment">
                                                {{ $information->terms }}
                                            </textarea>
                                        </div>
                                        <label for="">policy</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name='policy' rows="4" id="comment">
                                                {{ $information->policy }}
                                            </textarea>
                                        </div>
                                        <label for="">privacy</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name='privacy' rows="4" id="comment">
                                                {{ $information->privacy }}
                                            </textarea>
                                        </div>
                                        <input type='submit' class='btn btn-success' value='edit information' />
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



@endsection
