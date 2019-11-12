@extends('backEnd.layouts.master')
@section('title','Edit Category')
@section('content')
<div class="card-header">
      <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('category.index')}}">Categories</a> / <a href="#" class="current">Edit Category</a> </div>
 <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-12">
                <div class="card">
                     <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add New Category</h5>
                </div>
                  <div class="card-body">
                        <form class="form-group" method="post" action="{{route('category.update',$edit_category->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{method_field("PUT")}}
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <label class="form-label">Category Name :</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="form-control" class="form-control" style="width:300px;" value="{{$edit_category->name}}" required>
                                    <span class="text-danger" style="color: red;">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Category Lavel :</label>
                                <div class="controls" style="width: 245px;">
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        {{--@foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}" {{($edit_category->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                        @endforeach--}}

                                        @foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}"{{($edit_category->parent_id==$key)?' selected':''}}>{{$value}}</option>
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
                             <div class="form-group">
                                <div class="controls">
                                <label class="form-label">Enable :</label>
                                    <input type="checkbox" name="status"  id="status" value="1" {{($edit_category->status==0)?'':'checked'}}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description :</label>
                                <div class="controls">
                                    <textarea type="ckeditor" name="description" class="ckeditor" id="description" rows="3">{{$edit_category->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-label"></label>
                                <div class="controls">
                                    <input type="submit" value="Update" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
</div>
</div>
@endsection