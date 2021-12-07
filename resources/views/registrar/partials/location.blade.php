<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-location-tab" id="step2">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Street</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->street }}" disabled />
                    <span class="text-danger" id="street_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Address</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->address }}" disabled />
                    <span class="text-danger" id="address_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Village</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->village }}" disabled />
                    <span class="text-danger" id="village_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Ward</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->ward }}" disabled/>
                    <span class="text-danger" id="ward_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">PO BOX</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->po_box }}" disabled />
                    <span class="text-danger" id="po_box_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">District Name</label>
            <div class="col-sm-8">
                <select class="form-control" disabled  style="width: 100%;">
                <option value="">{{ $application->district }}</option>

            </select>
                <span class="text-danger" id="district_id_error"></span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Region</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->region }}" disabled />
                    <span class="text-danger" id="region_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Latitude</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->latitude }}" disabled />
                    <span class="text-danger" id="latitude_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Longitude</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $application->longitude }}" disabled />
                    <span class="text-danger" id="longitude_error"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"   onclick="changeTab(1)"  class="btn btn-primary">Previous</button>
        <button type="button"  onclick="changeTab(3)"  class="btn btn-primary float-right">Next</button>
    </div>
</div>
