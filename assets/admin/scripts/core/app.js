var app = angular.module('app', [
	'jcs-autoValidate',
  'datatables',
	'ngFileUpload',
	'angular-ladda',
  'ngSanitize',
  'selectize',
  'angularTrix'
]);

angular.module('jcs-autoValidate')
    .run([
    'defaultErrorMessageResolver',
    function (defaultErrorMessageResolver) {
        defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages) {
          errorMessages['patternInt'] = 'Please fill a numeric value';
          errorMessages['patternFloat'] = 'Please fill a numeric/decimal value';
        });
    }
]);
    
app.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return val != null ? parseInt(val, 10) : null;
      });
      ngModel.$formatters.push(function(val) {
        return val != null ? '' + val : null;
      });
    }
  };
});


app.directive('eChart', ['$compile', function ($compile) {
    return {
      restrict: 'EA',
      template: '<div class="chartarea" style="width:320px; height:320px; margin: 0 auto"></div>',
      link: function (scope, element, attrs) {
          var regions = element[0].querySelectorAll('.chartarea');

          var division_id = attrs.dataid;
          var data_link = attrs.datagraph;
          var data = scope[data_link];

          var name = attrs.dataname;
          var title = name;

          var titlehide = attrs.titlehide;
          
          if(titlehide == "true") title = '';

          var colors = (attrs.colors) ? scope[attrs.colors] : scope.colors;
          
          angular.forEach(regions, function (path, key) {
            var regionElement = angular.element(path);
            regionElement.attr("id", division_id);
          });

          var options = {
                title : {
                  text: title,
                  x: 'center',
                  y: 185
              },
                tooltip: {
                  trigger: 'item',
                  formatter: "{a} <br/>{b} - {d}%"
              },
                series : [
                  {
                      name: name,
                      type:'pie',
                      radius : ['50%','70%'],
                      data: data,
                      label: {
                          normal: {
                              show: false,
                              position: 'outside',
                              formatter: "{b}",
                              textStyle: {
                                  color: 'rgba(0, 0, 0, 0.9)',
                                  fontSize: 14
                              }
                          },
                      },
                      labelLine: {
                          normal: {
                              show: true
                          }
                      },
                      itemStyle: {
                          normal: {
                              shadowBlur: 20,
                              shadowColor: 'rgba(0, 0, 0, 0.1)'
                          }
                      },

                      animationType: 'scale',
                      animationEasing: 'elasticOut',
                      animationDelay: function (idx) {
                          return Math.random() * 200;
                      }
                  }
              ],
              color : colors
            };

            setTimeout(function(){
              var myChart = echarts.init(document.getElementById(division_id));
              myChart.setOption(options);
            }, 2000);
      }
    }
}]);