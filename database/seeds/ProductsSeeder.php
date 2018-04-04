<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' =>  1,
            'titel' => 'Asplenium trichomanes',
            'beschrijving' => 'De Steenbreekvaren is een klein wintergroen varentje. Dit maakt de Asplenium trichomanes geschikt als rotsplant. De fijne bladstructuur is een opvallend kenmerk van deze tuinplant. In Nederland komt Steenbreekvaren ook van nature voor. Meestal groeit Asplenium trichomanes dan op oude muurtjes of andere, vaak vochtige plekjes. Dat deze plant de Nederlandse naam Steenbreekvaren gekregen heeft, begrijpt nog steeds niemand. Als deze varensoort iets niet kan met zijn iele worteltjes, dan is het wel gesteentes breken... Deze tuinplant staat bij voorkeur op een (half)beschaduwde plek in de tuin. Omdat Asplenium trichomanes groenblijvend is, kan hij donkere hoekjes in de winter mooi ophalen.',
            'prijs' => '2.05',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/1.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  1,
            'titel' => 'Bergenia Silberlicht',
            'beschrijving' => "De bloemen van de Bergenia 'Silberlicht'  zijn wit van kleur. Naarmate ze uit gebloeid raken wordt de kleur licht roze. De schoenlappersplant blijft in de winter zijn groene bladeren behouden. De Bergenia planten in goed doorlatende humus rijke grond.
            Bergenia 'Silberlicht' is een groenblijvende tuinplant. Deze Schoenlappersplant bloeit van april t/m mei met witte bloemen, wordt uiteindelijk ongeveer 35 cm hoog en kan zowel in de zon als in de schaduw staan.",
            'prijs' => '2.75',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/2.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  2,
            'titel' => 'Lavandula Angustifolia Alba',
            'beschrijving' => "Variant van de alom bekende Lavendel, maar dan met witte bloemen. Lavandula angustifolia 'Alba' bloeit, net als de soort, in de vroege zomer. Na de bloei kunnen de bloemstengels van de Lavandula angustifolia 'Alba' teruggesnoeid worden. Laat het heestertje voor de rest in tact. Pas na de winter, in maart, snoeit u de tuinplant terug tot op zo'n 15 cm boven de grond. Het is belangrijk om dit bij Lavendel planten elk voorjaar te doen. Gebeurt dit niet, dan verhouten de twijgen, verwildert de tuinplant en wordt hij van onder kaal en lelijk. De witte variant is iets minder sterk dan de blauw/ paars bloemige soort; zet hem daarom zeker op een plekje in de volle zon. Dan is de kans het grootst dat de Lavendel volop bloemen krijgt. Bijen en vlinders zijn erg blij met de Lavandula angustifolia 'Alba' in uw tuin.",
            'prijs' => '1.35',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/3.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  2,
            'titel' => "Lavandula angustifolia 'Munstead'",
            'beschrijving' => "De Lavandula angustifolia 'Munstead' is de sterkste variant van de lavendels. Het is een aanrader met zijn sterke geur en mooie blauwe bloemen. Lavendel heeft opvallende, grijsgroene, aromatische bladeren en is goed winterhard. De Lavandula angustifolia 'Munstead' kan prima dienst doen als bodembedekker of als randbepanting en natuurlijk ook als solitair of zelfs in een pot. Bij voorkeur in de zon op een droge standplaats aanplanten. Knip enkele stengels af en zet ze binnen in een potje: u krijgt meteen een lekker vakantiegevoel. Na de winter terugknippen tot op 10 cm boven de grond. Zo blijft deze tuinplant jong en fris en gaat hij niet 'verhouten'. Geef de Lavendel elk jaar een kalkbemesting.
            Lavandula angustifolia 'Munstead' is een half groenblijvende tuinplant. Deze Lavendel bloeit van juni t/m juli met violetblauwe bloemen, wordt uiteindelijk ongeveer 50 cm hoog en staat bij voorkeur in de zon.",
            'prijs' => '1.15',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/4.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  1,
            'titel' => 'Brunnera Macrophylla',
            'beschrijving' => "De Brunnera macrophylla is een mooie voorjaarsbloeier met vergeet-mij-nietjes achtige bloeiwijze (kleine blauwe bloemetjes). Deze plant maakt grote decoratieve bladeren. Buiten de bloei dus eigenlijk het hele groeiseizoen aantrekkelijk. De cultivar 'Jack Frost' heeft nog opvallender blad met een mooie zilverachtige waas. Groeit het liefst in de halfschaduw of schaduw en is daardoor uitermate geschikt als bodembedekker, ook onder bladverliezende struiken of rond vijvers. Deze tuinplant komt oorspronkelijk uit koude steppegbieden en weerstaat daardoor schrale en droge wind. Goed te combineren met Doronicum, Primula of Vinca.
            Brunnera macrophylla is een bladverliezende tuinplant. Deze Kaukasische vergeet-mij-niet bloeit van april t/m juni met blauwe bloemen, wordt uiteindelijk ongeveer 60 cm hoog en staat bij voorkeur in de schaduw.",
            'prijs' => '1.80',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/5.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  3,
            'titel' => 'Dryopteris erythrosora',
            'beschrijving' => 'De meeste sierwaarde geeft de Dryopteris erythrosora in het voorjaar als het nieuwe blad uitloopt in een bronze/rode kleur. Dit blad verkleurt in de loop van het seizoen terug naar groen. Rode sluiervaren is wintergroen, maar kan aan het eind van de winter een aantal lelijk geworden bladeren geven. Knip deze lelijke bladeren gerust weg. Doe dit bij voorkeur wel na de winter. De oude bladeren hebben een isolerend effect tijdens strenge vorst. Vooral jonge Dryopteris erythrosora kan enigszins vorstgevoelig zijn. Zet rode sluiervaren bij voorkeur op een plek in de schaduw of halfschaduw. Staand in kleine groepen als onderbeplanting onder bijvoorbeeld bomen of grote heesters, komt deze tuinplant goed tot zijn recht. Ook voor het brengen van hoogte in grotere schaduwvakken met bodembedekkers is de Dryopteris erythrosora geschikt.',
            'prijs' => '2.05',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/6.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  1,
            'titel' => 'Darmera Peltata',
            'beschrijving' => 'Deze vaste plant vormt zeer grote ronde bladeren met een ingesneden bladrand. De doorsnede van één blad kan wel tot 60 cm groot worden. Het blad is zo groot als een schild (uit de riddertijd), vandaar ook de Nederlandse naam Schildblad. Ook de Latijnse naam verwijst hier trouwens naar; peltata betekent schildvormig. Gelukkig waren de ridders vroeger slim genoeg om in te zien dat enkel de grootte van het blad op een schild leek, de bescherming van de strijders zou met behulp van dit blad te wensen over gelaten hebben. In de tuin staat Darmera peltata bij voorkeur op een vochtige beschaduwde plek. Aan de rand van een grote vijver zou het echt een aanwinst zijn om deze tuinplant aan te planten. Nog voordat het blad aan het Schildblad verschijnt, komen de bloemstengels al uit de grond. Aan het eind van de stengel komen mooie ronde roze bloemen te staan. De Darmera peltata is niet wintergroen. U kunt de lelijk geworden bladeren in de wintermaanden wegnemen.',
            'prijs' => '2.50',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/7.jpg',
        ]);
        DB::table('products')->insert([
            'category_id' =>  3,
            'titel' => 'Osmunda regalis',
            'beschrijving' => 'De Koningsvaren doet zijn naam in ons land eer aan. Osmunda regalis is de grootste varensoort die van nature in ons land voorkomt. De uiteindelijke hoogte van Osmunda regalis is 150 cm, soms zelfs wel tot 2 meter hoog. De sporen van deze tuinplant zitten niet (zoals gewoonlijk bij varens) aan de onderzijde van de bladeren, maar staan in pluimen die boven de bladeren uitsteken. Osmunda regalis is een bladverliezende soort. In de herfst krijgt het blad van deze tuinplant een mooie verkleuring. Vanwege zijn grootte, moet u goed nadenken of er ruimte isvoor deze prachtige Koningsvaren. Als hij maar vochtig staat, kan Osmunda regalis zelfs in de volle zon uit de voeten. Als u goed naar het volwassen blad van de Koningsvaren kijkt, dan ziet u dat het blad dubbel geveerd is; de zijblaadjes zijn afzonderlijke geveerde bladeren. ',
            'prijs' => '2.05',
            'imageurl' => 'https://s3.eu-west-2.amazonaws.com/webs2shop/products/8.jpg',
        ]);
    }
}
