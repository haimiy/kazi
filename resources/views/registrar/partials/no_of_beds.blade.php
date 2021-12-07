<div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step7">
    <div class="card-body">
        <table class="table table-bordered table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Type of ward</th>
                <th>Number of Beds</th>
            </tr>
            </thead>
            <tbody>
            @foreach($noOfBeds as $noOfBed)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($noOfBed->is_specified)
                            {{ $noOfBed->specified_ward_type }}
                        @else
                            {{ $noOfBed->type_of_ward }}
                        @endif
                    </td>
                    <td>{{ $noOfBed->no_of_beds }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

    <div class="card-footer">
        <button type="button"  onclick="changeTab(6)" class="btn btn-primary">Previous</button>
        <button type="button" class="btn btn-primary float-right" onclick="changeTab(8)">Next</button>
    </div>
</div>
