<?php

/**
 * Tour
 *
 * @author Greg Bueno
 */
class Tour extends Eloquent {
	
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
		return $this->hasMany('TourDate', 'date_tour_id', 'tour_id');
	}
	
	public function geocodes()
	{
		return $this->hasManyThrough('TourGeocode', 'TourDate', 'date_tour_id', 'geocode_id');
	}

}
