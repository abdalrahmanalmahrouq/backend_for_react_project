@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
                            <h4>Hi , welcome back!</h4>
                            <span>Edit Projects</span>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Projects</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form method='post' action="{{ route('update.project',$projects->id) }}" enctype="multipart/form-data">
                                @csrf
                                        <div class="form-group">
                                            <label for="">Project Name</label>
                                            <input type="text" name='project_name' class="form-control input-default " value="{{ $projects->project_name }}" >
                                            @error('project_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="">Project Description</label>
                                            <textarea class="form-control" name='project_description' rows="4" id="comment">
                                                {{ $projects->project_description }}
                                            </textarea>
                                            @error('project_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="">Project features</label>
                                            <textarea class="form-control" name='project_features' rows="4" id="comment">
                                                {{ $projects->prject_features }}
                                            </textarea>
                                            @error('project_features')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                        <label for="">Live Preview</label>
                                            <textarea class="form-control" name='live_preview' rows="4" id="comment">
                                                {{ $projects->live_preview }}
                                            </textarea>
                                            @error('live_preview')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id ='image' name='img_one'>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group">
                                           <img id ='showImage' src="{{asset($projects->img_one)}}" alt=" " style="width:100px;height:100px;">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id ='image' name='img_two'>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group">
                                           <img id ='showImage' src="{{asset($projects->img_two)}}" alt=" " style="width:100px;height:100px;">
                                        </div>

                                        <input type='submit' class='btn btn-success' value='Edit Project' />
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