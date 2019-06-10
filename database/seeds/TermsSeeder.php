<?php

use Illuminate\Database\Seeder;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Term::create([
            'description' => '<ul>
	<li>StraightLine reserves the right to modify or cancel coupons at any time.</li>
	<li>Loyalty rewards can only be redeemed once.</li>
	<li>Loyalty rewards are non-refundable.</li>
	<li>Loyalty rewards are non-transferable: Every Loyalty card is associated with a sole person and can be redeemed only using his account name.</li>
	<li>Loyalty rewards are non-cumulative: Opening of Year 1st of January, End of Year 31 December.</li>
	<li>Loyalty rewards are retroactive for 2019: Every Loyalty card issued during 2019, Bookings dated since January 2019 will be added into the balane.</li>
</ul>'
            

        ]);
    }
}
