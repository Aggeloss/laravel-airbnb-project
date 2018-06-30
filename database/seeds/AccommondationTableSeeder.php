<?php

use App\Accommondation;
use Illuminate\Database\Seeder;

class AccommondationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Διαμέρισμα στο κέντρο.',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a1/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a1/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a2/p3.png"}
                                    ]}',
          'city'        => 'Athens',
          'description' => 'Πολύ κοντα σε μετρό και σε πολυσύχναστα μέρη της πόλης.
							Προσφέρει Wi-Fi,TV, A/C.',
          'action'      => 'assign',
          'rate'        => 8.5
        ]);
        $accommondation->save();

        $accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Ευρύχωρο διαμέρισμα στην Αθήνα',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a2/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a2/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a2/p3.png"}
                                    ]}',
          'city'        => 'Athens',
          'description' => 'Αρκετά άνετο και με ιδιωτικό παρκινγκ.
							Wi-Fi,TV, A/C και ησυχία.',
          'action'      => 'assign',
          'rate'        => 7
        ]);
        $accommondation->save();

        $accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Ήσυχο διαμέρισμα',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a3/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a3/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a3/p3.png"}
                                    ]}',
          'city'        => 'Athens',
          'description' => 'Σε ήρεμη γειτονιά, κοντά σε συγκοινωνίες!
							Προσφέρει Wi-Fi,TV, A/C',
          'action'      => 'assign',
          'rate'        => 9
        ]);
        $accommondation->save();

        $accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Επιπλωμένο και ανακαινισμένο διαμερισμα.',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a4/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a4/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a4/p3.png"}
                                    ]}',
          'city'        => 'New York',
          'description' => 'Πρόσφατα ανακαινισμένο με μοντερνα επιπλα και πλήρως εξοπλισμένη κουζίνα.
							Προσφέρει Wi-Fi,TV, A/C.',
          'action'      => 'assign',
          'rate'        => 7.5
        ]);
        $accommondation->save();

        $accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Άνετο διαμέρισμα στο Brooklyn.',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a5/Screenshot_1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a5/Screenshot_2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a5/Screenshot_3.png"}
                                    ]}',
          'city'        => 'New York',
          'description' => 'Οικονομικό διαμέρισμα σε μια κεντρική αλλά όχι "τουριστική" περιοχή.
							Το διαμέρισμα προσφέρει Wi-Fi,TV, A/C',
          'action'      => 'assign',
          'rate'        => 8.5
        ]);
        $accommondation->save();

		$accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Μοντέρνα διακοσμημένο διαμέρισμα',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a6/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a6/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a6/p3.png"}
                                    ]}',
          'city'        => 'New York',
          'description' => 'Προσεγμένα διακοσμημένο προφέρει χαλαρωση και άνεση.
							Επίσης έχει Wi-Fi,TV, A/C',
          'action'      => 'assign',
          'rate'        => 8.7
        ]);
        $accommondation->save();

		$accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Ήσυχο διαμέρισμα στο κέντρο του Αμστερνταμ.',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a7/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a7/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a7/p3.png"}
                                    ]}',
          'city'        => 'Netherlands',
          'description' => 'Βρίσκεται κοντά σε εστιατόρια και εμπορικό κεντρο και απέχει 50 μετρα απο στάση λεωφορειου.
							Προσφέρει Wi-Fi,TV, A/C' ,
          'action'      => 'assign',
          'rate'        => 7.7
        ]);
        $accommondation->save();

		$accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Πλήρως ανακαινισμένο δωμάτιο.',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a10/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a10/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a10/p3.png"}
                                    ]}',
          'city'        => 'New York',
          'description' => 'Προσφέρει Wi-Fi,TV, A/C , φοβερά λειτουργική κουζινα και όμορφο μπανιο.   ',
          'action'      => 'assign',
          'rate'        => 8.2
        ]);
        $accommondation->save();

		$accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Εύηλιο δωμάτιο.',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a9/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a9/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a9/p3.png"}
                                    ]}',
          'city'        => 'Netherlands',
          'description' => 'Διαθέτει υπεροχο μπακόνι , προσφέρει Wi-Fi,TV, A/C και βρισκεται κοντα στο κέντρο. ',
          'action'      => 'assign',
          'rate'        => 9
        ]);
        $accommondation->save();

		$accommondation = new Accommondation([
          'user_id'     => '1',
          'title'       => 'Εύηλιο ρετιρέ στο κέντρο',
          'pic'         => '{"data":[
                                      {"id":"1", "path":"http://localhost/airbnb/public/imgs/a8/p1.png"},
                                      {"id":"2", "path":"http://localhost/airbnb/public/imgs/a8/p2.png"},
                                      {"id":"3", "path":"http://localhost/airbnb/public/imgs/a8/p3.png"}
                                    ]}',
          'city'        => 'Athens',
          'description' => 'Γρήγορο Wi-Fi ιδιωτικό υπνοδωμάτιο για τον ανεξάρτητο ταξιδιώτη που επιθυμεί άνεση,
							κοντά στο τουριστικό κέντρο, 20-25 λεπτά με τα πόδια από την Ακρόπολη/Σύνταγμα',
          'action'      => 'assign',
          'rate'        => 9.4
        ]);
        $accommondation->save();
    }
}
