<thead>
<tr>
    <th>
        Model
    </th>
    <th>
        Brand
    </th>
    <th>
        Category
    </th>
    <th>
        description
    </th>

</tr>
</thead>
<tbody>
<tr>
    <td>{{$model->model}}</td>
    <td>{{$model->brand}}</td>
    <td>{{$model->category}}</td>
    <td>{{$model->description}}</td>

</tr>
</tbody>
<thead>
<tr>
    <th>
        Size
    </th>
    <th>
        Price
    </th>
    <th>
        Status
    </th>
</tr>
</thead>
<tbody>
<tr>
    <td>{{$model->size}}</td>
    <td>{{$model->lv1}}</td>
    <td>
        @if($model->status)
            <label class="label label-success">In Use</label>
        @else
            <label class="label label-danger">Discontinued</label>
        @endif
    </td>
</tr>
</tbody>