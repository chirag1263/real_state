@extends('layout')

@section('content')
    <div ng-controller="listCtrl" ng-init="list_id={{$list_id}};init()">
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title" >Listing</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/listings')}}" class="btn blue">Back</a>
                </div>
            </div>
        </div>

        <div>
            <form ng-submit="onSubmit(listForm.$valid)" name="listForm" novalidate>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Title <span class="errro">*</span></label>
                        <input type="text" ng-model="formData.title" class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Category <span class="error">*</span></label>
                        <select ng-model="formData.list_category_id" convert-to-number class="form-control" required>
                            <option value="">Select</option>
                            <option value="@{{cat.id}}" ng-repeat="cat in categories">@{{cat.category_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Price <span class="error">*</span></label>
                        <input type="text" ng-model="formData.price" class="form-control" required>
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Location</label>
                        <input type="text" ng-model="formData.location" class="form-control">
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Description</label>
                        <textarea ng-model="formData.description" class="form-control"></textarea>
                    </div>

                    <div class="col-md-4">
                        
                        <label>Upload Brochure</label><br>
                        <button type="button" ng-show="!formData.attachment" class="button btn blue" ngf-select="uploadFile($file,'attachment')" ngf-max-size="5MB" ladda="uploading_attachment" data-style="expand-right">Select</button>

                        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.attachment}}" ng-show="formData.attachment" target="_blank">View</a>
                        <a class="btn red ng-cloak" ng-click="removeFile('attachment')" ng-show="formData.attachment "><i class="fa fa-remove"></i></a>
                    </div>

                    <div class="col-md-4">
                        
                        <label>Upload Feature Image</label><br>
                        <button type="button" ng-show="!formData.feature_image" class="button btn blue" ngf-select="uploadFile($file,'feature_image')" ngf-max-size="5MB" ladda="uploading_feature_image" data-style="expand-right">Select</button>

                        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.feature_image}}" ng-show="formData.feature_image" target="_blank">View</a>
                        <a class="btn red ng-cloak" ng-click="removeFile('feature_image')" ng-show="formData.feature_image "><i class="fa fa-remove"></i></a>
                    </div>

                    <div class="col-md-4">
                        
                        <label>Upload Cover Image</label><br>
                        <button type="button" ng-show="!formData.cover_image" class="button btn blue" ngf-select="uploadFile($file,'cover_image')" ngf-max-size="5MB" ladda="uploading_cover_image" data-style="expand-right">Select</button>

                        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.cover_image}}" ng-show="formData.cover_image" target="_blank">View</a>
                        <a class="btn red ng-cloak" ng-click="removeFile('cover_image')" ng-show="formData.cover_image "><i class="fa fa-remove"></i></a>
                    </div>


                </div>

                <h3>Highlights</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Highlight</th>
                        <th>#</th>
                    </tr>
                    <tr ng-repeat="item in formData.highlights">
                        <td>@{{$index+1}}</td>
                        <td class="form-group"><input type="text" ng-model="item.highlight" class="form-control" required></td>
                        <td>
                            <button class="btn btn-danger" type="button" ng-click="removeHighlight($index)"><i class="fa fa-remove"></i></button>
                        </td>
                    </tr>
                </table>

                <div style="margin-top: 10px">
                    <button class="btn btn-sm yellow" type="button" ng-click="addMoreHighlight()">Add More </button>
                </div>

                <h3>Specifications</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Specification</th>
                        <th>#</th>
                    </tr>
                    <tr ng-repeat="item in formData.specifications">
                        <td>@{{$index+1}}</td>
                        <td class="form-group"><input type="text" ng-model="item.highlight" class="form-control" required></td>
                        <td>
                            <button class="btn btn-danger" type="button" ng-click="removeSpecification($index)"><i class="fa fa-remove"></i></button>
                        </td>
                    </tr>
                </table>

                <div style="margin-top: 10px">
                    <button class="btn btn-sm yellow" type="button" ng-click="addMoreSpecification()">Add More </button>
                </div>

                <div style="margin-top: 10px" class="text-right">

                    <button class="btn btn-primary" ladda="processing">Submit</button>
                </div>
            </form>
        </div>

    </div>
    

@endsection