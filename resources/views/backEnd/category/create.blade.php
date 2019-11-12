@extends('backEnd.layouts.master')
@section('title','Add Category')
@section('js')
<script type="text/javascript">

    $(document).ready(function() {
        $(".users").select2();
    });

</script>
@section('content')
<div class="card-header">
 <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('category.index')}}">Categories</a> / <a href="{{route('category.create')}}" class="current">Add New Category</a> </div>
 <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
             <div class="widget-title"> <span class="icon"> <i class="fa fa-box"></i> </span>
                <h5>Add New Category</h5>
            </div>
            <div class="card-body">
                <form class="control-group" method="post" action="{{route('category.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="control-group{{$errors->has('name')?' has-error':''}}">
                        <label class="form-label">Category Name :</label>

                            <input type="text" name="name" id="name" class="form-control" style="width:300px;" " value="{{old('name')}}" required>
                            <span class="text-danger" id="chCategory_name" style="color: red;">{{$errors->first('name')}}</span>
                       
                    </div>
                    <div class="control-group">
                        <label class="form-label">Category Lavel :</label>
                        <div class="forms" style="width: 245px;">
                            <select name="parent_id"  class="form-control" id="parent_id">
                                @foreach($cate_levels as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                                <?php
                                if($key!=0){
                                    $subCategory=DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                    if(count($subCategory)>0){
                                        foreach ($subCategory as $subCate){
                                            echo '<option value="'.$subCate->id.'">&nbsp;&nbsp;--'.$subCate->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group{{$errors->has('status')?' has-error':''}}">
                       <div class="forms">
                        <label class="form-label">Enable :
                            <input type="checkbox" name="status" style="margin-top: 15px;" id="status" value="1" >
                            <span class="text-danger">{{$errors->first('status')}}</span>
                        </div>
                    </label>
                </div>
                    <div class="control-group">
                        <label class="form-label">Description :</label>
                        <div class="forms">
                            <textarea name="description" type="ckeditor" class="ckeditor" id="description" rows="3">{{old('description')}}</textarea>
                        </div>
                    </div>
                <input type="submit" value="Add New" style="margin-top: 15px;"  class="btn btn-success">
            </form>
        </div>
    </div>  
</div>
</div>
</div>
</div>
@endsection