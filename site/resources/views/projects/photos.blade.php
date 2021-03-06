<div class="row">
    <div class="col-md-2">
        <button type="button" style="margin-top: 23px" class="btn yellow" ngf-select="addGalleryPhotos($files,'files')" ladda="uploading_files" ngf-pattern="'image/jpeg,jpg'" accept=".pdf ,.jpeg,.jpg" ngf-multiple="true">Select Photos</button>
    </div>
</div>

<div class="row">
    <div class="col-md-3" style="margin-top: 10px; @{{($index%4==0 ) ?' clear: both':''}}" ng-repeat="photo in formData.photos">
        <div style="border: 1px solid #ddd;padding: 10px;position: relative;">
            <button style="position: absolute;top:11px;right: 26px" class="btn btn-sm btn-danger" type="button" ng-click="removeGalleryPhoto($index)"><i class="fa fa-remove"></i></button>
            <img src="@{{photo.th_photo_link}}" style="width: 100%;height: 200px">
        </div>
    </div>
</div>