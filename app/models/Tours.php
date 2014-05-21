<?php

/**
 * Tours
 *
 * @author Greg Bueno
 */
class Tours extends Eloquent {
	
	protected $table = 'ddn_tours';
	protected $primaryKey = 'tour_id';
	
	public function dates()
	{
		return $this->hasMany('TourDates', 'date_tour_id', 'tour_id');
	}
	
	public function geocodes()
	{
		return $this->hasManyThrough('TourGeocodes', 'TourDates', 'date_tour_id', 'geocode_id');
	}

}
