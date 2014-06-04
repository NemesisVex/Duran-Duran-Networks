<?php

/**
 * TourCountries
 *
 * @author Greg Bueno
 */
class TourCountry extends Eloquent {

	protected $table = 'vm_countries';
	protected $primaryKey = 'country_id';
	protected $softDelete = true;
	protected $fillable = array(
		'country_name',
	);
	protected $guarded = array(
		'country_id',
	);

	public function geocodes() {
		return $this->hasMany('TourGeocode', 'geocode_country_id', 'country_id');
	}
}
