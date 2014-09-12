<?php namespace Rtoya\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Rtoya\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Rtoya\Http\Filters\AuthFilter',
		'auth.basic' => 'Rtoya\Http\Filters\BasicAuthFilter',
		'csrf' => 'Rtoya\Http\Filters\CsrfFilter',
		'guest' => 'Rtoya\Http\Filters\GuestFilter',
	];

}