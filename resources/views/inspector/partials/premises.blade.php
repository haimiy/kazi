<div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step6">
    <div class="card-body">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Types of premises</th>
                <th>Number of rooms</th>
            </tr>
            </thead>
            <tbody>
            @foreach($premiseTypes as $premiseType)
                <tr>
                    <input type="hidden" name="premise_type_id[]" value="{{$premiseType->id}}"/>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$premiseType->name}}</td>
                    <td>
                        <input type="number" id="premise-number-of-room-{{ $premiseType->id }}" value="0" class="form-control form-control-sm" name="rooms_no_{{ $premiseType->id }}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <button type="button"  onclick="changeTab(5)" class="btn btn-primary">Previous</button>
        <button type="button" class="btn btn-primary float-right" onclick="changeTab(7)">Next</button>
    </div>
</div>
