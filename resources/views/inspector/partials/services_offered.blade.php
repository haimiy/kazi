 <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step4">
    <div class="card-body">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 40%;">Services Offered</th>
                    <th style="width: 40%;">Addition Question</th>
                    <th>Addition Answer</th>
                </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $service->name_of_services }}
                    </td>
                    <td>
                        @if($service->have_additional_requirement)
                            {{ $service->additional_requirement }}
                        @endif
                    </td>
                    <td>
                        @if($service->have_additional_requirement)
                            {{ $service->additional_requirement_answer }}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <button type="button"  onclick="changeTab(3)" class="btn btn-primary">Previous</button>
        <button type="button" class="btn btn-primary float-right" onclick="changeTab(5)">Next</button>
    </div>
</div>
