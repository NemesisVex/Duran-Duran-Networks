<?php

/**
 * TourCountries
 *
 * @author Greg Bueno
 */

namespace DuranDuranNetworks\App\Models;


use Illuminate\Database\Eloquent\Model;

class TourCountry extends Model {

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
		return $this->hasMany('DuranDuranNetworks\App\Models\TourGeocode', 'geocode_country_id', 'country_id');
	}
}
