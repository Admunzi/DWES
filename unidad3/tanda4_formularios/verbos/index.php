<?php
/**
*   Unidad 3 Verbos Formularios
*   Enunciado:
*       Formulario para crear un currículum que incluya: Campos de texto, grupo de botones de opción, casilla
*       de verificación, lista de selección única, lista de selección múltiple, botón de validación, botón de
*       imagen, botón de reset, etc.
*
*   @author Daniel Ayala Cantador
*   @date 25/10/2021
*/

session_start();

$aVerbosLista = array(
    array("arise","arose","arisen","surgir"),
    array("awake","awakened/awoke","awakened/awoken","despertarse"),
    array("be","was/were","been","ser/estar"),
    array("bear","bore","borne/born","soportar"),
    array("beat","beat","beaten","golpear"),
    array("become","became","become","llegar a ser"),
    array("begin","began","begun","empezar"),
    array("bend","bent","bent","doblar"),
    array("bet","bet/betted","bet/betted","apostar"),
    array("bid","bid/bade","bidden","desear"),
    array("bid","bid","bid","pujar"),
    array("bind","bound","bound","atar"),
    array("bite","bit","bitten","morder"),
    array("bleed","bled","bled","sangrar"),
    array("blow","blew","blown","soplar"),
    array("break","broke","broken","romper"),
    array("breed","bred","bred","criar"),
    array("bring","brought","brought","traer"),
    array("broadcast","broadcast/broadcasted","broadcast/broadcasted","transmitir"),
    array("browbeat","browbeat","browbeaten/browbeat","intimidar"),
    array("build","built","built","construir"),
    array("burn","burned/burnt","burned/burnt","quemar"),
    array("burst","burst","burst","estallar"),
    array("buy","bought","bought","comprar"),
    array("cast","cast","cast","arrojar"),
    array("catch","caught","caught","atrapar"),
    array("choose","chose","chosen","elegir"),
    array("cling","clung","clung","adherirse"),
    array("come","came","come","venir"),
    array("cost","cost","cost","costar"),
    array("creep","crept","crept","arrastrarse"),
    array("cut","cut","cut","cortar"),
    array("deal","dealt","dealt","tratar"),
    array("dig","dug","dug","cavar"),
    array("disprove","disproved","disproved/disproven","refutar"),
    array("do","did","done","hacer"),
    array("draw","drew","drawn","dibujar"),
    array("dream","dreamt/dreamed","dreamt/dreamed","soñar"),
    array("drink","drank","drunk","beber"),
    array("drive","drove","driven","conducir"),
    array("eat","ate","eaten","comer"),
    array("fall","fell","fallen","caer"),
    array("feed","fed","fed","alimentar"),
    array("feel","felt","felt","sentir"),
    array("fight","fought","fought","pelear"),
    array("find","found","found","encontrar"),
    array("flee","fled","fled","huir"),
    array("fly","flew","flown","volar"),
    array("forbid","forbade","forbidden","prohibir"),
    array("forecast","forecast","forecast","pronosticar"),
    array("forget","forgot","forgotten","olvidar"),
    array("forgive","forgave","forgiven","perdonar"),
    array("forsake","forsook","forsaken","abandonar"),
    array("freeze","froze","frozen","congelar"),
    array("get","got","got/gotten","obtener"),
    array("give","gave","given","dar"),
    array("go","went","gone","ir"),
    array("grind","ground","ground","moler"),
    array("grow","grew","grown","crecer"),
    array("hang","hung","hung","colgar"),
    array("have","had","had","tener"),
    array("hear","heard","heard","oír"),
    array("hide","hid","hidden","esconderse"),
    array("hit","hit","hit","golpear"),
    array("hold","held","held","mantener"),
    array("hurt","hurt","hurt","herir"),
    array("input","input/inputted","input/inputted","entrar"),
    array("keep","kept","kept","guardar"),
    array("kneel","knelt","knelt","arrodillarse"),
    array("knit","knitted/knit","knitted/knit","tejer"),
    array("know","knew","known","saber"),
    array("lay","laid","laid","poner"),
    array("lead","led","led","guiar"),
    array("lean","leaned/leant","leaned/leant","apoyarse"),
    array("leap","leaped/leapt","leaped/leapt","saltar"),
    array("learn","learnt/learned","learnt/learned","aprender"),
    array("leave","left","left","dejar"),
    array("lend","lent","lent","prestar"),
    array("let","let","let","permitir"),
    array("lie","lay","lain","acostarsetenderse"),
    array("lie","lied","lied","mentir"),
    array("light","lit/lighted","lit/lighted","encender"),
    array("lose","lost","lost","perder"),
    array("make","made","made","hacer"),
    array("mean","meant","meant","querer decir"),
    array("meet","met","met","encontrarse"),
    array("mistake","mistook","mistaken","equivocarse/confundir"),
    array("overcome","overcame","overcome","superar"),
    array("pay","paid","paid","pagar"),
    array("plead","pleaded/pled","pleaded/pled","alegar"),
    array("preset","preset","preset","programar"),
    array("prove","proved","proven/proved","probardemostrar"),
    array("put","put","put","poner"),
    array("quit","quit/quitted","quit/quitted","abandonar"),
    array("read","read","read","leer"),
    array("reset","reset","reset","reajustarrestaurar"),
    array("rewind","rewound","rewound","rebobinar"),
    array("ride","rode","ridden","montar"),
    array("ring","rang","rung","sonarllamarporteléfono"),
    array("rise","rose","risen","elevar"),
    array("run","ran","run","correr"),
    array("say","said","said","decir"),
    array("see","saw","seen","ver"),
    array("sell","sold","sold","vender"),
    array("send","sent","sent","enviar"),
    array("set","set","set","ponercolocar"),
    array("sew","sewed","sewn/sewed","coser"),
    array("shake","shook","shaken","sacudir"),
    array("shave","shaved","shaved/shaven","afeitarse"),
    array("shear","sheared","sheared/shorn","esquilar"),
    array("shine","shone","shone","brillar"),
    array("shoot","shot","shot","disparar"),
    array("show","showed","shown/showed","mostrar"),
    array("shrink","shrank/shrunk","shrunk","encoger"),
    array("shut","shut","shut","cerrar"),
    array("sing","sang","sung","cantar"),
    array("sink","sank","sunk","hundir"),
    array("sit","sat","sat","sentarse"),
    array("sleep","slept","slept","dormir"),
    array("slide","slid","slid","deslizar"),
    array("smell","smelled/smelt","smelled/smelt","oler"),
    array("sow","sowed","sown/sowed","sembrar"),
    array("speak","spoke","spoken","hablar"),
    array("speed","sped/speeded","sped/speeded","acelerar"),
    array("spell","spelt/spelled","spelt/spelled","deletrear"),
    array("spend","spent","spent","gastar"),
    array("spill","spilt/spilled","spilt/spilled","derramar"),
    array("spin","spun","spun","girarhilar"),
    array("spit","spit/spat","spit/spat","escupir"),
    array("split","split","split","partir"),
    array("spoil","spoilt/spoiled","spoilt/spoiled","estropear"),
    array("spread","spread","spread","extenderse"),
    array("stand","stood","stood","estardepie"),
    array("steal","stole","stolen","robar"),
    array("stick","stuck","stuck","pegar"),
    array("stink","stank/stunk","stunk","apestar"),
    array("strew","strewed","strewn/strewed","esparcir"),
    array("strike","struck","struck/stricken","golpear"),
    array("swear","swore","sworn","jurar"),
    array("sweat","sweat/sweated","sweat/sweated","sudar"),
    array("sweep","swept","swept","barrer"),
    array("swim","swam","swum","nadar"),
    array("take","took","taken","tomar"),
    array("teach","taught","taught","enseñar"),
    array("tear","tore","torn","rasgar"),
    array("telecast","telecast","telecast","televisar"),
    array("tell","told","told","decir"),
    array("think","thought","thought","pensar"),
    array("throw","threw","thrown","lanzar"),
    array("tread","trod","trodden/trod","pisar"),
    array("understand","understood","understood","entender"),
    array("undo","undid","undone","deshacer"),
    array("unfreeze","unfroze","unfrozen","descongelar"),
    array("wake","woke","woken","despertarse"),
    array("wear","wore","worn","llevarpuesto"),
    array("weave","wove","woven","tejer"),
    array("wed","wed/wedded","wed/wedded","casarse"),
    array("weep","wept","wept","llorar"),
    array("win","won","won","ganar"),
    array("wring","wrung","wrung","retorcer"),
    array("write","wrote","written","escribir")
);

?>
<link rel="stylesheet" href="css/estilos.css">
<div class="principal">
<?php
/**
 *  Devolvemos un array con los campos de inputs vacios 
 * @param 
 */
function generarArrayDificultad($dificultad){
    $aColum = array();
    $camposVacios = 0;
    do {
        $campoAleatorio = rand(0,3);
        if ((in_array($campoAleatorio,$aColum)) == false) {
            array_push($aColum,$campoAleatorio);
            $camposVacios++;
        }
    } while ($camposVacios < $dificultad);
    //Ordenamos
    asort($aColum);
    return $aColum;
}

$lFirstProcessForm = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['selectCantidadVerbos'])) {
        $SelectedAmountVerbs = $_POST['selectCantidadVerbos'];
        $_SESSION['aIndice'] = array();

        if (isset($_POST['selectDificultad'])) {
            $SelectedDificult = $_POST['selectDificultad'];
        }

        $_SESSION['aIndice'] = crearArrayIndice($aVerbosLista,$SelectedAmountVerbs,$SelectedDificult);
        showForm($aVerbosLista,$_SESSION['aIndice']);
    }else {
        //Segundo form para mostrar los correctos e incorrectos
        showResult($aVerbosLista);  
    }
    $lFirstProcessForm = false;
}

function showResult($aVerbosLista){
    $fallos = 0;
    $indice = 0;
    foreach ($_SESSION['aIndice'] as $keyIndice => $acasos) {
        for ($i=0; $i < 4; $i++) { 
            if (in_array($i,$acasos)) {
                if ($aVerbosLista[$keyIndice][$i] == $_POST[$indice]) {
                    echo("<input type=\"text\" name=\"$indice\" class=\"correcto\" value=\"".$_POST[$indice]."\">");
                }else{
                    echo("<input type=\"text\" name=\"$indice\" class=\"incorrecto\" value=\"".$aVerbosLista[$keyIndice][$i]."\">");
                    $fallos++;
                }
            }else {
                echo("<input type=\"text\" value=\"". $aVerbosLista[$keyIndice][$i] ."\" disabled>");
            }
        }
        echo("<br><br>");
        $indice++;
    }
    echo("<h1>Has tenido ". $fallos ." fallos🤓</h1>");      
}



function crearArrayIndice($aVerbosLista,$SelectedAmountVerbs,$SelectedDificult){
    $cantidadVerbosGenerados = 0;
    $aVerbosIndice = array();
    //Generamos verbos que no existe en aVerbosIndice
    do { 
        $verboAleatorio = rand(0,count($aVerbosLista)-1);
        //Aqui comprobamos si el verbo que hemos generado no existe en el array de indices
        if (!array_key_exists($verboAleatorio, $aVerbosIndice)) {
            //Generamos un array con los campos de inputs vacios y lo metemos en el indice 
            $aVerbosIndice[$verboAleatorio] = generarArrayDificultad($SelectedDificult);
            $cantidadVerbosGenerados++;
        }
    }while ($cantidadVerbosGenerados < $SelectedAmountVerbs);

    // var_dump( $aVerbosIndice);
    return $aVerbosIndice;    
}

function showForm($aVerbosLista,$aVerbosIndice){
    echo("<h1>TEST de verbos</h1>");
    echo("<form action=\"\" method=\"post\">");
        $indice = 0;
        foreach ($aVerbosIndice as $keyIndice => $acasos) {
            for ($i=0; $i < 4; $i++) { 
                if (in_array($i,$acasos)) {
                    echo("<input type=\"text\" name=\"$indice\" >");
                }else {
                    echo("<input type=\"text\" value=\"". $aVerbosLista[$keyIndice][$i] ."\" disabled>");
                }
            }
            echo("<br><br>");
            $indice++;
        }
        echo("<input type=\"submit\" value=\"Enviar\">");
    echo("</form>");
}

if ($lFirstProcessForm){
    ?>
    <a href="cierra_sesion.php">Borrar sesion</a>

    <h1>TEST VERBOS IRREGULARES</h1>
    <form action="" method="post">
        <label>Cantidad de verbos que queremos generarArrayDificultad
            <select name="selectCantidadVerbos">
                <?php
                    for ($i=1; $i < 25; $i++) { 
                        echo "<option value=\"$i\">$i</option>";
                    }
                ?>
            </select>
        </label><br><br>
        <label>Dificultad del test
            <select name="selectDificultad">
                <option value="1">Dificultad facil, solo 1 casilla para rellenar</option>
                <option value="2">Dificultad media, 2 casillas para rellenar</option>
                <option value="3">Dificultad dificil, 3 casillas para rellenar</option>
                <option value="4">Dificultad ultraMegaHiperSuperReContraDifficulty, 4 casillas para rellenar</option>
            </select>
        </label><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
}
?>
</div>