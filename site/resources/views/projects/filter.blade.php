<h3>Filters</h3>
<div class="row">
    <div class="col-md-3 form-group" ng-repeat="filter in filters">
        <label>
            <input type="checkbox" ng-click="addFilter(filter)" ng-checked="checkSelected(filter.id)" > &nbsp;&nbsp;@{{filter.filter_name}}
        </label>
    </div>
</div>