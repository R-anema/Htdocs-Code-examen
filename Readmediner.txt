README

SOLID Design is belangrijk. SOLID
S staat voor single responsibilty. Als je een class of functie maakt moet je zorgen dat het niet teveel doet. Denk na over wat je verwacht van code.
ALs je een werkend programma oplevert in je applicatie met vooral werkende features. Is het belangrijk dat de kwaliteit van de code kloppend is.
Herhaal jezelf niet, schrijf loops. Documenteer je code.
Als functie alleen a doet, moet het niet B doen. Dan maak je functie A en B. Hangt er vanaf hoe complex het word, maar maak er een class voor als ze vaak samen worden aangeroepen. Bv specialisaties.
Maak je variabelen veilig en schrijf het als een private als het kan.
Gebruik je debugger tijdens de ontwikkeling.



Rianne's readme met kopjes en tips over de code.
    Aanvullen met de schema al la tijden en planning.

Download
Open de readme.
Download Visual Studio Code.
Download Xammp
Navigeer naar de HTDocs, zet daar de files in.

Database
Run de Database sql in php my adnin.
Run de query's en vooral de inserts die in the database.sql staan om een klant en een mederwerker(admin) toe te voegen.
Voeg via die query's de informatie in de database toe voor eten, drink etc.

Webpagina's
Om te starten, ga naar database.php. In die file staat de basis PDO Database connectie die ik aanroep.
Onhoud: pas de basis PDO aan indien je locahost een andere locahost is, etc. Hij werkt wel op mijn computer.
Navigeer naar index.php voor de basis menu.
Check login voor de login.php en login helper.php code. Als het af is, klik op login en log in als Admin of klant.
Indien niet af, check login voor een login basis pls.
Check reserveringen voor info, check comments voor wat elk stukje moet doen.
Check serveren waar de medewerkers kunnen zien wat de klanten hebben besteld.
Dit word aangeroepen door verschillende chain link queries.
Indien de login AF is, word daar de mederwerker aangeroepen aan de database. Als Admin ben je Medewerker (dus ober, kok of serveerder). Kijk in de database op admin nummer op wie het is.
Dit is zodat specifieke mensen naar specifieke plekken kunnen navigeren.
Navigeer naar de pagina's die je wilt bekijken>
Vind de Delete, Toevoegen en Aanpassen pagina's in reserveringen, serveren en gegevens op de pagina's waar ze in staan.

Code
Check de comments voor extra uitleg bij de code.
Navigeer rond in de code en check de query voor errors als die niet willen werken. indien tijdsnood kan ik tabellen hebben aangepast die ik nog niet in de database.sql heb aangepast.
Let op: in de database.php staan wat queries die ik heb af en toe heb ingevoerd en gebruikt in de SQL. Niet alles staat erin!
Check de andere queries en informatie text voor code en queries die ik geschreven heb maar niet heb gebruikt.

Belangrijk:
Functionaliteit is belankrijk, opmaak is optioneel!
Required:
- Reserveringen: Receptie kunnen zien welke tafel een klant heeft gereseveerd. (Je ziet wat er in reverseringen staat op de reserveringen pagina gesorteed op datum + edit/delete link.)
- Overzichten: Kok en Ober kunnen zien wat de klanten hebben besteld. (Code gestart)
- Gegevens: De receptie moet de gegevens toevoegen, wijzigen en verwijderen van alles.
- Edit pagina. (semi functioneel. Roep aan.)