
<div class="form-group" style="clear: both;margin-top: 10px">
    
    <div class="row">
        <div class="col-md-6">
            <label>Search Location</label>
            <input id="searchTextField" type="text" ng-model="formData.location" style="width: 100%; padding: 5px; margin-bottom: 10px;">
            <div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" ng-model="formData.latitude" class="form-control lat" >
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" ng-model="formData.longitude" class="form-control lng" >
                </div>
            </div>
        </div>

        <div class="col-md-6" style="margin-bottom: 20px;">
            <div id="map" style="width: 100%; height: 200px"></div>
            <small>Search for a venue and then drag the marker to adjust it</small>
        </div>
    
    </div>
    <div class="form-group">
        <label>Location/Complete Address</label>
        <input type="text" ng-model="formData.location" class="form-control location">
    </div>
</div>