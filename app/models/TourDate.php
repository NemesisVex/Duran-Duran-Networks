<?php

/**
 * TourDates
 *
 * @author Greg Bueno
 */

class TourDate extends Eloquent  {
	
	protected $table = 'ddn_tours_dates';
	protected $primaryKey = 'date_id';
	protected $softDelete = true;
	protected $fillable = array(
		'date_tour_id',
		'date_geocode_id',
		'date_tour_date',
	);
	protected $guarded = array(
		'date_id',
	);
	
	public function tour()
	{
		return $this->belongsTo('Tour', 'date_tour_id', 'tour_id');
	}
	
	public function geocode()
	{
		return $this->hasOne('TourGeocode', 'geocode_id', 'date_geocode_id');
	}

}
