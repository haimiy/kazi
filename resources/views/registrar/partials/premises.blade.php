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
                @foreach($premises as $premise)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($premise->is_specified)
                                {{ $premise->specified_premises_type }}
                            @else
                                {{ $premise->premises_type }}
                            @endif
                        </td>
                        <td>{{ $premise->number_of_room }}</td>
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
