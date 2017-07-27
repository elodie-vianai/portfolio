<?php

# Fixture dont les données sont validées et statiques.

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Department;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDepartment extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $dep1 = new Department();
        $dep1->setCode('01');
        $dep1->setDepartment('Ain');
        $manager->persist($dep1);

        $dep2 = new Department();
        $dep2->setCode('02');
        $dep2->setDepartment('Aisne');
        $manager->persist($dep2);

        $dep3 = new Department();
        $dep3->setCode('03');
        $dep3->setDepartment('Allier');
        $manager->persist($dep3);

        $dep4 = new Department();
        $dep4->setCode('04');
        $dep4->setDepartment('Alpes de Hautes-Provence');
        $manager->persist($dep4);

        $dep5 = new Department();
        $dep5->setCode('05');
        $dep5->setDepartment('Hautes-Alpes');
        $manager->persist($dep5);

        $dep6 = new Department();
        $dep6->setCode('06');
        $dep6->setDepartment('Alpes-Maritimes');
        $manager->persist($dep6);
        $this->addReference('dep06', $dep6);

        $dep7 = new Department();
        $dep7->setCode('07');
        $dep7->setDepartment('Ardèche');
        $manager->persist($dep7);

        $dep8 = new Department();
        $dep8->setCode('08');
        $dep8->setDepartment('Ardennes');
        $manager->persist($dep8);

        $dep9 = new Department();
        $dep9->setCode('09');
        $dep9->setDepartment('Ariège');
        $manager->persist($dep9);

        $dep10 = new Department();
        $dep10->setCode('10');
        $dep10->setDepartment('Aube');
        $manager->persist($dep10);

        $dep11 = new Department();
        $dep11->setCode('11');
        $dep11->setDepartment('Aude');
        $manager->persist($dep11);

        $dep12 = new Department();
        $dep12->setCode('12');
        $dep12->setDepartment('Aveyron');
        $manager->persist($dep12);

        $dep13 = new Department();
        $dep13->setCode('13');
        $dep13->setDepartment('Bouches-du-Rhônes');
        $manager->persist($dep13);

        $dep14 = new Department();
        $dep14->setCode('14');
        $dep14->setDepartment('Calvados');
        $manager->persist($dep14);

        $dep15 = new Department();
        $dep15->setCode('15');
        $dep15->setDepartment('Cantal');
        $manager->persist($dep15);

        $dep16 = new Department();
        $dep16->setCode('16');
        $dep16->setDepartment('Charente');
        $manager->persist($dep16);

        $dep17 = new Department();
        $dep17->setCode('17');
        $dep17->setDepartment('Charente-Maritime');
        $manager->persist($dep17);

        $dep18 = new Department();
        $dep18->setCode('18');
        $dep18->setDepartment('Cher');
        $manager->persist($dep18);

        $dep19 = new Department();
        $dep19->setCode('19');
        $dep19->setDepartment('Corrèze');
        $manager->persist($dep19);

        $dep20 = new Department();
        $dep20->setCode('2A');
        $dep20->setDepartment('Corse-du-Sud');
        $manager->persist($dep20);

        $dep21 = new Department();
        $dep21->setCode('2B');
        $dep21->setDepartment('Haute-Corse');
        $manager->persist($dep21);

        $dep22 = new Department();
        $dep22->setCode('21');
        $dep22->setDepartment('Côte-d\'Or');
        $manager->persist($dep22);

        $dep23 = new Department();
        $dep23->setCode('22');
        $dep23->setDepartment('Côtes d\'Armor');
        $manager->persist($dep23);

        $dep24 = new Department();
        $dep24->setCode('23');
        $dep24->setDepartment('Creuse');
        $manager->persist($dep24);

        $dep25 = new Department();
        $dep25->setCode('24');
        $dep25->setDepartment('Dordogne');
        $manager->persist($dep25);

        $dep26 = new Department();
        $dep26->setCode('25');
        $dep26->setDepartment('Doubs');
        $manager->persist($dep26);

        $dep27 = new Department();
        $dep27->setCode('26');
        $dep27->setDepartment('Drôme');
        $manager->persist($dep27);

        $dep28 = new Department();
        $dep28->setCode('27');
        $dep28->setDepartment('Eure');
        $manager->persist($dep28);

        $dep29 = new Department();
        $dep29->setCode('28');
        $dep29->setDepartment('Eure-Et-Loire');
        $manager->persist($dep29);

        $dep30 = new Department();
        $dep30->setCode('29');
        $dep30->setDepartment('Finistère');
        $manager->persist($dep30);

        $dep31 = new Department();
        $dep31->setCode('30');
        $dep31->setDepartment('Gard');
        $manager->persist($dep31);

        $dep32 = new Department();
        $dep32->setCode('31');
        $dep32->setDepartment('Haute-Garonne');
        $manager->persist($dep32);
        $this->addReference('dep31', $dep32);

        $dep33 = new Department();
        $dep33->setCode('32');
        $dep33->setDepartment('Gers');
        $manager->persist($dep33);

        $dep34 = new Department();
        $dep34->setCode('33');
        $dep34->setDepartment('Gironde');
        $manager->persist($dep34);

        $dep35 = new Department();
        $dep35->setCode('34');
        $dep35->setDepartment('Hérault');
        $manager->persist($dep35);

        $dep36 = new Department();
        $dep36->setCode('35');
        $dep36->setDepartment('Ille-et-Vilaine');
        $manager->persist($dep36);

        $dep37 = new Department();
        $dep37->setCode('36');
        $dep37->setDepartment('Indre');
        $manager->persist($dep37);

        $dep38 = new Department();
        $dep38->setCode('37');
        $dep38->setDepartment('Indre-et-Loire');
        $manager->persist($dep38);

        $dep39 = new Department();
        $dep39->setCode('38');
        $dep39->setDepartment('Isère');
        $manager->persist($dep39);

        $dep40 = new Department();
        $dep40->setCode('39');
        $dep40->setDepartment('Jura');
        $manager->persist($dep40);

        $dep41 = new Department();
        $dep41->setCode('40');
        $dep41->setDepartment('Landes');
        $manager->persist($dep41);

        $dep42 = new Department();
        $dep42->setCode('41');
        $dep42->setDepartment('Loir-et-Cher');
        $manager->persist($dep42);

        $dep43 = new Department();
        $dep43->setCode('42');
        $dep43->setDepartment('Loir');
        $manager->persist($dep43);

        $dep44 = new Department();
        $dep44->setCode('43');
        $dep44->setDepartment('Haute-Loire');
        $manager->persist($dep44);

        $dep45 = new Department();
        $dep45->setCode('44');
        $dep45->setDepartment('Loire-Atlantique');
        $manager->persist($dep45);

        $dep46 = new Department();
        $dep46->setCode('45');
        $dep46->setDepartment('Loiret');
        $manager->persist($dep46);

        $dep47 = new Department();
        $dep47->setCode('46');
        $dep47->setDepartment('Lot');
        $manager->persist($dep47);

        $dep48 = new Department();
        $dep48->setCode('47');
        $dep48->setDepartment('Lot-et-Garonne');
        $manager->persist($dep48);

        $dep49 = new Department();
        $dep49->setCode('48');
        $dep49->setDepartment('Lozère');
        $manager->persist($dep49);

        $dep50 = new Department();
        $dep50->setCode('49');
        $dep50->setDepartment('Maine-et-Loire');
        $manager->persist($dep50);

        $dep51 = new Department();
        $dep51->setCode('50');
        $dep51->setDepartment('Manche');
        $manager->persist($dep51);

        $dep52 = new Department();
        $dep52->setCode('51');
        $dep52->setDepartment('Marne');
        $manager->persist($dep52);

        $dep53 = new Department();
        $dep53->setCode('52');
        $dep53->setDepartment('Haute-Marne');
        $manager->persist($dep53);

        $dep54 = new Department();
        $dep54->setCode('53');
        $dep54->setDepartment('Mayenne');
        $manager->persist($dep54);

        $dep55 = new Department();
        $dep55->setCode('54');
        $dep55->setDepartment('Meurthe-et-Moselle');
        $manager->persist($dep55);

        $dep56 = new Department();
        $dep56->setCode('55');
        $dep56->setDepartment('Meuse');
        $manager->persist($dep56);

        $dep57 = new Department();
        $dep57->setCode('56');
        $dep57->setDepartment('Morbihan');
        $manager->persist($dep57);

        $dep58 = new Department();
        $dep58->setCode('57');
        $dep58->setDepartment('Moselle');
        $manager->persist($dep58);

        $dep59 = new Department();
        $dep59->setCode('58');
        $dep59->setDepartment('Nièvre');
        $manager->persist($dep59);

        $dep60 = new Department();
        $dep60->setCode('59');
        $dep60->setDepartment('Nord');
        $manager->persist($dep60);

        $dep61 = new Department();
        $dep61->setCode('60');
        $dep61->setDepartment('Oise');
        $manager->persist($dep61);

        $dep62 = new Department();
        $dep62->setCode('61');
        $dep62->setDepartment('Orne');
        $manager->persist($dep62);

        $dep63 = new Department();
        $dep63->setCode('62');
        $dep63->setDepartment('Pas-de-Calais');
        $manager->persist($dep63);

        $dep64 = new Department();
        $dep64->setCode('63');
        $dep64->setDepartment('Puy-de-Dôme');
        $manager->persist($dep64);

        $dep65 = new Department();
        $dep65->setCode('64');
        $dep65->setDepartment('Pyrénées-Atlantiques');
        $manager->persist($dep65);

        $dep66 = new Department();
        $dep66->setCode('65');
        $dep66->setDepartment('Hautes-Pyrénées');
        $manager->persist($dep66);

        $dep67 = new Department();
        $dep67->setCode('66');
        $dep67->setDepartment('Pyrénées-Orientales');
        $manager->persist($dep67);

        $dep68 = new Department();
        $dep68->setCode('67');
        $dep68->setDepartment('Bas-Rhin');
        $manager->persist($dep68);

        $dep69 = new Department();
        $dep69->setCode('68');
        $dep69->setDepartment('Haut-Rhin');
        $manager->persist($dep69);

        $dep70 = new Department();
        $dep70->setCode('69');
        $dep70->setDepartment('Rhône');
        $manager->persist($dep70);

        $dep71 = new Department();
        $dep71->setCode('70');
        $dep71->setDepartment('Haute-Saône');
        $manager->persist($dep71);

        $dep72 = new Department();
        $dep72->setCode('71');
        $dep72->setDepartment('Saône-et-Loire');
        $manager->persist($dep72);

        $dep73 = new Department();
        $dep73->setCode('72');
        $dep73->setDepartment('Sarthe');
        $manager->persist($dep73);

        $dep74 = new Department();
        $dep74->setCode('73');
        $dep74->setDepartment('Savoie');
        $manager->persist($dep74);

        $dep75 = new Department();
        $dep75->setCode('74');
        $dep75->setDepartment('Haute-Savoie');
        $manager->persist($dep75);

        $dep76 = new Department();
        $dep76->setCode('75');
        $dep76->setDepartment('Paris');
        $manager->persist($dep76);

        $dep77 = new Department();
        $dep77->setCode('76');
        $dep77->setDepartment('Seine-Maritime');
        $manager->persist($dep77);

        $dep78 = new Department();
        $dep78->setCode('77');
        $dep78->setDepartment('Seine-et-Marne');
        $manager->persist($dep78);

        $dep79 = new Department();
        $dep79->setCode('78');
        $dep79->setDepartment('Yvelines');
        $manager->persist($dep79);

        $dep80 = new Department();
        $dep80->setCode('79');
        $dep80->setDepartment('Deux-Sèvres');
        $manager->persist($dep80);

        $dep81 = new Department();
        $dep81->setCode('80');
        $dep81->setDepartment('Somme');
        $manager->persist($dep81);

        $dep82 = new Department();
        $dep82->setCode('81');
        $dep82->setDepartment('Tarn');
        $manager->persist($dep82);

        $dep83 = new Department();
        $dep83->setCode('82');
        $dep83->setDepartment('Tarn-et-Garonne');
        $manager->persist($dep83);

        $dep84 = new Department();
        $dep84->setCode('83');
        $dep84->setDepartment('Var');
        $manager->persist($dep84);

        $dep85 = new Department();
        $dep85->setCode('84');
        $dep85->setDepartment('Vaucluse');
        $manager->persist($dep85);

        $dep86 = new Department();
        $dep86->setCode('85');
        $dep86->setDepartment('Vendée');
        $manager->persist($dep86);

        $dep87 = new Department();
        $dep87->setCode('86');
        $dep87->setDepartment('Vienne');
        $manager->persist($dep87);

        $dep88 = new Department();
        $dep88->setCode('87');
        $dep88->setDepartment('Haute-Vienne');
        $manager->persist($dep88);

        $dep89 = new Department();
        $dep89->setCode('88');
        $dep89->setDepartment('Vosges');
        $manager->persist($dep89);

        $dep90 = new Department();
        $dep90->setCode('89');
        $dep90->setDepartment('Yonne');
        $manager->persist($dep90);

        $dep91 = new Department();
        $dep91->setCode('90');
        $dep91->setDepartment('Territoire-de-Belfort');
        $manager->persist($dep91);

        $dep92 = new Department();
        $dep92->setCode('91');
        $dep92->setDepartment('Essonne');
        $manager->persist($dep92);

        $dep93 = new Department();
        $dep93->setCode('92');
        $dep93->setDepartment('Hauts-de-Seine');
        $manager->persist($dep93);

        $dep94 = new Department();
        $dep94->setCode('93');
        $dep94->setDepartment('Seine-Saint-Denis');
        $manager->persist($dep94);

        $dep95 = new Department();
        $dep95->setCode('94');
        $dep95->setDepartment('Val-de-Marne');
        $manager->persist($dep95);

        $dep96 = new Department();
        $dep96->setCode('95');
        $dep96->setDepartment('Val-d\'Oise');
        $manager->persist($dep96);

        $dep97 = new Department();
        $dep97->setCode('971');
        $dep97->setDepartment('Guadeloupe');
        $manager->persist($dep97);

        $dep98 = new Department();
        $dep98->setCode('972');
        $dep98->setDepartment('Martinique');
        $manager->persist($dep98);

        $dep99 = new Department();
        $dep99->setCode('973');
        $dep99->setDepartment('Guyane');
        $manager->persist($dep99);

        $dep100 = new Department();
        $dep100->setCode('974');
        $dep100->setDepartment('La Réunion');
        $manager->persist($dep100);

        $dep101 = new Department();
        $dep101->setCode('975');
        $dep101->setDepartment('Mayotte');
        $manager->persist($dep101);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}