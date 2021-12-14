<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="facility-info-tab" id="step1">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Type of Health Unit</label>
            <div class="col-sm-8">
                <input type="text" disabled value="{{ $application->type_of_health_unit }}" class="form-control">
                <span class="text-danger" id="type_of_health_unit_id_error"></span>
                <div class="form-group"  id="other" style="display: none;">
                    <label></label>
                    <input type="text" class="form-control" name="type_of_health_unit_specified" placeholder="Please specify type of health unit" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Authority responsible for establishing/ running the facility</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$application->authority_responsible}}" disabled>
                <span class="text-danger" id="authority_responsible_id_error"></span>
                <div class="form-group"  id="authority" style="display: none;">
                    <label></label>
                    <input type="text" class="form-control" id="authority_responsible_specified" name="authority_responsible_specified" placeholder="Please specify authority responsible" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">What date did you expect to start operation</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->starting_operation_date }}"  disabled/>
                    <span class="text-danger" id="starting_operation_date_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Health Facility Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->facility_name }}" disabled/>
                    <span class="text-danger" id="facility_name_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Registration number (if facility previously registered) </label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->reg_no }}" disabled />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Owner Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" value="{{ $application->first_name.' '.$application->middle_name.' '.$application->last_name}}" class="form-control" disabled/>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Person In Charge</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" value="{{ $application->first_name.' '.$application->middle_name.' '.$application->last_name}}" id="person_incharge" name='person_incharge' disabled value="" class="form-control" />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Designation</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" id="person_incharge" value="{{ $application->designation }}" name='person_incharge' disabled value="" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Name of Doctor Incharge</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->full_name }}" disabled />
                    <span class="text-danger" id="full_name_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Qualification of doctor incharge</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->qualification }}" disabled />
                    <span class="text-danger" id="qualification_error"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(2)" class="btn btn-primary float-right">Next</button>
    </div>
</div>
