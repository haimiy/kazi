 <div class="tab-pane fade" role="tabpanel" aria-labelledby="staffing" id="step5">
    <div class="card-body">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th rowspan="2">
                    #
                </th>
                <th rowspan="2">
                    Occupation
                </th>
                <th colspan="2" style="text-align: center;">
                    Number of Employed
                </th>
            </tr>
            <tr>
                <th>Full time</th>
                <th>Part time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($staffing as $staff)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($staff->is_specified)
                            {{ $staff->specified_occupation }}
                        @else
                            {{ $staff->occupation }}
                        @endif
                    </td>
                    <td>{{ $staff->no_of_full_time }}</td>
                    <td>{{ $staff->no_of_part_time }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <button type="button"  onclick="changeTab(4)" class="btn btn-primary">Previous</button>
        <button type="button" class="btn btn-primary float-right" onclick="changeTab(6)">Next</button>
    </div>
</div>
