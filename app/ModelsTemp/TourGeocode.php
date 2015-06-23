<?php

/**
 * TourGeocodes
 *
 * @author Greg Bueno
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourGeocode extends Model {
	
	protected $table = 'ddn_tours_geocodes';
	protected $primaryKey = 'geocode_id';
	protected $softDelete = true;
	protected $fillable = array(
		'geocode_location',
		'geocode_address',
		'geocode_city',
		'geocode_state',
		'geocode_country_id',
		'geocode_lon',
		'geocode_lat',
	);
	protected $guarded = array(
		'geocode_id',
	);

	public function country() {
		return $this->hasOne('App\Models\TourCountry', 'country_id', 'geocode_country_id');
	}
	
}
