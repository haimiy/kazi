<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-info-tab" id="step9">
    <div class="card-body">
        <form method="post" action="/inspector/store_comments">
            @csrf
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
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Inspection guidelines questions</label>
                <div class="col-sm-8">
                    <div class="form-group">
                            @foreach($inspection_guidelines_questions as $question)
                            <p><br>{{ $question->name}}</p>
                            <input type="text" class="form-control" placeholder="Answer" name="inspector_guidelines_question_answer">
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Recommendation</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="comments" :value="old('comments')"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(8)" class="btn btn-primary">Previous</button>

    </div>
</div>
