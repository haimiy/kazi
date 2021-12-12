<?php


namespace App\Helper;


class DatabaseQueryBuilder
{
    static public function getLicencePersonInChargeContactAndHealthFacilityNameQuery($licenseId): string
    {
        return "select l.*,u.phone_no,hf.facility_name from license l left join health_facility hf on hf.id = l.health_facility_id left join owner_health_facility ohf on hf.id = ohf.health_facility_id left join owner o on l.owner_id = o.id left join users u on o.person_incharge = u.id where l.id=$licenseId";
    }
}
