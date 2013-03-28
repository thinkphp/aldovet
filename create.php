<?php

//init database
require('init.php');

//MySQL
if(isset($config['mysql'])) {

/*
 * Create tables from stratch
 *
 */

       //create first table for aldo romanian
       $create_table_romanian = "create table aldo (

             id INT(2) NOT NULL PRIMARY KEY,

             type VARCHAR(10) not null,

             content TEXT not null
       )"; 

       //create table for aldo french
       $create_table_french = "create table aldo_french (

             id INT(2) NOT NULL PRIMARY KEY,

             type VARCHAR(10) not null,

             content TEXT not null
       )"; 


       //create table for aldo english
       $create_table_english = "create table aldo_english (

             id INT(2) NOT NULL PRIMARY KEY,

             type VARCHAR(10) not null,

             content TEXT not null
       )"; 


       //create table for aldo spanish
       $create_table_spanish = "create table aldo_spanish (

             id INT(2) NOT NULL PRIMARY KEY,

             type VARCHAR(10) not null,

             content TEXT not null
       )"; 




       //create second table for contor visit users
       $create_table_visit = "create table $table2 (

             code_visit INT(2) NOT NULL PRIMARY KEY auto_increment,

             ip_visit VARCHAR(50) not null,
  
             curdate_visit varchar(50) NOT NULL,

             curtime_visit varchar(50) NOT NULL,

             curday_visit varchar(50) NOT NULL,

             host_visit VARCHAR(50) not null,

             map VARCHAR(100) not null
       )"; 

/*
 * Insert into table romanian
 *
 */


//insert data into table
$sql2 = "INSERT into aldo (id,type,content) VALUES(1,'home','<h2>Lasa-ti prietenii pe maini bune</h2><p> Pensiunea canina si felina Aldo, infiintata in anul 2006, a functionat inca de la inceput ca o mica afacere de familie, cei implicati straduindu-se sa-si faca oaspetii sa se simta ca si cum nu ar fi parasit propria casa.</p>
<p>Ne straduim sa cream un mediu prietenos si compatibil pentru oaspetii nostri, toti cateii si toate pisicile fiind tratate ca si cum ar face parte din familie.
Puteti fi siguri ca pisicile si cainii vor beneficia de o experienta interesanta in lipsa dumneavoatra si va garantam ca veti considera pensiunea Aldo ca o  a doua casa a animalelor dumneavoastra.</p>
<p>Personalul nostru calificat (medic veterinar, ingrijitori) va avea grija de orice nevoie a prietenului dumneavoastra, inclusiv administrarea de medicamente si/sau tratamente daca este necesar, 7 zile pe saptamana, 365 zile pe an. Animalul vostru este foarte important pentru voi cum de altfel este foarte important pentru noi.</p>
<p>Multumim pentru faptul ca ati vizitat site-ul nostru, de altfel intotdeauna sunteti bineveniti pentru a ne cunoaste, a vizita pensiunea canina si a vedea locul in care va locui prietenul dumneavoastra.</p>')";

$sql3 = "INSERT into aldo (id,type,content) VALUES(2,'about','<h2>Despre noi</h2><p>Pensiunea canina, va pune la dispozitie padocuri individuale pentru catei, bine intretinute  si curate,  climat interior  controlat, muzica ambientala si cu  o suprafata suficient de mare (6 m2) pentru a asigura confortul oaspetilor nostri.</p>
<p>Stim ca animalul va va simti lipsa, astfel ca principalul nostru scop este sa facem totul pentru ca prietenii dumneavoastra sa se simta bine cat sunteti departe.</p>
<p>Pisicile vor beneficia de boxe individuale linistite de aproximativ 3 m2, mobilate specific pentru a stimula imaginatia pisicilor si a face ca timpul pana la reintalnirea cu stapanul sa para cat mai scurt.</p>
<p>Desi suntem localizati in Bucuresti, oferim conditiile si beneficiile unei vacante la tara - spatiu de miscare, aer curat, liniste si siguranta.</p>
<h2>Conditii de acceptare in pensiune</h2>Acceptam numai animale sanatoase, vaccinate si deparazitate. Sunt bine-venite in pensiune toate animalele prietenoase cu oamenii')";

$sql4 = "INSERT into aldo (id,type,content) VALUES(3,'services','<h2>Servicii</h2><p>Indiferent de perioada solicitata, Aldo - pensiune canina si felina este permanent la dispozitia dumneavoastra si va ofera :</p><ul><li>Pensiune pe timpul vacantei</li><li>Pensiune pe termen lung - perioade mai lungi de 30 de zile si tarife reduse</li><li>Gradinita - Pe timpul sederii in pensiune cateii beneficiaza de un program de stimulare, exercitii si socializare pentru catei care altfel ar putea fi lasati singuri  acasa pe timpul zilei</li><li>Transport - Stim ca timpul dumneavoastra cateodata este limitat, de aceea va oferim serviciul de taxi la si de la pensiune  - acasa.</li></ul>
<p>Toaletare completa inclusiv baie (in curand)</p><p>Pe perioada de sedere in pensiune cainele dumneavoastra va beneficia de urmatoarele: </p><ul><li>Program de plimbare in spatiul special amenajat in incinta pensiunii (2000 m2)</li><li>Program de joaca cu alti catei in categorii si grupuri compatibile si sub permanenta supraveghere</li><li>Tarc cu suprafata de 100 m2</li>
<li>Curatenie zilnica a padocului</li><li>Vase de apa si mancare curate</li><li>Asistenta veterinara de urgenta cu personal propriu</li><li>Cat timp se afla in grija noastra, prietenul dumneavoastra este in deplina siguranta deoarece nu va intra in contact cu caini agresivi iar intrucat proprietarul pensiunii este medic veterinar, va asigura ingrijirea personalizata, adecvata cu varsta si personalitatea fiecarui musafir</li></ul>')";


$sql5 = "INSERT into aldo (id,type,content) VALUES(4,'bring','<h2>Ce sa aduceti</h2><p>Deoarece fiecare caine beneficiaza de propria camera, puteti aduce patura, pat sau jucariile preferate. De altfel este si indicat ca pentru o mai rapida acomodare in pensiune sa aiba in preajma lor obiecte cunoscute.</p>
<p>Mancare - este important ca fiecare animal sa beneficieze de acelasi tip de hrana ca si acasa pentru a contracara stresul despartirii de casa si stapan. Fie ca este vorba despre mancare gatita, hrana speciala uscata sau conserve, vom avea grija sa fie depozitata si administrata conform indicatiilor dumneavoastra.
</p><p>Castroane pentru apa si mancare in cazul in care doriti ca animalele dumneavoastra sa foloseasca propriile vase.</p>
<p>Carnet de sanatate - se va verifica daca vaccinarile si deparazitarile interne si externe sunt in termenul de valabilitate.</p> 
<h2>Programul zilnic</h2><p>Activitatea in cadrul pensiunii canine se desfasoara dupa o rutina bine stabilita si care ne permite sa venim in intampinarea nevoilor detinatorilor de animale cat si a animalelor cazate in pensiunea canina.</p>
<p>Dimineata: Plimbarea tuturor cateilor in spatiul special amenajat din incinta pensiunii canine. Plimbarea cateilor agresivi fata de alte animale, se face separat si individual pentru a preintampina eventualele \"accidente\". In timpul cat cateii se afla la plimbare padocurile sunt maturate, spalate si dezinfectate.</p>
<p>In timpul zilei: Program de joaca, toaletare si socializare cu alti catei prin formarea de grupuri compatibile - in tarcul special amenajat.
</p><p>Seara: Plimbarea cateilor, curatenia padocurilor.</p><p> Mancarea se administreaza conform indicatiilor proprietarilor, iar vasele se spala zilnic.</p>Primirea animalelor in pensiunea canina se face in general intre orele 8 - 12 dar pentru situatii deosebite, va putem primi si la orele dorite de dumneavoastra.
Predarea animalelor se face in general intre orele 16 - 20 cu mentiunea ca pentru cazurile neprevazute predarea se poate face si la orele solicitate de dumneavoastra.</p>')";

/*
 * Insert into table french
 *
 */

//insert data into table
$sql2_french = "INSERT into aldo_french (id,type,content) VALUES(1,'home','<h2>Laissez votre ami dans de bonnes mains</h2><p>Canine et f&#233;line pension Aldo, fond&#233;e en 2006, a travaill&#233; d&#233;s le d&#233;part comme une petite entreprise familiale, les personnes impliqu&#233;es tentent de vous faire sentir comme ne pas quitter votre domicile. </ p>
<p> Nous nous effor&#231;ons de cr&#233;er un environnement favorable pour nos clients compatibles, tous les chiens et les chats sont trait&#233;s comme si elle fait partie de la famille.
Vous pouvez &#234;tre s&#251;r que les chats et les chiens feront profiter d\'une grande exp&#233;rience dans votre absence et nous garantissons que vous tiendrez compte de retraite Aldo comme un 2 &#224; la maison de vos animaux. </ P>
<p>Nos qualifi&#233;e (v&#233;t&#233;rinaire, les aidants naturels) se chargera de tous les besoins de votre ami, y compris l\'administration de m&#233;dicaments et ou un traitement si n&#233;cessaire, 7 jours par semaine, 365 jours par an. Votre animal est tr&#233;s important pour vous comme un fait est tr&#233;s important pour nous. </ P>
<p> Merci d\'&#234;tre vous de visiter notre site, vous &#234;tes &#233;galement toujours les bienvenus pour nous rencontrer, veuillez consulter notre pension et de voir o&#249; vous vivez votre ami.</ p>')";


$sql3_french = "INSERT into aldo_french (id,type,content) VALUES(2,'about','<h2>Apropos de nous</h2><p> Pension canine et f&#233;line Aldo fournira paddocks individuels pour les chiens, propre et bien entretenu, le climat int&#233;rieur contr&#244;l&#233;, musique d\'ambiance et d\'un espace assez grand (6 m2) pour assurer le confort de nos invit&#233;s.
<p> Nous savons que vous manquer l\'animal, donc notre objectif principal est de tout faire pour que vos amis se sentent bien comme vous vous trouvez. </ p>
<p> Les chats profiter du calme des cases individuelles d\'environ 3 m2, meubl&#233;e sp&#233;cifiquement &#224; favoriser les chats et d\'imagination pour rendre le temps de regarder de se joindre avec le ma&#238;tre que possible. </ p>
<p> Bien que nous sommes situ&#233;s &#224; Bucarest, les offres et les bienfaits d\'un s&#233;jour dans le pays - la place pour bouger, l\'air frais, la paix et la s&#233;curit&#233;. </p>
<p>CONDITIONS D\'ACCEPTATION</p> <p>Nous n\'acceptons que les animaux sains, vaccin&#233;s et vermifug&#233;s. Je salue toutes les personnes, les animaux friendly. </p>')";


$sql4_french = "INSERT into aldo_french (id,type,content) VALUES(3,'services','<h2>Services</h2><p> Quelle que soit la p&#233;riode choisie, la pension canine et f&#233;line Aldo est toujours &#224; votre disposition et vous propose: </ p>
<ul><li>Pension pendant les vacances</li><li>Auberge &#224; long terme</li><li>Maternelle - alors que chez les chiens auberge d\'un programme de stimulation, d\'exercice et de socialisation pour les chiens qui, autrement, pourrait &#234;tre laiss&#233; seul &#224; la maison pendant la journ&#233;e</li><li>Transports - Nous savons que votre temps est parfois limit&#233;, c\'est pourquoi nous offrons un service de taxi depuis et vers le bord - la maison. </ li></ul><p>Pleine Toaletare incluant salle de bains (bient&#244;t) </p> 
<p>Au cours de leur s&#233;jour dans une auberge de votre chien va b&#233;n&#233;ficier des avantages suivants: </p> <ul><li> programme de marche dans des endroits sp&#233;ciaux &#224; l\'int&#233;rieur de pension (2000 m2) </li><li> lecture de programmes avec d\'autres chiots en groupes compatibles et des cat&#233;gories et sous surveillance constante </ li> <li> Tarc surface de 100 m2 </li><li> paddock nettoyage quotidien </li> <li> navires de l\'eau potable et de nourriture </li>
<li> d\'aide d\'urgence v&#233;t&#233;rinaire &#224;f son personnel </li><li> Combien de temps est &#224; notre charge, d\'un ami est s&#249;r parce que vous ne serez pas en contact avec des chiens agressifs et parce que le propri&#233;taire de la pension est un v&#233;t&#233;rinaire, fournira des soins personnalis&#233;s, adapt&#233;s &#224; son &#226;ge et la personnalit&#233; de chacun des invit&#233;s</li> 
</ul>')";


$sql5_french = "INSERT into aldo_french (id,type,content) VALUES(4,'bring','<h2>Quoi apportez</h2><p>Comme tous les avantages de chien de leur propre chambre, vous pouvez faire une couverture, un lit ou jouets pr&#233;f&#233;r&#233;s. En outre, il et a indiqu&#233; que, pour un h&#233;bergement plus rapide dans l\'auberge ont connu des objets autour d\'eux. </p><p>Alimentation - il est important que chaque animal doit b&#233;n&#233;ficier du m&#234;me type de nourriture comme la maison pour faire face &#224; la s&#233;paration de stress stapan. Bols Accueil de l\'eau et nourriture.Carnet de sant&#233;</p>')";


/*
 * Insert into table english
 *
 */

//insert data into table
$sql2_english = "INSERT into aldo_english (id,type,content) VALUES(1,'home','<h2>Let your friend in good hands</h2><p>Canine and Feline pension Aldo, founded in 2006, worked from the start as a small family business, those involved are trying to make guests feel like not leave your home.</p>
<p>We strive to create a friendly environment for our guests compatible, all dogs and all cats are treated as if it is part of the family.
You can be sure that cats and dogs will enjoy a great experience in the absence dumneavoatra and we guarantee that you will consider pension Aldo as a 2 to house your animals.</p>
<p>Our qualified staff (veterinarian, caregivers) will take care of every need of your friend, including administration of drugs and / or treatment if necessary, 7 days a week, 365 days a year. Your pet is very important to you as fact is very important to us.</p>
<p>Thank you for being you for visiting our site, you are also always welcome to meet us, visit our pension and see where you live your friend.</p>')";

$sql3_english = "INSERT into aldo_english (id,type,content) VALUES(2,'about','<h2>About us</h2>
<p>Pension canine and feline Aldo will provide individual paddocks for dogs, clean and well maintained, climate controlled interior, ambient music and an area large enough (6 m2) to ensure the comfort of our guests.</p>
<p>We will miss the animal, so our main goal is to do everything so that your friends feel good as you are away.</p>
<p>Cats will enjoy quiet individual pens approximately 3 m2, furnished specifically to foster cats and imagination to make time to look at joining with master shortest.</p>
<p>Although we are located in Bucharest, offers and benefits of a holiday in the country - room to move, fresh air, tranquility and safety.</p>
<p>CONDITIONS OF ACCEPTANCE</p>We accept only healthy animals, vaccinated and dewormed. I welcome all people-friendly animals.</p>')";

$sql4_english = "INSERT into aldo_english (id,type,content) VALUES(3,'services','<h2>Services</h2><p>Whatever the period requested, the pension canine and feline Aldo is always at your disposal and offers:</p>
<ul><li>Hostel during vacation</li><li>Hostel long term</li><li>Kindergarten - while in hostel dogs a program of stimulation, exercise and socialization for puppies that would otherwise be left home alone during the day</li>
<li>Transportation - We know your time is sometimes limited, therefore we offer taxi service to and from the board - home.</li></ul>
<p>Full Toaletare including bathroom (soon)</p><p>During their stay in hostel your dog will benefit from the following:
</p><ul><li>Schedule walking in special places inside the pension (2000 m2)</li>
<li>Schedule of play with other puppies in compatible groups and categories and under constant surveillance</li><li>Pen with a surface of 100 m2</li>
<li>Daily paddock cleaning</li><li>Vessels, water, clean food</li><li>Emergency Veterinary Assistance to own personal</li><li>How long is in our care, your friend is secure as it will not come into contact with aggressive dogs and because the owner of the guesthouse is a veterinarian, will provide personalized care, appropriate to age and personality of each guest</li></ul>')";

$sql5_english = "INSERT into aldo_english (id,type,content) VALUES(4,'bring','<h2>What to bring</h2><p>As every dog benefits from their own room, you can make blanket, bed or favorite toys. Moreover it and indicated that for a faster hostel accommodation in around their objects to have known.</p><p>Food - it is important that each animal should enjoy the same type of food as home to counter the stress of separation from home and stapan.Castroane water and health mancare. Health cards</p>')";





/*
 * Insert into table spanish
 *
 */

//insert data into table
$sql2_spanish = "INSERT into aldo_spanish (id,type,content) VALUES(1,'home','<h2>Deje que su amigo en buenas manos</h2><p>Canino y Felino Hoteles Aldo, fundada en 2006, trabaj&#243; desde el inicio como un peque&#241;o negocio familiar, los interesados est&#225;n tratando de hacer que los hu&#233;spedes se sienten como si su casa se quedar&#237;a.</p>
<p>Nos esforzamos por crear un ambiente amigable para nuestros clientes compatibles, todos los perros y los gatos son tratados como si forma parte de la familia.
Puede estar seguro de que los gatos y los perros disfrutar&#225;n de una gran experiencia en el dumneavoatra ausencia y le garantizamos que usted considere de pensiones Aldo como un segundo hogar de sus animales.</p>
<p>Nuestro personal cualificado (veterinario, los cuidadores) se har&#225; cargo de todas las necesidades de tu amigo, incluida la administraci&#243;n de drogas y / o tratamiento si es necesario, los 7 d&#237;as de la semana, 365 d&#237;as al a&#241;o. Su mascota es muy importante para ti como un hecho es muy importante para nosotros.</p>
<p>Gracias por estar por visitar nuestro sitio, usted es siempre bienvenida a nuestro encuentro, visite nuestra pensi&#243;n y ver donde vive su amigo.</p>')";


$sql3_spanish = "INSERT into aldo_spanish (id,type,content) VALUES(2,'about','<h2>Qui&#233;nes somos</h2>
<p>Pensi&#243;n canina y felina Aldo proporcionar&#225; corrales individuales para perros, limpio y bien mantenido, el clima controlado del interior, m&#250;sica ambiental y un &#225;rea lo suficientemente grande (6 m2) para garantizar la comodidad de nuestros hu&#233;spedes.</p>
<p>Echaremos de menos al animal, por lo que nuestro objetivo principal es hacer todo lo posible para que sus amigos se sienten bien como usted est&#225; ausente.</p>
<p>Los gatos disfrutan de tranquilidad celdas individuales de aproximadamente 3 m2, amueblado espec&#237;ficamente para fomentar los gatos y la imaginaci&#243;n para hacer tiempo para mirar a unirse con el maestro m&#225;s corta.</p>
<p>Aunque estamos ubicados en Bucarest, ofertas y beneficios de unas vacaciones en el pa&#237;s - espacio para moverse, el aire puro, tranquilidad y seguridad.</p>
<p>CONDICIONES DE ACEPTACI&#243;N</p>S&#243;lo aceptamos animales sanos, vacunados y desparasitados. Son bienvenidas todas las personas, los animales amistosos.</p>')";

$sql4_spanish = "INSERT into aldo_spanish (id,type,content) VALUES(3,'services','<h2>Servicios</h2>
<p>Cualquiera que sea el periodo solicitado, la pensi&#243;n de caninos y felinos Aldo siempre est&#225;e a su disposici&#243;n y le ofrece :</p>
<ul><li>Albergue durante las vacaciones</li><li>Hostal largo plazo</li><li>Kindergarten - mientras que en los perros albergue un programa de estimulaci&#243;n, el ejercicio y la socializaci&#243;n de los cachorros que de otro modo quedar&#237;an solos en casa durante el d&#237;a</li><li>Transporte - Sabemos que su tiempo es a veces limitada, por lo que ofrecemos servicio de taxi desde y hasta el Hostel - Inicio.</li></ul>
<p>Toaletare incluyendo cuarto de ba&#241;o completo (en breve)</p><p>Durante su estancia en el albergue de su perro se beneficiar&#225;n de estas: </p>
<ul><li>Calendario de caminar en lugares especiales dentro de la pensi&#243;n de (2000 m2)</li><li>Calendario de jugar con otros cachorros en grupos compatibles y de las categor&#237;as y bajo vigilancia constante de</li><li>Pen con una superficie de 100 m2</li>
<li>Limpieza diaria paddock</li><li>Los buques, agua, limpiar los alimentos</li><li>Veterinaria del personal de ayuda de emergencia
propio</li><li>Cu&#225;nto tiempo est&#225; en nuestro cuidado, tu amigo es seguro ya que no entran en contacto con perros agresivos, porque el propietario de la casa de hu&#233;spedes es un veterinario, le proporcionar&#225; atenci&#243;n personalizada, adecuada a la edad y la personalidad de cada cliente</li></ul>')";

$sql5_spanish = "INSERT into aldo_spanish (id,type,content) VALUES(4,'bring','<h2>Qu&#233; llevar</h2><p>Como todos los beneficios del perro de su propia habitaci&#243;n, usted puede hacer manta, la cama o juguetes favoritos. Por otra parte, e indic&#243; que para un alojamiento en el albergue m&#225;s r&#225;pido alrededor de sus objetos de haber conocido.</p><p>Alimentos - es importante que cada animal debe disfrutar del mismo tipo de alimento como el hogar para combatir el estr&#233;s de la separaci&#243;n del hogar y el agua stapan.Castroane y mancare.Carnet salud</p>')";


//otherwise SQLiteDatabase 
} else {

        //TO DO 

}//end if-else


       //create table aldo_romain
       if(!$db->table_exists("aldo")) { 

             $db->query($create_table_romanian); echo"Table <strong><pre>$create_table_romanian</pre></strong> created!<br/>"; 

       } else {

              echo"Table <strong>aldo</strong> exists!<br/>"; 
       }

       //create table aldo_french
       if(!$db->table_exists("aldo_french")) { 

             $db->query($create_table_french); echo"Table <strong><pre>$create_table_french</pre></strong> created!<br/>"; 

       } else {

              echo"Table <strong>aldo_french</strong> exists!<br/>"; 
       }

       //create table aldo_english
       if(!$db->table_exists("aldo_english")) { 

             $db->query($create_table_english); echo"Table <strong><pre>$create_table_english</pre></strong> created!<br/>"; 

       } else {

              echo"Table <strong>aldo_english</strong> exists!<br/>"; 
       }

       //create table aldo_spanish
       if(!$db->table_exists("aldo_spanish")) { 

             $db->query($create_table_spanish); echo"Table <strong><pre>$create_table_spanish</pre></strong> created!<br/>"; 

       } else {

              echo"Table <strong>aldo_spanish</strong> exists!<br/>"; 
       }


       //create table visit
       if(!$db->table_exists($table2)) { 

             $db->query($create_table_visit); echo"Table <strong><pre>$create_table_visit</pre></strong> created!<br/>"; 

       } else {

              echo"Table <strong>$table2</strong> exists!<br/>"; 
       }


 
  /* EXECUTE QUERIES */ 

      if($db->table_exists("aldo_french")) {

        if($db->query($sql2_french)) {echo"<br/>Query home_french executed!";}

        if($db->query($sql3_french)) {echo"<br/>Query about_french executed!";}

        if($db->query($sql4_french)) {echo"<br/>Query services_french executed!";}

        if($db->query($sql5_french)) {echo"<br/>Query bring_french executed!</br>";}

      }


      if($db->table_exists("aldo_english")) {

        if($db->query($sql2_english)) {echo"<br/>Query home_english executed!";}

        if($db->query($sql3_english)) {echo"<br/>Query about_english executed!";}

        if($db->query($sql4_english)) {echo"<br/>Query services_english executed!";}

        if($db->query($sql5_english)) {echo"<br/>Query bring_english executed!</br>";}

      }



      if($db->table_exists("aldo_spanish")) {

        if($db->query($sql2_spanish)) {echo"<br/>Query home_spanish executed!";}

        if($db->query($sql3_spanish)) {echo"<br/>Query about_spanish executed!";}

        if($db->query($sql4_spanish)) {echo"<br/>Query services_spanish executed!";}

        if($db->query($sql5_spanish)) {echo"<br/>Query bring_spanish executed!<br/>";}

      }


      if($db->table_exists("aldo")) {
 
        if($db->query($sql2)) {echo"<br/>Query home executed!";}
 
        if($db->query($sql3)) {echo"<br/>Query about executed!";}

        if($db->query($sql4)) {echo"<br/>Query services executed!";}

        if($db->query($sql5)) {echo"<br/>Query bring executed!";}
      }


?>