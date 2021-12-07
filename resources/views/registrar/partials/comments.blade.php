<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-info-tab" id="step9">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Health Facility Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input class="form-control" value="{{ $application->facility_name }}" style="width: 100%;" disabled>
                    <input class="form-control" value="{{ $application->facility_id }}" name="health_facility_id" style="width: 100%;display: none;">
                    <input class="form-control" value="{{ $application->id }}" name="registration_id" style="width: 100%;display: none;">
                    <span class="text-danger" id="health_facility_id_error"></span>
                </div>
            </div>
        </div>
        @foreach($comments as $comment)
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Comments</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <p type="text" >{{ $comment->comments }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(8)" class="btn btn-primary">Previous</button>
        <button type="button" onclick="changeTab(10)" class="btn btn-primary float-right">Next</button>
    </div>
</div>
