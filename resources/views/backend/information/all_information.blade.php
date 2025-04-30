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
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Project Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Deadline</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Client Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
               
                </div>
                <!-- row -->

                <div class="row">
                 
					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">
													<div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
														<input type="checkbox" class="custom-control-input" id="checkAll" required="">
														<label class="custom-control-label" for="checkAll"></label>
													</div>
												</th>
                                                <th><strong>Abput</strong></th>
                                                <th><strong>Policy</strong></th>
                                                <th><strong>Terms</strong></th>
                                                <th><strong>Privicy</strong></th>
                                 
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $item)
                                            <tr>
                                                <td>
												
												</td>
                                                <td>  {{ Str::limit($item->about, 20,'..') }}
                                                </td>
                                                <td>{{ Str::limit($item->terms, 20) }}
                                                </td>
                                                <td> {{ Str::limit($item->policy, 20) }}
                                                </td>
                                                <td>{{ Str::limit($item->privacy, 20) }}
                                                </td>
                                               
                                                <td>
													<div class="d-flex">
														<a href="{{route('edit.information',$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="{{route('delete.information',$item->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            @endforeach
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					
                   
                 
                
                    
                  
                   
                 
                </div>
            </div>
        </div>
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
                            <h4>Hi , welcome back!</h4>
                            <p class="mb-0">Your Profile dashboard </p>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
               
              
            </div>
        </div>
@endsection