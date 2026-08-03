<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//@iwp
class ICP_Countdown {
	//@type=int @primary
	//@ui-type=number
	var $id;
	//@type=text
	//@ui-type=text @ui-align=left
	var $name;

	//@type=int
	//@ui-type=toggle
	var $active;

	//@type=text
	//@ui-type=dropdown
	var $color;
	//@type=int
	//@ui-type=toggle
	var $evergreen;

	//@type=text
	//@ui-type=text @ui-visible=type:DATE
	var $labelsDays;
	//@type=text
	//@ui-type=text @ui-visible=type:DATE
	var $labelsHours;
	//@type=text
	//@ui-type=text @ui-visible=type:DATE
	var $labelsMinutes;
	//@type=text
	//@ui-type=text @ui-visible=type:DATE
	var $labelsSeconds;
	//@type=text
	//@ui-type=text @ui-visible=type:SLOTS
	var $labelsSlots;

	//@type=int
	//@ui-type=number @ui-min=0
	var $digitsFontSize;
	//@type=int
	//@ui-type=number @ui-min=0
	var $labelsFontSize;

	//@type=varchar @len=20
	//@ui-type=dropdown
	var $type;
	//@type=varchar @len=20
	//@ui-type=dropdown @ui-visible=evergreen:1
	var $detect;
	//@type=datetime
	//@ui-type=datetime @ui-visible=evergreen:0
	var $expirationDate;

	//@type=text
	//@ui-type=timer @ui-visible=type:DATE&evergreen:1 @ui-min=1
	var $expireDateIn;

	//@type=text
	//@ui-type=text
	var $redirectUri;

	// Slot-mode fields initialized by ICP_Manager::get(). Declared (without DAO/UI
	// annotations) so PHP 8.2+ does not raise a dynamic-property deprecation; they
	// remain unused by the free editor UI, matching prior behavior.
	var $expireSlotsIn;
	var $availableSlots;
	var $automaticResetDays;

	public function __construct() {

	}
}
