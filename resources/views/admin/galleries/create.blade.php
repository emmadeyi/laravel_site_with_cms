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
        </div>    
    </div>   
    <div class="row justify-content-center">        
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">New Gallery Image</h4> <a href="{{route('galleries.index')}}" class="btn btn-primary float-right"> <i class="fa fa-list"></i> Gallery</a>
                </div>                
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form method="POST" action="{{route('galleries.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group @if($errors->has('image')) has-error @endif">
                                    <label>Image File</label>
                                    <input type="file" name="image" class="form-control" placeholder="Select file">
                                    @if($errors->has('image')) 
                                        <span class="help-block text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group @if($errors->has('fleet_id')) has-error @endif">
                                    <label>Link to Fleet Item <em><small>(Optional)</small></em></label>
                                    <select class="select form-control" id="fleet_id" name="fleet_id[]" multiple>
                                        @foreach ($equipment as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('fleet_id')) 
                                        <span class="help-block text-danger">{{$errors->first('fleet_id')}}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('project_id')) has-error @endif">
                                    <label>Link to Project <em><small>(Optional)</small></em></label>
                                    <select class="select form-control" id="project_id" name="project_id[]" multiple>
                                        @foreach ($projects as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('project_id')) 
                                        <span class="help-block text-danger">{{$errors->first('project_id')}}</span>
                                    @endif
                                </div>
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>                                    
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
            if($('.select').length > 0) {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }
            $('#fleet_id').select2({
                placeholder: " Select Fleet Item"
            })
            $('#Project_id').select2({
                placeholder: " Select Project"
            })
        })
    </script>
@endsection