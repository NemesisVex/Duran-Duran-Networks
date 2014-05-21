<?php

/**
 * TourDates
 *
 * @author Greg Bueno
 */

class TourDates extends Eloquent  {
	
	protected $table = 'ddn_tours_dates';
	protected $primaryKey = 'date_id';
	
	public function geocode()
	{
		return $this->hasOne('TourGeocodes', 'geocode_id', 'date_geocode_id');
	}

}
