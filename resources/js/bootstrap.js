window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

} catch (e) {
    console.log('erreur jquery : ' + e);
}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found');
}

window.Vue = require('vue');

import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname === `localhost` ? window.location.hostname + ':6001' : window.location.hostname
});