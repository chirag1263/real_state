app.controller('LCCtrl', function($scope,$http,DBService){

    $scope.lc_id = 0;
    $scope.formData = {classes:[{highlight:''}]};

    $scope.init = function(){

        DBService.postCall({lc_id:$scope.lc_id},'/api/list-categories/init').then(function(data){
            if(data.success){
                $scope.formData = data.list;
               
            }
        }); 
    }

    $scope.onSubmit = function(){
        $scope.processing = true;
        $scope.formData.id = $scope.lc_id;
        DBService.postCall($scope.formData,'/api/list-categories/store').then(function(data){
            if(data.success){
                bootbox.alert(data.message,function(){

                    window.location = base_url + '/admin/list-categories';
                });
            }else{

                bootbox.alert(data.message);
            }
            $scope.processing = false;
        });
    }

});

app.controller('listCtrl', function($scope,$http,DBService ,Upload){

    $scope.list_id = 0;
    $scope.formData = {};

    $scope.init = function(){

        DBService.postCall({list_id:$scope.list_id},'/api/listings/init').then(function(data){
            if(data.success){
                $scope.categories = data.categories;

                if(data.formData){
                    $scope.formData = data.formData;
                }else{

                    $scope.formData.highlights = [{highlight:''}];
                    $scope.formData.specifications = [{specification:''}];
                }
            }
        }); 
    }

    $scope.addMoreHighlight = function(){
        $scope.formData.highlights.push({highlight:''});
    }

    $scope.removeHighlight = function(index){
        $scope.formData.highlights.splice(index,1);
    }

    $scope.addMoreSpecification = function(){
        $scope.formData.specifications.push({specification:''});
    }

    $scope.removeSpecification = function(index){
        $scope.formData.specifications.splice(index,1);
    }


    $scope.onSubmit = function(){
        $scope.processing = true;
        $scope.formData.id = $scope.list_id;
        DBService.postCall($scope.formData,'/api/listings/store').then(function(data){
            if(data.success){
                window.location = base_url+'/admin/listings';
            }else{

                bootbox.alert(data.message);
            }
            $scope.processing = false;
        });
    }

    $scope.uploadFile = function (file,name) {
        if(file){
            
            $scope.uploading = true;
            var url = base_url+'/api/upload/file';
            Upload.upload({
                url: url,
                data: {
                    media: file,
                    _token:CSRF_TOKEN
                }
            }).then(function (resp) {
                if(resp.data.success){
                    $scope.formData[name] = resp.data.media;
                } else {
                    bootbox.alert(resp.data.message);
                }
                $scope.uploading = false;
            }, function (resp) {
                // console.log('Error status: ' + resp.status);
                $scope.uploading = false;
            }, function (evt) {
                $scope.uploading_percentage = parseInt(100.0 * evt.loaded / evt.total) + '%';
            });
        }
    };

    $scope.removeFile = function(name){
        $scope.formData[name] = '';
    }

});