@extends('layouts.app')

@section('content')
<div class="content">   
    <div class="row">
        <div class="col">
            @if (session('error-message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{session('error-message')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
            @endif
            @if (session('success-message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{session('success-message')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
            @endif
        </div>    
    </div>   
    <div class="row justify-content-center">        
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Update Project Details</h4> <a href="{{route('projects.index')}}" class="btn btn-primary float-right"> <i class="fa fa-list"></i> Project List</a>
                </div>
            </div>
            <div class="card">            
                <div class="card-body p-0">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form method="POST" action="{{route('projects.update', $project->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="post-preview">
                                        <a href="#"><img src="{{asset('./storage/'.$project->thumbnail)}}" alt="" style="max-height: 400px;" class="img-fluid mx-auto d-block"></a>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control" placeholder="Select file">
                                    @if($errors->has('thumbnail')) 
                                        <span class="help-block text-danger">{{$errors->first('thumbnail')}}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('title')) has-error @endif">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Project Title" value="{{$project->title}}">
                                    @if($errors->has('title')) 
                                        <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('sub_title')) has-error @endif">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control" placeholder="Project Sub Title" value="{{$project->sub_title}}">
                                    @if($errors->has('sub_title')) 
                                        <span class="help-block text-danger">{{$errors->first('sub_title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('details')) has-error @endif">
                                    <label>Details</label>
                                    <textarea name="details" id="details" cols="30" rows="10" class="form-control" style="resize: none;" placeholder="Project Details...">{{str_replace( '&', '&amp;', $project->details)}}</textarea>
                                    @if($errors->has('details')) 
                                        <span class="help-block text-danger">{{$errors->first('details')}}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('fleet_id')) has-error @endif">
                                    <label>Fleet Item</label>
                                    <select class="select form-control" id="fleet_id" name="fleet_id[]" multiple>
                                        @foreach ($equipment as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('fleet_id')) 
                                        <span class="help-block text-danger">{{$errors->first('fleet_id')}}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('is_published')) has-error @endif">
                                    <label>Publish</label>
                                    <select class="select form-control" name="is_published">
                                        <option value="1" {{ $project->is_published ? 'selected' : null}}>Publish</option>
                                        <option value="0" {{ !$project->is_published ? 'selected' : null}}>Draft</option>
                                    </select>
                                    @if($errors->has('is_published')) 
                                        <span class="help-block text-danger">{{$errors->first('is_published')}}</span>
                                    @endif
                                </div>
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('script')
    <script defer>
        $(document).ready(function(){
            ClassicEditor
            .create( document.querySelector( '#details' ) )
            .catch( error => {
                console.error( error );
            } );
            if($('.select').length > 0) {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }
            $('#fleet_id').select2({
                placeholder: " Select Fleet Item"
            }).val({!! json_encode($project->equipments()->allRelatedIds()) !!}).trigger('change')
        })
    </script>
@endsection