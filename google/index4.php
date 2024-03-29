<!DOCTYPE html>
<html lang="pl">

  <head>
    <meta charset="utf-8">
    <title>Google</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-google-icon-logo-png-transparent-svg-vector-bie-supply-14.png">
    <link rel="stylesheet" type="text/css" href="styles3.css">
    <link rel="stylesheet" type="text/css" href="styles4.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <link href="autocompleter.css" rel="stylesheet" type="text/css">
  <script src="autocompleter.js"></script> 
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>

  <body> 
    <div id="app" :class="[wyszukaj.length > 0 ? 'results' : 'home']"> 
      
    <nav class="nav_tools">
        <a href ="#">Gmail</a>
        <a href ="#">Grafika</a>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAHlBMVEUAAAD////c3NyGhobZ2dl9fX3o6OiCgoL4+Pi3t7cTiY9IAAABp0lEQVR4nO3dy23DQBBEQZpfKf+EHYH30IcGhq4KoLHvPBK4baH9529HuHksNvf0oTGFCYVdChMKuxQmFHYpTCjsUphQ2KUwobBLYUJhl8KEwi6FCYVdChMKuxQmFHYpTCjsUphQ2KUwobBLYUJhl8KEwi6FCYVdChMKu87Fa65w81psnvFL98z5WbzmPrPNe7H5yTb3fVuMvoPC+RTOp3A+hfMpnE/hfArnUzifwvkUzqdwPoXzKZxvOzLX6sbwfaLN57vYvK/wpfFFZ3V7esLNZ7GZ355S778fKkwo7FKYUNilMKGwS2FCYZfChMIuhQmFXQoTCrsUJhR2KUwo7FKYUNilMKGwS2FCYZfChMIuhQmFXQoTCrsUJhR2KUwo7Hp/4Zzf6of/Yhj0f4vF6DsonE/hfArnUzifwvkUzqdwPoXzKZxP4XwK51M4n8L5/sH3LVJzvlGSev/9UGFCYZfChMIuhQmFXQoTCrsUJhR2KUwo7FKYUNilMKGwS2FCYZfChMIuhQmFXQoTCrsUJhR2KUwo7FKYUNilMKGwS2FCYZfChMLIL9IUYVkcF1KJAAAAAElFTkSuQmCC" class="google_apps" role="button" height="32"></img>
        <button>Zaloguj się</button>
    </nav>

    <div class="main">
    <div class="logo">
          <img class="google" src="logo.png">
      </div>
      <div class="wyszukaj">
          <div class="pasek">
              <div class="text">
                  <div class="widok">
                      <img class="lupa" src="search.svg" @click="potwierdz" title="Szukaj">
                      <input v-model="googleSearch" @keyup.enter="potwierdz" type="search">
                      <img class="mikro" src="vs.png" title="Wyszukiwanie głosowe">
                  </div>
              </div>
              <div class="lista">
                  <ul v-for="miasto in filtredCities" @click="uzupelnij(miasto)">
                      <img class="lupa1" src="search.svg" title="Szukaj">
                      {{googleSearch}}<b>{{ miasto.name.substring(googleSearch.length) }}</b>
                  </ul>
              </div>
          </div>
          <div class="przyciski">
              <div class="buttons">
                  <button class="przycisk1" @click="potwierdz" type="button">Szukaj w Google</button>
                  <button class="przycisk2" type="button" onclick="location.href=''">Szczęśliwy traf</button>
              </div>
          </div>
      </div>
  </div>

    <footer class="stopka">
        <h4>Polska</h4>
        <div class="typ">
            <div class="typ1">
                <a href="#">O nas</a>
                <a href="#">Reklamuj się</a>
                <a href="#">Dla firm</a>
                <a href="#">Jak działa wyszukiwarka</a>
            </div>
          
          <div class="typ3">
                <a href="#">Prywatność</a>
                <a href="#">Warunki</a>
                <a href="#">Ustawienia</a>
            </div>
        </div>
    </footer>

    
    <div class="topbar">

        <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" alt="">

        <ul class="opcje">
          <li><a href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAHlBMVEUAAAD////c3NyGhobZ2dl9fX3o6OiCgoL4+Pi3t7cTiY9IAAABp0lEQVR4nO3dy23DQBBEQZpfKf+EHYH30IcGhq4KoLHvPBK4baH9529HuHksNvf0oTGFCYVdChMKuxQmFHYpTCjsUphQ2KUwobBLYUJhl8KEwi6FCYVdChMKuxQmFHYpTCjsUphQ2KUwobBLYUJhl8KEwi6FCYVdChMKu87Fa65w81psnvFL98z5WbzmPrPNe7H5yTb3fVuMvoPC+RTOp3A+hfMpnE/hfArnUzifwvkUzqdwPoXzKZxvOzLX6sbwfaLN57vYvK/wpfFFZ3V7esLNZ7GZ355S778fKkwo7FKYUNilMKGwS2FCYZfChMIuhQmFXQoTCrsUJhR2KUwo7FKYUNilMKGwS2FCYZfChMIuhQmFXQoTCrsUJhR2KUwo7Hp/4Zzf6of/Yhj0f4vF6DsonE/hfArnUzifwvkUzqdwPoXzKZxP4XwK51M4n8L5/sH3LVJzvlGSev/9UGFCYZfChMIuhQmFXQoTCrsUJhR2KUwo7FKYUNilMKGwS2FCYZfChMIuhQmFXQoTCrsUJhR2KUwo7FKYUNilMKGwS2FCYZfChMLIL9IUYVkcF1KJAAAAAElFTkSuQmCC" class="google_apps" role="button" height="32"></a></li>
          <li><button class="signIn" type="button" name="button">Zaloguj się</button></li>
        </ul>

        <div class="searchgoogle">

          <div class="elements">
            <input ref="second" type="text" v-model="googleSearch">
            <img src="search.svg" class="lupa">
            <img src="vs.png"  class="mikrofon">
            <div class="line"></div>
            <img src="close.png" class="x">
          </div>

          <ul class="optionsbar">
            <li class="lewo all"><a href="#">Wszystko</a></li>
            <li class="lewo"><a href="#">Wiadomości</a></li>
            <li class="lewo"><a href="#">Grafika</a></li>
            <li class="lewo"><a href="#">Wideo</a></li>
            <li class="lewo"><a href="#">Mapy</a></li>
            <li class="lewo"><a href="#">Więcej</a></li>
            <li class="lewo"><a class="tools" href="#">Narzędzia</a></li>
            <li class="lewo"><a href="#">Ustawienia</a></li>
          </ul>
          
        </div>

    </div> 
    <div class="searchResults">

	<p class="searchnumber">Około 23 900 000 wyników (0.61 s) </p>
	    
	    
        <div class="result">
	  <a class="link" href="#">https://www.zooplus.pl/magazyn/psy/rasy-psow/dalmatynczyk</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk | wszystko o rasie w Magazynie o zwierzętach ...</a></h2>
          <p>Charakterystycznie biało-czarno umaszczony dalmatyńczyk to kochający ruch pies, <br>
                który chętnie podejmuje wyzwania zarówno fizyczne, jak i umysłowe.</p>
           
        </div>

        <div class="result">
	  <a class="link" href="#">https://www.olx.pl/zwierzeta/psy/q-dalmaty%C5%84czyk/</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk - Psy - OLX.pl</a></h2>
          <p>Psy, szczeniaki sprzedam, oddam - OLX.pl - dalmatyńczyk. Pozostałe rasy 6 ...</p>
    
        </div>

        <div class="result">
	  <a class="link" href="#">https://pl.wikipedia.org/wiki/Dalmaty%C5%84czyk</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk – Wikipedia, wolna encyklopedia</a></h2>
          <p>Pierwszy opis dalmatyńczyka pochodzi jednak z kroniki chorwackiej (1719), <br>
                stąd nazwa rasy. W Dalmacji psy te wykorzystywane były jako gończe, a później, w ...</p>
     
        </div>

        <div class="result">
	  <a class="link" href="#">https://www.psy.pl/rasa/dalmatynczyk/</a><button>▼</button>
          <h2><a href="#">DALMATYŃCZYK - opis, cena, szczeniaki - Rasy psów - Psy.pl</a></h2>
          <p>Charakter rasy dalmatyńczyk. Dalmatyńczyk jest psem pełnym radości życia, <br>
                o dużym temperamencie. Wymaga bliskiego kontaktu z właścicielem, z którym zżywa ...</p>
           
        </div>

        <div class="result">
	  <a class="link" href="#">https://wamiz.pl/pies/rasy/364/dalmatynczyk</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk -żywienie, cena, charakter - Wamiz.pl</a></h2>
          <p>Dalmatyńczyk to energiczny, silny i żywy pies, który bywa uparty. <br>
              Jednak właściwie wychowany, będzie wiernym i wspaniałym towarzyszem.</p>
           
        </div>

        <div class="result">
	  <a class="link" href="#">https://fera.pl/dalmatynczyk-najwazniejsze-informacje-o-rasie.html</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk - jak wygląda? Jak długo żyje? Charakterystyka ...</a></h2>
          <p>Dalmatyńczyk znany jest z bardzo ciekawego umaszczenia. <br>
              To pies energiczny, towarzyski, odważny, czuły i czujny</p>
          
        </div>

        <div class="result">
          <a class="link" href="#">https://www.purina.pl/pies/dog-breeds/dalmatynczyk</a><button>▼</button>
          <h2><a href="#">Pies Dalmatyńczyk - Opis i charakterystyka rasy | PURINA</a></h2>
          <p>Pies Dalmatyńczyk - opis i charakterystyka. Sprawdź informacje na temat psa rasy Dalmatyńczyk. <br>
                Przeglądaj bibliotekę ras psów przygotowaną przez PURINA</p>
        
        </div>

        <div class="result">
          <a class="link" href="#">https://www.maxizoo.pl/magazyn/pies/rasy/dalmatynczyk/</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk: Charakter, hodowla i pielęgnacja | MAXI ZOO</a></h2>
          <p>Antyczne korzenie. Dokładne pochodzenie dalmatyńczyka jest nieznane. <br>
              Starożytne wizerunki babilońskie i egipskie przedstawiają psy cętkowane, dalsze ślady ...</p>
           
        </div>

        <div class="result">
		<a class="link" href="#">https://fajnyzwierzak.pl/porady/dalmatynczyk-_t/</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk - charakterystyka, cechy, tresura, opinie</a></h2>
          <p>Dalmatyńczyk. Dalmatyńczyk to średni, krótkowłosy pies o charakterystycznym <br>
              umaszczeniu białym w czarne kropki. W klasyfikacji FCI rasa ta należy do grupy 6 ...</p>
          
        </div>

        <div class="result">
		<a class="link" href="#">https://fajnyzwierzak.pl/porady/dalmatynczyk-_t/</a><button>▼</button>
          <h2><a href="#">Dalmatyńczyk - charakterystyka, cechy, tresura, opinie</a></h2>
          <p>Dalmatyńczyk. Dalmatyńczyk to średni, krótkowłosy pies o charakterystycznym <br>
                umaszczeniu białym w czarne kropki. W klasyfikacji FCI rasa ta należy do grupy 6 ...</p>
        </div>
       
        <br>

        <div class="help">

          <h3>Podobne wyszukiwania</h3>
            <div class="relatedlists">
                <ul class="relatedleft">
                    <a id="pomoc1" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Dalmatyńczyk OLX</a>
                    <a id="pomoc2" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Dalmatyńczyk długowłosy</a>
                    <a id="pomoc3" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Dalmatyńczyk hodowla</a>
                    <a id="pomoc4" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Adoptuj dalmatyńczyka </a>
                </ul>
                <ul class="relatedright">
                    <a id="pomoc5" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Ile kosztuje dalmatyńczyk</a>
                    <a id="pomoc6" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Dalmatyńczyk adopcja</a>
                    <a id="pomoc7" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Hodowla dalmatyńczyków Polska</a>
                    <a id="pomoc8" type="text"><img src="search.svg" class="lupka" alt="Lupa Google" href="#">Dalmatyńczyk sprzedajemy</a>
                </ul>
            </div>

        </div>

        <br><br>

          <table class="googlelist">
            <tr>
              <td><span class="blue">G</span></td>
              <td><span class="red">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="yellow">o</span></td>
              <td><span class="blue">g</span></td>
              <td><span class="green">l</span></td>
              <td><span class="red">e</span></td>
              <td rowspan="2" style="width: 10px;"></td>
              <td><span class="blue arrow">></span></td>
            </tr>

            <tr>
              <td class="numer"></td>
              <td class="numer">1</td>
              <td class="numer">2</td>
              <td class="numer">3</td>
              <td class="numer">4</td>
              <td class="numer">5</td>
              <td class="numer">6</td>
              <td class="numer">7</td>
              <td class="numer">8</td>
              <td class="numer">9</td>
              <td class="numer">10</td>
              <td colspan="3"></td>
              <td class="numer">Następna</td>
            </tr>

          </table>

      </div>

      <div class="infopasek">

        <div class="locationpasek">
        <p>
          <a class="panstwo">Polska</a>
          <a class="miasto"><strong>Janów Lubelski</strong> - Na podstawie Twojej wcześniejszej aktywności </a>
          <a class ="inne">- Użyj dokładnej lokalizacji</a><a class ="loc_more"> - Dowiedz się więcej</a>
        </p>
      </div>

        <ul>
            <li><a href="#">Pomoc</a></li>
            <li><a href="#">Prześlij opinię</a></li>
            <li><a href="#">Prywatność</a></li>
            <li><a href="#">Warunki</a></li>
        </ul>
        
      </div>
    </div>
</body>

<script>
   var app = new Vue({
                el: "#app",
                data: {
                    googleSearch:"",
                    wyszukaj:"",
                    cities: window.cities,
                },
                computed: {
                    filtredCities() {
                        let result = this.cities.filter(miasto => miasto.name.startsWith(this.googleSearch) || miasto.name.toLowerCase().startsWith(this.googleSearch));
                        if (this.googleSearch.length > 0) {
                            return result.slice(0, 10);
                        }
                    }
                },
                methods: {
                    potwierdz() {
                        this.wyszukaj = this.googleSearch
                    },
                    uzupelnij(miasto) {
                        this.googleSearch = miasto.name;
                        this.wyszukaj = this.googleSearch;
                    },
                }
            })
</script>
</html>
