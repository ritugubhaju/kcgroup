@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
        
            <div class="card-head">
                <header>{!! $header !!}</header>
                <div class="tools visible-xs">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
                </div>
            </div>
            <div class="card-body">
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($gallery->title) ? $gallery->title : '') }}"/>
                               
                                <label for="name">Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea type="text" name="meta_description" class="form-control">{{old('meta_description',isset($gallery->meta_description)?$gallery->meta_description : '')}}</textarea>
                               
                                <label for="specialization">Short Description</label>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-12">
                         <div class="form-group">
                                <select name="album_id" class="form-control" id="album_id">
                                        <option value="">Select Album</option>
                                        @foreach($albums as $album)
                                            <option value="{{$album->id}}" @if(isset($album_search)) @if($album_search->id == $album->id) selected @endif @endif>{{$album->name}}</option>
                                        @endforeach
                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('$gallery->album_id') }}</span>
                                <label for="Name">Select album</label>
                         </div>
                    </div>
                </div>

                <div class="col-sm-12" id="videourl" @if(isset($gallery->url)) style ="display: block" @else style="display: none" @endif>
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" required
                                value="{{ old('url', isset($gallery->url) ? $gallery->url : '') }}"/>
                               
                            <label for="name">Video Url</label>
                    </div>
                </div>

                <div class="row" id="imageupload">
                    @if(empty($gallery->url))
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($gallery) && $gallery->image)
                                <input type="file" name="image" class="dropify"
                                    data-default-file="{{ asset($gallery->thumbnail_path)}}"/>
                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                        </div>
                    @endif
                    
                </div>

            </div>
            <div class="card-actionbar">
                <div class="card card-affix affix-4">
                    <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                            <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                            <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="{{ isset($gallery) && $gallery->is_published ? 'Save' : 'Publish' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="" data-spy="affix" data-offset-top="50">
            <div class="panel-group" id="accordion1">
                <div class="card panel expanded">
                    <div class="card-head" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
                        <header>Publish</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="accordion1-1" class="collapse in">
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <a class="btn btn-default btn-ink" href="{{ route('gallery.index') }}">
                                    <i class="md md-arrow-back"></i>
                                    Back
                                </a>
                                <input type="submit" name="pageSubmit" class="btn btn-info ink-reaction" value="Save">
                            </div>
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Published</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_published"
                                           {{ old('is_published', isset($gallery->is_published) ? $gallery->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Featured</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_featured"
                                           {{ old('is_featured', isset($gallery->is_featured) ? $gallery->is_featured : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                            {{-- <div class="side-label">
                                <div class="label-head">
                                    <span>Status</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_status"
                                           {{ old('is_status', isset($gallery->is_status) ? $gallery->is_status : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!--end .panel --><!--end .panel --><!--end .panel --><!--end .panel -->
                {{--            </div><!--end .panel-group -->--}}
                {{--        <div class="panel-group" id="accordion1">--}}
              
                <!--end .panel --><!--end .panel --><!--end .panel --><!--end .panel -->
            </div><!--end .panel-group -->
        </div>
    </div>
</div>
