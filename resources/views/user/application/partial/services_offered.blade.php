 <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step4">
    <div class="card-body">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 40%;">Type of Services</th>
                    <th style="width: 40%;">Yes</th>
                    <th>No</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$service->name_of_services}}</td>
                    <td>
                        <input type="hidden" id="service-ids{{ $service->id}}" name="type_of_services_id[]" value="{{ $service->id}}">
                        <input type="hidden" id="service-offered-have-add-requirement-{{ $service->id }}" value="{{ $service->have_additional_requirement}}" name="have_additional_requirement_question_{{ $service->id }}">
                        <input type="hidden" name="is_specified_type_of_services_{{ $service->id }}" value="{{ $service->is_specified }}">
                        @if($service->is_specified)
                            <input type="radio" value="YES" id="service-offered-yes-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showSpecify({{$service->id}})">
                            <div id="service-specify-div-{{ $service->id }}" style="display: none;">
                                <label for="service-specify-{{ $service->id }}">Specify service (separate by comma service if are many)</label>
                                <input type="text" id="service-specify-{{ $service->id }}" name="specified_services_{{ $service->id }}" class="form-control form-control-sm">

                            </div>
                        @else
                            @if ($service->have_additional_requirement)
                                <input type="radio" value="YES" id="service-offered-yes-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showAdditionalRequirement({{$service->id}})">

                                <div id="service-offered-add-requirement-div-{{ $service->id }}" style="display: none">
                                    <label for="service-offered-add-requirement-{{ $service->id }}"> {{$service->additional_requirement}}</label>
                                    <input class="form-control input-sm form-control-sm" type="text" id="service-offered-add-requirement-answer-{{ $service->id }}" placeholder="Enter {{$service->additional_requirement}} here..." name="additional_requirement_answer_{{ $service->id }}">
                                    <input class="form-control input-sm form-control-sm" type="hidden" id="service-offered-add-requirement-question-{{ $service->id }}" value="{{$service->additional_requirement}}" name="additional_requirement_question_{{ $service->id }}">
                                </div>
                            @else
                                <input type="radio" value="YES" id="service-offered-yes-{{ $service->id }}" name="service-offered-{{ $service->id }}">
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(str_contains(strtolower($service->name_of_services),'specify'))
                            <input type="radio" value="NO" id="service-offered-no-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showSpecify({{$service->id}})" checked>
                        @else
                            @if ($service->have_additional_requirement)
                                <input type="radio" value="NO" id="service-offered-no-{{ $service->id }}" name="service-offered-{{ $service->id }}" onclick="showAdditionalRequirement({{$service->id}})" checked>
                            @else
                                <input type="radio" value="NO" id="service-offered-no-{{ $service->id }}" name="service-offered-{{ $service->id }}" checked>
                            @endif
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
