<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Fullname = ['SUPERADMIN', 'ABAYON, RAFFY RAPH', 'ABILA, ROLANDO JR.', 'ABUCAYON, JAMES PHILIP', 'ACABADO, ABRAHAM', 'ACAR, RHODORA', 'ADAR, MICHAEL', 'ADORNA, LLOYD', 'AGBALO, RONALDO', 'AGUILAR, PAULA LUZ', 'ALBERTO, JOEY', 'ALBINO, MA. CARIDAD', 'ALIPIN, GABRIEL', 'ALVERO, MARIAN', 'ANACLETO, JOHN', 'ANTIPALA, LOUIECENCIO', 'AQUINO, DONNALYN', 'AQUIO, RAYMUNDO', 'ARELLANO, JESSAMINE', 'ASI, JERRYZALDE', 'ASISTIN, JOANNE ABIGAEL', 'BACHAR, MANNY', 'BALUYOT, MARY ODYSCHELLE', 'BANAAG, RAY-LORD', 'BANZUELO, IRVIN', 'BARATA, JONALYN', 'BARGOLA, YOCO JAY', 'BARRIENTOS, JOSEPH', 'BARSAGA, PETRONIO III', 'BATOL, CELESTINE ARC', 'BELDIA, ANTONY', 'BESO, GRANNY REY', 'BOAQUIÑA, NOEL', 'BROÑA, SARAH JANE', 'CABALLEDA, HELLKEEN', 'CABER, ROCELL', 'CABRERA, ROSALY', 'CALLEJA, FRANZ MIGUEL', 'CALMADA, JELVEEN', 'CAPIOLOS, ARIEL', 'CARALE, RAYMOND', 'CARANZA, JEFFREY', 'CARPIO, VICTOR', 'CASTRO, KRISTIAN', 'CASTRO, MA. ANA CHRISTINE', 'CATBAGAN, RYAN', 'CHAN, REGINA ROSE', 'CHAN, WENDY', 'CHEN, VALERIE JOY', 'CHEN, ZHI XIAN', 'CHEUNG, SIU YUNG', 'CO, AILEEN', 'CORTEZ, MARJO', 'CRUZ, DENNIS', 'CUARESMA, MARK GIL', 'CUNANAN, DENNIS', 'CUNANAN, JERALD', 'DAMO, RICA', 'DAYON, SHERFEL', 'DE GUZMAN, GIL JR.', 'DE GUZMAN, JEFFERSON', 'DE MATA, JOSE JR.', 'DE SILVA, ANN MARGARETH', 'DE VERA, JENNIFER', 'DELA CRUZ, JAY MARK', 'DELGADO, JAY', 'DERANO, ELIAS', 'DETABLAN, MARILYN', 'DIMAYA, GABRIEL', 'DIMAYUGA, TRISHA ANN', 'DIOLA, JAYSON', 'DIOSO, DRANREB', 'ELISAN, ROMMEL', 'ELMA , GLENN ROYED', 'EMPANADO, LYKA', 'ENCINARES, BON JOVI', 'ESCOBIDO, MARLON', 'ESGUERRA, FRANCIS', 'ESPIRITU, MIKE JOSHUA', 'ESTRADA, ROEL', 'EVANGELISTA, RAFFY', 'FAMINI, AIMEE', 'FLORA, BRYAN', 'FLORENTINO, CHLARIZ', 'FLORES, JOHNA DAVE', 'GALANO, DARIO', 'GALIMBA, RANDY', 'GALURA, GLADDYS ANNE', 'GAMOS, RYAN', 'GANILA, RONNIE', 'GARGAR, GARY', 'GONZALES, CARBERT', 'GONZALES, KATHLENE ANNE', 'GUILLENO, GERALDINE', 'HILARIO, ELIZALDE', 'HUBAHIB, MARIA DONNA', 'HUGO, LESLIE FAE', 'HUMBAYA, ALFRED', 'INAUDITO, RENE', 'INTIBLE, JUANITO', 'ISLA, ROXANNE', 'JACINTO, LAURO', 'JALANDRA, JESUS, JR.', 'JAVIER, ARJAY', 'JUCOM, JEROME', 'JUEN, JAN PAOLO', 'LABILLES, YZAH', 'LAURIO, ALVIN', 'LEE, JEFFREY', 'LEMA, ALAIN JASON', 'LIM, JAMES ANTHONY', 'LOPEZ, SYD JUNNIFFYL', 'LORENZO, JEFFREY', 'LUA, LARA MARIE', 'LUCIAS, JOSELITO JR.', 'MACAPANAS, DANILO', 'MADAMBA, ANDREA ROSA', 'MARCOS, TISALONICA', 'MAYO, JERICHO', 'MELEGRITO, ELOISA', 'MENDIZABAL, JERIC', 'MENDOZA, ROIDEMAR', 'MENOR, RAZIEL ANTHONETTE', 'MERCADO, CHRISTIAN', 'MIRAÑA, MARK', 'MONASTERIAL, JR., RENATO', 'MONDIA, ANTHONY', 'MORENO, GLENN', 'MORENO, GUILLERMO', 'MUÑOZ, RICHARD', 'MUSTRALES, LEONA MILLICENT', 'NAZARENO, RONNIE', 'NERY, ROMEL', 'NILO, EDWARD', 'OBILLO, LEONEL', 'OCAMPO, JALE MARL', 'ONG, HERA', 'ONIN, GERALD', 'OPEÑA, JR., ROLANDO', 'ORCULLO, MARICEL', 'OROSCO, KARLO BJORN', 'PALMA, JOJIL', 'PAMA, REY JOSEPH', 'PANGILINAN, GIAN CARLO', 'PASCUA, MICHAEL', 'PASCUAL, MYLENE', 'PASION, JOSEPH', 'PILAPIL, ARNEL', 'PINTANG, JAYSON', 'QUINITO, CHERRYLENE', 'RAVANA, MA. LUISA', 'RECTA, VANEZA', 'REGALARIO, RONALD', 'REGENCIA, GENIA', 'REGENCIA, ROLANDO', 'REYES, FRANCIS ARTHUR', 'REYES, JR., BENEDICTO', 'RIVO, BIENVENIDO', 'RODEL, PAULINE MAE', 'ROMAREZ, JONATHAN', 'ROMERO, LOURDES', 'RUIZ, RAMON CHRISTOPHER', 'SABAS, RICHARD', 'SADIA, IAN', 'SALMINGO, RAYMOND', 'SAMBILAD, MARY IRISH', 'SAN PEDRO, WILBERT', 'SANGUMAY, ROMNICK', 'SARDINIA, FRED LOUIE', 'SEBASTIAN, ALLANA SHAIRELLE', 'SO, JENNIE', 'SUAISO, BRIANEL', 'SUAN, RICKY', 'SUDARIO, OSRIC', 'SUELEN, MARY GRACE', 'SUICO, APRIL DANNE', 'SUVA, BAYRON', 'SZE, DEXTER', 'TABAGAN, ARTHUR', 'TABIOS, DEBBIE DIANA', 'TALLADA, JEFFREY', 'TAN, RAY FRANCIS', 'TE, REAGAN', 'TEJAMO, JUFEL', 'TOTONG, RACHEL ANNE', 'URSUA, ANNE', 'UY, CLAIRE', 'VALDEZ, KENNETH MHEL', 'VALEROSO, JORIEFEL', 'VERSOZA, JR., ARMINGO', 'VIERNESTO, SHANE MARIE', 'VILLAROSA, IRISH', 'VILLASIN, JEFFERSON', 'ZAFE, MA. ELLAINE', 'ZAMORA, DARWIN JHON', 'AGBAYANI, ORDELITO JR.', 'AGUILA, JENNY', 'ALABO, ARNEL', 'ALASTRE, ERROL JOHN', 'ALAURIN, ROBERT', 'ALBEOS, BALTAZAR', 'ALBERTO, ANTHONY', 'ALDEZA, EMALOU', 'ANDRADE, ANALYN', 'AÑONUEVO, CHRISTOPHER', 'ARICHETA, BRYAN JAMES', 'ATONDO, JEFFERSON', 'AUTENTICO, BONG', 'BACAMANTE, HENRY', 'BALURAN, CHRISTIAN', 'BARBECHO, RICHARD', 'BARROT, MARY JOY', 'BATA, DENNIS', 'BOADO, MA. ROSANA', 'CADANG, JACKY', 'CAGAY, CYRUZ', 'CAIGOY, VINCENT', 'CAMORONGA, REYNAN', 'CAÑETE, BENEDICT', 'CONSTANCIA, JENFORD', 'CORPUZ, JR., CHARLIE', 'CRUZ, MELVIN', 'DAABAY, KHESSA LIEL', 'DAOANG, KEITH JARVIN', 'DE JESUS, KERUB', 'DE LA CUESTA, HAZEL CRIZ', 'DE LEON, JEFFERSON', 'DEL ROSARIO, ARMIE', 'DELA CRUZ, IAN PAUL', 'DOGILLO, JR., RODOLFO', 'ECLARINAL, EDWIN', 'ESPADA, JAKE', 'ESTRADA, SAMANTHA IRENE', 'FLORES, BRIAN PAUL', 'FLORES, ROY', 'FRANCISCO, MARK ANTHONY', 'GACUSANA, ABEGAIL', 'GAGARIN, JAYVEE', 'GALVEZ, KATHLEEN', 'GAMBA, ANGELO', 'GARGALLO, JERIC', 'GENEROSO, JOSEPH', 'GRANADA, JUNLER', 'GUERRERO, RAMIL', 'HAS, GLADYS', 'HERNANDEZ, SHUNDELL', 'IBARRA, JENIFER', 'LANETE, ROSE ANN', 'LARDIZABAL, RICA ROSE', 'LLAPITAN, DOMINIC', 'LOYGOS, SILVESTER', 'LUCINIO, MARK', 'MALANG, ANDREY', 'MARCOS, JOHN RYNDELL', 'MARIANO, DHAREN', 'MAZO, ERICK', 'MEDINA, RHODA', 'MERANO, PETER PAUL', 'MOMPIL, DANDY', 'MORES, JEROME', 'NACENO, JADE', 'NOBLE, MEL', 'OGAO-OGAO, REY JAY', 'ORUGA, MARLON', 'PABALAN, KENTH LENNARD', 'PAMI, REDGE STEVEN', 'PASOK, RAVIL JOHN', 'PASTOR, ANGELYN', 'PEREZ, CRIS IAN', 'PUNO, BOAIZEL', 'RALLECA, JEYMAR', 'RAMIREZ, ROLANDO', 'RAMOS, GEORGE KENNETH', 'RAMOS, RON CARLO', 'RIOS, MARIANNE', 'RIVERA, ARIES', 'RIVERA, JOSEPH MARLON', 'RODILLAS, JOSELITO', 'ROLDAN, NOEL', 'ROMANTICO, RYAN', 'SABILE, TERESITA', 'SALANDANAN, AILEEN', 'SAN GASPAR, ELMAR', 'SAN PEDRO, MARICAR', 'SANTOS, FEDIL', 'SEPTIMO, KENNETH JOHN', 'SUBIERE, JOEMAR', 'TANGI, JERICK', 'TESALONA, LOUIE', 'TEVES, MARY ROSE', 'TRAJANO, CRISTIAN', 'UBAY, CARLITO, JR.', 'WEBSTER, STANLEY DAVID MAX', 'YBAÑEZ, ARHOL DAVE', 'CRAME, ANTHONY', 'TAMAYO, DJONNALYN'];

        $Username = ['sa', 'rabayon', 'rabila', 'jabucayon', 'aacabado', 'racar', 'madar', 'ladorna', 'ragbalo', 'paguilar', 'jalberto', 'malbino', 'galipin', 'malvero', 'janacleto', 'lantipala', 'daquino', 'raquio', 'jarellano', 'jasi', 'jasistin', 'mbachar', 'mbaluyot', 'rbanaag', 'ibanzuelo', 'jbarata', 'ybargola', 'jbarrientos', 'pbarsaga', 'cbatol', 'abeldia', 'gbeso', 'nboaquina', 'sbrona', 'hcaballeda', 'rcaber', 'rcabrera', 'fcalleja', 'jcalmada', 'acapiolos', 'rcarale', 'jcaranza', 'vcarpio', 'kcastro', 'mcastro', 'rcatbagan', 'rchan', 'wchan', 'vchen', 'zchen', 'scheung', 'aco', 'mcortez', 'dcruz', 'mcuaresma', 'dcunanan', 'jcunanan', 'rdamo', 'sdayon', 'gdeguzman', 'jdeguzman', 'jdemata', 'adesilva', 'jdevera', 'jdelacruz', 'jdelgado', 'ederano', 'mdetablan', 'gdimaya', 'tdimayuga', 'jdiola', 'ddioso', 'relisan', 'gelma', 'lempanado', 'bencinares', 'mescobido', 'fesguerra', 'mespiritu', 'restrada', 'revangelista', 'afamini', 'bflora', 'cflorentino', 'jflores', 'dgalano', 'rgalimba', 'ggalura', 'rgamos', 'rganila', 'ggargar', 'cgonzales', 'kgonzales', 'gguilleno', 'ehilario', 'mhubahib', 'lhugo', 'ahumbaya', 'rinaudito', 'jintible', 'risla', 'ljacinto', 'jjalandra', 'ajavier', 'jjucom', 'jjuen', 'ylabilles', 'alaurio', 'jlee', 'alema', 'jlim', 'slopez', 'jlorenzo', 'llua', 'jlucias', 'dmacapanas', 'amadamba', 'tmarcos', 'jmayo', 'emelegrito', 'jmendizabal', 'rmendoza', 'rmenor', 'cmercado', 'mmirana', 'rmonasterial', 'amondia', 'gmoreno', 'gmoreno2', 'rmunoz', 'lmustrales', 'rnazareno', 'rnery', 'enilo', 'lobillo', 'jocampo', 'hong', 'gonin', 'ropena', 'morcullo', 'korosco', 'jpalma', 'rpama', 'gpangilinan', 'mpascua', 'mpascual', 'jpasion', 'apilapil', 'jpintang', 'cquinito', 'mravana', 'vrecta', 'rregalario', 'gregencia', 'rregencia', 'freyes', 'breyes', 'brivo', 'prodel', 'jromarez', 'lromero', 'rruiz', 'rsabas', 'isadia', 'rsalmingo', 'msambilad', 'wsanpedro', 'rsangumay', 'fsardinia', 'asebastian', 'jso', 'bsuaiso', 'rsuan', 'osudario', 'msuelen', 'asuico', 'bsuva', 'dsze', 'atabagan', 'dtabios', 'jtallada', 'rtan', 'rte', 'jtejamo', 'rtotong', 'aursua', 'cuy', 'kvaldez', 'jvaleroso', 'aversoza', 'sviernesto', 'ivillarosa', 'jvillasin', 'mzafe', 'dzamora', 'oagbayani', 'jaguila', 'aalabo', 'ealastre', 'ralaurin', 'balbeos', 'aalberto', 'ealdeza', 'aandrade', 'canonuevo', 'baricheta', 'jatondo', 'bautentico', 'hbacamante', 'cbaluran', 'rbarbecho', 'mbarrot', 'dbata', 'mboado', 'jcadang', 'ccagay', 'vcaigoy', 'rcamoronga', 'bcanete', 'jconstancia', 'ccorpuz', 'mcruz', 'kdaabay', 'kdaoang', 'kde jesus', 'hdelacuesta', 'jdeleon', 'adelrosario', 'idelacruz', 'rdogillo', 'eeclarinal', 'jespada', 'sestrada', 'bflores', 'rflores', 'mfrancisco', 'agacusana', 'jgagarin', 'kgalvez', 'agamba', 'jgargallo', 'jgeneroso', 'jgranada', 'rguerrero', 'ghas', 'shernandez', 'jibarra', 'rlanete', 'rlardizabal', 'dllapitan', 'sloygos', 'mlucinio', 'amalang', 'jmarcos', 'dmariano', 'emazo', 'rmedina', 'pmerano', 'dmompil', 'jmores', 'jnaceno', 'mnoble', 'rogaoogao', 'moruga', 'kpabalan', 'rpami', 'rpasok', 'apastor', 'cperez', 'bpuno', 'jralleca', 'rramirez', 'gramos', 'rramos', 'mrios', 'arivera', 'jrivera', 'jrodillas', 'nroldan', 'rromantico', 'tsabile', 'asalandanan', 'esangaspar', 'msanpedro', 'fsantos', 'kseptimo', 'jsubiere', 'jtangi', 'ltesalona', 'mteves', 'ctrajano', 'cubay', 'swebster', 'aybanez', 'acrame', 'dtamayo'];
        $Department = [9, 1, 2, 3, 4, 1, 1, 1, 4, 5, 1, 2, 2, 4, 1, 1, 5, 1, 6, 1, 1, 2, 7, 1, 5, 7, 1, 1, 1, 1, 1, 1, 1, 8, 1, 2, 8, 8, 9, 1, 5, 1, 1, 8, 5, 1, 5, 10, 11, 11, 4, 12, 3, 1, 2, 1, 1, 1, 1, 8, 1, 2, 1, 8, 1, 2, 1, 13, 5, 4, 5, 2, 1, 5, 1, 1, 2, 1, 9, 2, 1, 14, 1, 6, 1, 1, 1, 1, 1, 3, 2, 4, 4, 5, 1, 6, 6, 1, 1, 2, 5, 1, 2, 6, 3, 1, 1, 2, 1, 4, 11, 1, 1, 4, 2, 2, 4, 3, 5, 8, 4, 1, 5, 9, 1, 1, 9, 1, 1, 1, 7, 2, 1, 7, 2, 5, 8, 1, 1, 15, 1, 2, 1, 1, 1, 8, 2, 1, 7, 8, 5, 5, 2, 2, 2, 1, 1, 1, 1, 1, 5, 1, 2, 1, 1, 2, 1, 7, 1, 5, 3, 1, 11, 1, 5, 6, 1, 1, 1, 7, 3, 6, 16, 2, 5, 5, 13, 8, 5, 1, 6, 5, 1, 5, 1, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 18, 17, 17, 17, 17, 17, 17, 18, 17, 17, 17, 17, 17, 17, 17, 17, 17, 18, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 18, 17, 17, 17, 17, 17, 17, 17, 18, 17, 17, 17, 17, 17, 17, 18, 17, 17, 18, 17, 17, 17, 17, 17, 17, 17, 18, 18, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 18, 17, 17, 17, 19, 19];

        for($x = 0; $x<count($Fullname); $x++) {
            $user = new User;
            $user->name = $Fullname[$x];
            $user->username = $Username[$x];
            $user->password = md5($Username[$x] . '123');
            $user->DepartmentID = $Department[$x];
            if($Department[$x] == 9) {
                $user->UserType = 'SuperAdmin';
            } else {
                $user->UserType = 'Normal';
            }
            $user->save();
        }
    }
}
