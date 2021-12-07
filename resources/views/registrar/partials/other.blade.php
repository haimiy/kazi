 <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step8">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="">1). Building (Wall intact/have cracks)</label>
                <ul>
                    @foreach($buildingParts as $buildingPart)
                        <li>
                            {{ $buildingPart->building_part }}: <b>{{ $buildingPart->state }}</b>
                        </li>
                    @endforeach
                </ul>
                <br/>
                <label for="">3). Sanitation:</label>
                <ul>
                    <li>Type of toilet : <b>{{ $sanitation->type_of_toilet }}</b></li>
                    <li>Type for Group : <b>{{ $sanitation->toilet_for_group }}</b></li>
                    <li>Type for Gender : <b>{{ $sanitation->toilet_for_gender }}</b></li>
                    <li>State of Toilet : <b>{{ $sanitation->state_of_toilets }}</b></li>
                    <li>Sewerage system : <b>{{ $sanitation->sewage_system }}</b></li>
                </ul>
            </div>
            <div class="col-md-6">
                <label for="">2). Water Supply</label>
                <ul>
                    <li>Source of water : <b>{{ $waterSupply->source_of_water }}</b></li>
                    <li>Is water adequate for all purposes? : <b>{{ $waterSupply->is_water_adequate }}</b></li>
                    <li>Water available for drink? : <b>{{ $waterSupply->is_water_available_for_drink }}</b></li>
                </ul><br/>
                <label for="">4). Waste Disposal</label>
                <ul>
                    <li>Surroundings : <b>{{ $wasteDisposal->surrounding_status }}</b></li>
                    <li>Waste basket/dust bin : <b>{{ $wasteDisposal->waste_bin }}</b></li>
                    <li>Dumping site : <b>{{ $wasteDisposal->dumping_site }}</b></li>
                    <li>Incinerator : <b>{{ $wasteDisposal->incinerator }}</b></li>
                </ul>

            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="button"  onclick="changeTab(7)" class="btn btn-primary">Previous</button>
        <button type="button" onclick="changeTab(9)" class="btn btn-primary float-right">Next</button>
    </div>
</div>
