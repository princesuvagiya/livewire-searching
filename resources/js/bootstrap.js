// import _ from 'lodash';
// window._ = _;

// import $ from 'jquery';
// window.jQuery = window.$ = $

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start()


 import Echo from 'laravel-echo';

  window.Larasocket = require('larasocket-js');

window.Echo = new Echo({

    broadcaster:Larasocket,
    token:process.env.MIX_LARASOCKET_TOKEN,

});