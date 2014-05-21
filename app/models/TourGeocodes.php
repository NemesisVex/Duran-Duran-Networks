<?php

/**
 * TourGeocodes
 *
 * @author Greg Bueno
 */
class TourGeocodes extends Eloquent {
	
	protected $table = 'ddn_tours_geocodes';
	protected $primaryKey = 'geocode_id';
	
	public function country() {
		return $this->hasOne('TourCountries', 'country_id', 'geocode_country_id');
	}
	
}
