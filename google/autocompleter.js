Vue.component('v-autocompleter', {
    template: ' <div class="czesc"><div class="krzyzyk"><img title="Wyczyść" class="ikona_input-clear" src="Obrazki/iks.svg"/><span class="kreska"></span></div><img class="ikona_input-keyboard" src="Obrazki/klawiatura.svg"/><img class="ikona_input-mikrofon" src="Obrazki/mikrofon.png"/><button id="przycisk_szukaj"><img class="ikona_input" src="Obrazki/lupa_2.svg"/></button></div><div  id="wypisz_miasta" class="miasta_lista" :class="{widok : googleSearch.length > 0 /*&& skupienie*/ && filtrowaneMiasta.length>0}" ><ul ><li  v-for="(miasto,index) in filtrowaneMiasta" ><div class="lista_elementow" :class="{klasa_skupienie:index == zaznaczenie}"><img class="ikona_input" src="Obrazki/lupa.svg" /><a href="#" v-html="wytluszcz(miasto)" v-on:click="wybrane(index)"><b>{{ miasto }}</b></a> </div></li></ul></div> ',
    template: '<div><img src="search.svg" class="widok"><input @change="zmiana" @keyup.enter="potwierdz" v-model="googleSearch" type="search"><div class="lista" :class="{widok : googleSearch.length > 0 && filtredCities.length>0}"class="miasta"></div></div>',
   
      data: function () {
        return{
               googleSearch:"",
               wyszukaj:"",
                    cities: window.cities,
              }
               },
      computed: {
                    filtredCities: function () {
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
}
