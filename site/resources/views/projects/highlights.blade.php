<h3>Highlights</h3>
<table class="table table-bordered">
    <tr>
        <th>SN</th>
        <th>Highlight</th>
        <th>#</th>
    </tr>
    <tr ng-repeat="item in formData.highlights">
        <td>@{{$index+1}}</td>
        <td class="form-group"><input type="text" ng-model="item.highlight" class="form-control"></td>
        <td>
            <button class="btn btn-danger" type="button" ng-click="removeHighlight($index)"><i class="fa fa-remove"></i></button>
        </td>
    </tr>
</table>

<div style="margin-top: 10px">
    <button class="btn btn-sm yellow" type="button" ng-click="addMoreHighlight()">Add More </button>
</div>