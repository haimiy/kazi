<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-near-tab" id="step3">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->nearest_hospital_name }}"  disabled />
                    <span class="text-danger" id="nearest_hospital_name_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Owner</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->nearest_hospital_owner }}" disabled/>
                    <span class="text-danger" id="nearest_hospital_owner_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Distance</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->nearest_hospital_distance }}" disabled />
                    <span class="text-danger" id="nearest_hospital_distance_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Type of Health Unit</label>
            <div class="col-sm-8">
            <select class="form-control" style="width: 100%;" disabled>
                    <option value="">{{ $application->nearest_hospital_type_of_health_unit }}</option>
            </select>
                <span class="text-danger" id="nearest_hospital_type_of_health_unit_error"></span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(2)"  class="btn btn-primary">Previous</button>
        <button type="button"   onclick="changeTab(4)"  class="btn btn-primary float-right">Next</button>
    </div>
</div>
