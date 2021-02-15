<div class="row">
    <div class="col-md-4 form-group">
        <label>Title <span class="errro">*</span></label>
        <input type="text" ng-model="formData.title" class="form-control" required>
    </div>

    

    <div class="col-md-12 form-group">
        <label>Description</label>
        <textarea ng-model="formData.description" class="form-control"></textarea>
    </div>

    <div class="col-md-12 form-group">
        <label>Payment Plan</label>
        <trix-editor angular-trix class="trix-content" ng-model="formData.payment_plan" style="height: 150px; overflow-y: auto;"></trix-editor>

    </div>

    <div class="col-md-4">
        
        <label>Site Plan</label><br>
        <button type="button" ng-show="!formData.site_plan" class="button btn blue" ngf-select="uploadFile($file,'site_plan')" ngf-max-size="5MB" ladda="uploading_site_plan"  data-style="expand-right">Select</button>

        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.site_plan}}" ng-show="formData.site_plan" target="_blank">View</a>
        <a class="btn red ng-cloak" ng-click="removeFile('site_plan')" ng-show="formData.site_plan "><i class="fa fa-remove"></i></a>
    </div>

    <div class="col-md-4">
        
        <label>Location Map</label><br>
        <button type="button" ng-show="!formData.location_map" class="button btn blue" ngf-select="uploadFile($file,'location_map')" ngf-max-size="5MB" ladda="uploading_location_map"  data-style="expand-right">Select</button>

        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.location_map}}" ng-show="formData.location_map" target="_blank">View</a>
        <a class="btn red ng-cloak" ng-click="removeFile('location_map')" ng-show="formData.location_map "><i class="fa fa-remove"></i></a>
    </div>

    <div class="col-md-4">
        
        <label>Upload Brochure</label><br>
        <button type="button" ng-show="!formData.brochure" class="button btn blue" ngf-select="uploadFile($file,'brochure')" ngf-max-size="5MB" ladda="uploading_brochure"  data-style="expand-right">Select</button>

        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.brochure}}" ng-show="formData.brochure" target="_blank">View</a>
        <a class="btn red ng-cloak" ng-click="removeFile('brochure')" ng-show="formData.brochure "><i class="fa fa-remove"></i></a>
    </div>
</div>
<div class="row" style="margin-top: 10px">

    <div class="col-md-4">
        
        <label>Upload Feature Image</label><br>
        <button type="button" ng-show="!formData.feature_image" class="button btn blue" ngf-select="uploadFile($file,'feature_image')" ngf-max-size="5MB" ladda="uploading_feature_image"  data-style="expand-right">Select</button>

        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.feature_image}}" ng-show="formData.feature_image" target="_blank">View</a>
        <a class="btn red ng-cloak" ng-click="removeFile('feature_image')" ng-show="formData.feature_image "><i class="fa fa-remove"></i></a>
    </div>

    <div class="col-md-4">
        
        <label>Upload Cover Image</label><br>
        <button type="button" ng-show="!formData.cover_image" class="button btn blue" ngf-select="uploadFile($file,'cover_image')" ngf-max-size="5MB" ladda="uploading_cover_image"  data-style="expand-right">Select</button>

        <a class="btn blue ng-cloak" href="{{url('/')}}/@{{formData.cover_image}}" ng-show="formData.cover_image" target="_blank">View</a>
        <a class="btn red ng-cloak" ng-click="removeFile('cover_image')" ng-show="formData.cover_image "><i class="fa fa-remove"></i></a>
    </div>

</div>
