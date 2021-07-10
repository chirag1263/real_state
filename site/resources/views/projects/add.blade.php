@extends('layout')

@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ3wn5xfgtSDRim3DZGBEq-YYTUn6MXVE&libraries=places"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122838648-1"></script>

    <div ng-controller="projectCtrl" ng-init="project_id={{$project_id}};tab_id=1;init()">
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title" >Projects</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/projects')}}" class="btn blue">Back</a>
                </div>
            </div>
        </div>

        <div>
            <form ng-submit="onSubmit(listForm.$valid)" name="listForm" novalidate>

                <ul class="nav nav-tabs">
                    <li class="@{{tab_id == 1 ?'active':''}}" ng-click="tab_id=1;"><a href="javascript:;">Details</a></li>
                    <li class="@{{tab_id == 5 ?'active':''}}" ng-click="tab_id=5;"><a href="javascript:;">Locations</a></li>
                    <li class="@{{tab_id == 2 ?'active':''}}" ng-click="tab_id=2;"><a href="javascript:;">Highlights</a></li>
                    <li class="@{{tab_id == 3 ?'active':''}}" ng-click="tab_id=3;"><a href="javascript:;">Specifications</a></li>
                    <li class="@{{tab_id == 4 ?'active':''}}" ng-click="tab_id=4;"><a href="javascript:;">Gallery</a></li>
                    <li class="@{{tab_id == 6 ?'active':''}}" ng-click="tab_id=6;"><a href="javascript:;">Filters</a></li>
                </ul>

                <div ng-show="tab_id==1">
                    
                    @include('projects.info')
                </div>

                <div ng-show="tab_id==2">
                    @include('projects.highlights')
                </div>

                <div ng-show="tab_id==3">
                    
                    @include('projects.specifications')
                </div>

                <div ng-show="tab_id==4">
                    
                    @include('projects.photos')
                </div>
                <div ng-show="tab_id==5">
                    
                    @include('projects.location')
                </div>

                <div ng-show="tab_id==6">
                    
                    @include('projects.filter')
                </div>


                <div style="margin-top: 10px;margin-bottom: 150px" class="text-right">

                    <button class="btn btn-primary" ladda="processing">Submit</button>
                </div>
            </form>
        </div>

    </div>

    <script>
        var lat_init = '{{(isset($latitude)?$latitude:0)}}';
        var lng_init = '{{(isset($longitude)?$longitude:0)}}';
        var map;

        google.maps.event.addDomListener(window, 'load', function(){
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {

                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();

                var scope = angular.element($(".location")).scope(); // just getting scope variable

                if(!scope.formData){
                    scope.formData = {};
                }else{
                    
                }

                scope.$apply(function(){
                    scope.formData.latitude = lat;
                    scope.formData.longitude = lng;
                    scope.formData.location = place.formatted_address;
                });

                // var place = autocomplete.getPlace();
                // $(".location").val(place.formatted_location);
                // var lat = place.geometry.location.lat();
                // $(".lat").val(lat);
                // var lng = place.geometry.location.lng();
                // // $(".lng").val(lng);

                var latlng = new google.maps.LatLng(lat, lng);
                marker.setPosition(latlng);
                map.setCenter(latlng);
            });

        });

        var marker = new google.maps.Marker({draggable:true});
        google.maps.event.addListener(marker, 'dragend', function() {
            var lat = marker.getPosition().lat();
            $(".lat").val(lat);
            var lng = marker.getPosition().lng();
            $(".lng").val(lng);
        });

        var myCenter = new google.maps.LatLng(lat_init, lng_init);
        
        google.maps.event.addDomListener(window, 'load', function(){
            var map_prop = {
                center: myCenter,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            map = new google.maps.Map(document.getElementById("map"), map_prop);
            marker.setPosition(myCenter);
            marker.setMap(map);
        });
    </script>
    

@endsection