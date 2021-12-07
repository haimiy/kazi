<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-info-tab" id="step10">
    <div class="card-body">
        <form id="review-form" method="post" action="/registrar/store_decisions">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Health Facility Name</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input class="form-control" value="{{ $application->facility_name }}" style="width: 100%;" disabled>
                        <input class="form-control" value="{{ $application->facility_id }}" name="health_facility_id" style="width: 100%;display: none;">
                        <input class="form-control" value="{{ $application->id }}" name="registration_id" style="width: 100%;display: none;">
                        <input class="form-control" value="{{ $application->prefix }}" name="prefix" style="width: 100%;display: none;">
                        <input class="form-control" value="{{ $application->owner_id }}" name="owner_id" style="width: 100%;display: none;">
                        <span class="text-danger" id="health_facility_id_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Starting Date</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="date" class="form-control" value="{{ $application->starting_operation_date }}" name="starting_date">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">End Date</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="date" class="form-control" value="{{ Carbon\Carbon::parse($application->starting_operation_date)->addYears()->format('Y-m-d') }}" name="ending_date">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Comments</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="review_status" :value="old('review_status')" required></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" id="review" name="review">
            <button type="submit"  class="btn btn-danger"  onclick="setAction('Rejected')">Reject</button>
            <button type="submit"  class="btn btn-primary float-right" onclick="setAction('Accepted')">Accept</button>
        </form>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(8)" class="btn btn-primary">Previous</button>
    </div>
</div>
