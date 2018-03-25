<?php

/**
 * Tour
 *
 * @author Greg Bueno
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model {
	
	protected $table = 'ddn_tours';
	protected $primaryKey = 'tour_id';
	protected $softDelete = true;
	protected $fillable = array(
		'tour_name',
	);
	protected $guarded = array(
		'tour_id',
	);
	
	public function dates()
	{
		return $this->hasMany('App\Models\TourDate', 'date_tour_id', 'tour_id');
	}
	
	public function geocodes()
	{
		return $this->hasManyThrough('App\Models\TourGeocode', 'TourDate', 'date_tour_id', 'geocode_id');
	}

}
