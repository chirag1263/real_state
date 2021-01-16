app.controller('DirectorCtrl',function($scope , $http, $timeout , DBService, DTOptionsBuilder){
	
	$scope.data_expand = false;

	$scope.filters = [];
	$scope.compares = [];
	$scope.maths = [];
	$scope.columns = [];
	$scope.directors = [];
	$scope.formData = {};
	$scope.applied_compares = [];
	$scope.applied_maths = [];
	$scope.count = 0;
	$scope.message = "";
	$scope.director = {};
	$scope.sections = [];

	$scope.more_details = {};

	$scope.applied_columns = [];
	$scope.column_fields = [];

	$scope.query_in = "";

	$scope.myConfig = {
		create: false,
		valueField: 'id',
		labelField: 'name',
		delimiter: '|',
		placeholder: '',
		onInitialize: function(selectize){
		// receives the selectize object as an argument
		},
		searchField: ['name'],
	};

	$scope.clearFilters = function(){
		$scope.formData = {};
		$(".filters_div input").each(function(e){
			if($(this).prop("checked") == true){
                $(this).trigger("click");
            }
		});
	}

	$scope.$watch('formData', function(newval, oldval){
        console.log(newval);
    }, true);

	$scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('full_numbers')
        .withDisplayLength(100);
	
	$scope.initials = function(){
		DBService.getCall('/api/directors/init').then(function(data){
			if(data.success){
				console.log(data);
				$scope.filters = data.filters;	 
				$scope.compares = data.compares;	 
				$scope.maths = data.maths;	 
				 
				$scope.date_fields = data.date_fields;

				$scope.columns = data.columns;

				console.log($scope.columns);

			}
		});

		$scope.resetCompare();
	}

	$scope.resetCompare = function(){
		$scope.compare_field = "";
		$scope.operator = "";
		$scope.compare_value = "";
		$scope.compare_value1 = "";
		$scope.compare_value2 = "";
	}

	$scope.cancelSearch = function(){
		$scope.calcelled_search = true;
		$scope.processing = false;
	}

	$scope.search = function(){
		$scope.calcelled_search = false;

		$scope.processing = true;
		
		var formData = $scope.formData;
		formData.compares = $scope.applied_compares;
		formData.maths = $scope.applied_maths;
		formData.columns = $scope.applied_columns;

		console.log($scope.applied_compares);
		console.log($scope.applied_maths);

		$scope.file_url = "";

		DBService.postCall(formData, '/api/directors/search').then(function(data){
			if(data.success){
				console.log(data);
				if(!$scope.calcelled_search){
					if($scope.formData.export == 2){
						$scope.query_in = data.message;
					} else if($scope.formData.export == 0){
						$scope.directors = [];
						$scope.column_fields = data.column_fields;
						$scope.count = data.directors.length;
						$scope.message = data.message;
						$timeout(function(){
							$scope.directors = data.directors;
							$scope.count = data.directors.length;
						},500);
					} else {
						$scope.file_url = base_url+'/site/temp/'+data.file_url;
					}
				}
			}

			$scope.processing = false;
		});
	}


	$scope.applyFilters = function(){
		$scope.formData.export = 0;
		$scope.query_in = "";
		$scope.search();
	}

	$scope.export = function(){
		$scope.formData.export = 1;
		$scope.query_in = "";
		$scope.search();
	}

	$scope.exportQuery = function(){
		$scope.formData.export = 2;
		$scope.query_in = "";
		$scope.search();
	}

	$scope.setMultiple = function(variable, value){
		if(!$scope.formData[variable]) $scope.formData[variable] = [];
		if($scope.formData[variable].indexOf(value) == -1){
			$scope.formData[variable].push(value);
		} else {
			var idx = $scope.formData[variable].indexOf(value);
			$scope.formData[variable].splice(idx,1);
		}
	}

	$scope.setMultipleNF = function(value){

		if($scope.applied_columns.indexOf(value) == -1){
			$scope.applied_columns.push(value);
		} else {
			var idx = $scope.applied_columns.indexOf(value);
			$scope.applied_columns.splice(idx,1);
		}

		console.log($scope.applied_columns);
	}

	$scope.addCompare = function(){
		var compare_name = "";
		var compare_db_field = "";

		for (var i = 0; i < $scope.compares.length; i++) {
			if($scope.compares[i].form_var == $scope.compare_field){
				compare_name = $scope.compares[i].name;
				compare_db_field = $scope.compares[i].key;
			}
		}

		$scope.applied_compares.push({
			field: $scope.compare_field,
			name: compare_name,
			db_field: compare_db_field,
			operator: $scope.operator,
			value: $scope.compare_value,
			value1: $scope.compare_value1,
			value2: $scope.compare_value2,
		});

		console.log($scope.applied_compares);

		$scope.resetCompare();
	}

	$scope.removeCompare = function(index){
		$scope.applied_compares.splice(index,1);
	}

	$scope.addMath = function(){
		var math_name1 = "";
		var math_name2 = "";
		var math_db_field1 = "";
		var math_db_field2 = "";

		for (var i = 0; i < $scope.maths.length; i++) {
			if($scope.maths[i].form_var == $scope.math_field1){
				math_name1 = $scope.maths[i].name;
				math_db_field1 = $scope.maths[i].key;
			}
			if($scope.maths[i].form_var == $scope.math_field2){
				math_name2 = $scope.maths[i].name;
				math_db_field2 = $scope.maths[i].key;
			}
		}

		$scope.applied_maths.push({
			field1: $scope.math_field1,
			field2: $scope.math_field2,
			name1: math_name1,
			name2: math_name2,
			db_field1: math_db_field1,
			db_field2: math_db_field2,
			operator: $scope.math_operator,
			show_perc: $scope.show_perc,
		});

		console.log($scope.applied_maths);

		$scope.resetmath();
	}
	$scope.resetmath = function(){
		$scope.math_field1 = "";
		$scope.math_field2 = "";
		$scope.math_operator = "";
		$scope.show_perc = "";
	}

	$scope.removeMath = function(index){
		$scope.applied_maths.splice(index,1);
	}

	$scope.getDirectorInfo = function(director){
		$scope.loading = true;
		DBService.getCall( '/api/directors/details/'+director.din_no).then(function(data){
			if(data.success){
				$scope.loading = false;
				$scope.director = data.director;
				$scope.sections = data.sections;
			}
		});
	}

	$scope.viewDirector = function(director){
		$(".inside-modal.offset1").show();
		$scope.getDirectorInfo(director);
	}

	$scope.hideInsideModal = function(){
		$(".inside-modal.offset1").hide();
	}

	$scope.hideInsideModal2 = function(){
		$(".inside-modal.offset").hide();
	}

	$scope.fetchDetails = function(link){
		$scope.getMoreInfo(link);
	}

	$scope.getMoreInfo = function(link){
		$scope.loading = true;
		DBService.getCall(link).then(function(data){
			if(data.success){
				$(".inside-modal.offset").show();
				$scope.loading = false;
				$scope.more_details.title = data.title;
				$scope.more_details.sections = data.sections;
			}
		});
	}

});

app.controller('directorInfoCtrl', function($scope , $http, $timeout , DBService){

	$scope.directors = [];
	$scope.selected_directors = [];
	$scope.din_no = null;

	$scope.initials = function(){
		DBService.postCall({din_no:$scope.din_no},'/api/director_info/init').then(function(data){
			if(data.director){
				$scope.viewData = data.director;
				$scope.selected_directors.push(data.director);
				$scope.viewDirector(data.director);
			}

		});
	}

	$scope.addDirector = function(){
		$scope.selected_directors = $scope.selected_directors;
		$scope.din_no = null;
		$("input[name=name]").val("");
	}

	$scope.switchDirector = function(director){
		$scope.viewData = director;
		$scope.director = {};
	}

	$( function() {
        
        $( "#findDirector" ).autocomplete({
              source: function( request, response ) {
                console.log(request);
                $.ajax( {
                  url: base_url+"/api/director_info/getDirectors",
                  method: "POST",
                  data: {
                    term: request.term,
                    _token:CSRF_TOKEN
                  },
                  success: function( data ) {
                    response( data );
                  }
                } );
              },
              minLength: 3,
              select: function( event, ui ) {
                $scope.din_no = ui.item.din_no;
                $scope.selected_directors.push(ui.item);
                $scope.viewData = ui.item;
                $scope.director = {};

              }
        });

    } );


	$scope.showDirectorshipData = function(){
		$scope.viewData.loading = true;

		DBService.postCall({din_no:$scope.viewData.din_no},'/api/director_info/getDirectorshipData').then(function(data){
			$scope.viewData.directorships = data.directorships;
			$scope.viewData.loading = false;

		});
	}

	$scope.showSelectedCompany = function(directorship){
		$scope.viewData.fetching_company = true;
		DBService.postCall({id:directorship.id},'/api/director_info/CompanyFinancialYearData').then(function(data){
			$scope.viewData.selected_company = data.company;
			$scope.viewData.fetching_company = false;
			$("#directorship-detials").modal("show");

		});
	}

	$scope.viewDirector = function(director){
		$(".inside-modal.offset1").show();
		$scope.director = {};
		$scope.getDirectorInfo(director);
	}

	$scope.getDirectorInfo = function(director){
		$scope.loading = true;
		DBService.getCall( '/api/directors/details/'+director.din_no).then(function(data){
			if(data.success){
				$scope.loading = false;
				$scope.director = data.director;
				$scope.director.timeline = true;
				$scope.sections = data.sections;
			}
		});
	}

	$scope.fetchDetails = function(link){
		$scope.getMoreInfo(link);
	}

	$scope.getMoreInfo = function(link){
		$scope.loading = true;
		$scope.more_details = {};
		DBService.getCall(link).then(function(data){
			if(data.success){
				$(".inside-modal.offset").show();
				$scope.loading = false;
				$scope.more_details.title = data.title;
				$scope.more_details.sections = data.sections;
			}
		});
	}

	$scope.hideInsideModal2 = function(){
		$(".inside-modal.offset").hide();
	}

});

app.controller('CompanyCtrl',function($scope , $http, $timeout , DBService , ApiService, DTOptionsBuilder){
	
	$scope.selected_companies = [];
	$scope.formData = {};
	$scope.viewData = {director_fields:[]};
	$scope.filter = {};
	$scope.director_fields = [];

	$scope.myConfig = {
		create: false,
		maxItems:1,
		valueField: 'id',
		labelField: 'name',
		delimiter: '|',
		placeholder: '',
		onInitialize: function(selectize){
		// receives the selectize object as an argument
		},
		searchField: ['name'],
	};

	$scope.configDirectorFields = {
		create: false,
		// maxItems:1,
		valueField: 'value',
		labelField: 'label',
		delimiter: '|',
		placeholder: '',
		onInitialize: function(selectize){
		// receives the selectize object as an argument
		},
		searchField: ['label'],
	};

	$scope.initials = function(){
		$scope.initializing = true;
		DBService.getCall('/companies/init').then(function(data){
			$scope.companies = data.companies;	 
			$scope.years = data.years;
			$scope.selected_companies = data.selected_companies;
			if($scope.selected_companies.length > 0){

				$scope.switchViewData($scope.selected_companies[0].id,$scope.selected_companies[0].year);
			}
			$scope.initializing = false;

			$scope.getDirectorFields();
		});

	}

	$scope.fieldExist = function(field){
		if($scope.viewData.director_fields){

			if($scope.viewData.director_fields.indexOf(field.value) > -1){
				return true;
			}
		}
	}

	$scope.getDirectorFields = function(){
		DBService.getCall('/api/director_fields').then(function(data){
			$scope.director_fields = data.fields;

			for (var i = $scope.director_fields.length - 1; i >= 0; i--) {
				if($scope.director_fields[i]['value'] == 'dir_din_no' || $scope.director_fields[i]['value'] == 'dir_name' || $scope.director_fields[i]['value'] == 'company_classification' || $scope.director_fields[i]['value'] == 'ses_classification'){
					$scope.director_fields.splice(i,1);
				}
			}

		});
	}

	$scope.removeSelectedCompany = function(company,index){
		$scope.selected_companies.splice(index,1);
		DBService.postCall(company,'/companies/removeComHistory').then(function(data){

		});
	}

	$scope.addCompany = function(){

		if(!$scope.formData.company_id){
			alert('Please select a company');
		}else{


			var check_dup = false;

			for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
				if($scope.selected_companies[i].year == $scope.formData.year && $scope.selected_companies[i].id == $scope.formData.company_id){
					check_dup = true;
				}
			}


			if(!check_dup){
				$('.tools .collapse').addClass("expand");
				$('.tools .collapse').removeClass("collapse");
				$('.portlet-body').hide();
				$scope.fetchComDirectors($scope.formData.company_id,$scope.formData.year);

			}else{
				alert("This company for financial year "+$scope.formData.year + ' is already added');
			}
		}
	}

	$scope.fetchComDirectors = function(com_id,year){
		$scope.loading = true;

		DBService.getCall('/api/director_info/'+com_id+'/'+year).then(function(data){
			if(data.success){
				for (var i = $scope.companies.length - 1; i >= 0; i--) {
					if ($scope.companies[i].id == com_id) {
						var company = JSON.parse(JSON.stringify($scope.companies[i]));
						company.directors = data.directors;

						var check_dup = false;

						for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
							if($scope.selected_companies[i].year == year && $scope.selected_companies[i].id == com_id){
								check_dup = true;
							}
						}
						company.year = year;
						if(!check_dup){

							$scope.selected_companies.push(company);
						}

						$scope.viewData = company;
					}
				}
				$scope.formData = {};
				$scope.addForm.$setPristine();
				$scope.formData = {company_id:null,year:null};
			}

			$scope.loading = false;
		});
	}

	$scope.getCompaniesSectorWise = function(){
		$scope.openSector = {sector:$scope.viewData.sector};
		$scope.openSector.loading = true;

		DBService.postCall($scope.openSector,'/companies/getCompaniesSectorWise').then(function(data){
			if(data.success){
				$scope.openSector.companies = data.companies;
				$("#sectorWiseCom").modal("show");
			}
			$scope.openSector.loading = false;
		});
	}

	$scope.checkTypeInt = function(variable){
		if(variable.length < 5){
			var check_val = parseInt(variable);
			console.log(typeof check_val);
			if(typeof check_val == 'number'){
				return true;
			}

		}
	}

	

	$scope.fetchComData = function(company_id,item_type){

		console.log($scope.viewData);

		$scope.viewData[item_type] = !$scope.viewData[item_type];

		if($scope.viewData[item_type]){

			if(item_type == 'remuneration'){ 
				if(!$scope.viewData.directors_rem){
					$scope.loading = true;
					DBService.getCall('/api/director_rem/'+company_id+'/'+$scope.viewData.year).then(function(data){
						$scope.loading = false;
						if(data.success){
							$scope.viewData.directors_rem = data.directors_rem;

							for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
								if ($scope.selected_companies[i].id == $scope.viewData.id) {
									$scope.selected_companies[i].directors_rem = data.directors_rem;
								}
							}

							$scope.viewData.directors_rem['show_'+ $scope.viewData.year] = true;

						}
					});
				}
			}

			if(item_type == 'auditors'){ 
				if(!$scope.viewData.audit_fee_info){
					$scope.loading = true;
					DBService.getCall('/api/audit_fee_info/'+company_id+'/'+$scope.viewData.year).then(function(data){
						$scope.loading = false;
						if(data.success){
							$scope.viewData.auditor = data.auditor;
							$scope.viewData.previous_auditors = data.previous_auditors;
							$scope.viewData.chartData = data.chartData;
							for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
								if ($scope.selected_companies[i].id == $scope.viewData.id) {
									$scope.selected_companies[i].audit_fee_info = data.audit_fee_info;
								}
							}
						}
					});
				}
			}

			if(item_type == 'financials_data'){ 
				if(!$scope.viewData.financials){
					$scope.loading = true;
					DBService.getCall('/api/financials/'+company_id+'/'+$scope.viewData.year).then(function(data){
						$scope.loading = false;
						if(data.success){
							$scope.viewData.financialData = data.financialData;
							$scope.viewData.financialData1 = data.financialData1;
							$scope.viewData.financialData2 = data.financialData2;
							$scope.viewData.financials = data.financials;

							for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
								if ($scope.selected_companies[i].id == $scope.viewData.id) {
									$scope.selected_companies[i].financialData = data.financialData;
									$scope.selected_companies[i].financialData1 = data.financialData1;
									$scope.selected_companies[i].financialData2 = data.financialData2;
									$scope.selected_companies[i].financials = data.financials;
								}
							}
						}
					});
				}
			}

			if(item_type == 'main_products_data'){ 
				if(!$scope.viewData.main_products){
					$scope.loading = true;
					DBService.getCall('/api/main_products/'+company_id+'/'+$scope.viewData.year).then(function(data){
						$scope.loading = false;
						if(data.success){
							$scope.viewData.main_products = data.main_products;
							for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
								if ($scope.selected_companies[i].id == $scope.viewData.id) {
									$scope.selected_companies[i].main_products = data.main_products;
								}
							}
						}
					});
				}
			}

			if(item_type == 'shareholding_patterns'){
				if(!$scope.viewData.shareholdingData){
					$scope.fetchShareholdingFromDB(null,company_id);
				}
			}
		}
	}

	$scope.fetchShareholdingFromDB = function(qtr_id,company_id){
		if(qtr_id >= 0){
			var url = '/api/shareholding_patterns/'+company_id+'/'+$scope.viewData.year+'?quarter_id='+qtr_id;
		}else{
			var url = '/api/shareholding_patterns/'+company_id+'/'+$scope.viewData.year;
		}
		console.log(qtr_id);
		$scope.shareholding_patterns(url);

	}

	$scope.shareholding_patterns = function(url){
		$scope.loading = true;
		DBService.getCall(url).then(function(data){
			$scope.loading = false;
			if(data.success){
				$scope.viewData.shareholdingData = data.shareholdingData;
				$scope.viewData.quarter_title = data.quarter_title;
				$scope.viewData.quarter_id = data.quarter_id;

				for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
					if ($scope.selected_companies[i].id == $scope.viewData.id) {
						$scope.selected_companies[i].shareholdingData = data.shareholdingData;
						$scope.selected_companies[i].quarter_title = data.quarter_title;
					}
				}
			}
		});
	}



	$scope.switchViewData = function(company_id,year){

		$('.tools .collapse').addClass("expand");
		$('.tools .collapse').removeClass("collapse");
		$('.portlet-body').hide();
		$scope.filter = {};

		for (var i = $scope.selected_companies.length - 1; i >= 0; i--) {
			if ($scope.selected_companies[i].id == company_id && $scope.selected_companies[i].year == year) {
				$scope.viewData = {};
				$scope.viewData = JSON.parse(JSON.stringify($scope.selected_companies[i]));

				$scope.viewData.remuneration = false;
				$scope.viewData.auditors = false;
				$scope.viewData.financials = false;
				$scope.viewData.main_products = false;

				$scope.fetchComDirectors(company_id,year);
			}
		}	
	}

	$scope.viewDirector = function(director){
		$scope.director = {loading:true,dir_name:director.dir_name};
		$("#director-info").modal("show");
		DBService.getCall( '/api/directors/details/'+director.dir_din_no).then(function(data){
			if(data.success){
				$scope.director = data.director;
			}
		});
	}

	$scope.addRemYearData = function(year){
		$scope.viewData.directors_rem['show_'+year] = !$scope.viewData.directors_rem['show_'+year];
	}

	$scope.viewDirRem = function(director){
		$scope.open_director = {loading : true};
		$("#view_directors_rem").modal("show");
		DBService.getCall('/api/view_directors_rem/'+director.dir_din_no+'/'+$scope.viewData.year).then(function(data){
			if(data.success){
				$scope.open_director = data.director;
			}else{

			}
		});
	}

	$scope.resolutionInit = function(){
		DBService.getCall('/api/resolutions').then(function(data){
			$scope.resolution_types = data.resolution_types;
		});
	}

	$scope.resetResFilter = function(){

		$scope.filter = {};
	}

	$scope.filterResolutions = function(){
		$scope.filter_message = null;
		$scope.filter.loaded_all = false;
		$scope.filter.processing = true;
		$scope.filter.isin = $scope.viewData.isin;
		$scope.filter.portal_com_id = $scope.viewData.portal_com_id;
		$scope.filter.bse_code = $scope.viewData.bse_code;

		console.log($scope.filter);

		DBService.postCall($scope.filter,'/api/resolutions/getResolutions').then(function(data){
			$scope.filter.processing = false;
			$scope.resolutions = data.resolutions;
			$scope.filter_message = data.message;
			
		});
	}

	$scope.loadMoreResolutions = function(){
		$scope.filter.count = $scope.resolutions.length;
		$scope.filter.loading = true;
		DBService.postCall($scope.filter,'/api/resolutions/getResolutions').then(function(data){
			$scope.filter.processing = false;
			for (var i = data.resolutions.length - 1; i >= 0; i--) {
				
				$scope.resolutions.push(data.resolutions[i]);
			}

			if(data.resolutions.length == 0){
				$scope.filter.loaded_all = true;
			}else{
				$scope.filter.loaded_all = false;

			}
			if(data.message){

				$scope.filter_message = data.message;
			}
			$scope.filter.loading = false;

			
		});
	}

	$scope.showResolutionResult = function(resolution){
		$scope.openResolution = resolution;
		$scope.openResolution.loading = true;
		$('#all_resolution_result').modal("show");
		DBService.postCall(resolution,'/api/resolutions/getAllResult').then(function(data){
			if(data.success){

				$scope.openResolution.all_results = data.all_results;
			}
			$scope.openResolution.loading = false;

			
		});
	}

	$scope.showAuditorCompanies = function(auditor){
		$scope.openAuditor = auditor;
		$scope.openAuditor.loading = true;
		auditor.current_year = $scope.viewData.year;
		$('#auditor_companies').modal("show");
		DBService.postCall(auditor,'/api/getAuditorCompanies').then(function(data){
			if(data.success){

				$scope.openAuditor.companies = data.auditor_companies;
			}
			$scope.openAuditor.loading = false;
		});
	}

});

app.controller('CompanyBulkCtrl',function($scope , $http, $timeout , DBService, DTOptionsBuilder){
	
	$scope.data_expand = false;

	$scope.filters = [];
	$scope.compares = [];
	$scope.maths = [];
	$scope.columns = [];
	$scope.directors = [];
	$scope.formData = {};
	$scope.applied_compares = [];
	$scope.applied_maths = [];
	$scope.count = 0;
	$scope.message = "";
	$scope.company = {};
	$scope.sections = [];

	$scope.more_details = {};

	$scope.applied_columns = [];
	$scope.column_fields = [];

	$scope.query_in = "";

	$scope.myConfig = {
		create: false,
		valueField: 'id',
		labelField: 'name',
		delimiter: '|',
		placeholder: '',
		onInitialize: function(selectize){
		// receives the selectize object as an argument
		},
		searchField: ['name'],
	};

	$scope.clearFilters = function(){
		$scope.formData = {};
		$(".filters_div input").each(function(e){
			if($(this).prop("checked") == true){
                $(this).trigger("click");
            }
		});
	}

	$scope.$watch('formData', function(newval, oldval){
        console.log(newval);
    }, true);

	$scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('full_numbers')
        .withDisplayLength(100);
	
	$scope.initials = function(){
		DBService.getCall('/companies/bulk/init').then(function(data){
			if(data.success){
				console.log(data);
				$scope.filters = data.filters;	 
				$scope.compares = data.compares;	 
				$scope.maths = data.maths;	 
				 
				$scope.date_fields = data.date_fields;

				$scope.columns = data.columns;

				console.log($scope.columns);

			}
		});

		$scope.resetCompare();
	}

	$scope.resetCompare = function(){
		$scope.compare_field = "";
		$scope.operator = "";
		$scope.compare_value = "";
		$scope.compare_value1 = "";
		$scope.compare_value2 = "";
	}

	$scope.cancelSearch = function(){
		$scope.calcelled_search = true;
		$scope.processing = false;
	}

	$scope.search = function(){
		$scope.calcelled_search = false;

		$scope.processing = true;
		
		var formData = $scope.formData;
		formData.compares = $scope.applied_compares;
		formData.maths = $scope.applied_maths;
		formData.columns = $scope.applied_columns;

		console.log($scope.applied_compares);
		console.log($scope.applied_maths);

		$scope.file_url = "";

		DBService.postCall(formData, '/companies/bulk/search').then(function(data){
			if(data.success){
				console.log(data);
				if(!$scope.calcelled_search){
					if($scope.formData.export == 2){
						$scope.query_in = data.message;
					} else if($scope.formData.export == 0){
						$scope.companies = [];
						$scope.column_fields = data.column_fields;
						$scope.count = data.companies.length;
						$scope.message = data.message;
						$timeout(function(){
							$scope.companies = data.companies;
							$scope.count = data.companies.length;
						},500);
					} else {
						$scope.file_url = base_url+'/site/temp/'+data.file_url;
					}
				}
			}

			$scope.processing = false;
		});
	}


	$scope.applyFilters = function(){
		$scope.formData.export = 0;
		$scope.query_in = "";
		$scope.search();
	}

	$scope.export = function(){
		$scope.formData.export = 1;
		$scope.query_in = "";
		$scope.search();
	}

	$scope.exportQuery = function(){
		$scope.formData.export = 2;
		$scope.query_in = "";
		$scope.search();
	}

	$scope.setMultiple = function(variable, value){
		if(!$scope.formData[variable]) $scope.formData[variable] = [];
		if($scope.formData[variable].indexOf(value) == -1){
			$scope.formData[variable].push(value);
		} else {
			var idx = $scope.formData[variable].indexOf(value);
			$scope.formData[variable].splice(idx,1);
		}
	}

	$scope.setMultipleNF = function(value){

		if($scope.applied_columns.indexOf(value) == -1){
			$scope.applied_columns.push(value);
		} else {
			var idx = $scope.applied_columns.indexOf(value);
			$scope.applied_columns.splice(idx,1);
		}

		console.log($scope.applied_columns);
	}

	$scope.addCompare = function(){
		var compare_name = "";
		var compare_db_field = "";

		for (var i = 0; i < $scope.compares.length; i++) {
			if($scope.compares[i].form_var == $scope.compare_field){
				compare_name = $scope.compares[i].name;
				compare_db_field = $scope.compares[i].key;
			}
		}

		$scope.applied_compares.push({
			field: $scope.compare_field,
			name: compare_name,
			db_field: compare_db_field,
			operator: $scope.operator,
			value: $scope.compare_value,
			value1: $scope.compare_value1,
			value2: $scope.compare_value2,
		});

		console.log($scope.applied_compares);

		$scope.resetCompare();
	}

	$scope.removeCompare = function(index){
		$scope.applied_compares.splice(index,1);
	}

	$scope.addMath = function(){
		var math_name1 = "";
		var math_name2 = "";
		var math_db_field1 = "";
		var math_db_field2 = "";

		for (var i = 0; i < $scope.maths.length; i++) {
			if($scope.maths[i].form_var == $scope.math_field1){
				math_name1 = $scope.maths[i].name;
				math_db_field1 = $scope.maths[i].key;
			}
			if($scope.maths[i].form_var == $scope.math_field2){
				math_name2 = $scope.maths[i].name;
				math_db_field2 = $scope.maths[i].key;
			}
		}

		$scope.applied_maths.push({
			field1: $scope.math_field1,
			field2: $scope.math_field2,
			name1: math_name1,
			name2: math_name2,
			db_field1: math_db_field1,
			db_field2: math_db_field2,
			operator: $scope.math_operator,
			show_perc: $scope.show_perc,
		});

		console.log($scope.applied_maths);

		$scope.resetmath();
	}
	$scope.resetmath = function(){
		$scope.math_field1 = "";
		$scope.math_field2 = "";
		$scope.math_operator = "";
		$scope.show_perc = "";
	}

	$scope.removeMath = function(index){
		$scope.applied_maths.splice(index,1);
	}

	$scope.getDirectorInfo = function(director){
		$scope.loading = true;
		DBService.getCall( '/api/directors/details/'+director.din_no).then(function(data){
			if(data.success){
				$scope.loading = false;
				$scope.director = data.director;
				$scope.sections = data.sections;
			}
		});
	}

	$scope.viewCompany = function(company){
		console.log(company);
	}

	$scope.hideInsideModal = function(){
		$(".inside-modal.offset1").hide();
	}

	$scope.hideInsideModal2 = function(){
		$(".inside-modal.offset").hide();
	}

	$scope.fetchDetails = function(link){
		$scope.getMoreInfo(link);
	}

	$scope.getMoreInfo = function(link){
		$scope.loading = true;
		DBService.getCall(link).then(function(data){
			if(data.success){
				$(".inside-modal.offset").show();
				$scope.loading = false;
				$scope.more_details.title = data.title;
				$scope.more_details.sections = data.sections;
			}
		});
	}

});

app.controller('ResolutionCtrl',function($scope , $http, $timeout , DBService, DTOptionsBuilder){
	$scope.leadData = {status:1};

	$scope.max = 100;
	$scope.pn = 1;
	$scope.total_pn = 0;
	$scope.count = 0;
	$scope.processing = false;
	$scope.resolutions = [];
	$scope.filter = {
		sort_by: "",
		sorting : ""
	};

	$scope.sort_by = "";
	$scope.sorting = "";

	$scope.nextPage = function(){
		if(($scope.pn+1)*$scope.max <= ($scope.count+$scope.max)) {
			$scope.filter_resolutions($scope.pn + 1);
		}
	}

	$scope.prevPage = function(){
		if($scope.pn - 1 > 0){
			$scope.filter_resolutions($scope.pn - 1);
		}
	}

	$scope.init = function(){
		DBService.postCall($scope.filter,'/api/view-resolutions/init').then(function(data){
			if(data.success){
				
				$scope.resolution_types = data.resolution_types;
				$scope.analysts = data.analysts;
				$scope.meeting_types = data.meeting_types;
				
			}
		});
		$scope.filter_resolutions(1);
	}

	$scope.filter_resolutions = function(page_number){
		$scope.loading = true;
		$scope.filter.pn = page_number;
		$scope.filter.max = $scope.max;
		$scope.noDataFound = false;
		$scope.resolutions = [];

		DBService.postCall($scope.filter,'/api/view-resolutions/filter').then(function(data){
			if(data.success){
				
				$scope.resolutions = data.resolutions;
				$scope.count = data.count;
				$scope.total_pn = data.total_pn;

				$scope.pn = page_number;

				if($scope.resolutions.length < 1){
					$scope.noDataFound = true;
				}

				if(data.file_path){
					$scope.filter.file_path = data.file_path;
					$scope.filter.export_excel = false;
				}else{

					$scope.showFilter = false;
				}
			}
			$scope.loading = false;
			$scope.resetting = false;
		});

	}

	$scope.sortBy = function(type){
		if($scope.filter.sort_by == type){
			if($scope.filter.sorting == "ASC"){
				$scope.filter.sorting = "DESC";
			} else if($scope.filter.sorting == ""){
				$scope.filter.sorting = "ASC";
			} else {
				$scope.filter.sorting = "";
			}
		} else {
			$scope.filter.sort_by = type;
			$scope.filter.sorting = "ASC";
		}

		$scope.sort_by = $scope.filter.sort_by;
		$scope.sorting = $scope.filter.sorting;

		$scope.init(1);
	}

});
