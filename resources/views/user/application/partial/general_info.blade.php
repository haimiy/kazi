<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="facility-info-tab" id="step1">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Type of Health Unit</label>
            <div class="col-sm-8">
                <select class="form-control select2" onchange="other(this);" name="type_of_health_unit_id" style="width: 100%;" required>
                    <option selected="selected" value="">--Select--</option>
                    @foreach ($type_of_health_units as $type_of_health_unit)
                    <option value="{{$type_of_health_unit->id}}">{{$type_of_health_unit->name}}</option>
                    @endforeach
                </select>
                <div class="form-group"  id="other" style="display: none;">
                    <label></label>
                    <input type="text" class="form-control" name="type_of_health_unit_specified" placeholder="Please specify type of health unit" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Authority responsible for establishing/ running the facility</label>
            <div class="col-sm-8">
                <select class="form-control select2" onchange="authority(this);" name="authority_responsible_id" style="width: 100%;">
                    <option selected="selected" value="">--Select--</option>
                    @foreach ($authorities as $authority)
                    <option value="{{$authority->id}}">{{$authority->name}}</option>
                    @endforeach
                </select>
                <div class="form-group"  id="authority" style="display: none;">
                    <label></label>
                    <input type="text" class="form-control" name="authority_responsible_specified" placeholder="Please specify authority responsible" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">What date did you expect to start operation</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="date" class="form-control" name="starting_operation_date" />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Health Facility Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="facility_name" />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Registration number (if facility previously registered) </label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="reg_no" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Owner Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    @if(auth()->user()->owner->ownership_type == 'Solo')
                    <input type="text" name='person_incharge' disabled value="{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}" class="form-control" />
                    @else
                        <input type="text" name='person_incharge' disabled value="{{ Auth::user()->owner->organisation->org_name}}" class="form-control" />
                    @endif
                </div>
            </div>
        </div>
        @if(auth()->user()->owner->ownership_type == 'Company')
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Person In Charge</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" name='person_incharge' disabled value="{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}" class="form-control" />
                    </div>
                </div>
            </div>
        @endif
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Designation</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" name='person_incharge' disabled value="{{ auth()->user()->owner->designation??''}}" class="form-control" />
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Name of Doctor Incharge</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="full_name" required />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Qualification of doctor incharge</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="qualification" required />
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(2)" class="btn btn-primary float-right">Next</button>
    </div>
</div>
